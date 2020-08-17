<?php namespace Vsellis\Converse\Services;

use Illuminate\Support\Str;
use Vsellis\Converse\Models\Conversation;

class CreateConversationService
{
    public function create() : Conversation
    {
        return Conversation::create([
            'uuid' => Str::uuid(),
        ]);
    }
}
