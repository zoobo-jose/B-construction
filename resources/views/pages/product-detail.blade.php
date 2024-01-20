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
                                     <span class="btn"  onclick="addArticleToCart({{$article->id}})"><i class="fa fa-shopping-cart"></i>Ajouter au panier</span >
                                     <span  class="btn"  onclick="buyArticle({{$article->id}})"><i class="fa fa-shopping-bag"></i>Acheter</span >
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
                                 <a class="nav-link" data-toggle="pill" href="#reviews">
                                    Commentaires  
                                    <span id="nbr_comments">({{count($article->comments)}})</span>
                                </a>
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
                                <div id="list-comments">
                                @foreach ($article->comments as $com)
                                    <div class="reviews-submitted">
                                        <div class="reviewer">{{$com->user_name}} - <span>{{$com->created_at}}</span></div>
                                        <div class="ratting">
                                            @for ($i=0;$i<$com->user_rate;$i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                        <p>
                                            {{$com->content}}
                                        </p>
                                    </div>
                                @endforeach
                                </div>
                                 
                                 <div class="reviews-submit">
                                     <h4>Give your Review:</h4>
                                     <div class="ratting">
                                         <i class="far fa-star" onclick="set_user_rate(1)"></i>
                                         <i class="far fa-star" onclick="set_user_rate(2)"></i>
                                         <i class="far fa-star" onclick="set_user_rate(3)"></i>
                                         <i class="far fa-star" onclick="set_user_rate(4)"></i>
                                         <i class="far fa-star" onclick="set_user_rate(5)"></i>
                                     </div>
                                     <div class="row form">
                                        @csrf
                                         <div class="col-sm-6">
                                             <input id="user_name" type="text" placeholder="Name">
                                         </div>
                                         <div class="col-sm-6">
                                             <input id="user_email" type="email" placeholder="Email">
                                         </div>
                                         <div class="col-sm-12">
                                             <textarea id="content" placeholder="Review"></textarea>
                                         </div>
                                         <input id="article_id" type="hidden"  value="{{$article->id}}">
                                         <input id="user_rate" type="hidden" value="0">
                                         <div class="col-sm-12">
                                             <button onclick="addCommentToArticle()">Soumettre</button>
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