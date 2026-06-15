<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty;

use Closure;

/**
 * Reflection double: the fixtures resolve parameter defaults against these
 * signatures. Every body uses all of its parameters and makes no call that itself
 * carries a default-valued argument, so the rule (and the CI auto-fix bot) leaves
 * this file unchanged.
 */
// Not final: ExtendedRepository subclasses it to exercise the exclude_calls is-a match.
class Repository
{
    private const int DEFAULT_PER_PAGE = 15;

    /** @var list<string> */
    private array $log = [];

    public function __construct(string $name, ?int $ttl = null)
    {
        $this->log[] = $name . ':' . ($ttl ?? -1);
    }

    public function withPosts(?Closure $callback = null, int $times = 1): self
    {
        $this->log[] = ($callback instanceof Closure ? 'cb' : 'none') . ':' . $times;

        return $this;
    }

    public function publish(string $key, bool $force = true): self
    {
        $this->log[] = $force ? "force:{$key}" : $key;

        return $this;
    }

    public function cache(string $key, ?int $ttl = null): self
    {
        $this->log[] = $key . ':' . ($ttl ?? -1);

        return $this;
    }

    public function touch(?int $id = null): self
    {
        $this->log[] = 'touch:' . ($id ?? -1);

        return $this;
    }

    /** @return list<string> */
    public function logs(): array
    {
        return $this->log;
    }

    /** @param array<mixed> $options */
    public function sync(string $key, array $options = []): self
    {
        $this->log[] = $key . ':' . count($options);

        return $this;
    }

    public function configure(string $key, bool $force = true, ?int $ttl = null): self
    {
        $this->log[] = $key . ':' . ($force ? '1' : '0') . ':' . ($ttl ?? -1);

        return $this;
    }

    public static function build(string $name, bool $shared = false): self
    {
        $repository = new self($name);
        $repository->log[] = $shared ? 'shared' : 'single';

        return $repository;
    }

    public function withStatus(Status $status = Status::Active): self
    {
        $this->log[] = 'status:' . $status->name;

        return $this;
    }

    public function paginate(int $page, int $perPage = self::DEFAULT_PER_PAGE): self
    {
        $this->log[] = $page . '/' . $perPage;

        return $this;
    }

    public function step(int $current, int $delta = -1): self
    {
        $this->log[] = 'step:' . ($current + $delta);

        return $this;
    }

    public function relate(string $relation, string $operator = '>=', int $count = 1): self
    {
        $this->log[] = $relation . $operator . $count;

        return $this;
    }

    // Stands in for a factory whose return value is serialized in an argument-count-
    // sensitive way (e.g. a middleware signature string) — the exclude_calls case.
    public function signature(int $limit = 60, int $window = 1): string
    {
        return $limit . ',' . $window;
    }

    // Static counterpart of the inherited factory (mirrors ThrottleRequests::with()):
    // a subclass call resolves its declaring class to Repository.
    public static function make(int $limit = 60, int $window = 1): string
    {
        return $limit . ':' . $window;
    }

    /** @param array<mixed> $attributes */
    public function attach(string $model, array $attributes = [], ?string $relationship = null): self
    {
        $this->log[] = $model . ':' . count($attributes) . ':' . ($relationship ?? '');

        return $this;
    }

    public function flag(string $key, ?bool $strict = null): self
    {
        $this->log[] = $key . ':' . ($strict === null ? 'n' : ($strict ? '1' : '0'));

        return $this;
    }

    /** @param array<string> $tags */
    public function report(string $key, array $tags = ['x']): self
    {
        $this->log[] = $key . ':' . implode(',', $tags);

        return $this;
    }

    public function resolve(string $platform, bool $inherit = true): ?string
    {
        return $inherit ? $platform : null;
    }

    /** @return array<bool> */
    public function tags(bool ...$flags): array
    {
        return $flags;
    }
}
