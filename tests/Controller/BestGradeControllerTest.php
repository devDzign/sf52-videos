<?php

namespace App\Tests\Controller;

use App\Entity\Grade;
use App\Factory\GradeFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Browser\Test\HasBrowser;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class BestGradeControllerTest extends WebTestCase
{
    use Factories, ResetDatabase, HasBrowser;

    public function testSomething(): void
    {
        $grade = new GradeFactory();

        $grade = $grade->createOne(['name' => 'test 2020'])
            ->enableAutoRefresh();

        $this
            ->browser()
            ->visit(sprintf("/grade/%s/edit", $grade->getId()))
            ->assertSuccessful()
            ->fillField('Name', 'mourad new')
            ->click('Update')
            ->assertOn('/grade/')
            ->assertContains('mourad new')
            ->assertSeeIn('.item>td', 'mourad')
//            ->dump('.item')
        ;
    }
}
