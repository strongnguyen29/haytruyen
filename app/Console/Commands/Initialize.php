<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class Initialize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'haytruyen:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init project';

    /**
     * Create a new command instance.
     *
     * @return void
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
        $this->info('Initializing application.');
        if (!file_exists(base_path('.env'))) {
            $this->askEnvConfiguration();
        }
    }

    /**
     * Rename .env to .env, ask for configuration
     */
    private function askEnvConfiguration(): void
    {
        $this->runProcess(['mv', '.env', '.env']);
        $this->call('key:generate');
        $this->continue = $this->confirm('Create database and configure your .env file, then hit Y to continue.');
    }

    /**
     * @param $arguments
     *
     * @return int
     */
    private function runProcess($arguments): int
    {
        $process = new Process($arguments);
        $process->setTimeout(600); // 10 minutes
        return $process->run(function ($type, $buffer) {
            $this->warn('> '.$buffer);
        });
    }
}
