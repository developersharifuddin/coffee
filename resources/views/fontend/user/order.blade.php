@extends('layouts-frontend.app')
@section('title', 'order | Cofee')
 
 
@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}"> 
@endpush
 
 
  @section('content')
  
    <!-- Main content -->
    <section class="content mb-5">
      	<div class="container mb-md-3 mt-lg-5">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate py-lg-4">
            	<h1 class="mb-3 mt-5 bread mt-lg-5 mt-md-4">My Orders</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('fontend.index')}}">Home</a></span><span>/</span> <span>view Orders</span></p>
            </div>

          </div>
        </div>

      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="container">

            <div class="card border-0 text-white bg-transparent">
            
              <div class="card-body shadow-none p-0 m-0" >
               @if($userorderscount >=1)
               
                <table id="example1" class="table table-striped table-sm border-0 bg-transparent scroll">
                  <thead>
                  <tr>
                        <th>Order Id</th>
                        <th>product Id</th>
                        <th>Product name</th>
                        <th>sub total</th>
                        <th>discount</th>
                        <th>tax</th>
                        <th>total</th> 
                        <th>Name</th>
                        <th>email</th>
                        <th>Order Date</th>
                        <th>status</th>
                         
                  </tr>
                  </thead>
                  <tbody>
                  
                   
                    @foreach($userorders as $key => $order)
                      <tr>
                        <td>{{$order->id}}</td>
                        <td>CF-{{$order->item_id}}</td>
                        <td>{{$order->item->item_name}}</td> 
                        <td>$ {{$order->subtotal}}</td>
                        <td>$ {{$order->discount}}</td>
                        <td>$ {{$order->tax}}</td>
                        <td>$ {{$order->total}}</td>
                        <td>{{$order->firstname}} {{$order->lastname}}</td>
                          <td>{{$order->email}}</td>
                         <td>{{$order->created_at}}</td>
                        <td>
                          @if($order->status==1)
                           <span class="badge badge-success p-1">Confirmed</span>
                            @endif
                           @if($order->status==0)
                           <span class="badge badge-danger p-1">Pending</span>
                            @endif
                        </td>
                      
                      </tr>
                       @endforeach
                    
                </table>
                 @else
                <div class="container">
                  <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate mt-lg-4">
                      <h2>No Order list Add your shopping.</h2>
                      <a href="{{route('fontend.shop')}}" class="btn btn-primary btn-sm">My Shopping</a>
                    <div>
                  </div>
                </div>
                 @endif
                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
@endsection


@push('js')
 <!-- DataTables  & Plugins -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script> 
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": true,
       
    }).buttons().container().appendTo('#example1_wrapper .col-sm-6:eq(0)');
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false, 
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
@endpush
