<?php


namespace App\GraphQl\Resolver;


use App\Entity\Astronaut;
use App\Repository\AstronautRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use Symfony\Component\Uid\Uuid;

final class AstronautResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var AstronautRepository
     */
    private AstronautRepository $astronautRepository;

    /**
     * AstronautResolver constructor.
     *
     * @param AstronautRepository $astronautRepository
     */
    public function __construct(AstronautRepository $astronautRepository)
    {
        $this->astronautRepository = $astronautRepository;
    }

    /**
     * @param string $id
     *
     * @return Astronaut|null
     */
    public function resolve(string $id): ?Astronaut
    {
        return  !Uuid::isValid($id) ? null : $this->astronautRepository->find($id);
    }

    /**
     * @return array [<string, string>]
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'Astronaut',
        ];
    }
}