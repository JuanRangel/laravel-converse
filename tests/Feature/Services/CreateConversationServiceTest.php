<?php

namespace JuanRangel\Converse\Tests\Feature\Services;

use JuanRangel\Converse\Converse;
use JuanRangel\Converse\Models\Conversation;
use JuanRangel\Converse\Tests\TestCase;
use JuanRangel\Converse\Tests\User;

class CreateConversationServiceTest extends TestCase
{

    /** @test */
    public function it_can_create_a_conversations()
    {
        $conversation = Converse::createConversation(User::first(), User::find(2));

        $this->assertNotNull($conversation);
        $this->assertNotNull(Conversation::first());
    }

    /** @test */
    public function it_can_get_the_number_of_participants()
    {
        $conversation = Converse::createConversation(User::first(), User::find(2));

        $this->assertCount(2, $conversation->participants);
    }
}
