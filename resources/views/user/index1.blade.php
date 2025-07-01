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
          width: 16px;
          height: 16px;
        }
        .debit-img {
          width: 40px;
          height: 40px;
          object-fit: cover;
          border-radius: 0.5rem;
        }
    </style>
    <div class="container">
        <div class="profile-card">
            <div class="profile-initials">MZ</div>
            <div class="balance-section">
                <h3>Muhammad Zahid</h3>
                <div class="amount">Rs. 3.67 <i class="fas fa-eye"></i></div>
            </div>
        </div>

        <div class="transactions">
            <div class="transaction-summary">
                <div>
                    <div>Received</div>
                    <div class="amount">Rs. 0.00</div>
                </div>
                <div>
                    <div>Sent</div>
                    <div class="amount">Rs. 0.00</div>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Mastercard-logo.png/320px-Mastercard-logo.png" alt="Debit Card">
            <div>Zindigi Debit Card</div>
            <div><a href="#" class="highlight">Order &rarr;</a></div>
        </div>

        <div class="quick-actions">
            <div class="quick-grid">
                <div class="quick-action">
                    <img src="{{ asset('public/images/save-money.png') }}" alt="Deposit">
                    <div>Deposit</div>
                </div>
                <div class="quick-action">
                    <img src="{{ asset('public/images/cash-withdrawal.png') }}" alt="Withdraw">
                    <div>Withdraw</div>
                </div>
                <div class="quick-action">
                    <img src="{{ asset('public/images/wedding-invitation.png') }}" alt="Invite">
                    <div>Invite</div>
                </div>
                <div class="quick-action">
                    <img src="{{ asset('public/images/24-hours-support.png') }}" alt="Help">
                    <div>Help Desk</div>
                </div>
                <div class="quick-action">
                    <img src="{{ asset('public/images/transaction.png') }}" alt="History">
                    <div>History</div>
                </div>
                <div class="quick-action">
                    <img src="{{ asset('public/images/teamwork.png') }}" alt="Team">
                    <div>Team</div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-nav">
        <a href="#" class="highlight">
            <i class="fas fa-home"></i>
            Home
        </a>
        <a href="#">
            <i class="fas fa-gift"></i>
            Promotions
        </a>
        <a href="#">
            <i class="fas fa-qrcode"></i>
            SCAN QR
        </a>
        <a href="#">
            <i class="fas fa-coins"></i>
            Spin & Win
        </a>
        <a href="#">
            <i class="fas fa-ellipsis-h"></i>
            More
        </a>
    </div>
<br><br>

@endsection