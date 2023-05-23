@extends('layouts.app')

@section('title', 'Slider || admin controller')

@section('content')

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create About Sectin</h4>
                   </div>
                <div class="card-body">

                    <form action="{{route('about.store')}}" method="POST"  enctype="multipart/form-data">
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
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub_Title</label>
                          <input type="text" name="body" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">Choose logo</label>
                          <input type="file" name="logo" class="form-control">
                        </div>
                     
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">Choose Photo</label>
                          <input type="file" name="image" class="form-control">
                        </div>
                     
                    </div>
                 
                  
                    <button type="submit" class="btn btn-primary pull-right mt-4">Add Slider</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
   
          </div>
        </div>
      </div>
      @endsection