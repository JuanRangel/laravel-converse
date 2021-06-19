<?php namespace JuanRangel\Converse\Tests;

class UserTest extends TestCase
{
    /** @test */
    public function it_can_get_the_user_name()
    {
        $user = User::first();
        $this->assertEquals('John Doe', $user->present()->name());
    }
}
