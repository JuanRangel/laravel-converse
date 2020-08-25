<?php namespace Vsellis\Converse\Tests\Traits;

use Vsellis\Converse\Converse;
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
