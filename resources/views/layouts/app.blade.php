<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') {{!empty($meta_title)? $meta_title : ''}} </title>

    @if (!empty($meta_Keywords))
    <meta name="Keywords" content="{{$meta_Keywords}}" @endif @if (!empty($meta_Description)) <meta name="Description" content="{{$meta_Description}}">
    @endif

    <!-- Google Font -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap')}}" rel="stylesheet">

    <!-- Css Styles -->
    <script src="{{url('')}}/tt/wNumb.js"></script>
    <script src="{{url('')}}/tt/bootstrap-input-spinner.js"></script>
    <script src="{{url('')}}/tt/nouislider.min.js"></script>

    <link rel="stylesheet" href="{{url('https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://unpkg.com/bs-brain@2.0.3/components/logins/login-4/assets/css/login-4.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!--    <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">

                @guest
                <a href="/Login">Sign in</a>
                @endguest
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{url('')}}/img/icon/search.png" alt=""></a>
            <a href="#"><img src="{{url('')}}/img/icon/heart.png" alt=""></a>
            <a href="{{url('Cart')}}"><img src="{{url('')}}/img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price"></div>

        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">

                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">

                                @guest
                                <a href="/Login">Sign in</a>
                                @endguest

                                <a href="#">FAQs</a>
                            </div>
                            <div class="header__top__hover">
                                <span>Usd <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>USD</li>
                                    <li>EUR</li>
                                    <li>USD</li>
                                </ul>
                            </div>

                            <div class="header__top__links">
                                <a href="/admin/dashboard">Go To Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="/"><img src="{{url('')}}/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="/">Home</a></li>

                            @php
                            $getCategoryHeader =App\Models\CategoryModel::getRecordMenu();

                            @endphp
                            <li><a href="#">Categories</a>
                                <ul class="dropdown">

                                    @foreach ($getCategoryHeader as $value)

                                    <li><a href="{{url('List',$value->slug)}}">{{$value->name}}</a></li>
                                    @endforeach



                                </ul>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="/About">About Us</a></li>
                                    <li><a href="/ShopDetails">Shop Details</a></li>
                                    <li><a href="/Cart">Shopping Cart</a></li>
                                    <li><a href="/CheckOut">Check Out</a></li>

                                </ul>
                            </li>

                            <li><a href="/Contact">Contacts</a></li>
                    </nav>
                </div>
                <!--   desktop -->
                <div class="col-lg-3 col-md-3">

                    <div class="header__nav__option">

                        <form action="{{ route('logout') }}" method="get">
                            <a href="#" class="search-switch"><img src="{{url('')}}/img/icon/search.png" alt=""></a>

                            <a href="{{url('Cart')}}"><img src="{{url('')}}/img/icon/cart.png" alt=""> <span>0</span></a>
                            
                            @auth
                            @csrf

                            <a href="/profile">
                                <img src="img/icon/user.png" width="18px" alt="">
                            </a>
                            <button class="btn btn-primary btn-sm" type="submit">Logout</button>
                            @endauth

                        </form>

                        <!--  <div class="price"></div> -->
                    </div>



                </div>


            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- content Section End -->
    <main>
        @yield('content')
    </main>


    <!-- content Section End -->




    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{url('')}}/img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="{{url('')}}/img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="/Contact">Contact Us</a></li>
                            <li><a href="/ShoppingCart">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">

                        <div class="hero__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{url('')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('')}}/js/bootstrap.min.js"></script>
    <script src="{{url('')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{url('')}}/js/jquery.nicescroll.min.js"></script>
    <script src="{{url('')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{url('')}}/js/jquery.countdown.min.js"></script>
    <script src="{{url('')}}/js/jquery.slicknav.js"></script>
    <script src="{{url('')}}/js/mixitup.min.js"></script>
    <script src="{{url('')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('')}}/js/main.js"></script>
    <script src="{{url('')}}/js/wNumb.js"></script>
    <script src="{{url('')}}/js/bootstrap-input-spinner.js"></script>
    <script src="{{url('')}}/js/nouislider.min.js"></script>



    <!--  <script src="assets\tinymce\jQuery.js"></script> -->

</body>

</html>