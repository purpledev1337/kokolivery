<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <title>test</title>
</head>
<body>

    <div class="container" >
        
        <a class="btn btn-primary my-2" href="{{ route('register') }}">REGISTER</a>
    
        <a class="btn btn-primary my-2" href="">LOGIN</a>
    </div>


    <div id="cont">
        <div id="cont-logo">
            <div id="cont-img">
                <img id="float-img" src="storage/asset/kokolivery-logo.svg" alt="">
            </div>
            <h1 id="float-title">
                Kokolivery
            </h1> 
        </div>
        <div>
            <input type="text" placeholder="Inserisci La Via, La Citta' E La Provincia">
            <button class="btn btn-primary" >SEARCH</button>
        </div>
        
        <a href="{{ route('restaurant_list') }}">Link alla restaurant_list</a>
    </div> 


</body>
</html>