@extends('layout/base',['title'=>'compte'])

@php
   $user=Auth::user();
   $show_dashboard=!isset($current)||isset($current)&&$current=='dashbord';
   $show_account=isset($current)&&$current=='account';
   $show_orders=isset($current)&&$current=='orders';
   $show_payment=isset($current)&&$current=='payment';
   $show_address=isset($current)&&$current=='address';

@endphp

@section('content')
<!-- My Account Start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link {{$show_dashboard?'active':''}}" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Tableau de bord {{is_current_profil_page('dashboard')}}</a>
                    <a class="nav-link {{$show_orders?'active':''}}" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Ordres</a>
                    <a class="nav-link {{$show_payment?'active':''}}" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Mode de paiement</a>
                    <a class="nav-link {{$show_address?'active':''}}" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>adresse</a>
                    <a class="nav-link {{$show_account?'active':''}}" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Détails du compte {{is_current_profil_page('account')}}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                         <a  class="nav-link" :href="route('logout')"
                             onclick="event.preventDefault();
                            this.closest('form').submit();">
                           <i class="fa fa-sign-out-alt"></i>
                            se deconnecter
                        </a>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show {{ $show_dashboard?'active':''}}" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                        <h4>Tableau de bord</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra
                            dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit
                            finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in
                            faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu
                            rhoncus scelerisque.
                        </p>
                    </div>
                    <div class="tab-pane fade {{$show_orders?'show active':''}}" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Produit</th>
                                        <th>Date</th>
                                        <th>Prix</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->paniers as $pan)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$pan->article->name}}</td>
                                        <td>{{$pan->create_at?'date':'date'}}</td>
                                        <td>{{$pan->article->prix}} XAF</td>
                                        @if($pan->sold)
                                            <td><span class='green'>Acheté</span></td>
                                        @else
                                            <td><span class='red'>attente</span></td>
                                        @endif
                                        
                                        <td>
                                            <a href="{{route('product-detail',['id'=>$pan->article->id])}}">
                                                <button class="btn">Voir</button>
                                            <a>
                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade {{$show_payment?'show active':''}}" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <h4>Mode de paiement</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra
                            dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit
                            finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in
                            faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu
                            rhoncus scelerisque.
                        </p>
                    </div>
                    <div class="tab-pane fade {{$show_address?'show active':''}}" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                        <h4>Address</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Payment Address</h5>
                                <p>123 Payment Street, Los Angeles, CA</p>
                                <p>Mobile: 012-345-6789</p>
                                <button class="btn">Edit Address</button>
                            </div>
                            <div class="col-md-6">
                                <h5>Shipping Address</h5>
                                <p>123 Shipping Street, Los Angeles, CA</p>
                                <p>Mobile: 012-345-6789</p>
                                <button class="btn">Edit Address</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade {{$show_account?'active show':''}} " id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                        <h4>Détails du compte</h4>
                        <form class="row" method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Prénom" id="name" name="name" value="{{$user->name}}" required autofocus autocomplete="name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Nom de famille" id="surname" name="surname" value="{{$user->surname}}" required autofocus autocomplete="surname">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Mobile" id="mobile" name="mobile" value="{{$user->mobile}}" required autofocus autocomplete="mobile">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Email" id="email" name="email" value="{{$user->email}}" required autofocus autocomplete="email">
                            </div>
                            <div class="col-md-12">
                                <button class="btn">Mettre le compte a jour</button>
                                <br><br>
                            </div>
                        </form>
                        <h4>changer le mot de passe</h4>
                        <form class="row" method="post" action="{{ route('profile.password.update') }}">
                            @csrf
                            <div class="col-md-12">
                                <input class="form-control" type="password" placeholder="Mot de passe actuel" id="password" name="password" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="nouveau mot de passe" id="new_password" name="new_password" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Confirmez le mot de passe" id="new_password_clone" name="new_password_clone" required autofocus>
                            </div>
                            <div class="col-md-12">
                                <button class="btn">Sauvegarder les modifications</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(isset($message))
    <script type="text/javascript">
        Swal.fire("{{$message}}");
    </script>
@endif
<!-- My Account End -->

@endsection