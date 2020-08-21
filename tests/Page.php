<?php namespace Vsellis\Converse\Tests;

use Illuminate\Database\Eloquent\Model;
use Vsellis\Converse\Traits\CanConverse;

class Page extends Model
{
    use CanConverse;

    protected $guarded = [];

    public $timestamps = false;

    protected $table = 'pages';
}
