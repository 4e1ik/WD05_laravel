<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConvertController extends Controller
{
    public function convert(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://www.nbrb.by/api/exrates/rates?periodicity=0');
        $response2 = $client->request('GET', 'https://www.nbrb.by/api/exrates/rates?periodicity=0');
        $dataConvertible = json_decode($response->getBody()->getContents(), true);
        $dataConvert = json_decode($response2->getBody()->getContents(), true);

        $convertible = $request->get('convertible');

        $valFromSelConvertible = $request->get('convertibleSelect');
        $valFromSelConvert = $request->get('convertSelect');

        $parseConvertible = explode('|', $valFromSelConvertible);
        $parseConvert = explode('|', $valFromSelConvert);

        $curScaleConvertible = (int) $parseConvertible[0];
        $curScaleConvert = (int) $parseConvert[0];

        $curOffRateConvertible = (float) $parseConvertible[1];
        $curOffRateConvert = (float) $parseConvert[1];
        $name = $parseConvert[2];
        $result = round((($curScaleConvert * $curOffRateConvertible*$convertible)/$curOffRateConvert), 3);

        return view('convert', compact('dataConvertible', 'dataConvert', 'result', 'name'));
    }
}
