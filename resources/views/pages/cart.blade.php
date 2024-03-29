@extends('layout/base',['title'=>'parnier'])

@section('content')

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
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th>Retirer</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="/img/article/img1.jpg" alt="Image"></a>
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
                                    <td>$99</td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="/img/article/img2.jpg" alt="Image"></a>
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
                                    <td>$99</td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="/img/article/img3.jpg" alt="Image"></a>
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
                                    <td>$99</td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="/img/article/img4.jpg" alt="Image"></a>
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
                                    <td>$99</td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="/img/article/img5.jpg" alt="Image"></a>
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
                                    <td>$99</td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
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
                                    <p>Sous-total<span>$99</span></p>
                                    <p>Frais de livraison<span>$1</span></p>
                                    <h2>Grand Total<span>$100</span></h2>
                                </div>
                                <div class="cart-btn">
                                    <button>Mise à jou</button>
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
@endsection