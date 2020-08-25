<?php

use Vsellis\Converse\Tests\Page;
use Vsellis\Converse\Tests\User;

return [

    /**
     * Enter the path to your logo to show in the messenger list window
     */
    'logo' => 'https://loremflickr.com/320/320',

    /**
     * Fields you wish to encrypt. If you do not want to use encryption pass an empty array.
     */
    'encrypt' => ['body'],

    'models' => [
        /**
         * This is the model where all conversations live
         */
        'conversation' => Vsellis\Converse\Models\Conversation::class,

        /**
         * This is the model for indiviual messages
         */
        'message' => Vsellis\Converse\Models\Message::class,

        'conversables' => [
            'users' => User::class,
            'pages' => Page::class,
        ],
    ],

    'layout' => 'converse::layouts.converse'
];
