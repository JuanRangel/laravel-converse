<?php

namespace JuanRangel\Converse\Actions;

class CloseConversationAction
{
    public $consultation;
    public $label = 'Close Consultation';

    public function setProps($consultation)
    {
        $this->consultation = $consultation;
    }

    public function action()
    {
        $this->consultation->close();
    }
}
