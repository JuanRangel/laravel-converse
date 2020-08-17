<?php

namespace Vsellis\Converse\Tests\Feature\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Vsellis\Converse\Models\Conversation;
use Vsellis\Converse\Models\Message;
use Vsellis\Converse\Services\CreateConversationService;
use Vsellis\Converse\Services\CreateMessageService;
use Vsellis\Converse\Tests\TestCase;
use Vsellis\Converse\Tests\User;

class CreateMessageServiceTest extends TestCase
{

    /** @test */
    public function it_can_create_a_message()
    {

        $user = User::first();

        $conversationService = new CreateConversationService;
        $conversation = $conversationService->create();

        $service = new CreateMessageService;
        $message = $service->create($conversation, $user, 'I live turtles');

        $this->assertNotNull($message);
        $this->assertNotNull(Message::first());
    }

}
