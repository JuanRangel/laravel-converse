<?php

namespace Vsellis\Converse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Vsellis\Converse\Events\MessageAdded;
use Vsellis\Converse\Models\Conversation;

class Converse
{
    public static function createConversation(Model $model)
    {
        return $model->conversations()->create([
            'uuid' => Str::uuid(),
        ]);
    }

    public static function createMessage(Conversation $conversation, $messageable, string $body)
    {
        $message = $conversation->messages()->create([
            'messageable_id' => $messageable->id,
            'messageable_type' => get_class($messageable),
            'body' => $body,
        ]);

        broadcast(new MessageAdded($message))->toOthers();

        return $message;
    }
}
