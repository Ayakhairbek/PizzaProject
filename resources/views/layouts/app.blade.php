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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    
</head>
<body > 

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container"> 
                <a class="navbar-brand" href="{{ url('/allpizza') }}">HOME </a>
                {{-- <a class="navbar-brand" href="{{ url('/allpizza') }}">allPizza </a>  --}}
                @if (Auth::user()!=null)
                {{-- <a class="navbar-brand" href="{{route('orders.create')}}">ADD Order</a> --}}
                {{-- <a class="navbar-brand" href="/myorder">MY Order</a> --}}
                @endif
                <a class="navbar-brand" href="{{ url('/about') }}">ABOUT
                </a>
                @if (Auth::user()!=null)
                <a class="navbar-brand" href="{{ url('/myinformation') }}">Profil
                </a> 
                <a class="navbar-brand" href="{{ url('/showupdateinfo') }}">UPDATE INFO
                </a>
                <a class="navbar-brand" href="{{ url('/contactus') }}">Contacts </a> 
                @endif 
                @if (Auth::user()!=null)
                   
                    {{-- <a class="navbar-brand" href="{{ url('/allusers') }}">AllUser$Orders</a>  --}}
                    <a class="navbar-brand" href="{{ url('/all') }}">DashBord</a>
                        {{-- @lang('admin.allusers') </a> --}}
                        
                          
                @endif 
                {{-- @if (Auth::user()!=null)
                <a class="navbar-brand" href="{{route('products.create')}}">ADD PRODUCT</a>
                <a class="navbar-brand" href="/myproduct">MY PRODUCT</a>
                @endif --}}
                {{-- <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      select lang
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('lang','en')}}">en</a>
                      <a class="dropdown-item" href="{{route('lang','ar')}}">ar</a>
                      
                    </div>
                  </div> --}}
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
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            <div class="well">
                @include('inc.messages')
                @yield('content')
                </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>
    
    </body>
    </html>
