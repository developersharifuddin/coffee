@extends('layouts-frontend.app')
@section('title', 'checkout | Cofee')
@section('content')
 
     
          
     

    <section class="ftco-section">
      <div class="container">
		  <div class="row slider-text justify-content-start align-items-start">
            <div class="col-md-7 col-sm-12 ftco-animate">
            	  <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> / <span>stay</span></p>
            </div>
          </div>
        <div class="row justify-content-center align-items-center mt-2">
          <div class="col-md-8 ftco-animate bg-info p-4">
		  <h1>Thank you.</h1>
          <h3>Your order Submit successfull</h3>
          <a href="{{route('fontend.shop')}}"> <button class="btn btn-primary pull-right mt-4 text-white">Continue Shopping</button></a>
          </div> <!-- .col-md-8 -->
  

        </div>
      </div>
    </section> <!-- .section -->
 

  @endsection