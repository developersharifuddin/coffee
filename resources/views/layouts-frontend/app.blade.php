
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->

    <link rel="stylesheet" href="{{asset('fontend/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/animate.css">
    
    <link rel="stylesheet" href="{{asset('fontend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{asset('fontend')}}/css/aos.css">

    <link rel="stylesheet" href="{{asset('fontend')}}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset('fontend')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="{{asset('fontend')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/icomoon.css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style type="text/css">
    body {
      font-family: "Poppins", Arial, sans-serif;
      background: #151111;
      font-size: 15px;
      line-height: 1.8;
      font-weight: 300;
      color: gray;  
      background: url('{{asset('images/bg_4.jpg')}}') no-repeat fixed;
      background-size: cover; 
    }

    </style>
    @stack('css')
  </head>
  <body>
  	
  @include('layouts-frontend.partial.header')

  <div class="content bg-dar" id="content" style="background-image: url(images/bg_4.jp); background-size:cover; background-repeat:no-repeat">
  @yield('content')
  </div>                    
   

  @include('layouts-frontend.partial.footer')
 
  <script src="{{asset('fontend')}}/js/jquery.min.js"></script>
  <script src="{{asset('fontend')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{asset('fontend')}}/js/popper.min.js"></script>
  <script src="{{asset('fontend')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('fontend')}}/js/jquery.easing.1.3.js"></script>
  <script src="{{asset('fontend')}}/js/jquery.waypoints.min.js"></script>
  <script src="{{asset('fontend')}}/js/jquery.stellar.min.js"></script>
  <script src="{{asset('fontend')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('fontend')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('fontend')}}/js/aos.js"></script>
  <script src="{{asset('fontend')}}/js/jquery.animateNumber.min.js"></script>
  <script src="{{asset('fontend')}}/js/bootstrap-datepicker.js"></script>
  <script src="{{asset('fontend')}}/js/jquery.timepicker.min.js"></script>
  <script src="{{asset('fontend')}}/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('fontend')}}/js/google-map.js"></script>
  <script src="{{asset('fontend')}}/js/main.js"></script>
  <link rel="stylesheet" href="{{asset('backend/plugins/sweetalert/sweetalert.min.js')}}">
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        

 <script type="text/javascript">
                        $(document).on("click","#logout", function(e){
                          e.preventDefault();
                         var link = $(this).attr("href");
                                                  
                            swal({
                           title: "Are You Want to Logout!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                          })
                          .then((willDelete) => {
                            if (willDelete) {
                             window.location.href = link;
                            } else {
                              swal("Not Logout!");
                            }
                          });
                        
                        });
            </script>

 
    @if($errors->any())
    @foreach($errors->all() as $error)
    <script>
    toastr.error('{{$error}}')
    </script>
    @endforeach
    @endif

  {!! Toastr::message() !!}
  
    @stack('js')
 
  </body>
</html>

 