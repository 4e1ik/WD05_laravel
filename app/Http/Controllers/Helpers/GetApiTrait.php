<?php


namespace App\Http\Controllers\Helpers;


trait GetApiTrait
{
    public function getCurr(){

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://www.nbrb.by/api/exrates/rates?periodicity=0');
        return $response;

    }
}
