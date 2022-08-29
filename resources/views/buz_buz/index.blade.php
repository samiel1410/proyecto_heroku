<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body background="{{ asset('images/fondo2.jpg')}}" style="width:100%;height:100vh;background-size:cover;background-position:center;">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <div class="container">

        <section class="content container-fluid">
        <div class="card-body">
                        <form method="POST" action="{{ route('buz_buz.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('buz_buz.form')

                        </form>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="{{ mix('js/app.js') }}" defer></script>