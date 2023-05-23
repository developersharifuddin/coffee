@extends('layouts.app')
@section('title', 'item || admin controller')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
               <div class="card">
                 <div class="card-header card-header-primary">
                    <h4 class="card-title ">reservation</h4>
                  </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" >
                      <thead class=" text-primary">
                        <th> SL  </th>
                        <th> name</th>
                        <th> phone</th> 
                         <th> email</th>
                        <th> time</th> 
                        <th> date</th> 
                        <th> description</th>
                        <th>Status</th> 
                       <th> Action </th>
                      </thead>
                      <tbody>


                         @foreach($reservations as $key => $reservation)
                      <tr>
                        <td> {{$key+1}} </td>
                        <td>{{$reservation->name}}</td>
                        <td>{{$reservation->phone}}</td>
                        <td>{{$reservation->email}}</td>
                        <td>{{$reservation->time}}</td>
                        <td>{{$reservation->date}}</td>
                         <td>{{$reservation->description}}</td>
                        
                        
                         
                         <td>
                       
                          @if($reservation->delivered==1)
                           <span class="badge badge-success p-1">Confirmed</span>
                            @endif
                           @if($reservation->delivered==0)
                           <span class="badge badge-danger p-1">Pending</span>
                            @endif

                          
                        </td>
                            

                           
                           
                        
                          <td class="td-actions text-left">
                              @if(!$reservation->delivered)
                                <form action="{{route('reservation.update', $reservation->id)}}" method="POST">
                                  @csrf
                                  @method('PUT') 

                                  <input type="hidden" name="delivered" value="1">
                                  <button type="submit" rel="tooltip" title="confirmed"  class="btn text-primary pull-left btn-sm "><i class="fa-solid fa-check"></i></button>
                                  </form> 
                                  @else
                                  <form action="{{route('reservation.update', $reservation->id)}}" method="POST">
                                  @csrf
                                  @method('PUT') 
                                   <input type="hidden" name="delivered" value="0">
                                  <button type="submit" rel="tooltip" title="CANCEL DELIVERED"  class="btn text-primary btn-sm pull-left"><i class="fa-solid fa-xmark text-danger"></i></button>
                                  </form> 
                                  @endif
                               
   
                                   <form id="delete-form-{{$reservation->id}}" action="{{route('reservation.destroy', $reservation->id)}}" 
                                   method="post" style="display:none">
                                   @csrf
                                   @method('DELETE')
                                   </form>
                                   <button type="submit" rel="tooltip" title="Remove" class="btn text-danger btn-link btn-sm" onclick="if(
                                     confirm('are you sure to delete this?')){
                                       event.preventDefault();
                                       document.getElementById('delete-form-{{$reservation->id}}').submit();
                                     }else{
                                       event.preventDefault();
                                     }"><i class="fa-solid fa-trash-can text-red"></i>
                                   </button>

 

                                  <a href="{{ route('reservation.show',$reservation->id)}}" style="display:none">
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