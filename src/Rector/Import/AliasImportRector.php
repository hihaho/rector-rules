<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Import;

use Hihaho\RectorRules\Tests\Rector\Import\AliasImportRector\AliasImportRectorTest;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt\Use_;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * @see AliasImportRectorTest
 */
final class AliasImportRector extends AbstractRector implements ConfigurableRectorInterface
{
    /** @var array<string, string> FQCN → desired alias */
    private array $aliasMap = [];

    /**
     * Per-file: FQCNs that have been aliased in this file.
     *
     * @var array<string, array{oldShortName: string, newAlias: string}>
     */
    private array $activeAliases = [];

    private string $currentFile = '';

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Add import aliases and rename all usages in the file',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
use Illuminate\Database\Eloquent\Builder;

function query(Builder $query): Builder
{
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

function query(EloquentQueryBuilder $query): EloquentQueryBuilder
{
}
CODE_SAMPLE,
                    [
                        'Illuminate\Database\Eloquent\Builder' => 'EloquentQueryBuilder',
                    ],
                ),
            ],
        );
    }

    /** @param array<string, string> $configuration */
    public function configure(array $configuration): void
    {
        Assert::allString($configuration);
        Assert::allString(array_keys($configuration));

        $this->aliasMap = $configuration;
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [Use_::class, Name::class];
    }

    public function refactor(Node $node): ?Node
    {
        $this->ensureFileState();

        if ($node instanceof Use_) {
            return $this->refactorUse($node);
        }

        if ($node instanceof Name) {
            return $this->refactorName($node);
        }

        return null;
    }

    private function refactorUse(Use_ $node): ?Use_
    {
        if ($node->type !== Use_::TYPE_NORMAL) {
            return null;
        }

        $changed = false;

        foreach ($node->uses as $useItem) {
            $fqcn = $useItem->name->toString();
            $desiredAlias = $this->aliasMap[$fqcn] ?? null;

            if ($desiredAlias === null) {
                continue;
            }

            $currentAlias = $useItem->alias?->toString();

            if ($currentAlias === $desiredAlias) {
                // Already aliased correctly — still register for Name resolution
                $this->activeAliases[$fqcn] = [
                    'oldShortName' => $desiredAlias,
                    'newAlias' => $desiredAlias,
                ];

                continue;
            }

            $oldShortName = $currentAlias ?? $useItem->name->getLast();
            $useItem->alias = new Identifier($desiredAlias);
            $changed = true;

            $this->activeAliases[$fqcn] = [
                'oldShortName' => $oldShortName,
                'newAlias' => $desiredAlias,
            ];
        }

        return $changed ? $node : null;
    }

    private function refactorName(Name $node): ?Name
    {
        if ($this->activeAliases === []) {
            return null;
        }

        // FullyQualified: Rector resolves most type references to FQN internally
        if ($node instanceof FullyQualified) {
            $fqcn = $node->toString();
            $alias = $this->activeAliases[$fqcn] ?? null;

            if ($alias === null) {
                return null;
            }

            if ($alias['oldShortName'] === $alias['newAlias']) {
                return null;
            }

            return new Name($alias['newAlias']);
        }

        // Short name: check if it matches any old import short name
        $shortName = $node->toString();

        foreach ($this->activeAliases as $alias) {
            if ($alias['oldShortName'] === $shortName && $alias['oldShortName'] !== $alias['newAlias']) {
                return new Name($alias['newAlias']);
            }
        }

        return null;
    }

    private function ensureFileState(): void
    {
        $filePath = $this->getFile()->getFilePath();

        if ($this->currentFile !== $filePath) {
            $this->currentFile = $filePath;
            $this->activeAliases = [];

            // Pre-scan: detect existing imports for our target FQCNs
            $this->scanExistingImports();
        }
    }

    private function scanExistingImports(): void
    {
        $stmts = $this->getFile()->getNewStmts();

        foreach ($stmts as $stmt) {
            if ($stmt instanceof Node\Stmt\Namespace_) {
                $this->scanStmtsForImports($stmt->stmts);
            }
        }

        $this->scanStmtsForImports($stmts);
    }

    /** @param Node\Stmt[] $stmts */
    private function scanStmtsForImports(array $stmts): void
    {
        foreach ($stmts as $stmt) {
            if (! $stmt instanceof Use_) {
                continue;
            }

            if ($stmt->type !== Use_::TYPE_NORMAL) {
                continue;
            }

            foreach ($stmt->uses as $useItem) {
                $fqcn = $useItem->name->toString();

                if (! isset($this->aliasMap[$fqcn])) {
                    continue;
                }

                $currentAlias = $useItem->alias?->toString();
                $oldShortName = $currentAlias ?? $useItem->name->getLast();

                $this->activeAliases[$fqcn] = [
                    'oldShortName' => $oldShortName,
                    'newAlias' => $this->aliasMap[$fqcn],
                ];
            }
        }
    }
}
