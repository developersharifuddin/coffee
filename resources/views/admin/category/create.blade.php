@extends('layouts.app')

@section('title', 'categories || admin controller')

@section('content')

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">categories</h4>
                  <p class="card-category">categories</p>
                </div>
                <div class="card-body">

                    <form action="{{route('category.store')}}" method="POST"  enctype="multipart/form-data">
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

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">name</label>
                          <input type="text" name="name" class="form-control">
                        </div>
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