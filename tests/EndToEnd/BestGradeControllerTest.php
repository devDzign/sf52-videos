<?php

namespace App\Tests\EndToEnd;

use App\Factory\GradeFactory;
use Symfony\Component\Panther\PantherTestCase;
use Zenstruck\Browser\Test\HasBrowser;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class BestGradeControllerTest extends PantherTestCase
{
use Factories, ResetDatabase, HasBrowser;

    public function test_best_grade_list(): void
    {

        GradeFactory::createOne(['name' => 'test2020']);
        GradeFactory::createOne(['name' => 'test2021']);
        GradeFactory::createOne(['name' => 'test2022']);

        $this->pantherBrowser()
            ->visit('/grade')
            ->assertElementCount('.item', 3)
        ;
    }

    public function test_best_new_grade(): void
    {
        $this->pantherBrowser()
            ->visit('/grade/new')
            ->fillField('Name', 'ma nouveau grade')
            ->click('Save')
            ->assertElementCount('.item', 1)
        ;
    }

}
