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
            <a href="{{ route('subitem.create') }}" class="btn btn-primary">Add item</a>
              <div class="card">
                 <div class="card-header card-header-primary">
                    <h4 class="card-title ">item</h4>
                  </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" >
                      <thead class=" text-primary">
                        <th> SL  </th>
                        <th> Category_name</th>
                        <th> Item_name</th> 
                         <th> SubItem_name</th> 
                         <th> Description</th> 
                        <th> price</th>
                         <th> image</th>
                        <th> Action </th>
                      </thead>
                      <tbody>


                         @foreach($subitems as $key => $subitem)
                      <tr>
                        <td> {{$key+1}} </td>
                        <td>{{$subitem->item->category->name}}</td>
                        <td>{{$subitem->item->item_name}}</td>
                        <td>{{$subitem->subitem_name}}</td>
                        <td>{{$subitem->description}}</td>
                        <td>{{$subitem->price}}</td>
                         <td><img src="{{asset('uploads/item/'.$subitem->image)}}" alt="" height="60px" width="60px"></td>
                        <td class="td-actions text-left">
                              
                                  <a href="{{ route('subitem.edit',$subitem->id)}}" style="float:left">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                  </button></a>
   
                                   <form id="delete-form-{{$subitem->id}}" action="{{route('subitem.destroy', $subitem->id)}}" 
                                   method="post" style="display:none">
                                   @csrf
                                   @method('DELETE')
                                   </form>
                                   <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm mx-3" onclick="if(
                                     confirm('are you sure to delete this?')){
                                       event.preventDefault();
                                       document.getElementById('delete-form-{{$subitem->id}}').submit();
                                     }else{
                                       event.preventDefault();
                                     }"> Delete
                                   </button>

 

                                  <a href="{{ route('subitem.show',$subitem->id)}}" style="float:left;display:none" style="margin-left:20px">
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