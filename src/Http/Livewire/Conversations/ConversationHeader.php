<?php

namespace Vsellis\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use Livewire\Component;

class ConversationHeader extends Component
{
    public function render() : View
    {
        return view('converse::livewire.conversation-header');
    }
}
