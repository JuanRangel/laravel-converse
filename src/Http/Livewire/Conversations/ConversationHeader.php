<?php

namespace JuanRangel\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use JuanRangel\Converse\Actions\CloseConversationAction;
use JuanRangel\Converse\Models\Conversation;
use Livewire\Component;

class ConversationHeader extends Component
{
    public $conversation;

    public function mount(Conversation $conversation) : void
    {
        $this->conversation = $conversation;
    }

    public function getActions()
    {
        return config('converse.actions');
    }
    public function render() : View
    {
        return view('converse::livewire.conversation-header');
    }
}
