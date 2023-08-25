<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <nav class="main-nav">
                        <a href="#" class="logo">
                            <img src="assets/images/logo.png">
                            <a class="menu-trigger">
                                <span>Menu</span>
                            </a>
                        </a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{url('/')}}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#menu">Products</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Builders</a></li> 
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                            <li class="scroll-to-section"><a href="#offers">Offers</a></li> 
                            <li class="scroll-to-section"><a href="#">
                                    @auth    
                                        <a href="{{url('/showcart',Auth::user()->id)}}">Cart[{{$count}}]</a>
                                    @endauth
                                    @guest
                                        Cart[0]
                                    @endguest
                            </a></li>
                            <li>    
                                @if (Route::has('login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                        @auth
                                        <li>
                                        <x-app-layout>
    
                                         </x-app-layout>
                                        
                                        @else
                                            <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                                            @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </li>
                        </ul>        
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <div id="top" style="padding-top: 200px;">
    <table align="center" bgcolor="orange">
        <tr>
            <th style="padding: 30px;">Product Name</th>
            <th style="padding: 30px;">Price</th>
            <th style="padding: 30px;">Quantity</th>
            <th style="padding: 30px;">Action</th>
        </tr>

        <form action="{{url('orderconfirm')}}" method="POST">
            @csrf
        @foreach($data as $data)
        <tr align="center">
            <td><input type="text" name="productname[]" value="{{$data->title}}" hidden="">{{$data->title}}</td>
            <td><input type="text" name="price[]" value="{{$data->price}}" hidden="">{{$data->price}}</td>
            <td><input type="text" name="quantity[]" value="{{$data->quantity}}" hidden="">{{$data->quantity}}</td>
        </tr>
        @endforeach
        @foreach($data2 as $data2)
        <tr style="position: relative; top: -60px; right: -360px;">
            <td><a href="{{url('/remove',$data2->id)}}" class="btn btn-warning">Remove</td>
        </tr>
        @endforeach
    </table>

    <div align="center" style="padding: 10px;">
    <button class="btn btn-primary" id="order" type="button">Order Now</button>
    </div>

    <div id="appear" align="center" style="padding: 10px; display:none;">
        <div style="padding: 10px;">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name">
        </div>
        <div style="padding: 10px;">
            <label>Contact Details</label>
            <input type="number" name="phone" placeholder="Phone Number">
        </div>
        <div style="padding: 10px;">
            <label>Address</label>
            <input type="text" name="address" placeholder="Address">
        </div>
        <div style="padding: 10px;">
            <button id="confirm" class="btn btn-success">Order Confirm</button>
            <button id="cancel" type="button" class="btn btn-danger">Cancel</button>
        </div>
    </div>

    </form>

            <script type="text/javascript">
                 $("#order").click(function() {
                    $("#appear").show();
                });
                $("#cancel").click(function() {
                    $("#appear").hide();
                });
            </script>

        
        <!-- jQuery -->
        <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
            $("."+selectedClass).fadeIn();
            $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
    </body>
    </html>