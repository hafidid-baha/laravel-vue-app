<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env("APP_NAME", "Hafid-id-baha")}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        
    </head>
    <body>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Annie+Use+Your+Telescope&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Changa:wght@200&display=swap');

body{
  /* background: #FBFBFB; */
  background: white;
  min-height:100vh ;
}
/* width */
::-webkit-scrollbar {
  width: 2px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}


.btn-login{
    border-radius: 20px;
    border: none;
    outline: none;
    box-shadow: 0px 0px 6px rgba(238, 157, 36, 1);
    text-align: center;
    font-family: 'Changa', sans-serif;
    background: #EE9D24;
    color: white;
}


/** animation and routes transitions start */
.route-enter-active, .route-leave-active {
  transition: all .2s;

}
.route-enter, .route-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: translateX(-30%);
}

/** animation and routes transitions ends */

/** animations and transitions */
.scale-enter-active, .scale-leave-active {
  transition: all ease-in-out .2s;
  transition-delay: 0.2s;
  transform: scale(1);
  transform-origin: center bottom;
}
.scale-enter, .scale-leave-to /* .fade-leave-active below version 2.1.8 */ {
  transform: scale(0);
  opacity: 0;
}

/** animations and transitions */



        </style>
        <div id="app">
            <!-- <div id="nav">
                <router-link to="/">Home</router-link> |
                <router-link to="/about">About</router-link>
            </div> -->
            <transition name="route" mode="out-in">
                <router-view/>
            </transition>
        </div>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> --}}

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
