@extends('layouts.app')

@section('title', 'about || admin controller')

@section('content')

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">

                    <form action="{{route('about.update',$about->id)}}" method="POST"  enctype="multipart/form-data">
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
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" value="{{ $about->title}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">body</label>
                          <input type="text" name="body" value="{{ $about->body}}" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label class="bmd-label-floating">Logo</label>
                         <img src="{{asset('uploads/about/'.$about->logo)}}" alt=""style="height:60px;width:60px">
                         <input type="file" name="logo" class="form-control">
                        </div>
                     
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="bmd-label-floating">image</label>
                         <img src="{{asset('uploads/about/'.$about->image)}}" alt=""style="height:60px;width:60px">
                         <input type="file" name="image" class="form-control">
                        </div>
                     
                    </div>
                
                    <button type="submit" class="btn btn-primary pull-right mt-4">Add about</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
   
          </div>
        </div>
      </div>
      @endsection