<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class countries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'populate countries list from external api';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $api_response = Http::get('https://devtest.ge/countries');
        $response = json_decode($api_response);

        foreach ($response as  $item)
            $countries = \App\Models\Countries::create([
                "code" => $item->code,
                "name" => $item->name->en,
            ]);

        $countries->save();

//        return 0;
        $this->info('The command was successful! Stand with ukraine');
        return 0;
    }
}
