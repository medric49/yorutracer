@extends('layouts.distributor.base')
@section('title',auth()->user()->name)

@section('style')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="mt-5">
                    <img src="{{\App\Managers\FileManager::loadLogo(auth()->user())}}" alt="" class="img-profile">
                </div>
                <div class="bar-profile"></div>
            </div>
            <div class="col-md-8">
                <h1 class="mt-5">{{auth()->user()->name}}</h1>
                <div class="row">
                    <div class="col-4">
                        <h5 class="text-muted">Type</h5>
                    </div>
                    <div class="col-8">
                        <h5 class="text-blue text-capitalize">{{strtolower(auth()->user()->type)}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h5 class="text-muted">Email</h5>
                    </div>
                    <div class="col-8">
                        <h5 class="text-blue">{{auth()->user()->email}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h5 class="text-muted">Tel</h5>
                    </div>
                    <div class="col-8">
                        <h5 class="text-blue">{{auth()->user()->tel}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h5 class="text-muted">Email</h5>
                    </div>
                    <div class="col-8">
                        <h5 class="text-blue">{{auth()->user()->email}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h5 class="text-muted">Site Web</h5>
                    </div>
                    <div class="col-8">
                        <h5 class="text-blue">{{auth()->user()->website}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{route('production.profile_modification_form')}}" class="btn btn-outline-orange">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')

@endsection