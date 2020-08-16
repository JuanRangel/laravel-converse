<?php namespace Vsellis\Converse\Tests\Feature\Http\Controllers;

use Vsellis\Converse\Tests\TestCase;
use Vsellis\Converse\Tests\User;

class ConversationControllerTest extends TestCase
{
    /** @test */
    public function it_can_view_the_conversations_list()
    {
        $this->withoutExceptionHandling();

        $user = User::first();
        $response = $this->actingAs($user)->get('/conversations');
        $response->assertOk();
    }
}
