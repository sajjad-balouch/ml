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
                    <h4 class="card-title"> {{$title}} </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> User Id </th>
                            <th> Avatar </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Joined </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $key => $user) 
                            <tr>
                              <td>{{$key+1}}</td>
                              <td><a href="">{{$user->id}}</a></td>
                              <td><img src="{{asset('public/images/avatars/'.$user->avatar)}}"></td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->created_at}}</td>
                              <td>
                               <a href="{{route('admin.change-password',$user->id)}}"><i class="fa fa-lock fa-2x"></i></a> | <a href="{{route('destroy',$user->id)}}"><i class="fa fa-trash fa-2x"></i></a>
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