<?php

namespace JuanRangel\Converse\Actions;

abstract class ChatAction
{
    use Macroable {
        __call as macroCall;
    }

    public $label = 'Set label';

    abstract public function action();

    public function setProps($args)
    {
    }
}
