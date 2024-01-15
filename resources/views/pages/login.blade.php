@extends('layout/base',['title'=>'se connecter'])

@section('content')

<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
               
                <form class="register-form" method="POST" action="{{ route('register') }}">
                <h4> s'enregistrer</h4>
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Prénom</label>
                            <input class="form-control" type="text" placeholder="Prénom" 
                            id="name" name="name" value="{{old('name')}}" required autofocus autocomplete="name">
                        </div>
                        <div class="col-md-6">
                            <label>Nom de famille</label>
                            <input class="form-control" type="text" placeholder="Nom de famille">
                        </div>
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input class="form-control" placeholder="E-mail"
                            id="email"  type="email" name="email" value="{{old('email')}}" required autocomplete="username">
                        </div>
                        <div class="col-md-6">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="Mobile No">
                        </div>
                        <div class="col-md-6">
                            <label>Mot de passe</label>
                            <input class="form-control" placeholder="Mot de passe"
                            id="password" 
                            type="password"
                            name="password"
                            required autocomplete="new-password">
                        </div>
                        <div class="col-md-6">
                            <label>Saisir à nouveau le mot de passe</label>
                            <input class="form-control" type="text" placeholder="Mot de passe"
                            id="password_confirmation" 
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" >
                        </div>
                        <div class="col-md-12">
                            <button class="btn">Soumettre</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <form class="login-form" method="POST" action="{{ route('login') }}">
                <h4> se connecter</h4>
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>E-mail </label>
                            <input class="form-control" type="text" 
                             placeholder="E-mail" id="email" type="email" name="email" 
                            value="{{old('email')}}" required autofocus autocomplete="username" >
                        </div>
                        <div class="col-md-6">
                            <label>Mot de passe</label>
                            <input class="form-control" placeholder="Mot de passe" id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" >
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember_me"  name="remember">
                                <label class="custom-control-label" for="remember_me">Gardez-moi connecté</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn">Soumettre</button>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->

@endsection