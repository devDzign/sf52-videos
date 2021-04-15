<?php

namespace App\Tests\EndToEnd;

use App\Factory\GradeFactory;
use Symfony\Component\Panther\PantherTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class GradeControllerTest extends PantherTestCase
{
use Factories, ResetDatabase;

    public function test_grade_list(): void
    {
        $client = static::createPantherClient();
        GradeFactory::createOne(['name' => 'test2020']);
        GradeFactory::createOne(['name' => 'test2021']);
        GradeFactory::createOne(['name' => 'test2022']);

        $crawler = $client->request('GET', '/grade');
        $this->assertSelectorTextContains('h1', 'Table of Grades');
        // $crawler = $client->request('GET', '/grade');
        $crawler = $client->refreshCrawler();
        $this->assertCount(
            3,
            $crawler->filter('.item')

        );
    }
    public function test_new_grade(): void
    {
        $client = static::createPantherClient();

        $client->request('GET', '/grade/new');

        $client
            ->submitForm(
                'Save',
                [
                    'grade[name]' => 'New Grade',
                ]
            );

        $this->assertSelectorTextContains('h1', 'Table of Grades');
       // $crawler = $client->request('GET', '/grade');
$crawler = $client->refreshCrawler();
        $this->assertCount(
            1,
            $crawler->filter('.item')

        );
    }
}
