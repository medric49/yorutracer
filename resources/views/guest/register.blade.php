@extends('layouts.guest.base')
@section('style')
    <style>
        .left-card {
            width: 20rem;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.49);
            border : none;
        }

        .right-card {
            width: 20rem;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.49);
            border : none;
        }

        .left-card .card-img-top,.right-card .card-img-top {
            height: 12rem;
        }
        .left-card .card-body,.right-card .card-body {
            height: 12rem;
        }


    </style>
@endsection

@section('content')
    <header class="container-fluid">
        <div class="row text-center align-items-center h-100">
            <div class="col-12">
                Inscription
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-auto mr-md-5 mb-3 mb-md-0">
                <div class="card left-card">
                    <img src="{{asset('img/production.jpg')}}" alt="" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">
                            J'aimerais m'inscrire sur <span class="text-primary">YoruTracer</span> en tant que <span class="text-orange">Producteur</span> afin d'inserer mes produits agroalimentaires dans le réseau
                        </p>
                        <div>
                            <a href="{{route('guest.register.productor')}}" class="card-link">S'inscrire</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-auto mb-3 mb-md-0">
                <div class="card right-card">
                    <img src="{{asset('img/distribution.jpg')}}" alt="" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">
                            Je suis un <span class="text-orange">Distributeur</span> de produit agroalimentaire et j'aimerais m'inscrire sur <span class="text-primary">YoruTracer</span> pour exposer mes produits et afin que les clients puis voir leurs origines
                        </p>
                        <div>
                            <a href="{{route('guest.register.distributor')}}" class="card-link">S'inscrire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection