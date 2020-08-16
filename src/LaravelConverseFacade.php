<?php

namespace Vsellis\LaravelConverse;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vsellis\LaravelConverse\LaravelConverse
 */
class LaravelConverseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-converse';
    }
}
