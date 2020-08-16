<?php

namespace Vsellis\Converse\Http\Livewire\Conversations;

use Livewire\Component;

class ConversationList extends Component
{
    public $conversations;

    public function mount($conversations)
    {
        $this->conversations = $conversations;
    }

    public function render()
    {
        return view('converse::livewire.conversation-list');
    }
}
