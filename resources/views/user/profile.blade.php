@extends('user.app')
@section('content')
	
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="mb-0">{{ $title }}</h4>
                </div>
                <div class="card-body p-4 bg-light rounded-bottom-4">
                  <div class="content text-center">
                    @if(auth()->user()->avatar == null)
                      <img src="{{asset('public/images/avatars/icons8-user-avatar-100.png')}}" class="avatar" />
                    @else
                      <img src="{{asset('public/images/avatars/'.auth()->user()->avatar)}}" class="avatar" />
                    @endif

                    <div class="mb-3"><b>Welcome: </b>{{auth()->user()->name}}</div>
                    <div class="mb-3">{{auth()->user()->email}}</div>

                    <a href="" class="btn btn-success btn-3d" data-toggle="modal" data-target="#passModal">Change Password</a>
                    <br />
                    <a href="" class="btn btn-warning btn-3d" style="margin-top:10px" data-toggle="modal" data-target="#avatarModal">Change Avatar</a>
                    <br />
                    <a href="" class="btn btn-info btn-3d" style="margin-top:10px" data-toggle="modal" data-target="#nameModal">Update Name</a>

                    @if($errors)
                      <ul>
                        @foreach($errors->all() as $error)
                          <li class="alert">{{$error}}</li>
                        @endforeach
                      </ul>
                    @endif

                    <div class="profit-table">
                      <table>
                        <tr>
                          <th>Total Deposit</th>
                          <th>PKR @isset($tdeposit) {{$tdeposit}} @endisset</th>
                        </tr>
                        <tr>
                          <th>Pending Deposit</th>
                          <th>PKR @isset($pdeposit) {{$pdeposit}} @endisset</th>
                        </tr>
                        <tr>
                          <th>Total Profit</th>
                          <th>PKR @isset($tprofit) {{$tprofit}} @endisset</th>
                        </tr>
                        <tr>
                          <th>Pending Profit</th>
                          <th>PKR @isset($pprofit) {{$pprofit}} @endisset</th>
                        </tr>
                        <tr>
                          <th>Team Profit</th>
                          <th>PKR {{ref_earning()}}</th>
                        </tr>
                        <tr>
                          <th>Available Profit</th>
                          <th>PKR {{user_total_earning()-user_total_withdraw()}}</th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
@endsection