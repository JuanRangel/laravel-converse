<?php

namespace Vsellis\Converse\Tests\Feature\Services;

use Vsellis\Converse\Converse;
use Vsellis\Converse\Models\Message;
use Vsellis\Converse\Tests\TestCase;
use Vsellis\Converse\Tests\User;

class CreateMessageServiceTest extends TestCase
{

    /** @test */
    public function it_can_create_a_message()
    {
        $user = User::first();

        $conversation = Converse::createConversation($user);
        $message = Converse::createMessage($conversation, $user, 'I like turtles');

        $this->assertNotNull($message);
        $this->assertNotNull(Message::first());
    }
}
