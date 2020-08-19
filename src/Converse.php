<?php

namespace Vsellis\Converse;

use Illuminate\Support\Str;
use Vsellis\Converse\Events\MessageAdded;
use Vsellis\Converse\Models\Conversation;

class Converse
{
    public static function createConversation($user)
    {
        return $user->conversations()->create([
            'uuid' => Str::uuid(),
        ]);
    }

    public static function createMessage(Conversation $conversation, $user, string $body)
    {
        $message = $conversation->messages()->create([
            'user_id' => $user->id,
            'body' => $body,
        ]);

        broadcast(new MessageAdded($message))->toOthers();

        return $message;
    }
}
