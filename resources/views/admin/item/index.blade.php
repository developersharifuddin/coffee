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
             <h4 class="fs-4 p-3">Item Table</h4>
                    
            <div class="col-md-12 mt-3">
           <div class="card shadow-none">
                 <div class="card-header card-header-primary">
                    <a href="{{ route('item.create') }}" class="btn btn-primary">Add item</a>
              
                  </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" >
                      <thead class=" text-primary">
                        <th> SL  </th>
                        <th> item_name</th>
                        <th> description</th> 
                        <th> price</th>
                        <th> category_name</th>
                        <th> image</th>
                        <th> Action </th>
                      </thead>
                      <tbody>


                         @foreach($items as $key => $item)
                      <tr>
                        <td> {{$key+1}} </td>
                        <td>{{$item->item_name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->category->name}}</td>
                        <td><img src="{{asset('uploads/item/'.$item->image)}}" alt="" height="60px" width="60px"></td>
                        <td class="td-actions text-left">
                              
                                <a href="{{ route('item.edit',$item->id)}}" style="float:left">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-link btn-sm">
                                  <i class="fa-solid fa-pen-to-square text-blue"></i>
                                  </button></a>
   
                                   <form id="delete-form-{{$item->id}}" action="{{route('item.destroy', $item->id)}}" 
                                   method="post" style="display:none">
                                   @csrf
                                   @method('DELETE')
                                   </form>
                                   <button type="submit" rel="tooltip" title="Remove" class="btn btn-link btn-sm" onclick="if(
                                     confirm('are you sure to delete this?')){
                                       event.preventDefault();
                                       document.getElementById('delete-form-{{$item->id}}').submit();
                                     }else{
                                       event.preventDefault();
                                     }">
                                     <i class="fa-solid fa-trash-can text-danger"></i>
                                   </button>

 

                                  <a href="{{ route('item.show',$item->id)}}" style="display:none" style="margin-left:20px">
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