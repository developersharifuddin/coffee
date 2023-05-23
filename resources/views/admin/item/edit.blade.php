@extends('layouts.app')

@section('title', 'category || admin controller')

@section('content')

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">item update</h4>
                  <p class="card-category">item update</p>
                </div>
                <div class="card-body">

                    <form action="{{route('item.update',$item->id)}}" method="POST"  enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <div class="row">
                      

                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">category_name</label>
 
                            <select class="form-select" name="category">
                               @foreach($categories as $category)
                               <option value="{{$category->id}}" class="form-control">{{$category->name}}</option>             
                                @endforeach
                            </select>
                        </div>
                      </div>
                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item name</label>
                          <input type="text" name="name" value="{{ $item->item_name}}" class="form-control">
                        </div>
                      </div>

 
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Description</label>
                           <textarea name="description" class="form-control">{{ $item->description}}</textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Price</label>
                          <input type="text" name="price" value="{{ $item->price}}" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                      <div class="col-md-12 mt-5">
                        <img src="{{asset('uploads/item/'.$item->image)}}" alt="" height="60px" width="60px">
                      
                          <label class="bmd-label-floating">image</label>
                          <input type="file" name="image" value="" class="form-control mt-3">
                          
                      </div>
                      
                    </div>
                
                    <button type="submit" class="btn btn-primary pull-right mt-4">update</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
   
          </div>
        </div>
      </div>
      @endsection