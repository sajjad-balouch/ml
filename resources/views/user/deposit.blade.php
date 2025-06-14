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
				    <div class="col-md-12 no-pad">
				    	<form method="post" action="{{route('user.deposit-store')}}" enctype="multipart/form-data">
				    		@csrf
					    	<div class="jumbotron bg-1">
					    		<input type="text" name="amount" class="form-control" required id="set_amount"><br>
					    		<input type="hidden" name="plan_id" id="set_plan_id">
					    		<div class="dial-pad">
					    			@isset($plans)
					    			@foreach($plans as $plan)<div class="form-group col-md-4 buttons"><button type="button" class="form-control dial-button" value="{{$plan->id}}">{{$plan->pamount}}</button></div>@endforeach
					    			@endisset
					    		</div>
					    		<!-- end dial pad --><label>Select Payement Method</label>
					    		<ul class="donate-now" style="margin: 0px;">
					    			@isset($accounts)

					    				@foreach($accounts as $index => $account)
										  <li>
										    <input type="radio" id="account_{{ $index }}" name="method" value="{{ $account->account_type }}" class="form-control" required />
										    <label for="account_{{ $index }}">{{ $account->account_type }}</label>
										  </li>
										  @endforeach
								  	@endisset
								</ul>
								<div class="form-group">
									<label>Payment Proof</label>
									<input type="file" name="sshort" class="form-control" required>
								</div>
					    		<!-- end payment method -->
					    		<input type="submit" value="Recharge" class="form-control btn btn-success">
					    		
					    	</div>
					    </form>
				    </div>
				  </div>

				 

			</div>
		</div>
	</div>
	<br><br><br>
@endsection