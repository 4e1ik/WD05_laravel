<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>>
    <title>Document</title>
</head>
<script>S
    function test(){
        axios.get('/api/categories').then((res) => {
            let categories = res.data;
            console.log(categories.data);
        });

    }
</script>

<body>
    <button onclick="test()">zzz</button>
</body>
</html>
