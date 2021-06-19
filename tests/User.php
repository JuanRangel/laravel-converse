<?php namespace JuanRangel\Converse\Tests;

use Illuminate\Foundation\Auth\User as Authenticatable;
use JuanRangel\Converse\Traits\CanConverse;

class User extends Authenticatable
{
    use CanConverse;

    protected $guarded = [];

    public $timestamps = false;

    protected $table = 'users';
}
