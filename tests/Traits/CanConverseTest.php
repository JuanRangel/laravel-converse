<?php namespace JuanRangel\Converse\Tests\Traits;

use JuanRangel\Converse\Converse;
use JuanRangel\Converse\Tests\TestCase;
use JuanRangel\Converse\Tests\User;

class CanConverseTest extends TestCase
{

    /** @test */
    public function in_conversation()
    {
        $user = User::first();
        $this->actingAs($user);

        Converse::createConversation($user, User::find(2));

        $this->assertTrue($user->inConversation(1));
    }
}
