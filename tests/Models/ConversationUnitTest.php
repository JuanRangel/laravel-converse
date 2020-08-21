<?php namespace Vsellis\Converse\Tests\Models;

use Vsellis\Converse\Models\Conversation;
use Vsellis\Converse\Models\Message;
use Vsellis\Converse\Tests\TestCase;

class ConversationUnitTest extends TestCase
{
    /** @test */
    public function it_has_many_messages()
    {
        $conversation = factory(Conversation::class)->create();
        $conversation->messages()->create(factory(Message::class)->raw([
            'participant_id' => 1,
            'body' => 'Hello',
        ]));

        $this->assertCount(1, $conversation->messages);
    }
}
