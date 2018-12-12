<nav class="navbar navbar-expand-lg px-md-5 p-1" id="navbar">
    <a href="{{route('welcome')}}" class="navbar-brand text-blue" ><img src="{{asset('img/icon.png')}}" id="icon" alt="yoru"> <span class="d-none d-md-inline">YoruTracer</span></a>

    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('distributor.home')}}">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mes produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('distributor.profile')}}">Mon profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-orange" href="#" onclick="$('#disconnect-form').submit()">Déconnexion</a>
            </li>
        </ul>
    </div>

    <form action="{{route('distributor.disconnection')}}" method="post" class="d-none" id="disconnect-form">
        {{csrf_field()}}
        <input type="hidden" value="{{auth()->id()}}" name="id">
    </form>

</nav>
