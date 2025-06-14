@extends('admin.app')
@section('content')

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>            
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  @if($errors)
                    <ul>
                    @foreach($errors->all() as $error)
                      <li class="alert" style="color: red; list-style: none">{{$error}}</li>
                    @endforeach
                    </ul>
                  @endif
                  <div class="card-body">
                    <h4 class="card-title">{{$title}}</h4>
                    <form method="post" action="{{route('admin.update-password')}}">  
                      @csrf
                      <div class="form-group">
                        <label>User Id</label>
                        <input type="text" name="user_id" class="form-control" required placeholder="User Id" value="@isset($id) {{$id}} @endisset">
                      </div>
                      <div class="form-group">
                        <label>New Password</label>
                        <input type="text" name="pass" class="form-control" required placeholder="New Password">
                      </div>
                      
                      <div class="form-group">
                        <input type="submit" value="Update" class="form-control bg-gradient-primary text-white">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         @endsection