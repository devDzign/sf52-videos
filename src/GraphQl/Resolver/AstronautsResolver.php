<?php


namespace App\GraphQl\Resolver;

use App\Repository\AstronautRepository;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;


final class AstronautsResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var AstronautRepository
     */
    private AstronautRepository $astronautRepository;

    /**
     *
     * @param AstronautRepository $astronautRepository
     */
    public function __construct(AstronautRepository $astronautRepository)
    {
        $this->astronautRepository = $astronautRepository;
    }


    /**
     * @param Argument $argument
     *
     * @return \App\Entity\Astronaut[]
     */
    public function resolve(int $limit, ?string $pseudo): array
    {
        return $this->astronautRepository->findBy([], [],$limit, 0);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'Astronauts',
        ];
    }
}
