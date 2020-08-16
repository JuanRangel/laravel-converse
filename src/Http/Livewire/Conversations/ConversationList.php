<?php

namespace Vsellis\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use Livewire\Component;

class ConversationList extends Component
{

    public $conversations;

    public function mount($conversations) : void
    {
        $this->conversations = $conversations;
    }

    public function render() : View
    {
        return view('converse::livewire.conversation-list');
    }
}
