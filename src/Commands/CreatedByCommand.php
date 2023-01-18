<?php

namespace Hylk\CreatedBy\Commands;

use Illuminate\Console\Command;

class CreatedByCommand extends Command
{
    public $signature = 'laravel-created-by';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
