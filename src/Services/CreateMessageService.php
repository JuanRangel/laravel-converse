<?php namespace JuanRangel\Converse\Services;

use Illuminate\Database\Eloquent\Model;
use JuanRangel\Converse\Events\MessageAdded;
use JuanRangel\Converse\Models\Conversation;

class CreateMessageService
{
    public function create(Conversation $conversation, $user, string $body) : Model
    {
        $message = $conversation->messages()->create([
            'user_id' => $user->id,
            'body' => $body,
        ]);

        broadcast(new MessageAdded($message))->toOthers();

        return $message;
    }
}
