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
                    <h4 class="card-title"> User </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> User Id </th>
                            <th> Avatar </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Joined </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          @isset($user) 
                            <tr>
                              <td><a href="{{route('user-detail',$user->id)}}">{{$user->id}}</a></td>
                              <td><img src="{{asset('public/images/avatars/'.$user->avatar)}}"></td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->created_at}}</td>
                              <td>
                               <a href="{{route('admin.change-password',$user->id)}}"><i class="fa fa-lock fa-2x"></i></a> | <a href="{{route('destroy',$user->id)}}"><i class="fa fa-trash fa-2x"></i></a>
                              </td>
                            </tr>
                          @endisset
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end user -->
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Refferals </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> User Id </th>
                            <th> Avatar </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Amount </th>
                            <th> Bonus </th>
                          </tr>
                        </thead>
                        <tbody>@php $sum = 0; @endphp
                          @foreach($refs as $key => $user) 
                            @php $sum += ($user->debit*$user->rcom)/100; @endphp
                            <tr>
                              <td><a href="{{route('user-detail',$user->id)}}">{{$user->id}}</a></td>
                              <td><img src="{{asset('public/images/avatars/'.$user->avatar)}}"></td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->debit}}</td>
                              <td>{{($user->debit*$user->rcom)/100}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <th align="right" colspan="5">Total Bonus</th>
                            <th align="right">{{$sum}}</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- refferals -->
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Deposits </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Plan Id</th>
                            <th> Amount </th>
                            <th> Method </th>
                            <th> Status </th>
                          </tr>
                        </thead>
                        <tbody>@php $sum = 0; @endphp
                          @foreach($deposits as $key => $user) 
                            @php $sum += $user->debit; @endphp
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$user->plan_id}}</td>
                              <td>{{$user->debit}}</td>
                              <td>{{$user->method}}</td>
                              <td>
                                @if($user->status == 1)
                                  <label class="badge badge-gradient-success">Active</label>
                                @else
                                  <label class="badge badge-gradient-danger">Pending</label>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <th align="right" colspan="4">Total Deposit</th>
                            <th align="right">{{$sum}}</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end deposit -->
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Withdraws </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Amount </th>
                            <th> Method </th>
                            <th> Name </th>
                            <th> Number </th>
                            <th> Status </th>
                          </tr>
                        </thead>
                        <tbody>@php $sum = 0; @endphp
                          @foreach($withdraws as $key => $user) 
                            @php $sum += $user->credit; @endphp
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$user->credit}}</td>
                              <td>{{$user->method}}</td>
                              <td>{{$user->account_title}}</td>
                              <td>{{$user->account_number}}</td>
                              <td>
                                @if($user->status == 1)
                                  <label class="badge badge-gradient-success">Active</label>
                                @else
                                  <label class="badge badge-gradient-danger">Pending</label>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <th align="right" colspan="4">Total Deposit</th>
                            <th align="right">{{$sum}}</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end withdraw -->
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         @endsection