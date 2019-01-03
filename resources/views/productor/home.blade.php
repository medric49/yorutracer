@extends('layouts.productor.base')
@section('title','Accueil')
@section('style')
    <style>
        .home-block {
            background-color: #fafafa;
            border-radius: 5px;
            padding : 10px
        }

        .icon-img-transformation {
            width: 50px;
            height: 50px;
            border-radius: 100px;
        }
    </style>
@endsection

@section('content')
    <main class="container pt-5">
        <div class="row">
            <section class="col-md-8">
                <div class="m-1 home-block">
                    <h3 class="text-center">Aucun produit en possession</h3>
                </div>
            </section>
            <aside class="col-md-4">
                <div class="m-1 home-block">

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <h5 class="col-8">
                                    Transformations
                                </h5>
                                <div class="col-4">
                                    <a href="{{route('productor.transformations')}}" class="link-blue" style="font-size: 1.1rem">Voir plus</a>
                                </div>
                            </div>
                            <hr>

                            <div class="row m-1">
                                @if(count($transformations) > 0)
                                    @foreach($transformations as $transformation)
                                        <div class="col-12 mb-1" style="background-color: white;padding: 10px;border-radius: 5px">
                                            <div class="row align-items-center">
                                                <div class="col-md-3 col-4">
                                                    <img class="icon-img-transformation" src="{{\App\Managers\FileManager::loadImage($transformation->image,config('yorutracer.transformation_image_folder'),'256')}}" alt="{{$transformation->title}}">
                                                </div>
                                                <h4 class="col-md-9 col-8">
                                                    <a href="{{route('productor.transformation',$transformation->id) }}" class="link-orange">{{$transformation->title}}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h5 class="col-12">
                                        Aucune transformation
                                    </h5>
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
                <div class="m-1 home-block">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <h5 class="col-8">
                                    Models
                                </h5>
                                <div class="col-4">
                                    <a href="{{route('productor.models')}}" class="link-blue" style="font-size: 1.1rem">Voir plus</a>
                                </div>
                            </div>
                            <hr>


                            <div class="row m-1">
                                @if(count($transformations) > 0)
                                    @foreach($transformations as $transformation)
                                        <div class="col-12 mb-1" style="background-color: white;padding: 10px;border-radius: 5px">
                                            <div class="row align-items-center">
                                                <div class="col-md-3 col-4">
                                                    <img class="icon-img-transformation" src="{{\App\Managers\FileManager::loadImage($transformation->image,config('yorutracer.transformation_image_folder'),'256')}}" alt="{{$transformation->title}}">
                                                </div>
                                                <h4 class="col-md-9 col-8">
                                                    <a href="{{route('productor.transformation',$transformation->id) }}" class="link-orange">{{$transformation->title}}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h5 class="col-12">
                                        Aucune transformation
                                    </h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>
@endsection

@section('script')
    <script>
        $.ajax({
            url: 'http://localhost:3001/init-private-key',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Access-Control-Allow-Origin' : "*"
            },
            dataType: 'json',
            type: 'post',

            success : function (data) {
                $.ajax({
                    url : '{{route('api.save_pk')}}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Access-Control-Allow-Origin' : "*"
                    },

                    dataType: 'json',
                    type: 'post',

                    data :{"data" :JSON.stringify({status : data.status})},

                    success : function (data) {
                    },

                    error : function () {
                        alert()
                    }

                })

            },
            error : function () {
                $('#blockchain-modal').modal('show');
            }
        })
    </script>
@endsection