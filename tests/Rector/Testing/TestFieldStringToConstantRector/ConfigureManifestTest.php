<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector;

use Hihaho\RectorRules\Rector\Testing\TestFieldStringToConstantRector;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use Rector\PhpParser\Node\FileNode;
use Rector\Rector\AbstractRector;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;
use ReflectionMethod;
use ReflectionProperty;

/**
 * Unit-tests the manifest loading/validation in configure(), independent of the
 * Rector fixture harness — the fixture tests only exercise the happy path and the
 * runtime drift/absence guards, never the structural record validation. Extends
 * Rector's lazy test base (not a bare PHPUnit TestCase) for the same reason
 * {@see \Hihaho\RectorRules\Tests\Rector\CodeQuality\NamedArgumentFromManifestRector\ConfigureManifestTest}
 * does: its setUp pulls in Rector's scoper autoload, so loading a class that
 * implements a Rector contract doesn't double-declare the bundled symfony polyfill
 * on the Windows prefer-lowest CI leg.
 */
final class ConfigureManifestTest extends AbstractLazyTestCase
{
    private string $manifest;

    protected function setUp(): void
    {
        parent::setUp();

        $this->manifest = sys_get_temp_dir() . '/test-field-configure-' . bin2hex(random_bytes(8)) . '.json';
    }

    protected function tearDown(): void
    {
        if (is_file($this->manifest)) {
            unlink($this->manifest);
        }

        parent::tearDown();
    }

    public function test_malformed_json_throws_naming_the_path(): void
    {
        file_put_contents($this->manifest, '{not valid json');

        $rule = new TestFieldStringToConstantRector();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($this->manifest);

        $rule->configure([TestFieldStringToConstantRector::MANIFEST => $this->manifest]);
    }

    public function test_non_list_json_throws(): void
    {
        file_put_contents($this->manifest, '{"file":"a.php"}');

        $rule = new TestFieldStringToConstantRector();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('must be a JSON array of records');

        $rule->configure([TestFieldStringToConstantRector::MANIFEST => $this->manifest]);
    }

    public function test_invalid_record_is_skipped_while_valid_record_loads(): void
    {
        // First record is missing `constFqcn`; second has an empty `value`; third is
        // the lone valid record. Only the valid one must load.
        file_put_contents($this->manifest, json_encode([
            ['file' => 'a.php', 'line' => 5, 'operation' => 'to_const', 'value' => 'id'],
            ['file' => 'a.php', 'line' => 6, 'operation' => 'to_const', 'value' => '', 'constFqcn' => 'App\\Models\\Order::ID'],
            ['file' => 'a.php', 'line' => 7, 'operation' => 'to_const', 'value' => 'id', 'constFqcn' => 'App\\Models\\Order::ID'],
        ]));

        $rule = new TestFieldStringToConstantRector();
        $rule->configure([TestFieldStringToConstantRector::MANIFEST => $this->manifest]);

        $loaded = $this->loadedRecords($rule);

        $this->assertSame(['a.php'], array_keys($loaded));
        $this->assertCount(1, $loaded['a.php']);
        $this->assertSame(7, $loaded['a.php'][0]['line']);
    }

    public function test_record_with_wrong_scalar_type_is_skipped(): void
    {
        // `line` arrives as a string (a hand-edited manifest); skipped.
        file_put_contents($this->manifest, json_encode([
            ['file' => 'a.php', 'line' => '5', 'operation' => 'to_const', 'value' => 'id', 'constFqcn' => 'App\\Models\\Order::ID'],
            ['file' => 'b.php', 'line' => 9, 'operation' => 'to_const', 'value' => 'id', 'constFqcn' => 'App\\Models\\Order::ID'],
        ]));

        $rule = new TestFieldStringToConstantRector();
        $rule->configure([TestFieldStringToConstantRector::MANIFEST => $this->manifest]);

        $loaded = $this->loadedRecords($rule);

        $this->assertSame(['b.php'], array_keys($loaded));
    }

    public function test_record_with_non_string_enclosing_method_is_skipped(): void
    {
        // `enclosingMethod` is informational, but when present it must be a string;
        // a non-string value marks the record malformed and drops it.
        file_put_contents($this->manifest, json_encode([
            ['file' => 'a.php', 'line' => 5, 'operation' => 'to_const', 'value' => 'id', 'constFqcn' => 'App\\Models\\Order::ID', 'enclosingMethod' => 42],
            ['file' => 'b.php', 'line' => 9, 'operation' => 'to_const', 'value' => 'id', 'constFqcn' => 'App\\Models\\Order::ID'],
        ]));

        $rule = new TestFieldStringToConstantRector();
        $rule->configure([TestFieldStringToConstantRector::MANIFEST => $this->manifest]);

        $loaded = $this->loadedRecords($rule);

        $this->assertSame(['b.php'], array_keys($loaded));
    }

    /**
     * Every `constFqcn` that is not exactly a `Class::CONST` pair is dropped, so the
     * refactor never builds a malformed ClassConstFetch. The valid trailing record in
     * each case proves the rest of the manifest still loads.
     */
    #[DataProvider('provideMalformedConstFqcn')]
    public function test_malformed_const_fqcn_is_skipped(string $constFqcn): void
    {
        file_put_contents($this->manifest, json_encode([
            ['file' => 'bad.php', 'line' => 5, 'operation' => 'to_const', 'value' => 'id', 'constFqcn' => $constFqcn],
            ['file' => 'good.php', 'line' => 9, 'operation' => 'to_const', 'value' => 'id', 'constFqcn' => 'App\\Models\\Order::ID'],
        ]));

        $rule = new TestFieldStringToConstantRector();
        $rule->configure([TestFieldStringToConstantRector::MANIFEST => $this->manifest]);

        $loaded = $this->loadedRecords($rule);

        $this->assertSame(['good.php'], array_keys($loaded));
    }

