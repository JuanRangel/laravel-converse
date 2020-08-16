<?php namespace Vsellis\Converse\Tests;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Vsellis\Converse\Traits\CanConverse;

class User extends Authenticatable
{

    use CanConverse;

    protected $guarded = [];

    public $timestamps = false;

    protected $table = 'users';
}
