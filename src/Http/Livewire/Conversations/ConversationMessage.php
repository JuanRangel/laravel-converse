<?php

namespace JuanRangel\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use JuanRangel\Converse\Models\Conversation;
use JuanRangel\Converse\Models\Message;
use Livewire\Component;

class ConversationMessage extends Component
{
    public $conversation;
    public $message;


    public function render() : View
    {
        return view('converse::livewire.conversation-message');
    }

    public function isAuthor()
    {
        return auth()->user()->id == $this->message->messageable->id;
    }
}
