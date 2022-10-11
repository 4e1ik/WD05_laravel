<?php


namespace App\Http\Controllers\Helpers;


class ConvertCommandClass
{
    use GetApiTrait;

    protected $howMany;
    protected $from;
    protected $to;

    public function __construct($howMany, $from, $to)
    {
        $this->howMany = $howMany;
        $this->from = $from;
        $this->to = $to;
    }

    public function convertCommand(){
        $dataConvertible = json_decode($this->getCurr()->getBody()->getContents(), true);
        $dataConvert = json_decode($this->getCurr()->getBody()->getContents(), true);

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
