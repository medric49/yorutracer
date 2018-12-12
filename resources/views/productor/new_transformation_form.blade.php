@extends('layouts.productor.base')
@section('title','Nouvelle Transformation')

@section('content')

    <main class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                @if(count($models)>0)
                    <div class="row">
                        <h1 class="col-12 text-center">Nouvelle Transformation de produit</h1>
                    </div>
                    <form class="row" action="{{route('productor.new_transformation')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="title">Titre <span class="oblig">*</span></label>
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
                                    <textarea required name="description" id="description" cols="20" rows="5" class="form-control">{{old('description')}}</textarea>
                                </div>
                                @if($errors->has('title'))
                                    <span class="oblig">{{$errors->first('title')}}</span>
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