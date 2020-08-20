<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SetPrimaryKeySequenceManual extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:set-sequence-key {sequence}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Primary Key Sequence Manually';

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
        try {
            $sequence = $this->argument('sequence');
            DB::connection('pgsql')->statement("SELECT nextval('" . $sequence . "'::regclass) as next_sequence_val;");

            $this->info('Sequence value updated');

        } catch(\Illuminate\Database\QueryException $ex){ 
            $this->info('Query Exception happen => ' . $ex->getMessage());
        }

        return 0;
    }
}
