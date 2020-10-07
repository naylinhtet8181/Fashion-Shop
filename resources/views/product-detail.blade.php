<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Daily Shop | Product</title>

    <!-- Font awesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.simpleLens.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nouislider.css') }}">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('css/theme-color/default-theme.css') }}" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="{{ asset('css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <!-- wpf loader Two -->
    <div id="wpf-loader-two">
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div>
    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


    <!-- Start header section -->
    <header id="aa-header">
      <!-- start header top  -->

      <!-- / header top  -->

      <!-- start header bottom  -->
      <div class="aa-header-bottom" id="search">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="aa-header-bottom-area">
                <!-- logo  -->
                <div class="aa-logo">
                  <!-- Text based logo -->
                  <a href="index.html">
                    <span class="fa fa-shopping-cart"></span>
                    <p>Fashion<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                  </a>
                  <!-- img based logo -->
                  <!-- <a href="index.html"><img src="{{ asset('img/logo.jpg') }}" alt="logo img"></a> -->
                </div>
                <!-- / logo  -->
                <!-- cart box -->
                <div class="aa-cartbox">
                  <a class="aa-cart-link" href="">
                    <span class="fa fa-shopping-basket"></span>
                    <span class="aa-cart-title">SHOPPING CART</span>
                    <span class="aa-cart-notify">{{ $qty }}</span>
                  </a>
                </div>
                <!-- / cart box -->
                <!-- search box -->
                <div class="aa-search-box">
                  <form action="{{url('search')}}">
                    <input type="text" name="searchData" id="" placeholder="Search here ex. 'shoe' ">
                    <button type="submit"><span class="fa fa-search"></span></button>
                  </form>
                </div>
                <!-- / search box -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- / header section -->
    <!-- menu -->
    <section id="menu">
      <div class="container">
        <div class="menu-area">
          <!-- Navbar -->
          <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="navbar-collapse collapse">
              <!-- Left nav -->
              <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}">Home</a></li>
                @foreach($categories->take(4) as $category)
                <li><a href="{{url('product',$category->id)}}">{{ $category->name }}</a></li>
                @endforeach
                <li><a href="{{url('/cart')}}" id="mycart">My Cart</a></li>
               <li><a href="{{url('/wishlists')}}" id="whilist">Wishlist</a></li>
               <li><a href="{{url('/login')}}">My Account</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
    </section>
      <!-- / menu -->

  <!-- product category -->
  <section id="aa-product-details">
    @if ($message = Session::get('fail'))
    <div class="alert alert-danger">
        <p id="bt2">{{ $message }}<button id="bt1"><fa class="fa fa-close"></fa></button></p>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}<button id="bt1"><fa class="fa fa-close"></fa></button></p>
    </div>
    @endif
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            @foreach($items as $item)
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <form action="">
                  <div class="aa-product-view-slider">
                    <div id="demo-1" class="simpleLens-gallery-container">
             <a class="simpleLens-lens-image"><img src="{{asset($item->image)}}" class="simpleLens-big-image" height="300px"
            width="280px"></a>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
            <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{ $item->name }}</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">${{ $item->price }}</span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                    </div>
                    <br>
                    <p>{{ $item->description }}</p>
                    <div class="aa-prod-quantity">
                      <p class="aa-prod-category">
                        Category: <a href="{{url('product',$item->category_id)}}">{{ $item->category->name }}</a>
                      </p>
                    </form>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="{{ route('cart',['id'=> $item->id]) }}">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="{{ route('wishlists',['id'=> $item->id]) }}">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div class="aa-product-details-bottom">
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach($cat_item as $item)
                     <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img src="{{asset($item->image)}}" alt="polo shirt img" height="300px"
                        width="250px"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#">{{$item->name}}</a></h4>
                      <span class="aa-product-price">${{$item->price}}</span>
                    </figcaption>
                  </figure>
                  <div class="aa-product-hvr-content">
                    <a href="{{url('product-detail',$item->id)}}" data-toggle2="tooltip" data-placement="top" title="View-detail" data-toggle="modal"><span class="fa fa-search"></span></a>
                    <a href="{{ route('wishlists',['id'=> $item->id]) }}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  </div>
                </li>
                @endforeach
            </br>
              </ul>
           </div>
           <center>{!! $cat_item->links() !!}</center>
          </div>
        </div>
         </div>
    </div>
  </section>
  <!-- / product category -->

<!-- footer -->
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#aa-support-area">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#search">Search</a></li>
                      <li><a href="#search">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>




  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{ asset('js/jquery.smartmenus.js') }}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{ asset('js/jquery.smartmenus.bootstrap.js') }}"></script>
  <!-- To Slider JS -->
  <script src="{{ asset('js/sequence.js') }}"></script>
  <script src="{{ asset('js/sequence-theme.modern-slide-in.js') }}"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="{{ asset('js/jquery.simpleGallery.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.simpleLens.js') }}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{ asset('js/nouislider.js') }}"></script>
  <!-- Custom js -->
  <script src="{{ asset('js/custom.js') }}"></script>
  </body>
</html>
<style>
    #bt1{
     float:right;
    }

    </style>
