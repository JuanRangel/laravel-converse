<?php

namespace JuanRangel\Converse\Tests;

use JuanRangel\Converse\Http\Livewire\TestComponent;
use Livewire\Livewire;

class ExampleTest extends TestCase
{
    /** @test */
    public function livewire_test()
    {
        $test = Livewire::test(TestComponent::class);

        $test->assertSee('This is just a test.');
    }
}
