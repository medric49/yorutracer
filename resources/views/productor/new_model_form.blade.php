@extends('layouts.productor.base')
@section('title','Produits')


@section('content')
    <main class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="row">
                    <h1 class="col-12 text-center">Nouveau model de produit</h1>
                </div>
                <form class="row" action="{{route('productor.new_model')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="col-12">

                        <legend class="text-orange">Presentation du produit</legend>
                        <hr>
                        <div class="form-group">
                            <label for="name">Nom du produit</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                </div>
                                <input type="text" value="{{old('name')}}" class="form-control" name="name" id="name">
                            </div>
                            @if($errors->has('name'))
                                <span class="oblig">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image">Image de présentation</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                </div>
                                <input type="file" accept=".gif,.png,.jpg,.jpeg" class="form-control" value="{{old('image')}}" name="image" id="image">

                            </div>
                            @if($errors->has('image'))
                                <span class="oblig">{{$errors->first('image')}}</span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-info"></i></span>
                                </div>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{old('description')}}</textarea>

                            </div>
                            @if($errors->has('description'))
                                <span class="oblig">{{$errors->first('description')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name">Unité du produit</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-star"></i></span>
                                </div>
                                <input type="text" value="{{old('unit')}}" class="form-control" name="unit" id="unit">
                            </div>
                            @if($errors->has('unit'))
                                <span class="oblig">{{$errors->first('unit')}}</span>
                            @endif
                        </div>


                        <legend class="text-orange">Images descriptives</legend>
                        <hr>
                        <div class="form-group">
                            <label for="image_1">Image 1</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-images"></i></span>
                                </div>
                                <input type="file" accept=".jpg,.jpeg,.png,.gif" class="form-control" value="{{old('image_1')}}" name="image_1" id="image_1">

                            </div>
                            @if($errors->has('image_1'))
                                <span class="oblig">{{$errors->first('image_1')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image_2">Image 2</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-images"></i></span>
                                </div>
                                <input type="file" accept=".jpg,.jpeg,.png,.gif" class="form-control" value="{{old('image_2')}}" name="image_2" id="image_2">

                            </div>
                            @if($errors->has('image_2'))
                                <span class="oblig">{{$errors->first('image_2')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image_3">Image 3</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-images"></i></span>
                                </div>
                                <input type="file" accept=".jpg,.jpeg,.png,.gif" class="form-control" value="{{old('image_3')}}" name="image_3" id="image_3">

                            </div>
                            @if($errors->has('image_3'))
                                <span class="oblig">{{$errors->first('image_3')}}</span>
                            @endif
                        </div>


                        <div class="form-group text-right">
                            <input type="submit" class="btn btn-blue" value="Enregistrer">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection