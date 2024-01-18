 @extends('layout/base',['title'=>'détails du produit'])

 @section('content')
 
 <!-- Product Detail Start -->
 <div class="product-detail">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-8">
                 <div class="product-detail-top">
                     <div class="row align-items-center">
                         <div class="col-md-5">
                             <div class="product-slider-single normal-slider">
                                @foreach ($article->images as $image)
                                    <img src="{{asset($image->url)}}" alt="Product Image">
                                @endforeach
                             </div>
                             <div class="product-slider-single-nav normal-slider">
                                @foreach ($article->images as $image)
                                    <div class="slider-nav-img"><img src="{{asset($image->url)}}"  alt="Product Image"></div>
                                @endforeach
                             </div>
                         </div>
                         <div class="col-md-7">
                             <div class="product-content">
                                 <div class="title">
                                     <h2>{{$article->name}}</h2>
                                 </div>
                                 <div class="ratting">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                 </div>
                                 <div class="price">
                                     <h4>Prix:</h4>
                                     <p>{{$article->prix}} XAF<span>{{$article->prix}} XAF</span></p>
                                 </div>
                                 {{-- <div class="quantity">
                                     <h4>Quantité:</h4>
                                     <div class="qty">
                                         <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                         <input type="text" value="1">
                                         <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                     </div>
                                 </div> --}}
                                 {{-- <div class="p-size">
                                     <h4>Taille:</h4>
                                     <div class="btn-group btn-group-sm">
                                         <button type="button" class="btn">S</button>
                                         <button type="button" class="btn">M</button>
                                         <button type="button" class="btn">L</button>
                                         <button type="button" class="btn">XL</button>
                                     </div>
                                 </div> --}}
                                 {{-- <div class="p-color">
                                     <h4>Couleur:</h4>
                                     <div class="btn-group btn-group-sm">
                                         <button type="button" class="btn">White</button>
                                         <button type="button" class="btn">Black</button>
                                         <button type="button" class="btn">Blue</button>
                                     </div>
                                 </div> --}}
                                 <div class="action">
                                     <a class="btn" href="#" onclick="addArticleToCart({{$article->id}})"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>
                                     <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Acheter</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="row product-detail-bottom">
                     <div class="col-lg-12">
                         <ul class="nav nav-pills nav-justified">
                             <li class="nav-item">
                                 <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" data-toggle="pill" href="#reviews">Commentaires (1)</a>
                             </li>
                         </ul>

                         <div class="tab-content">
                             <div id="description" class="container tab-pane active">
                                 <h4>Description du produit</h4>
                                 <p>
                                    {{$article->description}}
                                 </p>
                             </div>
                             <div id="specification" class="container tab-pane fade">
                                 <h4>Spécification du plan</h4>
                                 <ul>
                                     <li>Lorem ipsum dolor sit amet</li>
                                     <li>Lorem ipsum dolor sit amet</li>
                                     <li>Lorem ipsum dolor sit amet</li>
                                     <li>Lorem ipsum dolor sit amet</li>
                                     <li>Lorem ipsum dolor sit amet</li>
                                 </ul>
                             </div>
                             <div id="reviews" class="container tab-pane fade">
                                 <div class="reviews-submitted">
                                     <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                     <div class="ratting">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                     </div>
                                     <p>
                                         Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                         doloremque laudantium, totam rem aperiam.
                                     </p>
                                 </div>
                                 <div class="reviews-submit">
                                     <h4>Give your Review:</h4>
                                     <div class="ratting">
                                         <i class="far fa-star"></i>
                                         <i class="far fa-star"></i>
                                         <i class="far fa-star"></i>
                                         <i class="far fa-star"></i>
                                         <i class="far fa-star"></i>
                                     </div>
                                     <div class="row form">
                                         <div class="col-sm-6">
                                             <input type="text" placeholder="Name">
                                         </div>
                                         <div class="col-sm-6">
                                             <input type="email" placeholder="Email">
                                         </div>
                                         <div class="col-sm-12">
                                             <textarea placeholder="Review"></textarea>
                                         </div>
                                         <div class="col-sm-12">
                                             <button>Soumettre</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="product">
                     <div class="section-header">
                         <h1>Produits connexes</h1>
                     </div>

                     <div class="row align-items-center product-slider product-slider-3">
                        @foreach ($articles_connexes as $art)
                        <div class="col-lg-3">
                            <x-article :article="$art"/> 
                        </div>
                        @endforeach
                     </div>
                 </div>
             </div>
             @include('layout/partial/side-bar')
             
         </div>
     </div>
 </div>
 <!-- Product Detail End -->

 @include('layout/partial/brand')

 @endsection