<?php

namespace JuanRangel\Converse\Tests\Unit;

use JuanRangel\Converse\Converse;
use JuanRangel\Converse\Models\Conversation;
use JuanRangel\Converse\Services\CreateMessageService;
use JuanRangel\Converse\Tests\TestCase;
use JuanRangel\Converse\Tests\User;

class ConversationUnitTest extends TestCase
{
    /** @test */
    public function it_can_get_the_last_message_time()
    {
        $conversation = factory(Conversation::class)->create();

        Converse::createMessage($conversation, User::first(), 'A message');

        $this->assertEquals(now()->diffForHumans(), $conversation->last_message_time);
    }
}