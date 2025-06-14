@extends('layouts.app')

@section('content')
    <style>
        /* Purple Theme + 3D Feel */
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

    </style>
    <div class="row" style="text-align: center; padding: 0px; margin:0px;">
        <div class="col-md-12" style="margin-top:20px">
            <h3 style="font-family:arial; color:white; text-shadow: 2px 2px 2px black;">A Project of Global Traders</h3>
        </div>
    </div>
    <div class="wrapper bg-white rounded-4 shadow-lg p-4 mx-auto" style="max-width: 420px; margin-top: 5rem; margin-bottom: 5rem;">
    <div class="h2 text-center text-purple fw-bold">{{ env('APP_NAME') }}</div>
    <div class="h5 text-muted text-center pt-2">Enter your login details</div>

    @if ($errors->any())
        @foreach ($errors->all() as $message)
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif

    <form class="pt-3" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group mb-4 position-relative">
            <label class="form-label">Mobile Number</label>
            <div class="input-group shadow-inner">
                <span class="input-group-text bg-purple text-white border-0">+92</span>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Mobile Number" required>
            </div>
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-4 position-relative">
            <label class="form-label">Password</label>
            <div class="input-group shadow-inner">
                <span class="input-group-text bg-purple text-white border-0"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your Password" required>
            </div>
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <!-- <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label text-muted" for="remember">Remember me</label> -->
            </div>
            <a href="#" class="text-purple text-decoration-none">Forgot Password?</a>
        </div>

        <button type="submit" class="btn btn-purple w-100 shadow">Log in</button>

        <div class="text-center pt-3 text-muted">
            Not a member? <a href="{{ route('register') }}" class="text-purple text-decoration-none fw-semibold">Sign up</a>
        </div>
    </form>
</div>

@endsection
