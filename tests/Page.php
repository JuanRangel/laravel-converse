<?php

namespace JuanRangel\Converse\Tests;

use Illuminate\Database\Eloquent\Model;
use JuanRangel\Converse\Traits\CanConverse;

class Page extends Model
{
    use CanConverse;

    protected $guarded = [];

    public $timestamps = false;

    protected $table = 'pages';
}
