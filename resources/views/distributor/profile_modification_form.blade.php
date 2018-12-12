@extends('layouts.distributor.base')
@section('title',auth()->user()->name)

@section('style')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')
    <main class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <section class="row">
                    <h1 class="col-12 text-center">Modification du profil</h1>
                </section>

                <form method="post" action="{{route('productor.store_social_information')}}" class="row">
                    {{csrf_field()}}
                    <div class="col-12">
                        <legend>Informations Sociales</legend>
                        <hr>
                        <section class="form-group">
                            <label for="name">Nom <span class="oblig">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="name" required value="{{auth()->user()->name}}" type="text" class="form-control" name="name">
                            </div>
                            @if($errors->has('name'))
                                <span class="oblig">{{$errors->first('name')}}</span>
                            @endif
                        </section>

                        <section class="form-group">
                            <label for="email">Email <span class="oblig">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" required value="{{auth()->user()->email}}" class="form-control" name="email" id="email">
                            </div>
                            @if($errors->has('email'))
                                <span class="oblig">{{$errors->first('email')}}</span>
                            @endif
                        </section>

                        <section class="form-group">
                            <label for="website">Site web</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                </div>
                                <input type="url" value="{{auth()->user()->website}}" class="form-control" name="website" id="website">
                            </div>
                            @if($errors->has('website'))
                                <span class="oblig">{{$errors->first('website')}}</span>
                            @endif
                        </section>

                        <section class="form-group text-right">
                            <input type="submit" class="btn btn-blue" value="Enregistrer">
                        </section>

                    </div>
                </form>

                <form method="post" action="{{route('productor.store_password')}}" class="row mt-5">
                    {{csrf_field()}}
                    <div class="col-12">
                        <legend>Mot de passe</legend>
                        <hr>
                        <section class="form-group">
                            <label for="password">Ancien mot de passe <span class="oblig">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" required class="form-control" name="password" id="password">
                            </div>
                            @if($errors->has('password'))
                                <span class="oblig">{{$errors->first('password')}}</span>
                            @endif
                        </section>

                        <section class="form-group">
                            <label for="new_password">Nouveau mot de passe <span class="oblig">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" required class="form-control" name="new_password" id="new_password">
                            </div>
                            @if($errors->has('new_password'))
                                <span class="oblig">{{$errors->first('new_password')}}</span>
                            @endif
                        </section>


                        <section class="form-group">
                            <label for="new_password_confirmation">Confirmation du mot de passe <span class="oblig">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" required class="form-control" name="new_password_confirmation" id="new_password_confirmation">
                            </div>
                            @if($errors->has('new_password_confirmation'))
                                <span class="oblig">{{$errors->first('new_password_confirmation')}}</span>
                            @endif
                        </section>

                        <section class="form-group text-right">
                            <input type="submit" class="btn btn-blue" value="Enregistrer">
                        </section>

                    </div>
                </form>


            </div>
        </div>
    </main>
@endsection

@section('script')

@endsection