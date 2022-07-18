<?php

namespace App\Http\Controllers;


use App\Models\Countries;
use App\Models\Statistics;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CovidController extends Controller
{
    //
    public function index() {
//        $client = new Client();
//        $api_response = $client->get('https://devtest.ge/countries');
//        $response = json_decode($api_response);

        $api_response = Http::get('https://devtest.ge/countries');
        $response = json_decode($api_response);

        foreach ($response as  $item)
            $countries = Countries::create([
                "code" => $item->code,
                "name" => $item->name->en,
            ]);
        $countries->save();
        return view('covid', compact('response'));

    }

    public function index_api() {

        $api_response = Http::get('https://devtest.ge/countries');
        $response = json_decode($api_response);

        foreach ($response as  $item)
            $countries = Countries::create([
                "code" => $item->code,
                "name" => $item->name->en,
            ]);
        $countries->save();
        return $response;

    }

    public function statistics() {
//        all at once reconstruct statistics table
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


    }
}
