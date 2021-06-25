<?php

namespace JuanRangel\Converse\Tests\Feature;

use Carbon\Carbon;
use JuanRangel\Converse\Models\Message;
use JuanRangel\Converse\Tests\TestCase;

class MessageUnitTest extends TestCase
{
    /** @test */
    public function it_can_get_the_last_message_time()
    {
        $message = Message::make([
            'created_at' => Carbon::parse('January 1st 2021 10:00 AM'),
        ]);

        $this->assertEquals('', $message->last_message_time->format('n/d/Y g:i'));
    }
}
