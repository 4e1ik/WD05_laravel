<?php


namespace App\Http\Controllers\Helpers;


use Illuminate\Support\Facades\Http;

class GetApiClass
{
    public static function getApi(){
//        $client = Http::retry(3, 10000)->get('https://www.nbrb.by/api/exrates/rates?periodicity=0');
//        $responseClient = json_decode($client->getBody()->getContents(), true);
//        return $responseClient;
        try {
            $client = Http::retry(3, 10000)->get('https://www.nbrb.by/api/exrates/rate?periodicity=0');
            if ($client->status() !== 200){
                throw new \Exception();
            }
            $responseClient = json_decode($client->getBody()->getContents(), true);
            return $responseClient;
        } catch (\Exception $exception){
            return 0;
        }
    }
}
