@extends('layout/base',['title'=>'liste de produits'])

@section('content')
    

@php
//search
$search=isset($querystringArray['search'])?$querystringArray['search']:"";
//url pour la recherche
$url_search=construct_param_url(route('product-list'),$querystringArray,[]);
// url pour faire du tri 
  $url_sort=[];
  foreach (['new','featured','sales'] as $key => $value) {
    array_push($url_sort,construct_param_url(route('product-list'),$querystringArray,["order"=>$value]));                                                                                                                                                        
  }
// url pour faire du tri au prix
$url_price=[];
  foreach ([[5000,10000],[10000,50000],[50000,500000],[0,null]] as $key => $value) {
    array_push($url_price,construct_param_url(route('product-list'),$querystringArray,["min_price"=>$value[0],"max_price"=>$value[1]]));                                                                                                                                                        
  }
@endphp
<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-view-top">
                            <form method="get" class="row" action="{{ $url_search }}">
                                <div class="col-md-4">
                                    <div class="product-search">
                                        <input type="text" id="search" name="search" value="{{$search}}" placeholder="Recherche">
                                        <button><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product-short">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle" data-toggle="dropdown">Produit trié par</div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ $url_sort[0]}}" class="dropdown-item">plus récent</a>
                                                <a href="{{ $url_sort[1] }}" class="dropdown-item">plus populaire</a>
                                                <a href="{{ $url_sort[2] }}" class="dropdown-item">plus vendu</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product-price-range">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle" data-toggle="dropdown">Fourchette de prix
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ $url_price[3] }}" class="dropdown-item"> tout </a>
                                                <a href="{{ $url_price[0] }}" class="dropdown-item">5000 - 10000</a>
                                                <a href="{{ $url_price[1] }}" class="dropdown-item">10000 - 50000</a>
                                                <a href="{{ $url_price[2] }}" class="dropdown-item"> 50000 et plus </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @foreach ($articles as $art)
                        <div class="col-md-4">
                            <x-article :article="$art"/> 
                        </div>
                    @endforeach
                </div>
                {{ $articles->appends($querystringArray)->links() }}
            </div>

            @include('layout/partial/side-bar')

        </div>
    </div>
</div>
<!-- Product List End -->

@include('layout/partial/brand')

@endsection