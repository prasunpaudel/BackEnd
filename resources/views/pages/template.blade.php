<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Beautiflie</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('site/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('site/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('site/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('site/images/fevicon.png') }}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('site/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Open+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{asset('site/css/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-light bg-light justify-content-between">
               <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="{{route('getSite')}}">Home</a>
                  <a href="">Products</a>
                  <a href="">About</a>
                  <a href="">Client</a>
                  <a href="">Contact</a>
               </div>
               <span class="toggle_icon" onclick="openNav()"><img src="{{asset('site/images/toggle-icon.png')}}"></span>
               <a class="logo" href="index.html"><img src="{{asset('site/images/logo.png')}}"></a></a>
               <form class="form-inline ">
                  <div class="login_text">
                     <ul>
                        <li><a href="#"><img src="{{asset('site/images/user-icon.png')}}"></a></li>
                        <li><a href="{{ route('shopping')  }}"><img src="{{asset('site/images/bag-icon.png')}}"></a></li>
                        <li><a href="#"><img src="{{asset('site/images/search-icon.png')}}"></a></li>
                     </ul>
                  </div>
               </form>
            </nav>
         </div>
      </div>
      <!-- header section end -->
        @yield('content')
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="{{asset('site/images/footer-logo.png')}}"></a></div>
            <div class="contact_section_2">
               <div class="row">
                  <div class="col-sm-4">
                     <h3 class="address_text">Contact Us</h3>
                     <div class="address_bt">
                        <ul>
                           <li>
                              <a href="#">
                              <i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left10">Address : Loram Ipusm</span>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                              <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left10">Call : +01 1234567890</span>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                              <i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left10">Email : demo@gmail.com</span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="footer_logo_1"><a href="index.html"><img src="{{asset('site/images/footer-logo.png')}}"></a></div>
                     <p class="dummy_text">commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>
                  </div>
                  <div class="col-sm-4">
                     <div class="main">
                        <h3 class="address_text">Best Products</h3>
                        <p class="ipsum_text">dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="social_icon">
               <ul>
                  <li>
                     <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  </li>
                  <li>
                     <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  </li>
                  <li>
                     <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  </li>
                  <li>
                     <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{ asset('site/js/jquery.min.js') }}"></script>
      <script src="{{ asset('site/js/popper.min.js') }}"></script>
      <script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('site/js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('site/js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('site/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('site/js/custom.js') }}"></script>
      <!-- javascript --> 
      <script src="{{ asset('site/js/owl.carousel.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "100%";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script> 
   </body>
</html>