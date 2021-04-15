<?php

namespace App\Tests\Repository;

use App\Factory\GradeFactory;
use App\Repository\GradeRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class GradeRepositoryTest extends KernelTestCase
{

    use Factories, ResetDatabase;
    public function testSomething(): void
    {
        $kernel = self::bootKernel();
        $productRepository = self::$container->get(GradeRepository::class);

        GradeFactory::createOne(['name' => 'test2020']);
        GradeFactory::createOne(['name' => 'test2021']);
        GradeFactory::createOne(['name' => 'test2022']);

        $result = $productRepository->findAll();
        $this->assertCount(3, $result);


    }
}
