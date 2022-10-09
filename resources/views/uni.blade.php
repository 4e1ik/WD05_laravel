<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/uni_assets/uni.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
{{--<div>Выберите дату вашего рождения и день, чтобы получить гороскоп</div>--}}
{{--<form action="" method="get">--}}
{{--    @csrf--}}
{{--    <select name="year" id="" >--}}
{{--        @foreach($dataYears as $key => $year)--}}
{{--            <option value="{{$key}}">{{$year}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    <select name="month" id="">--}}
{{--        @foreach($dataMonth as $key => $month)--}}
{{--            <option value="{{$key}}">{{$month}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    <select name="day" id="">--}}
{{--        @foreach($dataDays as $key => $day)--}}
{{--            <option value="{{$key}}">{{$day}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    <select name="dayOfHoroscope" id="">--}}
{{--        @foreach($dataDaysHoro as $key => $day)--}}
{{--            <option value="{{$key}}">{{$day}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    <button type="submit">Получить гороскоп</button>--}}
{{--</form>--}}
{{--<div style="padding-top:20px;">Введите ваш город и получите прогноз погоды</div>--}}
{{--<form action="" method="get">--}}
{{--    @csrf--}}
{{--    <input type="text" name="city" value="" placeholder="Ваш город на английском">--}}
{{--    <button type="submit">Получить погоду</button>--}}
{{--</form>--}}

{{--<div style="padding-top:20px;">Сгенерируйте свою собственную планету</div>--}}
{{--<form action="" method="get">--}}
{{--    <input type="text" name="planetWidth" placeholder="Введите ширину картинки">--}}
{{--    <input type="text" name="planetHeight" placeholder="Введите высоту картинки">--}}

{{--    <div>Введите размер вашей планеты (он не должен превышать размер картинки)</div>--}}
{{--    <input type="text" name="planetSize" placeholder="Введите размер планеты">--}}

{{--    <div>Фон</div>--}}
{{--    <select style="display: block;" name="back" id="">--}}
{{--        @foreach($dataBack as $key => $val)--}}
{{--            <option value="{{$key}}">{{$val}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}

{{--    <div>Звезды</div>--}}
{{--    <select style="display: block;" name="stars" id="">--}}
{{--        @foreach($dataStars as $key => $val)--}}
{{--            <option value="{{$key}}">{{$val}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}

{{--    <div>Спутники</div>--}}
{{--    <select style="display: block;" name="Sat" id="">--}}
{{--        @foreach($dataSat as $key => $val)--}}
{{--            <option value="{{$key}}">{{$val}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}

{{--    <div>Введите значение рамки</div>--}}
{{--    <input type="text" name="planetFrame" id="inp" class="inputt" value="" placeholder="Введите значение рамки">--}}
{{--    <div class="slidecontainer">--}}
{{--        <input type="range" min="0" max="2147483647" name="planetFrame" value="{{2147483647/2}}" class="slider" id="myRange">--}}
{{--        <p>Value: <span id="demo"></span></p>--}}
{{--    </div>--}}

{{--    <div>Цвета</div>--}}
{{--    <select style="display: block;" name="colMode" id="">--}}
{{--        @foreach($dataColMode as $key => $val)--}}
{{--            <option value="{{$key}}">{{$val}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}

{{--    <div>Дополнительные цвета цвета</div>--}}
{{--    <select style="display: block;" name="subColMode" id="">--}}
{{--        @foreach($dataSubColMode as $key => $val)--}}
{{--            <option value="{{$key}}">{{$val}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}

{{--    <script>--}}
{{--        let slider = document.getElementById("myRange");--}}
{{--        let output = document.getElementById("demo");--}}
{{--        output.innerHTML = slider.value;--}}

{{--        slider.oninput = function() {--}}
{{--            output.innerHTML = this.value;--}}
{{--        }--}}

{{--    </script>--}}

{{--    <button>Сгенерировать</button>--}}
{{--</form>--}}


<div>Выберите дату вашего рождения и день, чтобы получить гороскоп</div>
<form action="" method="get">
    @csrf
    <select name="year" id="" >
        @foreach($dataYears as $key => $year)
            <option value="{{$key}}">{{$year}}</option>
        @endforeach
    </select>
    <select name="month" id="">
        @foreach($dataMonth as $key => $month)
            <option value="{{$key}}">{{$month}}</option>
        @endforeach
    </select>
    <select name="day" id="">
        @foreach($dataDays as $key => $day)
            <option value="{{$key}}">{{$day}}</option>
        @endforeach
    </select>
    <select name="dayOfHoroscope" id="">
        @foreach($dataDaysHoro as $key => $day)
            <option value="{{$key}}">{{$day}}</option>
        @endforeach
    </select>
{{--    <button type="submit">Получить гороскоп</button>--}}

<div style="padding-top:20px;">Введите ваш город и получите прогноз погоды</div>
    <input type="text" name="city" value="" placeholder="Ваш город на английском">
{{--    <button type="submit">Получить погоду</button>--}}


<div style="padding-top:20px;">Сгенерируйте свою собственную планету</div>

    <input type="text" name="planetWidth" placeholder="Введите ширину картинки">
    <input type="text" name="planetHeight" placeholder="Введите высоту картинки">

    <div>Введите размер вашей планеты (он не должен превышать размер картинки)</div>
    <input type="text" name="planetSize" placeholder="Введите размер планеты">

    <div>Фон</div>
    <select style="display: block;" name="back" id="">
        @foreach($dataBack as $key => $val)
            <option value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>

    <div>Звезды</div>
    <select style="display: block;" name="stars" id="">
        @foreach($dataStars as $key => $val)
            <option value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>

    <div>Спутники</div>
    <select style="display: block;" name="Sat" id="">
        @foreach($dataSat as $key => $val)
            <option value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>

    <div>Цвета</div>
    <select style="display: block;" name="colMode" id="">
        @foreach($dataColMode as $key => $val)
            <option value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>

    <div>Дополнительные цвета цвета</div>
    <select style="display: block;" name="subColMode" id="">
        @foreach($dataSubColMode as $key => $val)
            <option value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>

    <div>Хотите отправить результат гороскопа другу?</div>
    <select style="display: block;" name="responseMail" id="">
        @foreach($dataMail as $key => $val)
            <option value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>
    <div>Введите почту вашего друга</div>
    <input type="text" name="friendMail" value="" placeholder="mail@example.com">

    <button style="display: block;">Получить ответ</button>
</form>


<div style="padding-top:20px;">Ваш гороскоп:</div>
<div>{{$strHoro}}</div>
<div>{{$resHoro}}</div>
<div style="padding-top:20px;">Прогноз погоды на сегодня:</div>
<div>{{$result}}</div>
<div style="padding-top:20px;">Ваша планета</div>
<div>
    <img style="display: block;" src="{{$generatePlanet}}" alt="">
</div>
</body>
</html>
