<?php


namespace App\Services;


use App\Interfaces\CurServiceInterface;

class AnotherCurSrevice implements CurServiceInterface
{
    public function getRate()
    {
        dd('AnotherCurService');
    }
}
