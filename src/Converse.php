<?php

namespace Vsellis\Converse;

use Illuminate\Support\Str;
use Vsellis\Converse\Events\MessageAdded;
use Vsellis\Converse\Models\Conversation;

class Converse
{
    public static function createConversation($sender, $recipient)
    {
        $conversation = $sender->conversations()->create([
            'uuid' => Str::uuid(),
        ]);

        $conversation->addParticipant($recipient);


        return $conversation;
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
