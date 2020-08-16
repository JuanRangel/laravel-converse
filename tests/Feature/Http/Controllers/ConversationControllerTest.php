<?php namespace Vsellis\Converse\Tests\Feature\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Vsellis\Converse\Tests\TestCase;

class ConversationControllerTest extends TestCase
{
    /** @test */
    public function it_can_view_the_conversations_list()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/conversations')->assertSeeLivewire('converse::conversations.conversation-list');
        $response->assertSee('This is just a test.');
    }
}
