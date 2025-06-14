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
                    @if( ( user_total_earning() - user_total_withdraw() ) > 0 )
                        <form method="POST" action="{{ route('user.withdraw-store') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="withdraw_type">Select Withdraw Account Type</label>
                                <select class="form-control custom-select-3d" name="withdraw_type" required>
                                    @isset($rows)
                                        @foreach($rows as $row)
                                            <option value="{{ $row->bank_name }}">{{ $row->bank_name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="account_title">Account Title</label>
                                <input type="text" name="account_title" class="form-control input-3d" placeholder="Account Title" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="account_number">Account Number</label>
                                <input type="text" name="account_number" class="form-control input-3d" placeholder="Account Number" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="amount">Available Withdraw</label>
                                <input type="text" name="amount" class="form-control input-3d text-success font-weight-bold" value="{{ user_total_earning() - user_total_withdraw() }}" readonly>
                            </div>

                            <button type="submit" class="btn btn-success btn-block btn-3d">Withdraw</button>
                        </form>
                    @else
                        <div class="alert alert-info text-center rounded-3 shadow-sm">
                            <strong>No Withdraw Available.</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
@endsection