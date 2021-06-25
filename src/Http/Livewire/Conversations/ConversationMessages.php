<?php

namespace JuanRangel\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use Livewire\Component;

class ConversationMessages extends Component
{
    public $conversation;

    public function render() : View
    {
        return view('converse::livewire.conversation-messages');
    }
}
