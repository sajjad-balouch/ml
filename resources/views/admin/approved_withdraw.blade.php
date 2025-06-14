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
                    <h4 class="card-title">@isset($title) {{$title}} @endisset</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> User Id </th>
                            <th> Amount </th>
                            <th> Method </th>
                            <th> Title </th>
                            <th> Number </th>
                            <th> Status </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($rows as $key => $row)
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->user_id}}</td>
                              <td>{{$row->credit}}</td>
                              <td>{{$row->method}}</td>
                               <td>{{$row->account_title}}</td>
                              <td>{{$row->account_number}}</td>
                              <td><label class="badge badge-gradient-danger">Approved</label></td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         @endsection