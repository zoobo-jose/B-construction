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
                                 <img src="/img/article/img1.jpg" alt="Product Image">
                                 <img src="/img/article/img2.jpg"  alt="Product Image">
                                 <img src="/img/article/img3.jpg"  alt="Product Image">
                                 <img src="/img/article/img4.jpg"  alt="Product Image">
                                 <img src="/img/article/img5.jpg"  alt="Product Image">
                                 <img src="/img/article/img6.jpg"  alt="Product Image">
                             </div>
                             <div class="product-slider-single-nav normal-slider">
                                 <div class="slider-nav-img"><img src="/img/article/img1.jpg"  alt="Product Image"></div>
                                 <div class="slider-nav-img"><img src="/img/article/img2.jpg"  alt="Product Image"></div>
                                 <div class="slider-nav-img"><img src="/img/article/img3.jpg"  alt="Product Image"></div>
                                 <div class="slider-nav-img"><img src="/img/article/img4.jpg"  alt="Product Image"></div>
                                 <div class="slider-nav-img"><img src="/img/article/img5.jpg"  alt="Product Image"></div>
                                 <div class="slider-nav-img"><img src="/img/article/img6.jpg"  alt="Product Image"></div>
                             </div>
                         </div>
                         <div class="col-md-7">
                             <div class="product-content">
                                 <div class="title">
                                     <h2>Nom du produit</h2>
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
                                     <p>$99 <span>$149</span></p>
                                 </div>
                                 <div class="quantity">
                                     <h4>Quantité:</h4>
                                     <div class="qty">
                                         <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                         <input type="text" value="1">
                                         <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                     </div>
                                 </div>
                                 <div class="p-size">
                                     <h4>Taille:</h4>
                                     <div class="btn-group btn-group-sm">
                                         <button type="button" class="btn">S</button>
                                         <button type="button" class="btn">M</button>
                                         <button type="button" class="btn">L</button>
                                         <button type="button" class="btn">XL</button>
                                     </div>
                                 </div>
                                 <div class="p-color">
                                     <h4>Couleur:</h4>
                                     <div class="btn-group btn-group-sm">
                                         <button type="button" class="btn">White</button>
                                         <button type="button" class="btn">Black</button>
                                         <button type="button" class="btn">Blue</button>
                                     </div>
                                 </div>
                                 <div class="action">
                                     <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>
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
                                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi
                                     viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus
                                     tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante
                                     suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros.
                                     Aliquam et sapien eget arcu rhoncus scelerisque. Suspendisse sit amet neque neque.
                                     Praesent suscipit et magna eu iaculis. Donec arcu libero, commodo ac est a,
                                     malesuada finibus dolor. Aenean in ex eu velit semper fermentum. In leo dui,
                                     aliquet sit amet eleifend sit amet, varius in turpis. Maecenas fermentum ut ligula
                                     at consectetur. Nullam et tortor leo.
                                 </p>
                             </div>
                             <div id="specification" class="container tab-pane fade">
                                 <h4>Spécification de produit</h4>
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
                         <div class="col-lg-3">
                             <div class="product-item">
                                 <div class="product-title">
                                     <a href="#">Nom du produit</a>
                                     <div class="ratting">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                     </div>
                                 </div>
                                 <div class="product-image">
                                     <a href="product-detail.html">
                                         <img src="/img/article/img1.jpg"  alt="Product Image">
                                     </a>
                                     <div class="product-action">
                                         <a href="#"><i class="fa fa-cart-plus"></i></a>
                                         <a href="#"><i class="fa fa-heart"></i></a>
                                         <a href="#"><i class="fa fa-search"></i></a>
                                     </div>
                                 </div>
                                 <div class="product-price">
                                     <h3><span>$</span>99</h3>
                                     <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Acheter</a>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3">
                             <div class="product-item">
                                 <div class="product-title">
                                     <a href="#">Nom du produit</a>
                                     <div class="ratting">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                     </div>
                                 </div>
                                 <div class="product-image">
                                     <a href="product-detail.html">
                                         <img src="/img/article/img2.jpg"  alt="Product Image">
                                     </a>
                                     <div class="product-action">
                                         <a href="#"><i class="fa fa-cart-plus"></i></a>
                                         <a href="#"><i class="fa fa-heart"></i></a>
                                         <a href="#"><i class="fa fa-search"></i></a>
                                     </div>
                                 </div>
                                 <div class="product-price">
                                     <h3><span>$</span>99</h3>
                                     <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Acheter</a>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3">
                             <div class="product-item">
                                 <div class="product-title">
                                     <a href="#">Nom du produit</a>
                                     <div class="ratting">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                     </div>
                                 </div>
                                 <div class="product-image">
                                     <a href="product-detail.html">
                                         <img src="/img/article/img3.jpg"  alt="Product Image">
                                     </a>
                                     <div class="product-action">
                                         <a href="#"><i class="fa fa-cart-plus"></i></a>
                                         <a href="#"><i class="fa fa-heart"></i></a>
                                         <a href="#"><i class="fa fa-search"></i></a>
                                     </div>
                                 </div>
                                 <div class="product-price">
                                     <h3><span>$</span>99</h3>
                                     <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Acheter</a>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3">
                             <div class="product-item">
                                 <div class="product-title">
                                     <a href="#">Nom du produit</a>
                                     <div class="ratting">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                     </div>
                                 </div>
                                 <div class="product-image">
                                     <a href="product-detail.html">
                                         <img src="/img/article/img4.jpg"  alt="Product Image">
                                     </a>
                                     <div class="product-action">
                                         <a href="#"><i class="fa fa-cart-plus"></i></a>
                                         <a href="#"><i class="fa fa-heart"></i></a>
                                         <a href="#"><i class="fa fa-search"></i></a>
                                     </div>
                                 </div>
                                 <div class="product-price">
                                     <h3><span>$</span>99</h3>
                                     <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Acheter</a>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3">
                             <div class="product-item">
                                 <div class="product-title">
                                     <a href="#">Nom du produit</a>
                                     <div class="ratting">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                     </div>
                                 </div>
                                 <div class="product-image">
                                     <a href="product-detail.html">
                                         <img src="/img/article/img5.jpg"  alt="Product Image">
                                     </a>
                                     <div class="product-action">
                                         <a href="#"><i class="fa fa-cart-plus"></i></a>
                                         <a href="#"><i class="fa fa-heart"></i></a>
                                         <a href="#"><i class="fa fa-search"></i></a>
                                     </div>
                                 </div>
                                 <div class="product-price">
                                     <h3><span>$</span>99</h3>
                                     <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Acheter</a>
                                 </div>
                             </div>
                         </div>
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