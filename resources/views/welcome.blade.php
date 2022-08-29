<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body style="background-color: rgb(234, 234, 234)">

    <nav class="navbar navbar-expand-lg   sticky-top navbar-light bg-light">

        <img src="{{ asset('images/icon.png') }}" width="40" height="40" class="d-inline-block align-top" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('buz_buz.index')}}">Buzon</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route('buz_prefe.index')}}">Preferencias</a>

                   
                        @if (Route::has('login'))
                        <div class="top-right links">

                            @auth
                            @can('campuses.index')
                            <a href="{{ url('/home') }}">Administracion</a>
                            @endcan
                            <a href="#" class="btn btn-default btn-flat float-center"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                            @else
                            <a href="{{ route('login') }}">Iniciar sesion</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                            @endif
                            @endauth
                        </div>
                        @endif
          
                </li>
            </ul>

        </div>
    </nav>
    <br> <br>


    <div class="content" style="background-color: rgb(234, 234, 234)">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/belisario22.png') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/matrizespe.png')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/matriz2.jpg')}}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>





    </div>
    </div>
    <br><br>
    <div class="container">

      


            <div class="col-sm card">
            <h1 class=" display-3 font-weight-bold border text-center">Menus</h1>

                @foreach($menus as $menu)
                @if($menu->bar->nombre == "Bar 1" and $menu->disponible == "1" )
                <div class="card" style="width: 22rem;">
                    <img src="{{Storage::disk('s3')->url($menu->url)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Bar:{{$menu->bar->campus->nombre}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Menu: {{$menu->nombre}}</h6>

                        <p class="card-text">Precio:{{$menu->precio}}$</p>
                        <a href="{{ route('menus.show',$menu->id) }}" class="btn btn-primary">Mas detalles</a>
                    </div>
                </div>
                @endif
                @endforeach
                <div class="d-flex justify-content-center">
                    {!! $menus->links() !!}
                </div>


            </div>



    


        <div class="col-sm card">


            <?php $count = 0; ?>
            <h1 class=" display-3 font-weight-bold border text-center">Snacks</h1>

            @foreach($snacks as $snack)
            @if($count< 4 and $snack->disponible == "1")
                <div class="card" style="width: 18rem;">
                <img src="{{$snack->url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Bar:{{$snack->bar->campus->nombre}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Menu: {{$snack->nombre}}</h6>

                        <p class="card-text">Precio:{{$snack->precio}}$</p>
                        <a href="{{ route('menus.show',$menu->id) }}" class="btn btn-primary">Mas detalles</a>
                    </div>
                </div>

                @endif
                <?php $count++; ?>
                @endforeach



        </div>
    </div>
    </div>

    </div>

    </div>

    <br><br>

    <!-- imagen -->
    <div><img src="{{ asset('images/barra2.png')}}" class="img-fluid" width="100%" alt="vcvbcbv"></div>
    <br>

    <div style="background-color: white,justify-contentcenter ">
        <!-- Topic Cards -->


        <div class="container">
            <div class="row">
                <div class="card-wrapper col-lg-4 col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-img-wrapper">
                            <img class="card-img-top" src="{{ asset('images/snack22.jpg')}}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="card-wrapper col-lg-4 col-md-6 col-xs-12">
                    <div class="card">
                        <div style="text-align:center;padding:1em 0;">
                            <h2><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/city/3654870"><span style="color:gray;">Hora actual en</span><br />Latacunga, Ecuador</a></h2> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=large&timezone=America%2FGuayaquil" width="100%" height="140" frameborder="0" seamless></iframe>
                        </div>

                    </div>
                </div>
                <div class="card-wrapper col-lg-4 col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-img-wrapper">
                            <img class="card-img-top" src="{{ asset('images/icon.png') }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content.</p>
                            <!-- Button trigger modal -->
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                                            Ver mas..
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Snacks</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col card">
                                                <!-- Card -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>





    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
<style>
    /*----  Main Style  ----*/
    .card-wrapper {
        margin-bottom: 30px;
    }

    .card-image .card .card-img-wrapper {
        height: 100%;
    }

    .card-image .card .card-body {
        display: none;
    }

    .card-image-title-description .card .card-img-wrapper {
        max-height: 160px;
    }

    .card-image-title-description .card {
        position: relative;
        min-height: 300px;
    }

    .card-image-title-description .card .card-body {
        height: auto;
        position: relative;
        top: 0;
        margin-bottom: -70px;
    }

    .card-image-title-description .card:hover .card-body {
        top: -70px;
    }

    .card-image-title-description .card .card-body .card-title {
        margin-bottom: .75rem;
    }

    .card {
        display: inline-block;
        position: relative;
        overflow: hidden;
        min-height: 400px;
        height: 100%;
    }

    .card:hover {
        box-shadow: 8px 12px 31px -10px #ab98ab;
    }

    .card-img-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50%;
        overflow: hidden;
    }

    .card-img-wrapper img {
        transition: 1.5s ease;
    }

    .card:hover .card-img-wrapper img {
        transform: scale(1.15);
    }

    .card-body .card-title {
        margin-bottom: calc(50% + 20px);
        transition: 1.5s ease;
    }

    .card:hover .card-body .card-title {
        margin-bottom: .75rem;
    }

    .card-body {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 50%;
        background-color: #fff;
        transition: 1.5s ease;
    }

    .card-content {
        left: 0;
        right: 0;
        overflow: hidden;
        width: 100%;
        height: auto;
        transition: 1.5s ease;
    }

    .card:hover .card-body {
        height: 80%;
    }

    .card:hover .card-content {
        bottom: 0;
    }

    body {
        margin: 0;
        background-image: linear-gradient(to right, #ECE9E6, #FFFFFF);

    }
</style>