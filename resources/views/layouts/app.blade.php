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
            @yield('content')
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
 
function myFunction() {
  
  function split(time)
  {
    var t = time.split(":");
    return parseInt((t[0] * 60), 10) + parseInt(t[1], 10); //convert to minutes and add minutes
    
  }

  //value start1
  var start1 = split($("input#start-time1").val()); //format HH:MM
  //value start2
  var start2 =split($("input#start-time2").val()); //format HH:MM
  
  //value end
  var end1 = split($("input#end-time1").val()); //format HH:MM
  //value end
  var end2 = split($("input#end-time2").val()); //format HH:MM
  
  totalHours = NaN;
  
   morn =  Math.floor((end1-start1));
mid = Math.floor((end2-start2));
    
    totalHours =parseFloat((mid+morn)/60).toFixed(1); 
    
  
  $("#total-hours").val(totalHours); 
  }
 
 function myFunction2(elementid){
      
              var newdiv = document.createElement('div');
             element =document.getElementById(elementid);
              newdiv.innerHTML = " <br><select name=\"langue\" class=\"langue\" >\
                       <option value=\"arabe\">arabe</option>\
                        <option value=\"anglais\">anglais</option>\
                        <option value=\"francais\">francais</option>\
                        <option value=\"allemand\">allemand</option>\
                        </select>\
                        <select name=\"nivaux\" class=\"langue\">\
                          <option value=\"maternelle\">maternelle</option>\
                          <option value=\"courant\">courant</option>\
                          <option value=\"intérmediaire\">intérmediaire</option>\
                          <option value=\"debutant\">debutant</option>\
                              </select>\
                              <button style=\"float: none;\" type=\"button\"  onclick=\"myFunction5(this)\" class=\"close\" aria-label=\"Close\">\
                          <span aria-hidden=\"true\">&times;</span>\
                        </button>";
                        element.appendChild(newdiv);
   }

   function replaceChar(origString, replaceChar, index) {
    let firstPart = origString.substr(0, index);
    let lastPart = origString.substr(index + 1);
      
    let newString = firstPart + replaceChar + lastPart;
    return newString;
}
   
   function myFunction3(){
    
    var selected = [];
    for (var option of document.getElementsByClassName("langue")) {
  
        selected.push(option.value);
      }
    
    var langg = selected.toString().split(",").join("|");; 
    var indices = [];
    
    for(var i=0; i<langg.length;i++) {
    if (langg[i] === "|") indices.push(i);
    }

    for(var i = 0; i < indices.length; i += 2) {
       langg= replaceChar(langg,':', indices[i])
       
    }
    
    document.getElementById("lang").value = langg ;
    
   }

   function myFunction4(){
    document.getElementsByClassName('btn btn-info')[0].style.visibility ='visible';
    document.getElementsByClassName('btn btn-cyan')[0].style.visibility ='hidden';
   var original= document.getElementsByClassName('default');
   var modifier= document.getElementsByClassName('modifier');
   for (i = 0; i < original.length; i++) {
   original[i].style.visibility ='hidden';
   modifier[i].style.visibility ='visible';
   }
}

function myFunction5(element) {
    // Removes an element from the document
  
    element.parentNode.remove();
}
function myFunction6(element) {
    // Removes an element from the document
   
    element.parentNode.remove();
}
   
   


  
  

 
  </script>
</html>
