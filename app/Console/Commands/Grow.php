<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class Grow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a grow command';

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
        $today = date('Y-m-d',time());
        $tasks = DB::table('tasks')->where('enddate','>',$today)->get();

        foreach ($tasks as $t){
            $t = (array)$t;
            $t['paytime'] = $today;
            unset($t['tid']);
            unset($t['enddate']);
            DB::table('grows')->insert($t);
        }
    }
}
