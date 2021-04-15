<?php

namespace App\Factory;

use App\Entity\Astronaut;
use App\Repository\AstronautRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Astronaut|Proxy createOne(array $attributes = [])
 * @method static Astronaut[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Astronaut|Proxy find($criteria)
 * @method static Astronaut|Proxy findOrCreate(array $attributes)
 * @method static Astronaut|Proxy first(string $sortedField = 'id')
 * @method static Astronaut|Proxy last(string $sortedField = 'id')
 * @method static Astronaut|Proxy random(array $attributes = [])
 * @method static Astronaut|Proxy randomOrCreate(array $attributes = [])
 * @method static Astronaut[]|Proxy[] all()
 * @method static Astronaut[]|Proxy[] findBy(array $attributes)
 * @method static Astronaut[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Astronaut[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static AstronautRepository|RepositoryProxy repository()
 * @method Astronaut|Proxy create($attributes = [])
 */
final class AstronautFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://github.com/zenstruck/foundry#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            'pseudo' => self::faker()->unique()->name(),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Astronaut $astronaut) {})
        ;
    }

    protected static function getClass(): string
    {
        return Astronaut::class;
    }
}
