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
  <!-- !Important notice -->
  <!-- Only for product page body tag have to added .productPage class -->
  <body class="productPage">

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
                <a class="aa-cart-link" href="{{url('/cart')}}">
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
                  <button type="submit" ><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
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
            <li><a href="{{url('/cart')}}">My Cart</a></li>
           <li><a href="{{url('/wishlists')}}">Wishlist</a></li>
           <li><a href="{{url('/login')}}">My Account</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
</section>
  <!-- / menu -->

<section id="aa-product-category">
    <div class="container">
      <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
        <div class="aa-product-catg-content">
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
      <?php $cat_name=DB::table('categories')->select('name')->where('id',$id_)->get(); ?>
            <div class="aa-product-catg-body">
            <ul class="aa-product-catg" >
                @forelse($items as $item)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{url('/product-detail',$item->id)}}"><img src="{{asset($item->image)}}" alt="polo shirt img" height="300px"
                        width="250px"></a>
                    <a class="aa-add-card-btn"href="{{ route('cart',['id'=> $item->id]) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#">{{$item->name}}</a></h4>
                      <span class="aa-product-price">${{$item->price}}</span>
                    </figcaption>
                  </figure>
                  <div class="aa-product-hvr-content">
                    <a href="{{url('/product-detail',$item->id)}}" data-toggle2="tooltip" data-placement="top" title="View-detail" data-toggle="modal"><span class="fa fa-search"></span></a>
                   <a href="{{ route('wishlists',['id'=> $item->id]) }}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  </div>
                </li>
                @empty
       <center><h3>No product found</h3></center>
                @endforelse
              </ul>
          </ul>

            </div>
     <center>{!! $items->links() !!}</center>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                <li><a href="{{url('product/all')}}">All</a></li>
                @foreach($categories as $item)
                <li><a href="{{url('product',$item->id)}}" >{{ $item->name  }}</a></li>
               @endforeach
              </ul>
            </div>
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>
              <!-- price range -->
              <div class="aa-sidebar-price-range">
                <form action="{{url('product/all')}}" method="GET"
                  <div class="d-flex align-items-center mt-4 pb-1">
                    <div class="md-form md-outline my-0">
                      <input id="from" type="text" class="form-control mb-0" name="min_price">
                      <label for="form">$ Min</label>
                    </div>
                    <p class="px-2 mb-0 text-muted"> - </p>
                    <div class="md-form md-outline my-0">
                      <input id="to" type="text" class="form-control mb-0" name="max_price">
                      <label for="to">$ Max</label>
                    </div>
                  </div>
                 <center><button class="aa-filter-btn" type="submit" value="Filter">Filter</button></center>
                </form>
            </br></br>
              </div>
             </div>
    </div>
  </section>
</br>
</br>
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

