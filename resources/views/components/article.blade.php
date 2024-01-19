@php
    $url_article=route('product-detail',['id'=>$article->id]);
@endphp
<div>
    <div class="product-item">
        <div class="product-title">
            <a  href="{{ $url_article}}">{{$article->name}}</a>
            <div class="ratting">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
        <div class="product-image">
            <a href="{{ $url_article}}">
                <img src="{{asset($article->image->url)}}" alt="Product Image">
            </a>
            <div class="product-action">
                <span class="a" onclick="addArticleToCart({{$article->id}})"><i class="fa fa-cart-plus"></i></span>
                <span class="a" onclick="addArticleToWishList({{$article->id}})"><i class="fa fa-heart"></i></span>
                <a href="{{ $url_article}}"><i class="fa fa-search"></i></a>
            </div>
        </div>
        <div class="product-price">
            <h3>{{$article->prix}} <span>XAF</span></h3>
            <button class="btn" onclick="buyArticle({{$article->id}})"><i class="fa fa-shopping-carticle"></i>Acheter</button>
        </div>
    </div>
</div>