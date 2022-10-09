<?php

namespace App\Http\Controllers;

use App\Mail\UniMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class UniController extends Controller
{

    public function uni(Request $request){

        $dataMonth = [
            '01' => 'Январь',
            '02' => 'Феварль',
            '03' => 'Март',
            '04' => 'Апрель',
            '05' => 'Май',
            '06' => 'Июнь',
            '07' => 'Июль',
            '08' => 'Август',
            '09' => 'Сентябрь',
            '10' => 'Октябрь',
            '11' => 'Ноябрь',
            '12' => 'Декабрь',
        ];

        $dataDays = [];
        for ($i = 1; $i < 32; $i++){
            if($i < 10){
                $dataDays["0$i"] = '0'.$i;
            } else {
                $dataDays[$i] = $i;
            }
        }

        $dataYears = [];
        for ($i = 1960; $i<=2022; $i++){
            $dataYears[$i] = $i;
        }

        $year = $request->get('year', date('Y'));
        $month = $request->get('month', date('m'));
        $day = $request->get('day', date('d'));
        $res = $year.'-'.$month.'-'.$day;

        $dataDaysHoro = [
            'today' => 'Сегодня',
            'tomorrow' => 'Завтра',
            'yesterday' => 'Вчера',
        ];

        $dayHoro = $request->get('dayOfHoroscope', 'today');

        if($res >= "$year-08-24" && $res<= "$year-09-23"){
            $strHoro = "По знако гороскопа вы - Дева";
            $sign = 'virgo';
        } else if($res >= "$year-09-24" && $res<= "$year-10-23"){
            $strHoro = "По знако гороскопа вы - Весы";
            $sign = 'libra';
        } else if($res >= "$year-10-24" && $res<= "$year-11-22"){
            $strHoro = "По знако гороскопа вы - Скорпион";
            $sign = 'scorpio';
        } else if($res >= "$year-11-23" && $res<= "$year-12-21"){
            $strHoro = "По знако гороскопа вы - Стрелец";
            $sign = 'sagittarius';
        } else if($res >= "$year-12-22" && $res<= "$year-01-20"){
            $strHoro = "По знако гороскопа вы - Козерог";
            $sign = 'capricorn';
        } else if($res >= "$year-01-21" && $res<= "$year-02-19"){
            $strHoro = "По знако гороскопа вы - Водолей";
            $sign = 'aquarius';
        } else if($res >= "$year-02-20" && $res<= "$year-03-20"){
            $strHoro = "По знако гороскопа вы - Рыбы";
            $sign = 'pisces';
        } else if($res >= "$year-03-21" && $res<= "$year-04-20"){
            $strHoro = "По знако гороскопа вы - Овен";
            $sign = 'aries';
        } else if($res >= "$year-04-21" && $res<= "$year-05-20"){
            $strHoro = "По знако гороскопа вы - Телец";
            $sign = 'taurus';
        } else if($res >= "$year-05-21" && $res<= "$year-06-21"){
            $strHoro = "По знако гороскопа вы - Близнецы";
            $sign = 'gemini';
        } else if($res >= "$year-06-22" && $res<= "$year-07-22"){
            $strHoro = "По знако гороскопа вы - Рак";
            $sign = 'cancer';
        } else if($res >= "$year-07-23" && $res<= "$year-08-23"){
            $strHoro = "По знако гороскопа вы - Лев";
            $sign = 'leo';
        }

        $planetWidth = $request->get('planetWidth', 300);
        $planetHeight = $request->get('planetHeight', 300);
        $planetSize = $request->get('planetSize', 200);

        $dataBack = [
            'true' => 'Убрать фон',
            'false' => 'Оставить фон',
        ];
        $back = $request->get('back', 'true');

        $dataStars = [
            'true' => 'Убрать звезды',
            'false' => 'Оставить звезды',
        ];
        $stars = $request->get('stars', 'true');

        $dataSat = [
            'true' => 'Убрать спутники',
            'false' => 'Оставить спутники',
        ];
        $sat = $request->get('Sat', 'true');

        $dataColMode = [
            '0' => 'Аналогичный',
            '1' => 'Дополнительный',
            '2' => 'Раздельное дополнение',
            '3' => 'Тройной',
            '4' => 'Полость',
            '5' => 'Земля',
            '6' => 'Элементный',
        ];
        $colMode = $request->get('colMode');

        $dataSubColMode = [
            '0' => 'Огонь',
            '1' => 'Вода',
            '2' => 'Земля',
            '3' => 'Ветер',
            '4' => 'Светлый',
            '5' => 'Темный',
            '6' => 'Лед',
            '7' => 'Металл',
            '8' => 'Лава',
            '9' => 'Яд',
        ];
        $subColMode = $request->get('subColMode');

        $generatePlanet = "https://app.pixelencounter.com/api/basic/planets?width=$planetWidth&height=$planetHeight&size=$planetSize&disableBackground=$back
        &disableStars=$stars&disableSatellites=$sat&colorMode=$colMode&subColorMode=$subColMode";

        $city = $request->get('city', 'Minsk');
        $wheatherQuery = [
            'key' => '2e6996febba6405bac7163309220710',
            'q' => $city,
        ];

        $clientHoro = Http::post("https://aztro.sameerkumar.website?sign=$sign&day=$dayHoro")->json();
        $resHoro = "Ваш гороскоп на $dayHoro - ".$clientHoro['description'];

        $clientWheather = Http::baseUrl('http://api.weatherapi.com/v1');
        $responeWheather = $clientWheather->get('/current.json', $wheatherQuery)->json();
        $result = $responeWheather['current']['temp_c'].'C'.' '.$responeWheather['location']['name'].' '.$responeWheather['location']['localtime'];

        $dataMail = [
            'yes' => 'Да',
            'no' => 'Нет',
        ];

        $responeFriendMail = $request->get('friendMail', 'yanayazuchno@gmail.com');
        $responeMail = $request->get('responseMail', 'yes');
        if($responeMail == 'yes' && filter_var($responeFriendMail, FILTER_VALIDATE_EMAIL)){
            $mail = new UniMail($resHoro, $responeFriendMail);
            Mail::send($mail);
        }

        return view('uni', compact( 'result', 'dataBack', 'dataSat', 'dataStars', 'dataColMode', 'dataSubColMode', 'generatePlanet', 'dataYears',
        'dataDays', 'dataMonth', 'dataDaysHoro', 'resHoro', 'dayHoro', 'res', 'sign', 'strHoro', 'dataMail'));
    }
}
