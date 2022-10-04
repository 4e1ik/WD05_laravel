<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{--app/Http/Controllers/ConvertController.php--}}
<form action="" method="get">
    @csrf

    <select name="convertibleSelect">
        <option disabled>Выберите валюту</option>
        @foreach($dataConvertible as $value)
            <option value="{{$value['Cur_Scale']}}|{{$value['Cur_OfficialRate']}}">{{$value['Cur_Abbreviation']}} {{$value['Cur_Name']}}</option>
        @endforeach
        <option value="1|1">BYN Белоруский рубль</option>
    </select>

    <div>Колличество</div>

    <input type="text" name="convertible" value="">

    <select style="display: block" name="convertSelect">
        <option disabled>Выберите валюту</option>
        @foreach($dataConvert as $value)
            <option value="{{$value['Cur_Scale']}}|{{$value['Cur_OfficialRate']}}|{{$value['Cur_Name']}}">{{$value['Cur_Abbreviation']}} {{$value['Cur_Name']}}</option>
        @endforeach
        <option value="1|1|Белорусских рублей">BYN Белоруский рубль</option>
    </select>

    <div>Итого: {{$result}} {{$name}}</div>

    <button type="submit">Конвертировать</button>
</form>
</body>
</html>
