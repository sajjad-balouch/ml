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
                    <h4 class="card-title">{{$title}} <a href="{{route('admin.account.create')}}" class="btn bg-gradient-primary text-white">New {{$title}}</a></h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Account Type </th>
                            <th> Account Name </th>
                            <th> Account Number </th>
                            <th> Qrcode </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($rows as $key => $row)
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->account_type}}</td>
                              <td>{{$row->name}}</td>
                              <td>{{$row->number}}</td>
                              <td><img src="{{asset('public/images/qrcodes/'.$row->qrcode)}}"></td>
                              <td>
                                <a href="{{route('account.destroy',$row->id)}}">Delete</a>
                              </td>
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