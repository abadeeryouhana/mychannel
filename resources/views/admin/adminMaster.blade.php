<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
{{--    <link rel="stylesheet" href="{{asset('assets\css\bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css')}}">
    <link href="{{asset('https://fonts.googleapis.com/icon?family=Material+Icons')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('https://bootswatch.com/4/materia/bootstrap.min.css')}}">
    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">-->



</head>

<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{route('category.index')}}">MyChannel Dashboard<em>.</em></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <li class="nav-item"><a href="{{route('category.index')}}" class="nav-link" >Category</a></li>
            </li>
            <li class="nav-item"><a href="{{route('subcategory1.index')}}" class="nav-link" >SubCategory1</a></li>
            </li>
            <li class="nav-item"><a href="{{route('subcategory2.index')}}" class="nav-link" >SubCategory2</a></li>
            </li>

            <li class="nav-item"><a href="{{route('channel.index')}}" class="nav-link" >Channels</a></li>
            <li class="nav-item"><a href="{{route('showUsers')}} " class="nav-link">Users</a></li>
            <li class="nav-item"><a href="{{route('info.index')}} " class="nav-link">Infos</a></li>
            <li class="nav-item"><a href="{{route('link.index')}} " class="nav-link">Links</a></li>
              <li class="nav-item"><a href="{{route('ad.index')}} " class="nav-link">Ads</a></li>
            <li class="nav-item"><a href="{{route('fcm.index')}} " class="nav-link">Notification</a></li>
           <li class="nav-item"><a href="{{route('message.index')}} " class="nav-link">Updates Message</a></li>
            <li class="nav-item"><a href="{{route('expirationhours.index')}} " class="nav-link">Expiration Hours</a></li>


        </ul>
        <div class="form-inline my-2 my-lg-0">

            <!-- <span class="nav-item"><a class="nav-link">Search</a></span> -->

            @guest
                <a class="btn btn-primary my-2 my-sm-0 ml-4" href="{{ route('login') }}">{{ __('Login') }}</a>


            @else



                        <a class="btn btn-primary my-2 my-sm-0 ml-4" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>


            @endguest
        </div>
    </div>
</nav>
@yield('admin')



<script src="{{asset('https://code.jquery.com/jquery-3.2.1.slim.min.js')}}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js')}}" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js')}}" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

{{-- Datatable Scripts --}}
<script src="{{asset('https://code.jquery.com/jquery-3.5.1.js')}}" ></script>
<script src="{{asset('https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "pagingType": "full_numbers"
        } );

        $('#channells').DataTable( {
            "order": false
        } );

    } );
    
       ////////// show Input field in FCM //////
    $("#linkrow").hide();
    $("#check").change(function () {
        $("#linkrow").toggle();
    });
</script>
</body>

</html>