<?php

namespace Tests\Unit\Guesser;

use Dingo\Support\Guesser\CacheGuesser;
use Dingo\Support\Guesser\Contacts\Resolvable;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class CacheGuesserTest extends TestCase
{
    #[DataProvider('getGuesser')]
    public function testResolveNotNull(Resolvable $resolvable): void
    {
        $key = $resolvable->guess('\\TestCache')->getResolved();

        $this->assertIsString($key);
    }

    #[DataProvider('getGuesser')]
    public function testResolvedEqualTest(Resolvable $resolvable): void
    {
        $name = $resolvable->guess('\\TestCache')->getResolved();

        $this->assertEquals('cache:test', $name, $name);
    }

    public static function getGuesser(): array
    {
        return [
            [new CacheGuesser()],
        ];
    }
}