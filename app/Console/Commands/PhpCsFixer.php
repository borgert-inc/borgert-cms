<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PhpCsFixer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'borgert:phpcsfixer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run php cs fixer in /app, /config and /routes ';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info(shell_exec('php php-cs-fixer.phar fix app/'));
        $this->info(shell_exec('php php-cs-fixer.phar fix config/'));
        $this->info(shell_exec('php php-cs-fixer.phar fix routes/'));
    }
}
