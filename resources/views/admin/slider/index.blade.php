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
            <h4> </h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider Tables</li>
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
              <div class="card-header">
                <h3 class="card-title"><a href="{{route('slider.create')}}" class="btn btn-info btn-md">Create Slider</a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                        <th> SL  </th>
                        <th> Title </th>
                        <th> Sub title </th>
                        <th> Images </th>
                        <th> Action </th>
                  </tr>
                  </thead>
                  <tbody>
                  
                   @foreach($sliders as $key => $slider)
                        <tr>
                          <td> {{$key+1}} </td>
                          <td>{{$slider->title}} </td>
                          <td>  {{$slider->sub_title}} </td>
                          <td>
                          <img src="{{ asset('uploads/slider/'.$slider->image)}}" alt="" width="70px" height="70px"
                         class="margin-auto"> </td>

                          <td class="td-actions text-center">
                              
                                  <a href="{{ route('slider.edit',$slider->id)}}" style="float:left">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-link">
                                  <i class="fa-solid fa-pen-to-square text-blue"></i>
                                  </button></a>
  
 

                                   <form id="delete-form-{{$slider->id}}" action="{{route('slider.destroy', $slider->id)}}" 
                                   method="post" style="display:none">
                                   @csrf
                                   @method('DELETE')
                                   </form>
                                   <button type="submit" rel="tooltip" title="Remove" class="btn btn-link mx-3" onclick="if(
                                     confirm('are you sure to delete this?')){
                                       event.preventDefault();
                                       document.getElementById('delete-form-{{$slider->id}}').submit();
                                     }else{
                                       event.preventDefault();
                                     }"> <i class="fa-solid fa-trash-can text-red mx-3"></i>
                                   </button>
 


                                  <a href="{{ route('slider.show',$slider->id)}}" style="float:left;display:none" style="margin-left:0px">
                                  <button type="button" rel="tooltip" title="view" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons"></i>view
                                  </button></a>
                                  
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
  </div>
  <!-- /.content-wrapper -->
  
  

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

