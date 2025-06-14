@extends('user.app')
@section('content')

     <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Segoe UI', sans-serif;
        }
        .account-card {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            border-radius: 20px;
            color: white;
        }
        .feature-box {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 15px;
            transition: 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        .feature-box img {
            width: 30px;
            margin-bottom: 8px;
        }
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #ffffff;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
            z-index: 999;
        }
        .bottom-nav a {
            text-align: center;
            font-size: 12px;
            color: #888;
        }
        .bottom-nav i {
            font-size: 18px;
            display: block;
        }
    </style>

    <div class="container py-4 mb-5">

    <!-- Account Info Card -->
    <div class="account-card p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="fw-bold">Welcome</div>
                <div>{{ auth()->user()->name }}</div>
            </div>
            <div class="text-end">
                <div class="fs-4 fw-bold">
                    Rs. {{ number_format(user_total_earning() - user_total_withdraw(), 2) }}
                    <i class="bi bi-eye ms-2"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Transactions Summary -->
    <div class="d-flex justify-content-between mb-3">
        <div class="flex-fill bg-white rounded-4 p-3 text-center me-2">
            <div class="text-muted small">Deposit</div>
            <div class="fw-bold">Rs. @isset($tdeposit) {{$tdeposit}} @endisset</div>
        </div>
        <div class="flex-fill bg-white rounded-4 p-3 text-center ms-2">
            <div class="text-muted small">Withdraw</div>
            <div class="fw-bold">Rs. @isset($tprofit) {{$tprofit}} @endisset</div>
        </div>
    </div>

    <!-- Features Grid -->
    <div class="row g-3 text-center mb-3">
        <div class="col-4" >
            <a href="{{ route('user.deposit-view') }}" class="text-decoration-none text-dark">
                <div class="feature-box">
                    <img src="{{ asset('public/images/save-money.png') }}">
                    <div>Deposit</div>
                </div>
            </a>
        </div>
        <div class="col-4 mb-3">
            <a href="{{ route('user.withdraw-view') }}" class="text-decoration-none text-dark">
                <div class="feature-box">
                    <img src="{{ asset('public/images/cash-withdrawal.png') }}">
                    <div>Withdraw</div>
                </div>
            </a>
        </div>
        <div class="col-4 mb-3">
            <a href="javascript:void(0)" onclick="shareLink('https://allied-funds.com/register/{{ auth()->user()->id }}')" class="text-decoration-none text-dark">
                <div class="feature-box">
                    <img src="{{ asset('public/images/wedding-invitation.png') }}">
                    <div>Invite</div>
                </div>
            </a>
        </div>
        <div class="col-4 mb-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="feature-box">
                    <img src="{{ asset('public/images/24-hours-support.png') }}">
                    <div>Help</div>
                </div>
            </a>
        </div>
        <div class="col-4 mb-3">
            <a href="{{ route('user.transactions') }}" class="text-decoration-none text-dark">
                <div class="feature-box">
                    <img src="{{ asset('public/images/transaction.png') }}">
                    <div>History</div>
                </div>
            </a>
        </div>
        <div class="col-4 mb-3">
            <a href="{{ route('user.team') }}" class="text-decoration-none text-dark">
                <div class="feature-box">
                    <img src="{{ asset('public/images/teamwork.png') }}">
                    <div>Team</div>
                </div>
            </a>
        </div>
        <div class="col-4 mb-3">
            <a href="https://wa.me/+923435243456" class="text-decoration-none text-dark">
                <div class="feature-box">
                    <img src="{{ asset('public/images/whatsapp.png') }}">
                    <div>Support</div>
                </div>
            </a>
        </div>
        <div class="col-4 mb-3">
            <a href="https://chat.whatsapp.com/DaUOnq5Sve98rC11SVx9Dd" class="text-decoration-none text-dark">
                <div class="feature-box">
                    <img src="{{ asset('public/images/phone-message.png') }}">
                    <div>Community</div>
                </div>
            </a>
        </div>
        <div class="col-4 mb-3">
            <a href="{{ route('user.eidi') }}" class="text-decoration-none text-dark">
                <div class="feature-box">
                    <img src="{{ asset('public/images/qurbani.png') }}">
                    <div>Eid Gift</div>
                </div>
            </a>
        </div>
    </div>

</div>
<br><br>

@endsection