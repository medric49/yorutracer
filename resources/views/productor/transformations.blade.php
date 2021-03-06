@extends('layouts.productor.base')
@section('title','Transformations')

@section('style')
    <style>
        .btn-add {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 50px;
            height: 50px;
            font-size: 25px;
            border: 500px;
            background-color: #2E3192;
            color: white;
            border-radius: 100px;
            z-index: 100;

            -webkit-transition: all 0.4s;
            -moz-transition: all 0.4s;
            -ms-transition: all 0.4s;
            -o-transition: all 0.4s;
            transition: all 0.4s;
        }

        .btn-add:hover {
            background-color: #5660ff;
        }

        .card {
            width: 15rem;
            margin-bottom: 15px;
        }

        .card:hover .container-fluid {
            height: 160px;

        }

        .card .container-fluid {
            color: white;
            position: absolute;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 0px;
            background-color: rgba(0, 0, 0, 0.71);

            overflow: hidden;

            -webkit-transition: all 0.4s;
            -moz-transition: all 0.4s;
            -ms-transition: all 0.4s;
            -o-transition: all 0.4s;
            transition: all 0.4s;
        }

        .card-img-top {
            height: 160px;
        }
    </style>
@endsection

@section('content')

    @php
        $nb = count($transformations)
    @endphp
    <main class="container pt-5">
        <a href="{{route('productor.new_transformation')}}" class="btn btn-add"><i class="fas fa-plus"></i></a>

        <section class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="row justify-content-center">

                    @if($nb >0)
                        <h3 class="col-12 mb-3 text-muted text-center">
                            Vous avez {{$nb}} transformation(s) actives.
                        </h3>
                        @foreach($transformations as $transformation)
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="card">
                                    <div class="container-fluid">
                                        <div class="row h-100 align-items-center">
                                            <p class="mt-2 col-12 text-center">{{$transformation->description}} </p>
                                        </div>
                                    </div>
                                    <img src="{{\App\Managers\FileManager::loadImage($transformation->image,config('yorutracer.transformation_image_folder'),'512')}}" alt="{{$transformation->title}}" class="card-img-top">
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><a href="{{route('productor.transformation',$transformation->id)}}" class="link-orange">{{$transformation->title}}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3 class="col-12 text-muted text-center">Aucune transformation enregistrée</h3>
                    @endif

                </div>
            </div>

        </section>

    </main>

@endsection