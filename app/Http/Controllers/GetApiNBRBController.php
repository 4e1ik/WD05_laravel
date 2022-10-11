<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetApiNBRBController extends Controller
{
    public function getCurr(){

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://www.nbrb.by/api/exrates/rates?periodicity=0');
        return $response;

    }
}
