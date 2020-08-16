<?php

use \Faker\Generator;
use Vsellis\Converse\Models\Conversation;

/* @var Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Conversation::class, function (Generator $faker) {
    return [
        'uuid' => $faker->uuid
    ];
});
