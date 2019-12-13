<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ReleaseSimilarity;
use App\Release;
use App\Company;
use Illuminate\Support\Facades\Redis;

class LoadRecommend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:loadrecommend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Redis::set('companiesPredict', $this->reloadCompany());
        echo "OK";
    }

    protected function reloadCompany(){
        $companies = Company::all()->toJSON();
        $companies        = json_decode($companies);
        
        $selectedId      = intval(app('request')->input('id') ?? '105');

        $releaseSimilarity = new ReleaseSimilarity($companies, 'companies');
        $predictMatrix  = $releaseSimilarity->calculatePredictMatrix();
        return json_encode($predictMatrix);
    }
}
