<?php

namespace Vsellis\Converse\Tests\Feature\Services;

use Vsellis\Converse\Converse;
use Vsellis\Converse\Models\Conversation;
use Vsellis\Converse\Tests\Page;
use Vsellis\Converse\Tests\TestCase;
use Vsellis\Converse\Tests\User;

class CreateConversationServiceTest extends TestCase
{

    /** @test */
    public function it_can_create_a_conversations()
    {
        $conversation = Converse::createConversation(User::first());

        $this->assertNotNull($conversation);
        $this->assertNotNull(Conversation::first());
    }

    /** @test */
    public function a_conversation_can_have_participants()
    {
        $conversation = Converse::createConversation(Page::first());

        $conversation->addParticipant(User::first());
        $conversation->addParticipant(User::find(2));

        $this->assertCount(3, $conversation->participants);

    }
}
