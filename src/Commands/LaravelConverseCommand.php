<?php

namespace Vsellis\Converse\Commands;

use Illuminate\Console\Command;

class ConverseCommand extends Command
{
    public $signature = 'converse';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
