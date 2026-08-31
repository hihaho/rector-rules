<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\Support;

use Hihaho\RectorRules\Rector\NamingClasses\Support\ClassDeclaration;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\FindingVisitor;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\ParserFactory;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * This is what a suffix rule sees instead of a syntax tree, and what the per-file cache
 * stores. If it loses a value or mangles one on the way through JSON, a cached run decides
 * differently from a fresh one.
 */
final class ClassDeclarationTest extends AbstractLazyTestCase
{
    public function test_reads_the_values_a_suffix_rule_asks_for(): void
    {
        $declaration = $this->declarationIn(
            "<?php\n\nnamespace App\\Notifications;\n\nuse Illuminate\\Notifications\\Notification;\n\nfinal class OrderShipped extends Notification\n{\n}\n"
        );

        $this->assertInstanceOf(ClassDeclaration::class, $declaration);
        $this->assertSame('App\Notifications\OrderShipped', $declaration->fqcn);
        $this->assertSame('OrderShipped', $declaration->shortName);
        $this->assertSame(Notification::class, $declaration->parentFqcn);
        $this->assertFalse($declaration->isAbstract);
    }

    public function test_resolves_the_parent_through_the_files_imports(): void
    {
        // The parent is written short and imported; the cache has to hold the resolved name
        // or the hierarchy check asks about a class that does not exist.
        $declaration = $this->declarationIn(
            "<?php\n\nnamespace App\\Mail;\n\nuse Illuminate\\Mail\\Mailable as Base;\n\nclass Welcome extends Base\n{\n}\n"
        );

        $this->assertInstanceOf(ClassDeclaration::class, $declaration);
        $this->assertSame(Mailable::class, $declaration->parentFqcn);
    }

    public function test_a_class_without_a_parent_has_no_parent_name(): void
    {
        $declaration = $this->declarationIn("<?php\n\nnamespace App;\n\nclass Plain\n{\n}\n");

        $this->assertInstanceOf(ClassDeclaration::class, $declaration);
        $this->assertNull($declaration->parentFqcn);
    }

    public function test_records_an_abstract_class_as_abstract(): void
    {
        $declaration = $this->declarationIn("<?php\n\nnamespace App;\n\nabstract class Base\n{\n}\n");

        $this->assertInstanceOf(ClassDeclaration::class, $declaration);
        $this->assertTrue($declaration->isAbstract);
    }

    public function test_an_anonymous_class_is_not_a_declaration(): void
    {
        // No name means no rename target and nothing PSR-4 can see.
        $classes = $this->classesIn("<?php\n\n\$handler = new class {};\n");

        $this->assertCount(1, $classes);
        $this->assertNotInstanceOf(ClassDeclaration::class, ClassDeclaration::fromNode($classes[0]));
    }

    public function test_survives_a_round_trip_through_the_cache_format(): void
    {
        $declaration = new ClassDeclaration('App\Order', 'Order', 'App\Base', true);

        $this->assertEquals($declaration, ClassDeclaration::fromArray($declaration->toArray()));
    }

    public function test_a_null_parent_survives_the_round_trip(): void
    {
        // json_encode writes null; the reader must not turn that into a missing key.
        $declaration = new ClassDeclaration('App\Order', 'Order', null, false);

        $decoded = json_decode((string) json_encode($declaration->toArray()), true);
        $this->assertIsArray($decoded);

        /** @var array{fqcn: string, shortName: string, parentFqcn: string|null, isAbstract: bool} $decoded */
        $this->assertEquals($declaration, ClassDeclaration::fromArray($decoded));
    }

    private function declarationIn(string $code): ?ClassDeclaration
    {
        $classes = $this->classesIn($code);

        $this->assertNotSame([], $classes);

        return ClassDeclaration::fromNode($classes[0]);
    }

    /**
     * @return list<Class_>
     */
    private function classesIn(string $code): array
    {
        $statements = (new ParserFactory())->createForNewestSupportedVersion()->parse($code);

        $this->assertNotNull($statements);

        $findingVisitor = new FindingVisitor(static fn (Node $node): bool => $node instanceof Class_);

        (new NodeTraverser(new NameResolver(), $findingVisitor))->traverse($statements);

        /** @var list<Class_> $classes */
        $classes = $findingVisitor->getFoundNodes();

        return $classes;
    }
}
