@extends('layouts-frontend.app')
@section('title', 'Home, Cofee-Shop || Cofee')
@section('content')
 
    

 
	<section class="appointment">
         
    	<div class="container">
            
    		<div class="row justify-content-center align-items-center py-sm-3 py-lg-5">
 
	    		<div class="col-md-6 appointment ftco-animate shadow border border-rounted">
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


	 
    
    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="row wrap justify-content-center">
	    		<div class="col-lg-10 info bg-transparent">
	    			<div class="row">
	    				<div class="col-md-4 ftco-animate">
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
	    		 
    		</div>
    	</div>
    </section>
 


	<section class="ftco-appointment bg-transparent">
	 <div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-6 d-flex align-self-stretch">
    				<div id="map"></div>
    			</div>
	    	   			
    		</div>
    	</div>
    </section>

 
   <section class="ftco-counter bg-transparent" id="section-counter">
	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-6 col-sm-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="100">0</strong>
		              	<span>Coffee Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-6 col-sm-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="85">0</strong>
		              	<span>Number of Awards</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-6 col-sm-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="10567">0</strong>
		              	<span>Happy Customer</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-6 col-sm-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
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
 

@endsection