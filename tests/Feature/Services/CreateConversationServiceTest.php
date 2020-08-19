<?php

namespace Vsellis\Converse\Tests\Feature\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Vsellis\Converse\Converse;
use Vsellis\Converse\Models\Conversation;
use Vsellis\Converse\Models\Message;
use Vsellis\Converse\Services\CreateConversationService;
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

}
