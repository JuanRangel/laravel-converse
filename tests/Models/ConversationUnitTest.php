<?php namespace JuanRangel\Converse\Tests\Models;

use JuanRangel\Converse\Converse;
use JuanRangel\Converse\Models\Conversation;
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
    public function it_can_get_the_other_participant()
    {
        $conversation = factory(Conversation::class)->create();

        $conversation->addParticipant(User::first());
        $conversation->addParticipant(User::find(2));

        $this->assertEquals('Jane Doe', $conversation->getOtherParticipant(User::first())->name);
    }
}
