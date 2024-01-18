@extends('layout/base',['title'=>'liste de souhaits'])

@section('content')
@php
   $user=Auth::user();
@endphp
<!-- Wishlist Start -->
<div class="wishlist-page">
    <div class="container-fluid">
        <div class="wishlist-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Ajouter au panier</th>
                                    <th>Retirer</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @foreach ($user->articles_wishs as $art)
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="{{asset($art->image->url)}}"  alt="Image"></a>
                                            <p>{{$art->name}}</p>
                                        </div>
                                    </td>
                                    <td>{{$art->prix}} XAF</td>
                                    <td><button class="btn-cart" onclick="addArticleToCart({{$art->id}})">Ajouter au panier</button></td>
                                    <td>
                                        <form method="post" action="{{ route('wishlist.delete') }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{$art->id}}" id="article_id" name="article_id">
                                            <button><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(isset($article_removed))
    @if($article_removed['deleted'])
        <script type="text/javascript">
            Swal.fire("{{$article_removed['article_name'].' enleve de la liste de souhait'}}");
        </script>
    @endif
 @endif
<!-- Wishlist End -->

@endsection