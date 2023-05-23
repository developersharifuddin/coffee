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
                  <h4 class="card-title">category update</h4>
                  <p class="card-category">category update</p>
                </div>
                <div class="card-body">

                    <form action="{{route('category.update',$category->id)}}" method="POST"  enctype="multipart/form-data">
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
                          <label class="bmd-label-floating">name</label>
                          <input type="text" name="name" value="{{ $category->name}}" class="form-control">
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