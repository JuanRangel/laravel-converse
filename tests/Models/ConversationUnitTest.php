<?php namespace JuanRangel\Converse\Tests\Models;

use JuanRangel\Converse\Converse;
use JuanRangel\Converse\Models\Conversation;
use JuanRangel\Converse\Tests\Page;
use JuanRangel\Converse\Tests\TestCase;
use JuanRangel\Converse\Tests\User;

class ConversationUnitTest extends TestCase
{
    /** @test */
    public function it_has_many_messages()
    {
        $conversation = factory(Conversation::class)->create();

        Converse::createMessage($conversation, User::first(), 'Hello, there');
        Converse::createMessage($conversation, User::first(), 'Hello, there');
        Converse::createMessage($conversation, User::first(), 'Hello, there');
        Converse::createMessage($conversation, User::first(), 'Hello, there');

        $this->assertCount(4, $conversation->messages);
    }

    /** @test */
    public function a_conversation_can_have_multiple_participant_types()
    {
        $conversation = factory(Conversation::class)->create();

        $conversation->users()->attach(User::first());
        $conversation->pages()->attach(Page::first());
        $this->assertCount(1, $conversation->users);
        $this->assertCount(1, $conversation->pages);
        $this->assertCount(2, $conversation->participants);

        $this->assertEquals('John Doe', $conversation->participants->first()->name);
        $this->assertEquals('Test Facebook Page 1', $conversation->participants[1]->name);
    }
}
