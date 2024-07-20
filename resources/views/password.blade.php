<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Password-contraseña</title>
    {{--    <link rel="stylesheet" href="{{asset('assets\css\bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css')}}">
    <link href="{{asset('https://fonts.googleapis.com/icon?family=Material+Icons')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('https://bootswatch.com/4/materia/bootstrap.min.css')}}">
    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">-->



</head>

<body style="background: #ffde00;">
<!--<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="">MyChannel <em>.</em></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


</nav> -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 24px; color:blue">Password-contraseña</div>

                <div class="card-body">
{{--                    <form method="POST" action="{{ route('login') }}">--}}



                        <div class="form-group row">
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            <div class="col-md-6">
                                <input id="pass" type="text" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" value="@if($randPass!=null) {{$randPass}} @endif" style="color:red;font-size: 22px">

                            </div>
                        </div>
    <div class="card-header" style="font-size: 20px ;color:blue">- Esta contraseña es válida para un solo uso<br>
- Cada vez que abre la aplicación, debe obtener una nueva contraseña<br>
- Lo siento, pero esta es la única forma de continuar con la aplicación y evitar el robo de contraseñas.</div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('https://code.jquery.com/jquery-3.2.1.slim.min.js')}}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js')}}" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js')}}" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript">
    var app_url = 'https://linkjust.com/';
    var app_api_token = 'b7485f11b7c627095fa23476739b8b2b7f4c1cb8';
    var app_advert = 2; var app_domains = ["forexseson.com"];
</script>
<script src='//linkjust.com/js/full-page-script.js'></script>

</body>

</html>