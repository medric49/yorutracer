@extends('layouts.guest.base')
@section('style')
    <style>

        @media (min-width: 992px) {
            #main {
                height: 100vh;
            }

            #main .col-md-6 {
                height: 100%;
            }

            #main .right{
                overflow-y: auto;
            }

        }

        #main .left h1 {
            font-size: 3rem;
            font-weight: bolder;
            margin-bottom: 3rem;
        }

        #main .left {
            padding-left: 100px;
            padding-top: 200px;
            background:linear-gradient(rgba(14, 15, 41, 0.81),rgba(14, 15, 41, 0.81)), url("{{asset('img/magasin.jpg')}}");
            background-size: cover;
            color: white;
            box-shadow: 0px 0px 20px  #0e0f29;
        }
        #main .right {
            padding-top: 150px;
            padding-left: 100px;
            padding-right: 100px;
        }

        #main label {
            color:#2E3192;
        }

        @keyframes icon-animated-mvt {
            0% {
                font-size: 1.6rem;
            }
            50% {
                font-size: 1.7rem;
            }
            100% {
                font-size: 1.6rem;
            }
        }

        .icon-animated {
            -webkit-animation: 4s icon-animated-mvt infinite forwards;
            -o-animation: 4s icon-animated-mvt infinite forwards;
            animation: 4s icon-animated-mvt infinite forwards;
        }


    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" id="main">
            <div class="col-md-6 d-none d-md-block left">
                <h1>Connexion</h1>
                <h3>Continuez vos activités en tant que Producteur ou Distributeur</h3>
            </div>
            <form method="post" action="{{route('guest.connect')}}" class="col-md-6 right">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                        </div>
                        <input name="email" id="email" value="{{old('email')}}" required type="email" class="form-control">

                    </div>
                    @if($errors->has('email'))
                        <span class="oblig">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" id="password" name="password" value="{{old('password')}}" required class="form-control">

                    </div>
                    @if($errors->has('password'))
                        <span class="oblig">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-outline-blue">Se connecter</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
@endsection