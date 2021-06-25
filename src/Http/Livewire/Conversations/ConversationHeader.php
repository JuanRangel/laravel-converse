<?php

namespace JuanRangel\Converse\Http\Livewire\Conversations;

use Exception;
use Illuminate\View\View;
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

    public function doAction($key)
    {
        $currentAction = $this->getActions()[$key];
        $action = new $currentAction;
        $action->setProps($this->conversation);

        try {
            $action->action();
            $this->emit($action);
        } catch (Exception $e) {
            //
        }
    }

    public function render() : View
    {
        return view('converse::livewire.conversation-header');
    }
}
