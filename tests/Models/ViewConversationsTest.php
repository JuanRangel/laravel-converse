<?php namespace Vsellis\Converse\Tests\Models;

use Vsellis\Converse\Models\Conversation;
use Vsellis\Converse\Models\Message;
use Vsellis\Converse\Tests\TestCase;
use Vsellis\Converse\Tests\User;

class ViewConversationsTest extends TestCase
{
    /** @test */
    public function a_list_of_conversations()
    {
        $this->withoutExceptionHandling();

        $conversations = factory(Conversation::class)->raw();
        $user = User::first();
        $user->conversations()->create($conversations);

        $response = $this->actingAs($user)->get('/conversations');

        $response->assertOk();
        $response->assertViewIs('converse::conversations.index');
        $response->assertViewHas('conversations');
        $response->assertSee('Your Conversations');
    }

    /** @test */
    public function a_user_can_view_a_conversation()
    {
        $conversation = factory(Conversation::class)->create();
        $user = User::first();
        $user2 = User::find(2);

        $user->conversations()->attach($conversation);
        $user2->conversations()->attach($conversation);

        $conversation->messages()->create(factory(Message::class)->raw([
            'user_id' => 1,
            'body' => 'Hello, world',
        ]));

        $response = $this->actingAs($user)->get(route('conversations.show', $conversation));

        $response->assertOk();
        $response->assertViewIs('converse::conversations.show');
        $response->assertViewHas('conversation');

        $response->assertSee('Jane Doe');
        $response->assertSee('Hello, world');
    }
}
