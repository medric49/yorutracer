@extends('layouts.productor.base')
@section('title',$model->name)
@php
    $first_transformation = $model->first_transformation();
    $images = $first_transformation->images()->get();
@endphp
@section('style')
    <style>
        body {
            min-height: 100vh;
            background-image: url('{{ \App\Managers\FileManager::loadImage($first_transformation->image,config('yorutracer.transformation_image_folder')) }}');
            background-attachment: fixed;
        }

        main {
            background-color: rgba(0, 0, 0, 0.71);
            min-height: 100vh;
        }

        .block {
            border-radius: 5px;
            background-color: white;
            box-shadow: 0px 0px 5px white ;
        }

        .comment-container {
            background-color: blueviolet;
            min-height: 30px;
            border-radius: 5px 5px 0px 0px;
            color: white;
            padding: 20px;
            font-size: 1.5rem;
        }
    </style>
@endsection



@section('content')
    <main class="container-fluid pt-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-white text-center">{{$model->name}}</h1>
                </div>

                <section class="col-8 p-1 ">
                    <div class="block" style="min-height: 500px">
                        <p class="comment-container">
                            {{$first_transformation->description}}
                        </p>

                        <div class="container" id="vue">

                            <div class="row justify-content-center" >
                                <h3 class="col-5 text-orange" style="border-bottom:1px solid #ff843b ">Quantité</h3>
                                <h3 class="col-5 text-orange" style="border-bottom:1px solid #ff843b ">Date</h3>
                            </div>

                            <div v-for="product in products" class="row justify-content-center" >
                                <h3 class="col-5 text-orange" v-text="product.quantity"></h3>
                                <h3 class="col-5 text-orange" v-text="product.date"></h3>
                            </div>


                        </div>

                    </div>
                </section>
                <aside class="col-4 p-1">

                    <div>
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" height="200" style="border-radius: 5px" src="{{\App\Managers\FileManager::loadImage($images[0]->file_name, config('yorutracer.transformation_image_folder'),'512')}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" height="200" style="border-radius: 5px" src="{{\App\Managers\FileManager::loadImage($images[1]->file_name, config('yorutracer.transformation_image_folder'), '512')}}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" height="200" style="border-radius: 5px" src="{{\App\Managers\FileManager::loadImage($images[2]->file_name, config('yorutracer.transformation_image_folder'), '512')}}" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="block p-2 mt-2">
                        <form action="{{route('productor.store_product')}}" method="post" id="product-storage-form">
                            <div class="text-center">
                                <img style="border-radius: 100px;width: 75px;height: 75px" src="{{ \App\Managers\FileManager::loadImage($first_transformation->image,config('yorutracer.transformation_image_folder'),'256') }}" alt="">
                            </div>
                            <legend class="text-center text-orange">Ajouter un produit</legend>

                            <input type="hidden" value="{{$model->id}}" name="model_id">
                            <div class="form-group">
                                <label for="quantity">Quantité</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-plus"></i></span></div>
                                    <input type="number" min="0" class="form-control" name="quantity" id="quantity">
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <input type="button" id="submitter" class="btn btn-blue" value="Ajouter">
                            </div>
                        </form>
                    </div>

                </aside>
            </div>
        </div>

    </main>
@endsection

@section('script')
    <script src="{{asset('js/vuejs/vue.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {

            $('#product-storage-form').doPost(
                function (data) {
                    $.ajax({
                        url: 'http://localhost:3001/new-product',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Access-Control-Allow-Origin' : "*",
                            'Content-Type': 'application/json'
                        },
                        data : JSON.stringify({
                            productId : data.productId
                        }),
                        dataType: 'json',
                        method: 'POST',
                        success : function () {
                            $('#quantity').val('')
                            vue.products.push(
                                {
                                    product_id : data.productId,
                                    quantity : data.quantity,
                                    date : data.date
                                }
                            )
                        },
                        error : function () {
                            alert('Echec')
                        }
                    })

                },
                function () {
                    alert('Les informations sont incorrects');
                }
            )

            $("#submitter").click(function () {
                alertBlockchainConnection(function () {
                    $('#product-storage-form').submit();
                })
            })

            var vue = new Vue({
                el : "#vue",
                data : {
                    products : []
                },

                mounted: function () {
                    $.ajax({
                        url: 'http://localhost:3001/products',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Access-Control-Allow-Origin' : "*"
                        },
                        dataType: 'json',
                        type: 'get',

                        success : function (data) {
                            var ids = data.ids

                            $.ajax({
                                url: '{{route('api.products')}}',

                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    'Access-Control-Allow-Origin' : "*"
                                },

                                dataType: 'json',
                                type: 'post',

                                data :{"data" :JSON.stringify({ids : ids})},

                                success : function (data) {
                                    
                                    for( var i = 0 ; i<data.res.length; i++){
                                        if (data.res[i].model_id == {{$model->id}}){
                                            vue.products.push(data.res[i])
                                        }
                                    }
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

                }

            })



        })
    </script>
@endsection
