@extends('layout/base',['title'=>'se connecter'])

@section('content')

<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="register-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Prénom</label>
                            <input class="form-control" type="text" placeholder="Prénom">
                        </div>
                        <div class="col-md-6">
                            <label>Nom de famille</label>
                            <input class="form-control" type="text" placeholder="Nom de famille">
                        </div>
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="E-mail">
                        </div>
                        <div class="col-md-6">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="Mobile No">
                        </div>
                        <div class="col-md-6">
                            <label>Mot de passe</label>
                            <input class="form-control" type="text" placeholder="Mot de passe">
                        </div>
                        <div class="col-md-6">
                            <label>Saisir à nouveau le mot de passe</label>
                            <input class="form-control" type="text" placeholder="Mot de passe">
                        </div>
                        <div class="col-md-12">
                            <button class="btn">Soumettre</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label>E-mail / Nom d'utilisateur</label>
                            <input class="form-control" type="text" placeholder="E-mail / Nom d'utilisateur">
                        </div>
                        <div class="col-md-6">
                            <label>Mot de passe</label>
                            <input class="form-control" type="text" placeholder="Mot de passe">
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Gardez-moi connecté</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn">Soumettre</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->

@endsection