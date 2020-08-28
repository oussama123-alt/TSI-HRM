<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
    <script>{{  $users=DB::table('users')->get()}}</script>
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/UserInterface.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div id="viewport">
                <div id="sidebar">
                    <header>
                      <a href="#"> bonjour </a>
                    </header>
                    <ul class="nav">
                      <li>
                        <a href="#">
                          <i class="zmdi zmdi-view-dashboard"></i> Dashboard
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="zmdi zmdi-link"></i> Shortcuts
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="zmdi zmdi-widgets"></i> Overview
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="zmdi zmdi-calendar"></i> Events
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="zmdi zmdi-info-outline"></i> About
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="zmdi zmdi-settings"></i> Services
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="zmdi zmdi-comment-more"></i> Contact
                        </a>
                      </li>
                    </ul>
                  </div>
            @yield('content')
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
</body>
<script>
    

    document.querySelector("#start-time1").addEventListener("change", myFunction);
    document.querySelector("#end-time1").addEventListener("change", myFunction);
    document.querySelector("#start-time2").addEventListener("change", myFunction);
    document.querySelector("#end-time2").addEventListener("change", myFunction);
    function myFunction6(elementid){             // ajouter un participant
             var newdiv = document.createElement('span');
             element =document.getElementById(elementid);
             var select=Array.from(document.getElementsByName("participants"));
             
            
            newdiv.innerHTML = '<select name="participants" class="participants">\
                          @foreach ($users as $user)\
                          <option value="{{$user->name}}">{{$user->name}}</option>\
                          @endforeach\
                        </select> \
                    <button style="float: none;" type="button" onclick="myFunction5(this)" class="close" aria-label="Close">\
                          <span aria-hidden="true">&times;</span>\
                    </button>\
                    <span style="display: inline-block;border-left: 1px solid #ccc;margin: 0 10px;height:20px;" ></span>';
                 
        element.appendChild(newdiv);
}


 
  </script>
</html>
