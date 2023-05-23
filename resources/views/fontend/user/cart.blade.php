@extends('layouts-frontend.app')
@section('title', 'card | Cofee')
@section('content')
 

		<section class="ftco-section ftco-cart">
				<div class="container">
				<div class="row slider-text justify-content-center align-items-center">

					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h3 class="mb-3 bread">Cart</h3>
						<p class="breadcrumbs"><span class="mr-2"><a href="{{route('fontend.index')}}">Home</a></span><span>></span> <span>cart</span></p>
					</div>

				</div>
				</div>
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						         
						        <th>Product_Id</th>
								<th>Product</th>
						        <th>Product Name</th>
						        <th>Basic Price</th>
						        <th>Quantity</th> 
								<th>Price</th>
						      </tr>
						    </thead>
						    <tbody>
 					
						      <tr class="text-center">
						<form id="delete-form-{{$cart->id}}" action="{{route('carts.update', $cart->id)}}"  method="post">
                        @csrf
                        @method('PUT')
                               <td class="product-id">
						        	<p>CF-{{$cart->item->id}}</p>
						        </td>

						        <td class="image-prod"><div class="img" style="background: url('{{asset('uploads/item/'.$cart->item->image)}}');background-size: cover;"></div></td>
						        
						        <td class="product-name">
						        	<h3>{{$cart->item->item_name}}</h3>
						        	<p class="descriptions">{{$cart->item->description}}</p>
						        </td>
						        
						        <td class="price">{{$cart->item->price}}</td>
						        
						        <td class="quantity">
						        	<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
								      <i class="icon-minus"></i>
									</button>
									</span>
								    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="{{$cart->quantity}}" min="1" max="1000" >
								
									<span class="input-group-btn ml-2">
										<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="icon-plus"></i>
									</button>
									</span>
					          </td>

							  <td>
							  	<span class="input-group">
								<input type="btn" id="price" name="price" class="input-number w-50 bg-transparent border-0 text-white" value="{{$cart->price}}" min="{{$cart->price}}" max="1000" disabled>
								</span>
							 
								</td>
						<td>
							<input type="hidden" name="item_id" value="{{$cart->id}}">
							<input type="hidden" name="price" value="{{$cart->price}}">
						</td>
					
						    </tr><!-- END TR-->


                          

						    </tbody>
							
						  </table>
						  
    		<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">

    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
							<input type="text" id="price1" name="price" class="input-number w-50 bg-transparent border-0 text-white" value="{{$cart->price}}" min="{{$cart->price}}" max="1000" disabled>
								
							 <span class="d-none">$ {{$price = $cart->item->price}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$ {{ $delevary = 30}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<!-- {{ $discount = $price/100*2  }} -->
							<input type="text" id="discount" name="discount" class="input-number w-50 bg-transparent border-0 text-white" value="{{$discount = $cart->price/100*2}}" min="{{$cart->price}}" max="1000" disabled>
							
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<!-- {{ $price + $delevary - $discount}} -->
							<input type="text" id="total" name="total" class="input-number w-50 bg-transparent border-0 text-white" value="{{$price + $delevary - $discount}}" min="{{$cart->price}}" max="1000" disabled>
							
    					</p>
							<td>
							<button type="submit" class="btn btn-primary pull-right mt-4 text-white"><span style="color:white">Proceed to Checkout</span></button>
							<div class="clearfix"></div>
						</td>
								 
							
							</form>	
    				</div>
    			
			 </div>
    		</div>
					  </div>
    			</div>
    		</div>



			</div>
		</section>

 
  @endsection

  
@push('js')
 <script>
		$(document).ready(function(){

	var quantitiy=0;
    var price = 0;
    var fixprice = parseInt('{{$cart->item->price}}');
    var delivary = 0;
    var discount = 0;
    var total = 0;

		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        var price = parseInt($('#price').val());
		        var price1 = parseInt($('#price1').val());
		        var discount = parseInt($('#discount').val());
		        var total = parseInt($('#total').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);   //quantity
		            $('#price').val(price + fixprice);    //sub total
		            $('#price1').val(price + fixprice); //sub total
		            $('#discount').val(price /100*2);   //discount
		            $('#total').val(price + fixprice + 30 - discount ); // total

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
				var price = parseInt($('#price').val());
				var price1 = parseInt($('#price1').val());
		        var discount = parseInt($('#discount').val());
		        var total = parseInt($('#total').val());
		        
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>1){
		            $('#quantity').val(quantity - 1);
					$('#price').val(price - fixprice);
					 $('#price1').val(price - fixprice); //sub total
		            $('#discount').val(price / 100*2);   //discount
		            $('#total').val(price - fixprice + 30 - discount ); // total
		            }
		    });
		    
		});
	</script>
 
 @endpush
