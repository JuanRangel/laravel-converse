<?php

namespace JuanRangel\Converse\Tests\Models;

use JuanRangel\Converse\Converse;
use JuanRangel\Converse\Models\Conversation;
use JuanRangel\Converse\Tests\TestCase;
use JuanRangel\Converse\Tests\User;

class ViewConversationsTest extends TestCase
{
    /** @test */
    public function the_index_shows_the_latest_conversation()
    {
        $this->withoutExceptionHandling();

        $conversations = factory(Conversation::class)->raw();
        $user = User::first();
        $user->conversations()->create($conversations);

        $response = $this->actingAs($user)->get('/conversations');

        $response->assertRedirect(route('conversations.show', Conversation::first()));
    }

    /** @test */
    public function a_user_can_view_a_conversation()
    {
        $this->withoutExceptionHandling();

        $conversation = factory(Conversation::class)->create();
        $user = User::first();
        $user2 = User::find(2);

        $user->conversations()->attach($conversation);
        $user2->conversations()->attach($conversation);

        Converse::createMessage($conversation, $user, 'Hi, mark');

        $response = $this->actingAs($user)->get(route('conversations.show', $conversation));

        $response->assertOk();
        $response->assertViewIs('converse::conversations.show');
        $response->assertViewHas('conversation');
    }
}
