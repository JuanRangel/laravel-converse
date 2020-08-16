<?php

namespace Vsellis\Converse\Tests;

use Livewire\Livewire;
use Vsellis\Converse\Http\Livewire\TestComponent;

class ExampleTest extends TestCase
{
    /** @test */
    public function livewire_test()
    {
        $test = Livewire::test(TestComponent::class);

        $test->assertSee('This is just a test.');
    }
}
