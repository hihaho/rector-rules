<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;

/**
 * Everything the suffix rules ask about a class declaration, without the syntax tree.
 *
 * The corpus scan used to hand rules a `Class_` node, which meant the file had to be
 * parsed before a rule could say anything about it — so caching a scan meant caching or
 * re-deriving syntax trees. These four values are all any suffix rule reads, they survive
 * a round trip through JSON, and they are a pure function of the file's bytes. That is
 * what lets the scan reuse an unchanged file without opening it.
 *
 * @internal not public API; may change in any release
 *
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\Support\ClassDeclarationTest
 */
final readonly class ClassDeclaration
{
    public function __construct(
        public string $fqcn,
        public string $shortName,
        public ?string $parentFqcn,
        public bool $isAbstract,
    ) {}

    /**
     * Null for a declaration no suffix rule can act on: an anonymous class, or one whose
     * namespaced name the parser could not resolve.
     */
    public static function fromNode(Class_ $class): ?self
    {
        if (! $class->name instanceof Identifier) {
            return null;
        }

        if (! $class->namespacedName instanceof Name) {
            return null;
        }

        return new self(
            $class->namespacedName->toString(),
            $class->name->toString(),
            $class->extends instanceof Name ? $class->extends->toString() : null,
            $class->isAbstract(),
        );
    }

    /**
     * @return array{fqcn: string, shortName: string, parentFqcn: string|null, isAbstract: bool}
     */
    public function toArray(): array
    {
        return [
            'fqcn' => $this->fqcn,
            'shortName' => $this->shortName,
            'parentFqcn' => $this->parentFqcn,
            'isAbstract' => $this->isAbstract,
        ];
    }

    /**
     * @param  array{fqcn: string, shortName: string, parentFqcn: string|null, isAbstract: bool}  $data
     */
    public static function fromArray(array $data): self
    {
        return new self($data['fqcn'], $data['shortName'], $data['parentFqcn'], $data['isAbstract']);
    }
}
