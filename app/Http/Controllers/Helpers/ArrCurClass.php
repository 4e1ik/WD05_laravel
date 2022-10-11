<?php


namespace App\Http\Controllers\Helpers;


class ArrCurClass
{
    use GetApiTrait;
    public function convAbb(){

        $helpData = json_decode($this->getCurr()->getBody()->getContents(), true);

        $dataAbbConvertible = [];
        for($i = 0; $i < count($helpData); $i++){
            $dataAbbConvertible[$helpData[$i]['Cur_Abbreviation']] = $helpData[$i]['Cur_Name'];
        }
        return $dataAbbConvertible;
    }
}
