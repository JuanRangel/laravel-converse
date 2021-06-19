<?php

namespace JuanRangel\Converse\Tests\Feature\Services;

use JuanRangel\Converse\Converse;
use JuanRangel\Converse\Tests\TestCase;
use JuanRangel\Converse\Tests\User;

class CreateMessageServiceTest extends TestCase
{

    /** @test */
    public function it_can_create_a_message()
    {
        $user = User::first();
        $user2 = User::find(2);
        $conversation = Converse::createConversation($user, $user2);
        $message = Converse::createMessage($conversation, $user, 'I like turtles');

        $this->assertNotNull($message);
        $this->count(2, $conversation->messages);
    }
}
