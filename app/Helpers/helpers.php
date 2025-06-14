<?php
use App\Models\User;
use App\Models\Ledger;
use App\Models\Plan;
use Carbon\Carbon;

if (!function_exists('user_total_earning')) {
    function user_total_earning() {
        $user = auth()->user()->id;
        $ps = Ledger::select('ledgers.created_at','plans.damount')
                ->join('plans','plans.id','ledgers.plan_id')
                ->where([['ledgers.user_id',$user],['ledgers.type','Deposit'],['ledgers.status',1]])->get();
        $sum = 0;
        foreach($ps as $p){
            $date1 = Carbon::parse($p->created_at);
            $date2 = Carbon::now();

            $diffInDays = $date1->diffInDays($date2,false);
            $days = round($diffInDays+1,0);
            $sum = $sum + ($p->damount*$days);
        }
        return $sum + ref_earning();
    }
}

if (!function_exists('user_total_withdraw')) {
    function user_total_withdraw() {
        $user = auth()->user()->id;
        $withdraw = Ledger::where([['user_id',$user],['type','Withdraw']])->sum('credit');
        return $withdraw;
    }
}

// admin functions
if(!function_exists('total_deposit')){
    function total_deposit(){
        $tdeposit = Ledger::where([['status',1],['type','Deposit']])->sum('debit');
        return $tdeposit;
    }
}

if(!function_exists('total_withdraw')){
    function total_withdraw(){
        $twithdraw = Ledger::where([['status',1],['type','Withdraw']])->sum('credit');
        return $twithdraw;
    }
}

if(!function_exists('today_deposit')){
    function today_deposit(){
        $td = \Carbon\Carbon::now();
        $today_deposit = Ledger::where([['status',1],['type','Deposit']])->whereDate('created_at',$td)->sum('debit');
        return $today_deposit;
    }
}

if(!function_exists('today_withdraw')){
    function today_withdraw(){
        $td = \Carbon\Carbon::now();
        $today_withdraw = Ledger::where([['status',1],['type','Withdraw']])->whereDate('created_at',$td)->sum('debit');
        return $today_withdraw;
    }
}

if(!function_exists('total_users')){
    function total_users(){
        $total_users = User::where([['role',0]])->count();
        return $total_users;
    }
}

if(!function_exists('pending_deposit_requets')){
    function pending_deposit_requets(){
        $pending_deposit_requets = Ledger::where([['type','Deposit'],['status',0]])->count();
        return $pending_deposit_requets;
    }
}

if(!function_exists('pending_withdraw_requets')){
    function pending_withdraw_requets(){
        $pending_withdraw_requets = Ledger::where([['type','Withdraw'],['status',0]])->count();
        return $pending_withdraw_requets;
    }
}
// end admin functions

if(!function_exists('ref_earning')){
    function ref_earning(){
        $user = auth()->user()->id;
        $sum = 0;
        $rows = User::select('users.id','ledgers.debit','plans.rcom')
            ->join('ledgers','ledgers.user_id','users.id')
            ->join('plans','plans.id','ledgers.plan_id')
            ->where([['users.refId', $user],['ledgers.type','Deposit'],['ledgers.status',1]])->groupBy('ledgers.user_id')->get();
        foreach($rows as $key => $row){ 
            $sum = $sum + ( ( $row->debit * $row->rcom ) / 100 );
        }
        return $sum;
    }
}
// end user functions
