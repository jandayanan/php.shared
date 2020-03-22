<?php

namespace Shared\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RunTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:tests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run PHPUnit Tests';

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
        //
        if ($this->confirm('Are you sure you want to run tests?')) {
            $this->info( "Running PHPUnit..." );

            $process = new Process(base_path("/vendor/bin/phpunit"));
            $process->run();
        }
    }
}
