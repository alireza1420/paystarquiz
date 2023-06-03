<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class testdbconnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testdbconnection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

    }
}
