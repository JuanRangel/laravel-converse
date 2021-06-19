<?php

namespace JuanRangel\Converse;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JuanRangel\Converse\Converse
 */
class ConverseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-converse';
    }
}
