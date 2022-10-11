<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{

    public function convAbb(){
        $curr = new GetApiNBRBController();

        $helpData = json_decode($curr->getCurr()->getBody()->getContents(), true);

        $dataAbbConvertible = [];
        for($i = 0; $i < count($helpData); $i++){
            $dataAbbConvertible[$helpData[$i]['Cur_Abbreviation']] = $helpData[$i]['Cur_Name'];
        }
        return $dataAbbConvertible;
    }
}
