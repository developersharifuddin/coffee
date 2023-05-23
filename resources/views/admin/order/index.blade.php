@extends('layouts.app')
@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush


@section('header')
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>order Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection



  @section('content')
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card shadow-none">
                <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                         <th>S/L</th>
                        <th>Order Id</th>
                        <th>product Id</th>
                        <th>sub total</th>
                        <th>discount</th>
                        <th>tax</th>
                        <th>total</th> 
                        <th>first name</th>
                        <th>last name</th>
                        <th>Mobile</th>
                        <th>email</th>
                        <th>post code</th>
                        <th>Adderss line1</th>
                        <th>Order Date</th>
                        <th>Payments method</th>
                        <th>status</th>
                        <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                   
                    @foreach($orders as $key => $order)
                      <tr>
                        <td> {{$key+1}} </td> 
                        <td>{{$order->id}}</td>
                        <td>{{$order->item_id}}</td>
                        <td>$ {{$order->subtotal}}</td>
                        <td>$ {{$order->discount}}</td>
                        <td>$ {{$order->tax}}</td>
                        <td>$ {{$order->total}}</td>
                        <td>{{$order->firstname}}</td>
                        <td>{{$order->lastname}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->postcode}}</td>
                        <td>{{$order->line1}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->payment_method}}</td>
                        <td>
                          @if($order->status==1)
                           <span class="badge badge-success p-1">Confirmed</span>
                            @endif
                           @if($order->status==0)
                           <span class="badge badge-danger p-1">Pending</span>
                            @endif
                        </td>
                                
                          <td class="td-actions text-left">
                              @if($order->status==0)
                                <form action="{{route('order.update',$order->id)}}" method="POST">
                                  @csrf
                                  <!-- @method('PUT')  -->

                                  <input type="hidden" name="status" value="1">
                                  <button type="submit" rel="tooltip" title="confirm" class="btn text-primary pull-left btn-sm fw-bold"><i class="fa-solid fa-check"></i></button>
                                  </form> 
                                  @else
                                  <form action="{{route('order.cancelOrder',$order->id)}}" method="POST">
                                  @csrf
                                  <!-- @method('PUT')  -->
                                   <input type="hidden" name="status" value="0">
                                  <button type="submit" rel="tooltip" title="cancel order" class="btn btn-sm pull-left"><i class="fa-solid fa-xmark text-danger"></i></button>
                                  </form> 
                                  @endif
                               
   
                                  <form id="delete-form-{{$order->id}}" action="{{route('order.destroy', $order->id)}}" 
                                   method="post" style="display:none">
                                   @csrf
                                   <!-- @method('DELETE') -->
                                   </form>
                                   <button type="submit" rel="tooltip" title="Remove" class="btn text-danger fw-bold btn-sm" onclick="if(
                                     confirm('are you sure to delete this?')){
                                       event.preventDefault();
                                       document.getElementById('delete-form-{{$order->id}}').submit();
                                     }else{
                                       event.preventDefault();
                                     }"><i class="fa-solid fa-trash-can text-red"></i>
                                   </button>
  
                        </td>
                      </tr>
                       @endforeach
                    
                </table>
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
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush

      