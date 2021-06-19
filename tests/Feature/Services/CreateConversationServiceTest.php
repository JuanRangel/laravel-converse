<?php

namespace JuanRangel\Converse\Tests\Feature\Services;

use JuanRangel\Converse\Converse;
use JuanRangel\Converse\Models\Conversation;
use JuanRangel\Converse\Tests\Page;
use JuanRangel\Converse\Tests\TestCase;
use JuanRangel\Converse\Tests\User;

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
