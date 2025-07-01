@extends('layouts.app')

@section('content')
@if($errors->any())
    {{$errors}}
@endif
<style>
    .text-purple {
        color: #5e17eb;
    }

    .bg-purple {
        background-color: #5e17eb;
    }

    .btn-purple {
        background-color: #5e17eb;
        color: white;
        border-radius: 25px;
        transition: all 0.3s ease;
    }

    .btn-purple:hover {
        background-color: #4a0ed8;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(94, 23, 235, 0.3);
    }

    .shadow-inner {
        box-shadow: inset 2px 2px 6px rgba(0, 0, 0, 0.05), inset -2px -2px 6px rgba(255, 255, 255, 0.7);
    }

    input.form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(94, 23, 235, 0.25);
        border-color: #5e17eb;
    }

    .wrapper {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
    }

</style>
<div class="wrapper bg-white rounded-4 shadow-lg p-4 mx-auto" style="max-width: 420px; margin-top: 8rem; margin-bottom: 5rem;">
    <div class="h2 text-center text-purple fw-bold">{{ env('APP_NAME') }}</div>
    <div class="h5 text-muted text-center pt-2">Enter your login details</div>

    <form class="pt-3" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group mb-4">
            <label class="form-label">Name</label>
            <div class="input-group shadow-inner">
                <span class="input-group-text bg-purple text-white border-0"><i class="fa fa-user"></i></span>
                <input type="text" placeholder="Your Full Name" required class="form-control" name="name">
            </div>
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Mobile Number</label>
            <div class="input-group shadow-inner">
                <span class="input-group-text bg-purple text-white border-0">+92</span>
                <input type="text" placeholder="Mobile Number" maxlength="11" required class="form-control" name="email">
            </div>
        </div>

        <div class="form-group mb-4">
            <label class="form-label">Password</label>
            <div class="input-group shadow-inner">
                <span class="input-group-text bg-purple text-white border-0"><i class="fa fa-lock"></i></span>
                <input type="password" placeholder="Enter your Password" maxlength="6" required class="form-control" name="password">
                <!-- <button type="button" class="btn bg-white text-muted"><i class="fa fa-eye-slash"></i></button> -->
            </div>
        </div>
        @isset(request()->id)
        <div class="form-group mb-4">
            <label class="form-label">Referral Code(Optional)</label>
            <div class="input-group shadow-inner">
                <span class="input-group-text bg-purple text-white border-0"><i class="fa fa-user"></i></span>
                <input type="text" placeholder="Referral Code" class="form-control" name="refcode" value="{{ request()->id }}">
            </div>
        </div>
        @endisset
        <button type="submit" class="btn btn-purple w-100 shadow">Register</button>

        <div class="text-center pt-3 text-muted">
            Already a member? <a href="{{ url('enter') }}" class="text-purple text-decoration-none fw-semibold">Login</a>
        </div>
    </form>
</div>

@endsection
