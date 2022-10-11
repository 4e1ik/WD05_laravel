<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConvertController extends Controller
{
    protected $howMany;
    protected $from;
    protected $to;

    public function __construct($howMany, $from, $to)
    {
        $this->howMany = $howMany;
        $this->from = $from;
        $this->to = $to;
    }

    public function convert(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://www.nbrb.by/api/exrates/rates?periodicity=0');
        $response2 = $client->request('GET', 'https://www.nbrb.by/api/exrates/rates?periodicity=0');
        $dataConvertible = json_decode($response->getBody()->getContents(), true);
        $dataConvert = json_decode($response2->getBody()->getContents(), true);


//        dd($dataConvert);
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

    public function convertCommand(){
        $curr = new GetApiNBRBController();

        $dataConvertible = json_decode($curr->getCurr()->getBody()->getContents(), true);
        $dataConvert = json_decode($curr->getCurr()->getBody()->getContents(), true);

        $convertible = $this->howMany;

        foreach ($dataConvertible as $arr){
            if ($arr['Cur_Abbreviation'] == $this->from){
                $curOffRateConvertible = $arr['Cur_OfficialRate'];
            }
        }

        foreach ($dataConvert as $arr){
            if ($arr['Cur_Abbreviation'] == $this->to){
                $curScaleConvert = $arr['Cur_Scale'];
                $curOffRateConvert = $arr['Cur_OfficialRate'];
            }
        }

        $result = round((($curScaleConvert * $curOffRateConvertible*$convertible)/$curOffRateConvert), 3);

        return $result;
    }
}
