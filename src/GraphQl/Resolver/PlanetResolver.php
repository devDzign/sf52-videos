<?php


namespace App\GraphQl\Resolver;


use App\Entity\Astronaut;
use App\Entity\Planet;
use App\Repository\PlanetRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

use Symfony\Component\Uid\Uuid;

final class PlanetResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var PlanetRepository
     */
    private PlanetRepository $planetRepository;


    /**
     * PlanetResolver constructor.
     *
     * @param PlanetRepository $planetRepository
     */
    public function __construct(PlanetRepository $planetRepository)
    {
        $this->planetRepository = $planetRepository;
    }

    /**
     * @param String $id
     *
     * @return null| Planet
     */
    public function resolve(String $id): ?Planet
    {

        return  !Uuid::isValid($id) ? null : $this->planetRepository->find($id);
    }

    public function resolveInAstronaut(Astronaut $astronaut, $args, $context, $info)
    {
        return $this->planetRepository->findByAstronaut($astronaut->getId());
    }

    /**
     * @return string[]
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'Planet',
        ];
    }
}