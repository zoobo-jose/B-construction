<!-- Side Bar Start -->
<div class="col-lg-4 sidebar">
    <div class="sidebar-widget category">
        <h2 class="title">Catégorie</h2>
        <nav class="navbar bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product-list')}}"><i class="fa fa-female"></i>Tout</a>
                </li>
                @foreach ($categoris as $cat)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product-list')."?categori=".$cat->id}}">
                        <i class="fa fa-female"></i>
                        {{$cat->name}}
                    </a>
                </li>
                @endforeach
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion beauté</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-child"></i>Vêtements Enfants et Bébés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Vêtements pour hommes et femmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets et accessoires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Électronique &
                        Accessoires</a>
                </li>
            -->
            </ul>
        </nav>
    </div>

    <div class="sidebar-widget widget-slider">
        <div class="sidebar-slider normal-slider">
            @foreach ($articles_sidebar as $art)
                <div class="product-item">
                    <div class="product-title">
                        <a href="#">{{$art->name}}</a>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="{{route('product-detail')}}">
                            <img src="{{asset($art->image->url)}}" alt="Product Image">
                        </a>
                        <div class="product-action">
                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                            <a href="#"><i class="fa fa-heart"></i></a>
                            <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3>{{$art->prix}} <span>XAF</span></h3>
                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Acheter</a>
                    </div>
                </div>
            @endforeach
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
                    <a href="{{route('product-detail')}}">
                        <img src="/img/article/img1.jpg" alt="Product Image">
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
                    <a href="{{route('product-detail')}}">
                        <img src="/img/article/img1.jpg" alt="Product Image">
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
                    <a href="{{route('product-detail')}}">
                        <img src="/img/article/img1.jpg" alt="Product Image">
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

    <div class="sidebar-widget brands">
        <h2 class="title">Nos marques</h2>
        <ul>
            <li><a href="#">Nulla </a><span>(45)</span></li>
            <li><a href="#">Curabitur </a><span>(34)</span></li>
            <li><a href="#">Nunc </a><span>(67)</span></li>
            <li><a href="#">Ullamcorper</a><span>(74)</span></li>
            <li><a href="#">Fusce </a><span>(89)</span></li>
            <li><a href="#">Sagittis</a><span>(28)</span></li>
        </ul>
    </div>

    <div class="sidebar-widget tag">
        <h2 class="title">Tags Cloud</h2>
        <a href="#">Lorem ipsum</a>
        <a href="#">Vivamus</a>
        <a href="#">Phasellus</a>
        <a href="#">pulvinar</a>
        <a href="#">Curabitur</a>
        <a href="#">Fusce</a>
        <a href="#">Sem quis</a>
        <a href="#">Mollis metus</a>
        <a href="#">Sit amet</a>
        <a href="#">Vel posuere</a>
        <a href="#">orci luctus</a>
        <a href="#">Nam lorem</a>
    </div>
</div>
<!-- Side Bar End -->