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
				@php
                $cartcount = DB::table('carts')->where('user_id', Auth()->user()->id)->count();
                @endphp
                @if($cartcount >=1)
                <div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Product</th>
						        <th>Product Name</th>
						        <th>Price</th>
						        <th>QTY</th>
						        <th>Total Price</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>

                @foreach($carts as $cart)
						      <tr class="text-center">
						        
						        <td class="image-prod"><div class="img" style="background: url('{{asset('uploads/item/'.$cart->item->image)}}');background-size: cover;"></div></td>
						        
						        <td class="product-name">
						        	<h3>{{$cart->item->item_name}}</h3>
						        	<p class="descriptions">{{$cart->item->description}}</p>
						        </td>
						        
						        <td class="price">$ {{$cart->item->price}}</td>
						        <td class="price">$ {{$cart->quantity}}</td>
						        <td class="price">$ {{$cart->price}}</td>
						        
						        <td class="product-remove">
								<form id="delete-form-{{$cart->id}}" action="{{route('carts.destroy', $cart->id)}}" 
                                   method="post" style="display:none">
                                   @csrf
                                   @method('DELETE')
                                   </form>
                                   <button type="submit" rel="tooltip" title="Remove" class="btn btn-info btn-link btn-sm mx-1" onclick="if(
                                     confirm('are you sure to delete this?')){
                                       event.preventDefault();
                                       document.getElementById('delete-form-{{$cart->id}}').submit();
                                     }else{
                                       event.preventDefault();
                                     }"> Delete
                                   </button>

                                   <a href="{{route('carts.show',$cart->id)}}" class="btn btn-primary btn-sm">Proceed to Order</a>
    			
								</td>
						        
                             @endforeach
 


						    </tbody>
						  </table>
					  </div>
    			</div>


                @else
                <div class="container">
                  <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate mt-lg-4">
                      <h2>No product Add your carts</h2>
                      <a href="{{route('fontend.shop')}}" class="btn btn-primary btn-sm">My Shopping</a>
                    <div>
                  </div>
                </div>
                  @endif
                 

    		</div>

 
			</div>
		</section>





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