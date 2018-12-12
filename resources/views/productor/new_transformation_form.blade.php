@extends('layouts.productor.base')
@section('title','Nouvelle Transformation')

@section('content')

    <main class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                @if(count($transformations)>0)
                    <div class="row">
                        <h1 class="col-12 text-center">Nouvelle Transformation de produit</h1>
                    </div>
                    <form class="row" action="{{route('productor.new_transformation')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-12">
                            <legend class="text-orange">Presentation de la transformation</legend>
                            <hr>

                            <div class="form-group">
                                <label for="title">Nom du résultat <span class="oblig">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                    </div>
                                    <input value="{{old('title')}}" type="text" required name="title" id="title" class="form-control">
                                </div>
                                @if($errors->has('title'))
                                    <span class="oblig">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Image du résultat final <span class="oblig">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>
                                    <input accept=".png,.jpg,.jpeg,.gif" value="{{old('image')}}" type="file" required name="image" id="image" class="form-control">
                                </div>
                                @if($errors->has('image'))
                                    <span class="oblig">{{$errors->first('image')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Description <span class="oblig">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-info"></i></span>
                                    </div>
                                    <textarea required name="description" id="description" cols="30" rows="3" class="form-control">{{old('description')}}</textarea>
                                </div>
                                @if($errors->has('description'))
                                    <span class="oblig">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="unit">Unité du produit</label>
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

                            <div class="form-group">
                                <label for="prev_transformation_id">Produit transformé</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                                    </div>
                                    <select class="form-control" name="prev_transformation_id" id="prev_transformation_id">
                                        @foreach($prev_transformations as $transformation)
                                            <option value="{{$transformation->id}}" {{old('prev_transformation_id')==$transformation->id?'selected':''}}>{{$transformation->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if($errors->has('prev_transformation_id'))
                                    <span class="oblig">{{$errors->first('prev_transformation_id')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Type de transformation</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                    </div>
                                    <input type="radio" value="INTERMEDIATE" class="form-control" name="type"> Intermediaire
                                    <br>
                                    <input type="radio" value="FINAL" class="form-control" name="type"> Finale
                                </div>
                                @if($errors->has('type'))
                                    <span class="oblig">{{$errors->first('type')}}</span>
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
                @else
                    <div class="jumbotron">
                        <h3>Aucun model de produit !</h3>
                        <h5>Vous ne pouvez pas créer de transformation.</h5>
                        <h5>Creer un nouveau model <a href="{{route('productor.new_model')}}" class="link-orange">ici</a></h5>
                    </div>
                @endif


            </div>
        </div>
    </main>

@endsection