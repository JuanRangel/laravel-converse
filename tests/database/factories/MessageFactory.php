<?php

use Faker\Factory;
use \Faker\Generator;
use JuanRangel\Converse\Models\Message;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [];
    }
}