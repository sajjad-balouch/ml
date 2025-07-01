@extends('user.app')
@section('content')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f8f9fb;
            color: #333;
        }
        .container {
            padding: 1rem;
        }
        .profile-card {
            background: linear-gradient(135deg, #27b6c6, #009fdf);
            border-radius: 20px;
            padding: 1.5rem;
            color: white;
            position: relative;
        }
        .profile-initials {
            background: white;
            color: #009fdf;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            text-align: center;
            line-height: 50px;
            font-weight: bold;
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .balance-section {
            text-align: center;
            margin-top: 1rem;
        }
        .balance-section h3 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 400;
        }
        .balance-section .amount {
            font-size: 2rem;
            font-weight: 600;
        }
        .transactions, .quick-actions, .bottom-nav {
            margin-top: 1.5rem;
        }
        .transaction-summary {
            display: flex;
            justify-content: space-between;
            text-align: center;
            background: white;
            border-radius: 15px;
            padding: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .transaction-summary div {
            flex: 1;
        }
        .transaction-summary .amount {
            font-weight: 600;
            margin-top: 0.25rem;
        }
        .card-icon {
          width: 25px;
          height: 25px;
        }
        .fw-semibold{
            color: white;
        }
        .debit-img {
          width: 40px;
          height: 40px;
          object-fit: cover;
          border-radius: 0.5rem;
        }
        .icon-button {
          min-height: 80px;
          border: 1px solid #e0e0e0;
          border-radius: 1rem;
          padding: 0.75rem;
          display: flex;
          align-items: center;
          gap: 0.75rem;
          font-weight: 500;
          background: linear-gradient(135deg, #27b6c6, #009fdf);
        }
        .icon-button:hover {
          background-color: #f9f9f9;
        }
        .icon-img {
          width: 35px;
          height: 35px;
          background-color: white;
          padding: 5px;
          border-radius: 50%;
        }
        .badge-new {
          font-size: 0.6rem;
          position: absolute;
          top: -0.5rem;
          right: -0.5rem;
        }
        .icon-button span{
            color: white !important;
        }
        .bg-white{
            background: linear-gradient(135deg, #27b6c6, #009fdf);
        }
        .text-muted,.text-dark,.text-primary{
            color: white !important;
        }
        .text-primary a{
            color: white;
        }
    </style>
    <div class="container"><br>
        <div class="profile-card">
            <div class="profile-initials">
                @php 
                    $words = explode(' ', auth()->user()->name);

                    $initials = '';
                    foreach ($words as $word) {
                        $initials .= mb_substr($word, 0, 1); // use mb_substr for multibyte safety
                    }
                @endphp
            {{$initials}}</div>
            <div class="balance-section">
                <h3>{{auth()->user()->name}}</h3>
                <div class="amount">Rs. {{ number_format(user_total_earning() - user_total_withdraw(), 2) }} <i class="fas fa-eye"></i></div>
            </div>
        </div>

        <!-- Header -->
      <div class="d-flex justify-content-between align-items-center mb-3 mt-3">
        <h6 class="fw-semibold mb-0">Today's Transactions</h6>
        
      </div>

      <!-- Cards Row -->
      <div class="row g-3 mb-3">
        <div class="col-6">
          <div class="border rounded-4 bg-white p-3 shadow-sm h-100">
            <div class="d-flex align-items-center text-muted mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="card-icon me-2 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
              </svg>&nbsp;&nbsp;
              <small>Deposit</small>
            </div>
            <h6 class="mb-0 fw-semibold">Rs. @isset($tdeposit) {{number_format($tdeposit,2)}} @endisset</h6>
          </div>
        </div>

        <div class="col-6">
          <div class="border rounded-4 bg-white p-3 shadow-sm h-100">
            <div class="d-flex align-items-center text-muted mb-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="card-icon me-2 text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 20V4m8 8H4" />
              </svg>&nbsp;&nbsp;
              <small>Withdraw</small>
            </div>
            <h6 class="mb-0 fw-semibold">Rs. @isset($tprofit) {{number_format($tprofit,2)}} @endisset</h6>
          </div>
        </div>
      </div>

      <!-- Debit Card -->
      <div class="border rounded-4 bg-white p-3 shadow-sm d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
          <span class="fw-medium text-dark">&nbsp;&nbsp;Visit Our Store</span>
        </div>
        <div class="d-flex align-items-center text-primary fw-semibold">
          <a href="https://urfcvm-uc.myshopify.com/" target="_blank">Our Store</a>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ms-1 bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6.646 1.646a.5.5 0 0 1 .708 0l4.5 4.5a.5.5 0 0 1 0 .708l-4.5 4.5a.5.5 0 0 1-.708-.708L10.793 6.5 6.646 2.354a.5.5 0 0 1 0-.708z"/>
          </svg>
        </div>
      </div>


        
      <div class="row g-3">

      <!-- Transfer Money -->
      <div class="col-6 col-md-4 mt-3">
        <a href="{{ route('user.deposit-view') }}"><div class="icon-button">
          <img src="{{ asset('public/images/save-money.png') }}" alt="Deposit" class="icon-img">
          <span>Deposit</span>
        </div></a>
      </div>

      <!-- Payments -->
      <div class="col-6 col-md-4 mt-3">
        <a href="{{ route('user.withdraw-view') }}"><div class="icon-button">
          <img src="{{ asset('public/images/cash-withdrawal.png') }}" alt="Withdraw" class="icon-img">
          <span>Withdraw</span>
        </div></a>
      </div>

      <!-- Loans (with "New" badge) -->
      <div class="col-6 col-md-4 position-relative mt-3">
        <a href="javascript:void(false)" onclick="shareLink('https://allied-funds.com/register/{{ auth()->user()->id }}')"><div class="icon-button">
          <img src="{{ asset('public/images/wedding-invitation.png') }}" alt="Invite" class="icon-img">
          <span>Invite</span>
        </div></a>
      </div>

      <!-- Mobile Load -->
      <div class="col-6 col-md-4 mt-3">
        <a href="https://wa.me/+923413199914"><div class="icon-button">
          <img src="{{ asset('public/images/24-hours-support.png') }}" alt="Help" class="icon-img">
          <span>Help Desk</span>
        </div></a>
      </div>

      <!-- Mutual Funds -->
      <div class="col-6 col-md-4 mt-3">
        <a href="{{route('user.transactions')}}"><div class="icon-button">
          <img src="{{ asset('public/images/transaction.png') }}" alt="History" class="icon-img">
          <span>Histroy</span>
        </div></a>
      </div>

      <!-- Shortcuts -->
      <div class="col-6 col-md-4 mt-3">
        <a href="{{route('user.team')}}"><div class="icon-button">
          <img src="{{ asset('public/images/teamwork.png') }}" alt="Team" class="icon-img">
          <span>Team</span>
        </div></a>
      </div>

      <div class="col-6 col-md-4 mt-3">
        <a href="{{asset('public/alliedfunds.apk')}}" download="{{asset('public/alliedfunds.apk')}}"><div class="icon-button">
          <img src="{{ asset('public/images/android.jpg') }}" alt="Team" class="icon-img">
          <span>Download Our App</span>
        </div></a>
      </div>

    </div>

<br><br><br><br>

@endsection