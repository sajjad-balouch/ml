@extends('user.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				 <div class="top-menu">
				    <div class="col-4 top-section"><a href="{{route('user')}}">&#8592; Back</a></div><div class="col-4 top-section text-center">{{$title}}</div><div class="col-4 top-section text-center">&nbsp;</div>
				  </div>

				  <div class="content">
				    <div class="col-md-12 no-pad">
				    	<div class="jumbotron bg-1">
				    		<center>
				    		<img src="{{asset('public/images/qrcodes/'.$code)}}" style="width: 100%; max-width:200px; align-content: center; text-align: center;"></center>
				    		<h6>Remaining Time Seconds <span id="counter">5</span></h6>
				    	</div>
				    </div>
				  </div>

				 

			</div>
		</div>
	</div>
@endsection
<script>
        let seconds = 30; // set countdown time in seconds

        function startCountdown() {
            const counterElement = document.getElementById('counter');

            const countdown = setInterval(() => {
                seconds--;
                counterElement.textContent = seconds;

                if (seconds <= 0) {
                    clearInterval(countdown);
                    window.location.href = "{{ route('user') }}"; // replace with your route
                }
            }, 1000);
        }

        window.onload = startCountdown;
    </script>