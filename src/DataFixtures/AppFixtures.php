<?php

namespace App\DataFixtures;

use App\Factory\AstronautFactory;
use App\Factory\GradeFactory;
use App\Factory\PlanetFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        GradeFactory::createMany(10);

        PlanetFactory::createMany(
            3,
            [
                'astronauts' => AstronautFactory::new(
                    function () {
                        return [
                            'grade' => GradeFactory::random(),
                        ];
                    }
                )->many(3),
            ]
        );


        $manager->flush();
    }
}
