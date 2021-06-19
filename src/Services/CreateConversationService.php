<?php

namespace JuanRangel\Converse\Services;

use Illuminate\Support\Str;
use JuanRangel\Converse\Models\Conversation;

class CreateConversationService
{
    public function create() : Conversation
    {
        return Conversation::create([
            'uuid' => Str::uuid(),
        ]);
    }
}
