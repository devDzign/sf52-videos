<?php

namespace App\Tests\Controller;

use App\Factory\GradeFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class GradeControllerTest extends WebTestCase
{
    use Factories, ResetDatabase;

    public function testSomething(): void
    {
        $client = static::createClient();
        $grade = GradeFactory::createOne(['name' => 'test 2020'])
            ->enableAutoRefresh();

        $crawler = $client->request('POST', sprintf("/grade/%s/edit", $grade->getId()));

        $client
            ->submitForm('Update', [
                'grade[name]' => 'mourad 20'
            ]);

        $client->followRedirect();

        $this->assertResponseIsSuccessful();
        $this->assertSame('mourad 20', $grade->getName());
    }
}
