<?php

namespace JuanRangel\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use Livewire\Component;
use JuanRangel\Converse\Models\Conversation;

class ConversationHeader extends Component
{
    public $conversation;

    public function mount(Conversation $conversation) : void
    {
        $this->conversation = $conversation;
    }

    public function render() : View
    {
        return view('converse::livewire.conversation-header');
    }
}
