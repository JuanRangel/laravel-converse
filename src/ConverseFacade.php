<?php

namespace Vsellis\Converse;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vsellis\Converse\Converse
 */
class ConverseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-converse';
    }
}
