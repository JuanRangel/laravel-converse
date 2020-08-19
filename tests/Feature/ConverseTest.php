<?php

namespace Vsellis\Converse\Tests\Feature;

use Orchestra\Testbench\TestCase;

class ConverseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
