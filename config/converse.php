<?php

return [

    /**
     * Enter the path to your logo to show in the messenger list window
     */
    'logo' => 'https://loremflickr.com/320/320',

    'models' => [
        /**
         * This is the model where all conversations live
         */
        'conversation' => Vsellis\Converse\Models\Conversation::class,

        /**
         * This is the model for indiviual messages
         */
        'message' => Vsellis\Converse\Models\Message::class,

    ]
];
