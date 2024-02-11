<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('key:generate');
        $this->call('migrate:fresh');
        $this->call('db:seed');
        $this->info('Application setup successfully.');

        return Command::SUCCESS;
    }
}
