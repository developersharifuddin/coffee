@extends('layouts-frontend.app')
@section('title', 'Home, Cofee-Shop || Cofee')
@section('content')
 
    <section class="home-slider owl-carousel">
	 @foreach($sliders as $slider)
      <div class="slider-item" style="background: url('{{asset('uploads/slider/'.$slider->image)}}');background-size: cover; background-repeat :no-repeat">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">{{$slider->title}}</h1>
              <p class="mb-4 mb-md-5">{{$slider->sub_title}}</p>
              <p><a href="{{route('fontend.shop')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="{{route('fontend.menu')}}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
            </div>

          </div>
        </div>
      </div>
	   @endforeach
  
    </section>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
	    		<div class="info">
	    			<div class="row no-gutters">
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
	    						<h3>000 (123) 456 7890</h3>
	    						<p>A small river named Duden flows by their place and supplies.</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
	    						<h3>198 West 21th Street</h3>
	    						<p>	203 Fake St. Mountain View, San Francisco, California, USA</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Open Monday-Friday</h3>
	    						<p>8:00am - 9:00pm</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="book p-4">
	    			<h3>Book a Table</h3>
	    			<form  class="appointment-form" method="POST" action="{{route('sentReservation')}}">
                                @csrf
                            

					<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" name="name" class="form-control" placeholder="Name">
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="email"  name="email" class="form-control" placeholder="Last Name">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-md-calendar"></span></div>
		            		<input type="text" name="date" class="form-control appointment_date" placeholder="Date">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-ios-clock"></span></div>
		            		<input type="text" name="time" class="form-control appointment_time" placeholder="Time">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" name="phone" class="form-control" placeholder="Phone">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		              <textarea name="description" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
		            </div>
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Appointment" class="btn btn-white py-3 px-4">
		            </div>
	    				</div>
	    			</form>
	    		</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url(images/about.jpg);"></div>
    	<div class="one-half ftco-animate">
    		<div class="overlap">
	        <div class="heading-section ftco-animate ">
	        	<span class="subheading">Discover</span>
	          <h2 class="mb-4">Our Story</h2>
	        </div>
	        <div>
	  				<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
	  			</div>
  			</div>
    	</div>
    </section>
 
 
 
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Best Coffee Sellers</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
			            @php
						$products = DB::table('items')->where('category_id', 1)->orderBy('created_at','DESC')->get()->take(8);
						@endphp
			@foreach($products as $item)
			<div class="col-md-3">
				
        		<div class="menu-entry">
						<a href="{{route('fontend.viewproduct',$item->id)}}" class="img" style="background-image: url('{{asset('uploads/item/'.$item->image)}}');"></a>
    					<div class="text text-center pt-4">
							<a href="{{route('fontend.viewproduct',$item->id)}}">
        	                <h3>{{$item->item_name}}</h3>
    						<p class="descriptions">{{$item->description}}</p>
						    <p class="price"><span>$ {{$item->price}} </span></p>
									 </a>					
                    <form action="{{route('carts.store')}}" method="POST"  enctype="multipart/form-data">
                       @csrf

                       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                   
                    <input type="hidden" name="item_id" value="{{$item->id}}" class="form-control">                    
                    <input type="hidden" name="quantity" value="1" class="form-control">                        
                    <input type="hidden" name="total" value="1" class="form-control">     
                    <input type="hidden" name="price" value="{{$item->price}}" class="form-control">  
                         
                  
                    <button type="submit" class="btn btn-primary pull-right mt-4">Add to Cart</button>
                    <div class="clearfix"></div>
                  </form>
					
                     
    					</div>
    				</div>
        	</div> 
         @endforeach
        </div>
    	</div>
    </section>

    <section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>

	 

    <section class="ftco-menu mb-5 pb-5">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away,, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">

		          <div class="col-md-12 nav-link-wrap mb-5">
					 <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						@foreach($categorys as $key=>$category)
						<a class="nav-link {{$key==0 ? 'active' : ''}}" id="v-pills-{{$category->id}}-tab" data-toggle="pill" href="#{{$category->id}}" role="tab" aria-controls="{{$category->id}}" aria-selected="true">{{$category->name}}</a>
						@endforeach
		             </div>
				  </div>

		        <div class="col-md-12 d-flex align-items-center">
		            
				  <div class="tab-content ftco-animate" id="v-pills-tabContent">
					@foreach($categorys as $key=>$category)
		              <div class="tab-pane fade show {{$key==0 ? 'active' : ''}}" id="{{$category->id}}" role="tabpanel" aria-labelledby="v-pills-{{$category->id}}-tab">
		              	<div class="row">

						@php
						$products = DB::table('items')->where('category_id', $category->id)->orderBy('created_at','DESC')->get()->take(10);
						@endphp

						@foreach($products as $item)
						<a href="{{route('fontend.viewproduct',$item->id)}}">
		              		<div class="col-md-4 text-center" style="min-width:300px; max-width: 350px;">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url('{{asset('uploads/item/'.$item->image)}}');"></a>
		              				<div class="text">
		              					<h3><a href="#">{{ $item->item_name}}</a></h3>
		              					<p class="descriptions">{{ $item->description}}</p>
		              					<p class="price"><span>$ {{ $item->price}}</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
						</a>
					    @endforeach  


		              	</div>
		              </div>
					  @endforeach
 
                    </div>
					
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>
 
   <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="100">0</strong>
		              	<span>Coffee Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="85">0</strong>
		              	<span>Number of Awards</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="10567">0</strong>
		              	<span>Happy Customer</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="900">0</strong>
		              	<span>Staff</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>

	 
		
		<section class="ftco-appointment">
			<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-6 d-flex align-self-stretch">
    				<div id="map"></div>
    			</div>
	    		<div class="col-md-6 appointment ftco-animate">
	    			<h3 class="mb-3">Book a Table</h3>
	    				    			<form  class="appointment-form" method="POST" action="{{route('sentReservation')}}">
                                @csrf
                            

					<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" name="name" class="form-control" placeholder="Name">
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="email"  name="email" class="form-control" placeholder="Last Name">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-md-calendar"></span></div>
		            		<input type="text" name="date" class="form-control appointment_date" placeholder="Date">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-ios-clock"></span></div>
		            		<input type="text" name="time" class="form-control appointment_time" placeholder="Time">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" name="phone" class="form-control" placeholder="Phone">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		              <textarea name="description" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
		            </div>
                    <div class="form-group ml-md-4">
		              <input type="submit" value="Appointment" class="btn btn-primary py-3 px-4">
		            </div>  
	    				</div>
	    			</form>
	    		</div>    			
    		</div>
    	</div>
    </section>

@endsection