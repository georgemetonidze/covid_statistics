<?php

namespace App\Console\Commands;

use App\Models\Countries;
use App\Models\Statistics;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class StatisticsList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create statistics data from external api';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $countries = Countries::all();
        foreach ($countries as $country) {
            $api_response = Http::post('https://devtest.ge/get-country-statistics', [
                'code' => $country->code,
            ]);
            $response = json_decode($api_response);

            $item = Statistics::create([
                "country_id" => $response->id,
                "confirmed" => $response->confirmed,
                "recovered" => $response->recovered,
                "death" => $response->deaths,
            ]);
        }
        return 0;
    }
}
