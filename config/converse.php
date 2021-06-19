<?php

use JuanRangel\Converse\Tests\User;

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
        'conversation' => JuanRangel\Converse\Models\Conversation::class,

        /**
         * This is the model for indiviual messages
         */
        'message' => JuanRangel\Converse\Models\Message::class,

        /**
         * All modes that should be able to participate in a conversation
         */
        'conversables' => [
            'users' => User::class,
        ],
    ],

    'layout' => 'converse::layouts.converse',
];
