<?php namespace Vsellis\Converse\Tests\Traits;

use Livewire\Livewire;
use Vsellis\Converse\Converse;
use Vsellis\Converse\Http\Livewire\TestComponent;
use Vsellis\Converse\Tests\TestCase;
use Vsellis\Converse\Tests\User;

class CanConverseTest extends TestCase
{

    /** @test */
    public function in_conversation()
    {
        $user = User::first();
        $this->actingAs($user);

        Converse::createConversation($user);

        $this->assertTrue($user->inConversation(1));
    }

}
