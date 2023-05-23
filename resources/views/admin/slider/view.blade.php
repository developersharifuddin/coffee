@extends('layouts.app')

@section('title', 'Slider || admin controller')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <a href="{{ route('slider.create') }}" class="btn btn-primary">Add New</a>
              <div class="card">
                 <div class="card-header card-header-primary">
                    <h4 class="card-title ">All Slider</h4>
                  </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" >
                      <thead class=" text-primary">
                        <th> Title </th>
                        <th> Sub title </th>
                        <th> Images </th>
                        </thead>
                      <tbody>
                      
                        <tr>
                          <td>{{$slider->title}} </td>
                          <td>  {{$slider->sub_title}} </td>
                          <td>
                          <img src="{{ asset('uploads/slider/'.$slider->image)}}" alt="" width="70px" height="70px"
                          class="margin-auto"> </td>

                                
                          </tr>
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@push('js')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endpush