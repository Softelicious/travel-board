<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3451ecd6e5.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Svajonių atostogos') }}
                </a>
            </div>
        </nav>
    </div>
    @yield('content')
    <div class="n-navbar dropup">
        <div>
            <div class="dropdown-toggle bars fas fa-bars" id="dropdownMenuButton" data-toggle="dropdown" ></div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <div class="logout-btn"
                             onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </div>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>

        <div class="add-item">
            <div class="add-icon fas fa-pen"></div>
            <div class="add-title" data-toggle="modal" data-target="#exampleModal">Pridėti</div>
            <div class="empty"></div>
        </div>
        <div>
            <div class="dropdown-toggle bars fas fa-bars dots fas fa-ellipsis-v" id="dots" data-toggle="dropdown" ></div>
            <div class="dropdown-menu" aria-labelledby="dots">
                <div class="dots-text">
                    {{"gražių švenčių"}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Naujas įrašas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="create-item" action="{{ url('save') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="upload">
                        @csrf
                        <div>
                            <input class="tagss" type="text" name="tags" placeholder="Įveskite žymes atskirdami kableliu">
                        </div>
                        <div class="foto-container">
                            <div class="foto-preview">
                                <img id="blah" src="https://www.utrgv.edu/_files/images/general-placeholder-image.jpg" alt="nuotrauka nepasirinkta" height="300px" width="300px" />
                            </div>
                            <label for="image" class="btn btn-primary col-md-5 position-absolute fixed-top mt-2 ml-2">Pasirink</label>
                            <input class="d-none" type='file' id="image" value="pasirink" name="image" onchange="readURL(this);" accept=".png, .jpg, .jpeg" />
                        </div>
                        <div class="info-container">
                            <input  class="info-name" type="text" name="name" placeholder="keliones pavadinimas">
                            <textarea class="info-description" name="description" placeholder="keliones aprasymas" id="description" ></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Uždaryti</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('upload').submit();">Įkelti</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
