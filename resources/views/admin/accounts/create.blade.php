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
                    @if(isset($row))
                    <form method="post" action="{{route('admin.account.update',$row->id)}}" enctype="multipart/form-data">
                    @else
                    <form method="post" action="{{route('admin.account.store')}}" enctype="multipart/form-data">
                    @endisset  
                      @csrf
                      <div class="form-group">
                        <label>Account Type</label>
                        <input type="text" name="account_type" class="form-control" required placeholder="Account Type" value="@isset($row) {{$row->bank_name}} @endisset">
                      </div>

                      <div class="form-group">
                        <label>Account Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="Account Name" value="@isset($row) {{$row->name}} @endisset">
                      </div>

                      <div class="form-group">
                        <label>Account Number</label>
                        <input type="text" name="number" class="form-control" required placeholder="Account Number" value="@isset($row) {{$row->number}} @endisset">
                      </div>

                      <div class="form-group">
                        <label>Account Qrcode</label>
                        <input type="file" name="qrcode" class="form-control" required placeholder="Account Type">
                      </div>
                      
                      <div class="form-group">
                        @if(isset($row))
                        <input type="submit" value="Update" class="form-control bg-gradient-primary text-white">
                        @else
                        <input type="submit" value="Save" class="form-control bg-gradient-primary text-white">
                        @endisset
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