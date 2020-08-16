<?php

namespace Vsellis\LaravelConverse\Commands;

use Illuminate\Console\Command;

class LaravelConverseCommand extends Command
{
    public $signature = 'laravel-converse';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
