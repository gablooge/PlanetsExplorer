<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Models\Planet;

class SyncPlanets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'planets:sync {api_get?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command get data from planets APIs';
    
    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $model = new Planet;
        if($this->argument("api_get")){
            $model->sync('https://swapi.py4e.com/api/planets/'.$this->argument("api_get").'/');
        }else{
            $model->sync('https://swapi.py4e.com/api/planets/');
        }
        return Command::SUCCESS;
    }
}
