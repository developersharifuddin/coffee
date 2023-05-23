@extends('layouts-frontend.app')
@section('title', 'product single | Cofee')
@section('content')
  

    <section class="ftco-section">
		<div class="container mb-lg-5">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">View Product</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('fontend.index')}}">Home</a></span><span>></span> <span>view Product</span></p>
            </div>

          </div>
        </div>
    	<div class="container">
    		<div class="row justify-content-center">
				 <div class="col-lg-6 mb-5 ftco-animate text-end">
    				<a href="{{asset('uploads/item/'.$viewproduct->image)}}" class="image-popup"><img src="{{asset('uploads/item/'.$viewproduct->image)}}" class="img-fluid" alt="Colorlib Template" style="max-height:400px;float:right"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">

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

    				<h3>{{$viewproduct->item_name}}</h3>
    				<p class="price"> <span>$ {{$viewproduct->price}}</span></p>
    				<p>{{$viewproduct->description}}</p>
    				 <div class="row mt-4">
							<div class="col-md-6">
					 
							</div>
							<div class="w-100"></div>
				<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="icon-minus"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	
					 <span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="icon-plus"></i>
	                 </button>
	             	</span>

                       
					<span class="input-group-btn ml-2">
	                <input type="text" id="price" name="price" class="form-control input-number w-100 border-0 mt-2" value="{{$viewproduct->price}}" min="{{$viewproduct->price}}" max="1000">
	             	</span> 
					  
                    <input type="hidden" name="item_id" value="{{$viewproduct->id}}" class="form-control">                    
                    <input type="hidden" name="total" value="1" class="form-control">     
                    
					@if (Route::has('login'))
					@auth
					<button type="submit" class="btn btn-primary pull-right mt-4"><span class="text-dark">Add to Cart</span></button>
						@else
						<button class="btn btn-primary pull-right mt-4"><a class="text-dark" href="{{route('user.login')}}">Add to Cart</a></button>
												
					@endauth
					@endif
                     <div class="clearfix"></div>
                  </form>

 
	          	</div>
          	 </div>
          	</div>
            
    	</div>
      </div>
    </section>
 @push('js')
 <script>
		$(document).ready(function(){

	var quantitiy=0;
    var price = 0;
    var fixprice = parseInt('{{$viewproduct->price}}');

		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        var price = parseInt($('#price').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);
		            $('#price').val(price + fixprice);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
				var price = parseInt($('#price').val());
		        
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
					$('#price').val(price - fixprice);
		            }
		    });
		    
		});
	</script>
 
 @endpush
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Related products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
			@foreach($items as $item)
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="{{route('fontend.viewproduct',$item->id)}}" class="img" style="background-image:url('{{asset('uploads/item/'.$item->image)}}')"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="{{route('fontend.viewproduct',$item->id)}}">{{$item->item_name}}</a></h3>
    						<p class="descriptions">{{$item->description}}</p>
    						<p class="price"><span>$ {{$item->price}}</span></p>

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
  
  @endsection
