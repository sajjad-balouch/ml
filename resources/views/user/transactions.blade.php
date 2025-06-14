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
				    					<th>Status</th>
				    					<th>Type</th>
				    					<th>Amount</th>
				    					<th>Method</th>
				    					<th>Proof</th>
				    				</tr>
				    				@isset($rows)
				    					@foreach($rows as $key => $row)
				    						<tr align="center">
				    							<td>{{$key+1}}</td>
				    							<td>
				    								@if($row->status == 1)
				    									<span class="badge badge-success">Active</span>
				    								@else
				    									<span class="badge badge-danger">Pending</span>
				    								@endif
				    							</td>
				    							<td>{{$row->type}}</td>
				    							<td>
				    								@if($row->type == 'Deposit')
				    									{{$row->debit}}
				    								@else
				    									{{$row->credit}}
				    								@endif
				    							</td>
				    							<td>{{$row->method}}</td>
				    							<td>
				    								@if($row->proof == '' && $row->type == 'Deposit')
				    									<button type="submit" class="file-btn openProofModal" style="margin-left: 10px;" id="{{$row->id}}">Upload</button>
				    								@elseif($row->type == 'Withdraw')
				    									{{('')}}
				    								@else
				    									<img src="{{asset('public/images/proof/'.$row->proof)}}" style="width:100; max-width: 50px;">
				    								@endif
				    							</td>
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
