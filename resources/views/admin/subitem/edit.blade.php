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
                  <h4 class="card-title">subitem update</h4>
                  <p class="card-category">subitem update</p>
                </div>
                <div class="card-body">

                    <form action="{{route('subitem.update',$subitem->id)}}" method="POST"  enctype="multipart/form-data">
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
                          <label class="bmd-label-floating">category</label>
 
                            <select class="form-select w-50" name="category">
                              @foreach($categories as $category)
                               <option value="{{$category->id}}" class="form-control">{{$category->name}}</option>
                              @endforeach
                                    
                            </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">subitem</label>
 
                            <select class="form-select w-50" name="item">
                               
                                @foreach($items as $item)
                                 <option value="{{$item->id}}" class="form-control">{{$item->item_name}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item name</label>
                          <input type="text" name="name" value="{{ $subitem->subitem_name}}" class="form-control">
                        </div>
                      </div>

 
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">subitem Description</label>
                           <textarea name="description" class="form-control">{{ $subitem->description}}</textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">subitem Price</label>
                          <input type="text" name="price" value="{{ $subitem->price}}" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                      <div class="col-md-12 mt-5">
                        <img src="{{asset('uploads/item/'.$subitem->image)}}" alt="" height="60px" width="60px">
                      
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