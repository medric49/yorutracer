<nav class="navbar px-md-5 p-1" id="navbar">
    <a href="{{route('welcome')}}" class="navbar-brand text-blue" ><img src="{{asset('img/icon.png')}}" id="icon" alt="yoru"> <span class="d-none d-md-inline">YoruTracer</span></a>
    <ul class="nav justify-content-end">
        @if(Route::currentRouteName() != 'guest.register' )
            <li class="nav-item mx-2"><a href="{{route('guest.register')}}" class="btn btn-blue"> <span class="d-none d-md-inline">Je suis un Producteur / Distributeur</span><span class="d-md-none">Inscription</span> </a></li>
        @endif
        @if(Route::currentRouteName() != 'guest.login')
            <li class="nav-item"><a href="{{route('guest.login')}}" class="btn btn-outline-blue">Connectez-vous</a></li>
        @endif
    </ul>
</nav>
