<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Coffee<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item {{Request::is('home*') ? 'active' : '' }}"><a href="{{route('fontend.index')}}" class="nav-link">Home</a></li>
	          <li class="nav-item {{Request::is('menu') ? 'active' : '' }}"><a href="{{route('fontend.menu')}}" class="nav-link">Menu</a></li>
	          <li class="nav-item {{Request::is('shop') ? 'active' : '' }}"><a href="{{route('fontend.shop')}}" class="nav-link">Shoping</a></li>
	          <!-- <li class="nav-item {{Request::is('services') ? 'active' : '' }}"><a href="{{route('fontend.services')}}" class="nav-link">Services</a></li> -->
	          <li class="nav-item {{Request::is('blog') ? 'active' : '' }}"><a href="{{route('fontend.blog')}}" class="nav-link">Blog</a></li>
	          <li class="nav-item {{Request::is('about') ? 'active' : '' }}"><a href="{{route('fontend.about')}}" class="nav-link">About</a></li>	          
	           <li class="nav-item {{Request::is('reservation') ? 'active' : '' }}"><a href="{{route('fontend.reservation')}}" class="nav-link">Booking</a></li>	          
	          <li class="nav-item {{Request::is('contact') ? 'active' : '' }}"><a href="{{route('fontend.contact')}}" class="nav-link">Contact</a></li>
	          
            @php
            if(Auth()->user()){
            $cartcount = DB::table('carts')->where('user_id', Auth()->user()->id)->count();
              }else{
             }
           @endphp

           
            <li class="nav-item cart {{Request::is('cart') ? 'active' : '' }}"><a href="{{route('fontend.cart')}}" class="nav-link"><span class="icon icon-shopping_cart"></span>
             
            @if (Route::has('login'))
             @auth
             <span class="bag d-flex justify-content-center align-items-center"><small>{{ $cartcount}}</small></span>
              @endauth
             @endif</a></li>
	             


    @if (Route::has('login'))
    @auth
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" 
			    aria-haspopup="true" aria-expanded="false"> 
          <span class="badge badge-danger text-white shadow">{{ Auth::user()->name }}</span>
			   <span class="icon icon-user" style="font-size: x-large; color:white"></span>
         </a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
             <a class="dropdown-item bg-transparent" href="{{route('fontend.profile')}}">Profile</a>
             <a class="dropdown-item bg-transparent" href="{{route('fontend.myorder')}}">My Orders</a>
              
                    
             <a class="dropdown-item bg-transparent" id="logout" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form> 
        </div>
            </li>
         @else
            <li class="nav-item mt-3">
                 <a href="{{ route('user.login') }}" class="px-3 text-white">Log in</a>
             </li> 
                
             @endauth
                                
         @endif


 
			</ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

