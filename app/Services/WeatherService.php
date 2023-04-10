<?php

namespace App\Services;
use GuzzleHttp\Client;

class WeatherService
{

    public function getWeather(){

        $url = 'https://api.open-meteo.com/v1/forecast?latitude=68.98&longitude=33.09&hourly=temperature_2m&current_weather=true&forecast_days=1';

        $client = new Client();
        $request = $client->get($url);
        $response = json_decode($request->getBody()->getContents(), true);
        
        return response()->json($response);
    }

}