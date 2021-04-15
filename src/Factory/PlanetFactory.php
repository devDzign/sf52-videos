<?php

namespace App\Factory;

use App\Entity\Planet;
use App\Repository\PlanetRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Planet|Proxy createOne(array $attributes = [])
 * @method static Planet[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Planet|Proxy find($criteria)
 * @method static Planet|Proxy findOrCreate(array $attributes)
 * @method static Planet|Proxy first(string $sortedField = 'id')
 * @method static Planet|Proxy last(string $sortedField = 'id')
 * @method static Planet|Proxy random(array $attributes = [])
 * @method static Planet|Proxy randomOrCreate(array $attributes = [])
 * @method static Planet[]|Proxy[] all()
 * @method static Planet[]|Proxy[] findBy(array $attributes)
 * @method static Planet[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Planet[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PlanetRepository|RepositoryProxy repository()
 * @method Planet|Proxy create($attributes = [])
 */
final class PlanetFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://github.com/zenstruck/foundry#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->unique()->name(),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Planet $planet) {})
        ;
    }

    protected static function getClass(): string
    {
        return Planet::class;
    }
}
