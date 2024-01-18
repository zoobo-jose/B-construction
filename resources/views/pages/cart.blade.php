@extends('layout/base',['title'=>'parnier'])

@section('content')
@php
   $user=Auth::user();
@endphp
<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    {{-- <th>Quantité</th>
                                    <th>Total</th> --}}
                                    <th>Retirer</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @foreach ($user->articles_no_sold as $art)
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="{{route('product-detail',['id'=>$art->id])}}"><img src="{{asset($art->image->url)}}" alt="Image"></a>
                                            <p>{{$art->name}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        {{$art->prix}} XAF
                                    </td>
                                    {{-- <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td> --}}
                                    {{-- <td>$99</td> --}}
                                    <td>
                                        <form method="post" action="{{ route('cart.delete') }}">
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
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="coupon">
                                <input type="text" placeholder="Coupon Code">
                                <button>Appliquer</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Résumé</h1>
                                    {{-- <p>Sous-total<span>$99</span></p>
                                    <p>Frais de livraison<span>$1</span></p> --}}
                                    <h2>Grand Total<span>{{ $total_prize}} XAF</span></h2>
                                </div>
                                <div class="cart-btn">
                                    <button>Mise à jour</button>
                                    <button>Vérifier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

@if(isset($article_removed))
    @if($article_removed['deleted'])
        <script type="text/javascript">
            Swal.fire("{{$article_removed['article_name'].' enleve du panier'}}");
        </script>
    @endif
 @endif
@endsection