    /** @return iterable<string, array{string}> */
    public static function provideMalformedConstFqcn(): iterable
    {
        yield 'no separator' => ['App\\Models\\Order'];
        yield 'empty class half' => ['::ID'];
        yield 'empty const half' => ['App\\Models\\Order::'];
        yield 'three segments' => ['App\\Models\\Order::Nested::ID'];
        yield 'illegal const token' => ['App\\Models\\Order::bad-name'];
        yield 'numeric-leading const' => ['App\\Models\\Order::2FACTOR'];
        yield 'class segment with space' => ['App\\Bad Segment::ID'];
        yield 'class segment with hyphen' => ['App\\Mod-els\\Order::ID'];
        yield 'magic ::class pseudo-constant' => ['App\\Models\\Order::class'];
        yield 'magic ::class mixed case' => ['App\\Models\\Order::Class'];
        yield 'self pseudo-class' => ['self::ID'];
        yield 'static pseudo-class' => ['static::ID'];
        yield 'parent pseudo-class mixed case' => ['Parent::ID'];
        yield 'reserved word as terminal segment' => ['Foo\\Parent::ID'];
        yield 'self as terminal segment' => ['Foo\\Self::ID'];
        yield 'static as terminal segment' => ['Foo\\Static::ID'];
    }

    /**
     * A reserved word is only a pseudo-class when bare; PHP allows it as a namespace
     * segment (`Foo\Parent\Bar` is a real class), so such records must still load —
     * rejecting them would silently drop a legitimately-namespaced model.
     *
     * @param non-empty-string $constFqcn
     */
    #[DataProvider('provideReservedWordNamespaceSegment')]
    public function test_reserved_word_as_namespace_segment_loads(string $constFqcn): void
    {
        file_put_contents($this->manifest, json_encode([
            ['file' => 'ns.php', 'line' => 5, 'operation' => 'to_const', 'value' => 'id', 'constFqcn' => $constFqcn],
        ]));

        $rule = new TestFieldStringToConstantRector();
        $rule->configure([TestFieldStringToConstantRector::MANIFEST => $this->manifest]);

        $this->assertSame(['ns.php'], array_keys($this->loadedRecords($rule)));
    }

    /** @return iterable<string, array{string}> */
    public static function provideReservedWordNamespaceSegment(): iterable
    {
        yield 'parent as segment' => ['Foo\\Parent\\Bar::ID'];
        yield 'self as segment' => ['Foo\\Self\\Bar::ID'];
        yield 'static as segment' => ['Foo\\Static\\Bar::ID'];
    }

    public function test_record_with_missing_or_unknown_operation_is_skipped(): void
    {
        // `operation` is required and must be one of the two known directions; a record
        // missing it, or naming an unknown op, is dropped so the rule never guesses.
        file_put_contents($this->manifest, json_encode([
            ['file' => 'missing.php', 'line' => 5, 'value' => 'id', 'constFqcn' => 'App\\Models\\Order::ID'],
            ['file' => 'unknown.php', 'line' => 6, 'operation' => 'to_array', 'value' => 'id', 'constFqcn' => 'App\\Models\\Order::ID'],
            ['file' => 'good.php', 'line' => 9, 'operation' => 'to_literal', 'value' => 'id', 'constFqcn' => 'App\\Models\\Order::ID'],
        ]));

        $rule = new TestFieldStringToConstantRector();
        $rule->configure([TestFieldStringToConstantRector::MANIFEST => $this->manifest]);

        $this->assertSame(['good.php'], array_keys($this->loadedRecords($rule)));
    }

    public function test_a_missing_manifest_file_is_a_no_op(): void
    {
        $rule = new TestFieldStringToConstantRector();
        $rule->configure([TestFieldStringToConstantRector::MANIFEST => $this->manifest]);

        $this->assertSame([], $this->loadedRecords($rule));
    }

    public function test_rule_does_not_override_before_traverse(): void
    {
        // Overriding beforeTraverse() is deprecated in Rector 2.4.5 (emits a runtime
        // [WARNING]). The per-file setup lives in the FileNode branch of refactor(), so
        // beforeTraverse must resolve to AbstractRector's, not this rule's.
        $declaringClass = (new ReflectionMethod(TestFieldStringToConstantRector::class, 'beforeTraverse'))
            ->getDeclaringClass()
            ->getName();

        $this->assertSame(AbstractRector::class, $declaringClass);
    }

    public function test_rule_registers_the_file_node_type(): void
    {
        $rule = new TestFieldStringToConstantRector();

        $this->assertContains(FileNode::class, $rule->getNodeTypes());
    }

    /**
     * @return array<string, list<array{file: string, line: int, operation: string, value: string, constFqcn: string, enclosingMethod?: string}>>
     */
    private function loadedRecords(TestFieldStringToConstantRector $rule): array
    {
        $property = new ReflectionProperty(TestFieldStringToConstantRector::class, 'recordsByBasename');

        /** @var array<string, list<array{file: string, line: int, operation: string, value: string, constFqcn: string, enclosingMethod?: string}>> $value */
        $value = $property->getValue($rule);

        return $value;
    }
}
