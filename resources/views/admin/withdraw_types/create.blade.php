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
                  <div class="card-body">
                    <h4 class="card-title">{{$title}}</h4>
                    @if(isset($row))
                    <form method="post" action="{{route('admin.withdraw_types.update',$row->id)}}">
                    @else
                    <form method="post" action="{{route('admin.withdraw_types.store')}}">
                    @endisset  
                      @csrf
                      <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" required placeholder="Bank Name" value="@isset($row) {{$row->bank_name}} @endisset">
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