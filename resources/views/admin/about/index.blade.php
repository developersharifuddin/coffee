@extends('layouts.app')

@section('title', 'about || admin controller')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <a href="{{ route('about.create') }}" class="btn btn-primary">Add a About section</a>
              <div class="card">
                 <div class="card-header card-header-primary">
                    <h4 class="card-title ">About-us</h4>
                  </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" >
                      <thead class=" text-primary">
                        <th> SL  </th>
                        <th> Title </th>
                        <th> body</th>
                        <th> Images </th>
                        <th> logo </th>
                        <th> Action </th>
                      </thead>
                      <tbody>
                      
                      @foreach($abouts as $key => $about)
                        <tr>
                           <td> {{$key+1}} </td>
                          <td>{{$about->title}} </td>
                          <td>{{$about->body}} </td>
                          
                          <td>
                          <img src="{{ asset('uploads/about/'.$about->logo)}}" alt="" width="70px" height="70px"
                         class="margin-auto"> </td>
                          <td>
                          <img src="{{ asset('uploads/about/'.$about->image)}}" alt="" width="70px" height="70px"
                         class="margin-auto"> </td>

                                <td class="td-actions text-left">
                              
                                  <a href="{{ route('about.edit',$about->id)}}" style="float:left">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                  </button></a>
  
                                 
                                   <form id="delete-form-{{$about->id}}" action="{{route('about.destroy', $about->id)}}" 
                                   method="post" style="display:none">
                                   @csrf
                                   @method('DELETE')
                                   </form>
                                   <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm mx-3" onclick="if(
                                     confirm('are you sure to delete this?')){
                                       event.preventDefault();
                                       document.getElementById('delete-form-{{$about->id}}').submit();
                                     }else{
                                       event.preventDefault();
                                     }"> Delete
                                   </button>






                                  <a href="{{ route('about.show',$about->id)}}" style="float:left;display:none" style="margin-left:20px">
                                  <button type="button" rel="tooltip" title="view" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons"></i>view
                                  </button></a>
                                  
                                </td>
                          </tr>
                      @endforeach
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