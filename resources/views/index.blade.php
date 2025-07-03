@extends('layouts.app')
@section('content')



<!--============================
=            Banner            =
=============================-->

<section class="banner bg-banner-one">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Content Block -->
				<div class="block">
					<!-- Coundown Timer -->
					<!-- <div class="timer"></div> -->
					<!-- <h1>Smart Investments</h1> -->
					<!-- <h2>Secure Future</h2> -->
					<!-- Action Button -->
					
				</div>
			</div>
		</div>
	</div>
</section>
	
<!--====  End of Banner  ====-->

<!--===========================
=            About            =
============================-->

<section class="section about" id="about" style="padding-top:10px;">
	<center>
		
		@if(auth()->user())
		<a href="{{route('user')}}" class="btn btn-success">Dashboard</a> <br><br>
		@else
		<a href="{{route('register')}}" class="btn btn-warning">SignUp</a>
		<a href="{{route('enter')}}" class="btn btn-success">LogIn</a> <br><br>
		@endif
	</center>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 align-self-center">
				<div class="image-block bg-about" style="padding:0px; text-align: left;">
					<!-- <img class="img-fluid" src="{{asset('public/front/images/speakers/man.jpg')}}" alt=""> -->
					<video controls style="width: 290px;">
						<source src="{{asset('public/vdad.mp4')}}" type="video/mp4">
					</video>
				</div>
			</div>
			<div class="col-lg-8 col-md-6 align-self-center">
				<div class="content-block">
					<h2>About The <span class="alternate">{{env('APP_NAME')}}</span></h2>
					<div class="description-one">
						<p>
							At Allied Funds, we empower individuals and businesses to grow their wealth through smart, strategic investments. Whether you're a beginner investor or a seasoned professional, we provide tailored financial solutions designed to help you earn more and plan for a secure future.
						</p>
					</div>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="{{route('register')}}" class="btn btn-main-md">SignUp Now</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<!--====  End of About  ====-->


<!--==================================
=            Registration            =
===================================-->

<section class="registration">
	<div class="container-fuild p-0">
		<div class="row">
			<div class="col-lg-6 col-md-12 p-0">
				<div class="service-block bg-service overlay-primary text-center">
					<div class="row no-gutters">
						<div class="col-6">
							<!-- Service item -->
							<div class="service-item">
								<i class="fa fa-microphone"></i>
								<h5>Premium Users</h5>
							</div>
						</div>
						<div class="col-6">
							<!-- Service item -->
							<div class="service-item">
								<i class="fa fa-flag"></i>
								<h5>Unlimited Profits</h5>
							</div>
						</div>
						<div class="col-6">
							<!-- Service item -->
							<div class="service-item">
								<i class="fa fa-ticket"></i>
								<h5>Unlimited Gifts</h5>
							</div>
						</div>
						<div class="col-6">
							<!-- Service item -->
							<div class="service-item">
								<i class="fa fa-calendar"></i>
								<h5>Available 24/7</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 p-0">
				<div class="registration-block bg-registration overlay-dark">
					<div class="block">
						<div class="title text-left">
							<h3>Register to <span class="alternate">{{env('APP_NAME')}}</span></h3>
							<p>Register to get started</p>
						</div>
						<form action="{{ route('register') }}" class="row" method="POST">
							<div class="col-md-6">
								<input type="text" class="form-control main" placeholder="Your Name" required name="name" maxlength="11">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control main" placeholder="Mobile Number" required name="email">
							</div>
							<div class="col-md-6">
								<input type="password" class="form-control main" placeholder="Password" required name="password">
							</div>
							<div class="col-12">
								<button type="submit" class="btn btn-white-md">Register Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--====  End of Registration  ====-->


<!--===================================
=            Pricing Table            =
====================================-->

