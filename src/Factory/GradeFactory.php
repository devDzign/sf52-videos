<?php

namespace App\Factory;

use App\Entity\Grade;
use App\Repository\GradeRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Grade|Proxy createOne(array $attributes = [])
 * @method static Grade[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Grade|Proxy find($criteria)
 * @method static Grade|Proxy findOrCreate(array $attributes)
 * @method static Grade|Proxy first(string $sortedField = 'id')
 * @method static Grade|Proxy last(string $sortedField = 'id')
 * @method static Grade|Proxy random(array $attributes = [])
 * @method static Grade|Proxy randomOrCreate(array $attributes = [])
 * @method static Grade[]|Proxy[] all()
 * @method static Grade[]|Proxy[] findBy(array $attributes)
 * @method static Grade[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Grade[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static GradeRepository|RepositoryProxy repository()
 * @method Grade|Proxy create($attributes = [])
 */
final class GradeFactory extends ModelFactory
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
            // ->afterInstantiate(function(Grade $grade) {})
        ;
    }

    protected static function getClass(): string
    {
        return Grade::class;
    }
}
