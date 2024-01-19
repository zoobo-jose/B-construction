@extends('layout/base',['title'=>'maison'])

@section('content')
<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}"><i class="fa fa-home"></i>Maison</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i>Meilleur vente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-plus-square"></i>Nouvelles Arrivées</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauté</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-child"></i>Vêtements Enfants et Bébés</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Vêtements pour hommes et femmes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets & Accessoires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Électronique et accessoires</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="header-slider normal-slider">
                    @foreach ($articlesHeader as $art)
                    <div class="header-slider-item">
                        <img src="{{asset($art->image->url)}}" alt="Slider Image" />
                        <div class="header-slider-caption">
                            <p>{{$art->description}}</p>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Achetez</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class="header-img">
                    @foreach ($articlesHeader2 as $art)
                    <div class="img-item">
                        <img src="{{asset($art->image->url)}}" />
                        <a class="img-text" href="{{route('product-detail',['id'=>$art->id])}}">
                            <p>{{$art->description}}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Slider End -->

<!-- Brand Start -->
<div class="brand">
    <div class="container-fluid">
        <div class="brand-slider">
            <div class="brand-item"><img src="/img/brand-1.png" alt=""></div>
            <div class="brand-item"><img src="/img/brand-2.png" alt=""></div>
            <div class="brand-item"><img src="/img/brand-3.png" alt=""></div>
            <div class="brand-item"><img src="/img/brand-4.png" alt=""></div>
            <div class="brand-item"><img src="/img/brand-5.png" alt=""></div>
            <div class="brand-item"><img src="/img/brand-6.png" alt=""></div>
        </div>
    </div>
</div>
<!-- Brand End -->

<!-- Feature Start-->
<div class="feature">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fab fa-cc-mastercard"></i>
                    <h2>Paiement sécurisé</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur elit
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-truck"></i>
                    <h2>Livraison mondiale</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur elit
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-sync-alt"></i>
                    <h2>Retour sous 90 jours</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur elit
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-comments"></i>
                    <h2>Assistance 24h/24 et 7j/7</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur elit
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End-->

<!-- Category Start-->
<div class="category">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="category-item ch-400">
                    <img src="{{asset($art_cat_1->image->url)}}" />
                    <a class="category-name" href="{{route('product-list')."?categori=".$art_cat_1->categori_id}}">
                        <p>Plan artchitectural {{$art_cat_1->categori->name}}</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-item ch-250">
                    <img src="{{asset($art_cat_2->image->url)}}" />
                    <a class="category-name" href="{{route('product-list')."?categori=".$art_cat_2->categori_id}}">
                        <p>Plan artchitectural {{$art_cat_2->categori->name}}</p>
                    </a>
                </div>
                <div class="category-item ch-150">
                    <img src="{{asset($art_cat_3->image->url)}}" />
                    <a class="category-name" href="{{route('product-list')."?categori=".$art_cat_3->categori_id}}">
                        <p>Plan artchitectural {{$art_cat_3->categori->name}}</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-item ch-150">
                    <img src="{{asset($art_cat_4->image->url)}}" />
                    <a class="category-name" href="{{route('product-list')."?categori=".$art_cat_4->categori_id}}">
                        <p>Plan artchitectural {{$art_cat_4->categori->name}}</p>
                    </a>
                </div>
                <div class="category-item ch-250">
                    <img src="{{asset($art_cat_5->image->url)}}" />-
                    <a class="category-name" href="{{route('product-list')."?categori=".$art_cat_5->categori_id}}">
                        <p>Plan artchitectural {{$art_cat_5->categori->name}}</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-item ch-400">
                    <img src="{{asset($art_cat_6->image->url)}}" />
                    <a class="category-name" href="{{route('product-list')."?categori=".$art_cat_6->categori_id}}">
                        <p>Plan artchitectural {{$art_cat_6->categori->name}}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category End-->

<!-- Call to Action Start -->
<div class="call-to-action">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>appelez-nous pour toute question</h1>
            </div>
            <div class="col-md-6">
                <a href="tel:{{config('company.contact1')}}">{{format_phone_number(config("company.contact1"))}}</a>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->

<!-- Featured Product Start -->
<div class="featured-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Produit en vedette</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            @foreach ($articles_vedette as $art)
                    <div class="col-lg-3">
                        <x-article :article="$art"/> 
                    </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Featured Product End -->

<!-- Newsletter Start -->
<form class="newsletter" method="POST" action="{{ route('newsletter') }}">
    @csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Abonnez-vous à notre newsletter</h1>
            </div>
            <div class="col-md-6">
                <div class="form">
                    <input type="email" name="email" id="email" placeholder="votre email ici">
                    <button>Soumettre</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Newsletter End -->

<!-- Recent Product Start -->
<div class="recent-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Produit récent</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            @foreach ($new_articles as $art)
            <div class="col-lg-3">
                <x-article :article="$art"/> 
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Recent Product End -->

<!-- Review Start -->
<div class="review">
    <div class="container-fluid">
        <div class="row align-items-center review-slider normal-slider">
            <div class="col-md-6">
                <div class="review-slider-item">
                    <div class="review-img">
                        <img src="/img/person/1.avif" alt="Image">
                    </div>
                    <div class="review-text">
                        <h2>Nom du client</h2>
                        <h3>Profession</h3>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo
                            finibus luctus et vitae lorem
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="review-slider-item">
                    <div class="review-img">
                        <img src="/img/person/2.jpg" alt="Image">
                    </div>
                    <div class="review-text">
                        <h2>Nom du client</h2>
                        <h3>Profession</h3>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo
                            finibus luctus et vitae lorem
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="review-slider-item">
                    <div class="review-img">
                        <img src="/img/person/3.jpg" alt="Image">
                    </div>
                    <div class="review-text">
                        <h2>Nom du client</h2>
                        <h3>Profession</h3>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo
                            finibus luctus et vitae lorem
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Review End -->
@endsection