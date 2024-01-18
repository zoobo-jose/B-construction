<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{create_title_website($title)}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('/js/lib/slick/slick.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/js/lib/slick/slick-theme.css')}}" rel="stylesheet" type="text/css">

    <!-- Template Stylesheet -->
    <link href="{{asset("/css/style.css")}}" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    {{config('company.mail')}}
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    {{format_phone_number(config('company.contact1'))}}
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">

                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="{{ route('home') }}"
                            class="{{concat_chain_on_condition('nav-item nav-link ','active', Route::is('home'))}}">Maison</a>
                        <a href="{{ route('product-list') }}"
                            class="{{concat_chain_on_condition('nav-item nav-link ','active', Route::is('product-list'))}}">Produits</a>
                        @if(Auth::check())
                            <a href="{{ route('cart') }}"
                                class="{{concat_chain_on_condition('nav-item nav-link ','active', Route::is('cart')||Route::is('cart.delete'))}}">
                                Panier
                            </a>
                            <a href="{{ route('checkout') }}"
                            class="{{concat_chain_on_condition('nav-item nav-link ','active', Route::is('checkout'))}}">
                                verifier
                            </a>
                            <a href="{{ route('my-account') }}"
                            class="{{concat_chain_on_condition('nav-item nav-link ','active', Route::is('my-account'))}}">Mon
                                compte
                            </a>
                        @endif
                        <div class="nav-item dropdown">
                            <a href="#"
                                class="{{concat_chain_on_condition('nav-link dropdown-toggle ','active', route_Is(['login','wishlist','contact']))}}"
                                data-toggle="dropdown">plus de pages</a>
                            <div class="dropdown-menu">
                                @if(Auth::check())
                                    <a href="{{ route('wishlist') }}" class="dropdown-item">liste de souhaits</a>
                                @endif
                                @if(!Auth::check())
                                    <a href="{{ route('login') }}" class="dropdown-item">connecter & enregistrer</a>
                                @endif
                                <a href="{{ route('contact') }}" class="dropdown-item">Nous contacter</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">compte utlisateur</a>
                            <div class="dropdown-menu">
                                
                                @if(Auth::check())
                                 <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                     <a  class="dropdown-item" :href="route('logout')"
                                         onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        se deconnecter
                                    </a>
                                </form>
                                @endif
                                @if(!Auth::check())
                                    <a class="dropdown-item" href="{{route('login')}}">se connecter</a>
                                    <a href="#" class="dropdown-item" href="{{route('login')}}">s'enregistrer</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html">
                            <img src="img/logo_transparent.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="search"  method="get" action="{{ route('product-list') }}">
                        <input type="text" id="search" name="search" placeholder="Recherche">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="{{route('wishlist')}}" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span id="nbr_wishs">({{Auth::check()?count(Auth::user()->articles_wishs):0}})</span>
                        </a>
                        <a href="{{route('cart')}}" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span id="nbr_articles">({{Auth::check()?count(Auth::user()->articles_no_sold):0}})</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar end -->

    @if(!Route::is('home'))
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Maison</a></li>
                <li class="breadcrumb-item"><a href="#">Produits</a></li>
                <li class="breadcrumb-item active">{{$title}}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    @endif

    <div class="main-content">
        @yield('content',"contenu")
    </div>

    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Entrez en contact</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>{{ config('company.address')}}</p>
                            <p><i class="fa fa-envelope"></i>{{ config('company.mail')}}</p>
                            <p><i class="fa fa-phone"></i>{{ format_phone_number(config('company.contact1'))}}</p>
                            <p><i class="fa fa-phone"></i>{{ format_phone_number(config('company.contact2'))}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Suivez-nous</h2>
                        <div class="contact-info">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Information d'entreprise</h2>
                        <ul>
                            <li><a href="#">À propos de nous</a></li>
                            <li><a href="#">politique de confidentialité</a></li>
                            <li><a href="#">Termes et conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Informations d'achat</h2>
                        <ul>
                            <li><a href="#">Politique de paiement</a></li>
                            <li><a href="#">Politique d'expédition</a></li>
                            <li><a href="#">Politique de retour</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row payment align-items-center">
                <div class="col-md-6">
                    <div class="payment-method">
                        <h2>Nous acceptons:</h2>
                        <img src="img/payment-method.png" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Sécurisé par:</h2>
                        <img src="img/godaddy.svg" alt="Payment Security" />
                        <img src="img/norton.svg" alt="Payment Security" />
                        <img src="img/ssl.svg" alt="Payment Security" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="#">{{date('Y')}} {{config('company.name')}}</a>. All Rights Reserved</p>
                </div>
                <div class="col-md-6 template-by">
                    <p>Website By <a href="#">Nouvic corporation</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{asset('js/lib/easing/easing.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/slick/slick.min.js')}}"></script>

    <!-- Template Javascript -->
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/request.js')}}"></script>
   
</body>

</html>