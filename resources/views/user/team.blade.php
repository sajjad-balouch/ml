@extends('user.app')
@section('content')
<style>
    .file-btn {
        display: inline-block;
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .file-btn:hover {
        background-color: #45a049;
    }
</style>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="mb-0">{{ $title }}</h4>
                </div>
                <div class="card-body p-4 bg-light rounded-bottom-4">

				  <div class="content">
				    <div class="col-md-12 no-pad">
				    	<div class="jumbotron bg-1">
				    		<div class="table table-responsive">
				    			<table class="table">
				    				<tr align="center">
				    					<th>#</th>
				    					<th>User Id</th>
				    					<th>Status</th>
				    					<th>Investment</th>
				    					<th>Commission</th>
				    				</tr>
				    				@isset($rows)
				    					@foreach($rows as $key => $row) 
				    						<tr align="center">
				    							<td>{{$key+1}}</td>
				    							<td>{{$row->id}}</td>
				    							@if(\App\Models\Ledger::where([['user_id',$row->id],['type','Deposit']])->get()->isEmpty())
				    							<td>NIL</td>
				    							<td>NIL</td>
				    							<td>NIL</td>
				    							@else
				    							@foreach(\App\Models\Ledger::where([['user_id',$row->id],['type','Deposit']])->get() as $lgr)
				    							<td>
				    								@if($lgr->status == 1)
				    									<span class="badge badge-success">Active</span>
				    								@else
				    									<span class="badge badge-danger">Pending</span>
				    								@endif
				    							</td>
				    							<td>{{$lgr->debit}}</td>
				    							<td>{{(\App\Models\Plan::where('id',$lgr->plan_id)->first()->rcom * $lgr->debit)/100}}</td>
				    							@endforeach
				    							@endif
				    						</tr>
				    					@endforeach
				    				@endisset
				    			</table>
				    		</div>
				    	</div>
				    </div>
				  </div>

				 

			</div>
		</div><br><br><br>
	</div>
	
@endsection