<section class="section pricing" id="plans">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3>Premium <span class="alternate">Investments</span></h3>
					<p>Industry leading premium investment plans</p>
				</div>
			</div>
		</div>
		<div class="row">
			@isset($plans)
			@foreach($plans as $key => $plan)
			<div class="col-lg-4 col-md-6" style="margin-bottom:20px">
				<!-- Pricing Item -->
				<div class="pricing-item featured">
					<div class="pricing-heading">
						<!-- Title -->
						<div class="title">
							<h6>Allied Fund {{$key+1}}</h6>
						</div>
						<!-- Price -->
						<div class="price">
							<h2>{{$plan->pamount}}<span>PKR</span></h2>
							<p>/Person</p>
						</div>
					</div>
					<div class="pricing-body">
						<!-- Feature List -->
						<ul class="feature-list m-0 p-0">
							<li><p><span class="fa fa-check-circle available"></span>PKR {{$plan->damount}} Daily Earning</p></li>
							<li><p><span class="fa fa-check-circle available"></span>PKR {{$plan->damount*30}} Monthly Earning</p></li>
							<li><p><span class="fa fa-check-circle available"></span>% {{$plan->rcom}} Refferal Commission</p></li>
						</ul>
					</div>
					<div class="pricing-footer text-center">
						<a href="{{route('register')}}" class="btn btn-transparent-md">Invest Now</a>
					</div>
				</div>
			</div>
			@endforeach
			@endisset
		</div>
	</div>
</section>

<!--====  End of Pricing Table  ====-->


<!--===========================================
=            Call to Action Ticket            =
============================================-->

<section class="cta-ticket bg-ticket overlay-dark" id="reg">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<!-- Get ticket info -->
				<div class="content-block">
					<h2>We are registered from <span class="alternate">SECP & FBR</span></h2>
					<a href="{{asset('public/front/secp.pdf')}}" download="{{asset('public/front/secp.pdf')}}" class="btn btn-main-md">View SECP</a>
					<a href="{{asset('public/front/fbr.pdf')}}" download="{{asset('public/front/fbr.pdf')}}" class="btn" style="padding: 15px 40px;
  border-radius: 0;
  background: #ee0c0c;
  color: #fff;
  outline: none;
  font-size: 0.9375rem;">View FBR</a>
				</div>
			</div>
		</div>
	</div>
	<div class="image-block"><img src="images/speakers/speaker-ticket.png" alt="" class="img-fluid"></div>
</section>

<!--====  End of Call to Action Ticket  ====-->

<!--==============================
=            Sponsors            =
===============================-->

<section class="sponsors section bg-sponsors overlay-white" id="sponsors">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3>Our <span class="alternate">Sponsors</span></h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- Title -->
				<div class="block text-center">
					<!-- Sponsors image list -->
					<ul class="list-inline sponsors-list">
						<li class="list-inline-item">
							<div class="image-block text-center">
								<a href="https://urfcvm-uc.myshopify.com/">
									<img src="{{asset('public/front/images/sponsors/pt-spon-two.png')}}" alt="sponsors-logo" class="img-fluid">
								</a>
							</div>
						</li>
						
					</ul>
				</div>
				<!-- Title -->
			</div>
		</div>
	</div>
</section>

<!--====  End of Sponsors  ====-->


<!--==============================================
=            Call to Action Subscribe            =
===============================================-->

<section class="cta-subscribe bg-subscribe overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mr-auto">
				<!-- Subscribe Content -->
				<div class="content">
					<h3>Our legal <span class="alternate">Advisor</span></h3>
					<p>Mr. Danish Sangheera <br> Legal Advisor<br>Allied Funds Pvt Ltd.</p>
				</div>
			</div>
			<div class="col-md-6 ml-auto align-self-center">
				<!-- Subscription form -->
				<img src="{{asset('public/front/images/speakers/speaker-1.jpg')}}">
			</div>
		</div>
	</div>
</section>

<!--====  End of Call to Action Subscribe  ====-->
@endsection