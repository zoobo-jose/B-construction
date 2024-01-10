@extends('layout/base',['title'=>'liste de souhaits'])

@section('content')

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
                                    <th>Quantité</th>
                                    <th>Ajouter au panier</th>
                                    <th>Retirer</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="/img/article/img1.jpg"  alt="Image"></a>
                                            <p>Nom du produit</p>
                                        </div>
                                    </td>
                                    <td>$99</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td><button class="btn-cart">Ajouter au panier</button></td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="/img/article/img2.jpg"  alt="Image"></a>
                                            <p>Nom du produit</p>
                                        </div>
                                    </td>
                                    <td>$99</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td><button class="btn-cart">Ajouter au panier</button></td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="/img/article/img3.jpg"  alt="Image"></a>
                                            <p>Nom du produit</p>
                                        </div>
                                    </td>
                                    <td>$99</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td><button class="btn-cart">Ajouter au panier</button></td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="/img/article/img4.jpg"  alt="Image"></a>
                                            <p>Nom du produit</p>
                                        </div>
                                    </td>
                                    <td>$99</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td><button class="btn-cart">Ajouter au panier</button></td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="/img/article/img5.jpg"  alt="Image"></a>
                                            <p>Nom du produit</p>
                                        </div>
                                    </td>
                                    <td>$99</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td><button class="btn-cart">Ajouter au panier</button></td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wishlist End -->

@endsection