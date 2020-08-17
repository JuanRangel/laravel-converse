<?php

namespace Vsellis\Converse\Commands;

use Illuminate\Console\Command;

class ConverseCommand extends Command
{
    public $signature = 'converse:make:action';

    public $description = 'Scaffold an action class to extend converse.';

    public function handle() : void
    {
        $this->comment('All done');
    }
}
