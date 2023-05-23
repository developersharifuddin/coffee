@extends('layouts.app')

@section('title', 'subitem || admin controller')

@section('content')

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">subitem</h4>
                  <p class="card-category">subitem</p>
                </div>
                <div class="card-body">

                    <form action="{{route('subitem.store')}}" method="POST"  enctype="multipart/form-data">
                       @csrf

                       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <div class="row mt-4">
                      
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
                          <label class="bmd-label-floating">Item</label>
 
                            <select class="form-select w-50" name="item">
                                 @foreach($items as $item)
                                 <option value="{{$item->id}}" class="form-control">{{$item->item_name}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                       

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">subitem name</label>
                          <input type="text" name="name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">subitem Description</label>
                           <textarea name="description" class="form-control"></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">subitem Price</label>
                          <input type="text" name="price" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                      <div class="col-md-12 mt-5">
                          <label class="bmd-label-floating">image</label>
                          <input type="file" name="image" class="form-control">
                      
                      </div>
                      
                    </div>
 
                  
                    <button type="submit" class="btn btn-primary pull-right mt-4">Add category</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
   
          </div>
        </div>
      </div>
      @endsection