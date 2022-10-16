<?php


namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Helpers\GetApiClass;
use App\Models\API;

class SaveToTableClass extends GetApiClass
{

    public function save(){

        try {
            if(GetApiClass::getApi() == 0){
                throw new \Exception();
            }
            foreach (GetApiClass::getApi() as $client) {

                API::query()->create(
                    [
                        'Cur_Abbreviation' => $client['Cur_Abbreviation'],
                        'Cur_Scale' => $client['Cur_Scale'],
                        'Cur_Name' => $client['Cur_Name'],
                        'Cur_OfficialRate' => $client['Cur_OfficialRate'] * 10000,
                    ]
                );
            }
        } catch (\Exception $exception){
            return 0;
        }
    }
}
