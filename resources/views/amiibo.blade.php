<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amiibo</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <h1>Hola desde Amiibo view</h1>

    <div class="d-flex flex-wrap">
        @foreach($amiibos as $amiibo)
        <div class="card text-bg-dark m-1" style="width: 300px">
            <img style="width: 180px;" src="{{$amiibo['image']}}" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title">{{$amiibo['name']}}</h5>
                <p class="card-text">{{$amiibo['amiiboSeries']}}</p>
                <p class="card-text"><small>Last updated 3 mins ago</small></p>
            </div>
        </div>
        @endforeach
    </div>





    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>