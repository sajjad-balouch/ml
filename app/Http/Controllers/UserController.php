<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ledger;
use App\Models\Plan;
use App\Models\Withdraw_account;
use App\Models\Account;
Use Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $tdeposit = Ledger::where([['user_id',$user],['status',1],['type','Deposit']])->sum('debit');
        $pdeposit = Ledger::where([['user_id',$user],['status',0],['type','Deposit']])->sum('debit');
        $tprofit = Ledger::where([['user_id',$user],['status',1],['type','Withdraw']])->sum('credit');
        $pprofit = Ledger::where([['user_id',$user],['status',0],['type','Withdraw']])->sum('credit');
        return view('user.index',compact('tdeposit','tprofit'));
    }

    public function eidi()
    {
        $title = 'Eid Gift';
        return view('user.eidi',compact('title'));
    }

    public function team()
    {
        $user = auth()->user()->id;
        $rows = User::where('refId', $user)->get();

        $title = 'Team';
        return view('user.team', compact('title','rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function deposit_view()
    {
        $title = "Deposit";
        $plans = Plan::all();
        $accounts = Account::all();
        return view('user.deposit', compact('title','plans','accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function deposit_store(Request $request)
    {
        $request->validate([
            'sshort' => 'required|mimes:jpg,png'
        ]);
        $file = $request->file('sshort');
        $path = $file->getRealPath();
        $name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/images/proof/'),$name);

        $user = auth()->user()->id;
        $ledger = new Ledger();
        $ledger->user_id = $user;
        $ledger->plan_id = $request->plan_id;
        $ledger->Type = 'Deposit';
        $ledger->debit = $request->amount;
        $ledger->method = $request->method;
        $ledger->save();
        Alert::alert('Message', 'Recharge Successfull', 'success');
        return redirect()->route('user');
    }

    public function qrcode($id)
    {
        $title = 'Payment';
        $code = Account::where('account_type',$id)->first()->qrcode;
        return view('user.qrcode', compact('code','title'));
    }

    public function withdraw_view()
    {
        $title = "Withdraw";
        $rows = Withdraw_account::all();
        return view('user.withdraw', compact('title','rows'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function withdraw_store(Request $request)
    {
        $user = auth()->user()->id;
        $ledger = new Ledger();
        $ledger->user_id = $user;
        $ledger->account_title = $request->account_title;
        $ledger->account_number = $request->account_number;
        $ledger->Type = 'Withdraw';
        $ledger->credit = $request->amount;
        $ledger->method = $request->withdraw_type;
        $ledger->save();
        Alert::alert('Message', 'Withdraw Successfull', 'success');
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function change_name(Request $request)
    {
        $user = User::where('id',auth()->user()->id)->first();
        $user->name = $request->name;
        $user->update();
        Alert::alert('Update', 'Name Updated', 'success');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function change_password(Request $request)
    {
        $request->validate([
            'pass' => ['required', 'string','min:6'],
        ]);
        
        $user = User::where('id',auth()->user()->id)->first();
        $user->password = \Hash::make($request->pass);
        $user->save();
        Alert::alert('Update', 'Password Changed', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function change_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|mimes:jpg,png|max:2048', 
        ]);

        if($request->has('avatar')){
            $file = $request->file('avatar');
            $path = $file->getRealPath();
            $name = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/avatars/'), $name);

            $user = User::where('id',auth()->user()->id)->first();
            $user->avatar = $name;
            $user->save();
            Alert::alert('Update', 'Avatar Changed', 'success');
            return redirect()->back();
        }else{
            return redirect()->back();
        }

        

    }

    public function profile(){

        $title = "Profile";
        $user = auth()->user()->id;
        $tdeposit = Ledger::where([['user_id',$user],['status',1],['type','Deposit']])->sum('debit');
        $pdeposit = Ledger::where([['user_id',$user],['status',0],['type','Deposit']])->sum('debit');
        $tprofit = Ledger::where([['user_id',$user],['status',1],['type','Withdraw']])->sum('credit');
        $pprofit = Ledger::where([['user_id',$user],['status',0],['type','Withdraw']])->sum('credit');
        return view('user.profile', compact('title','tdeposit','pdeposit','tprofit','pprofit'));
    }


    public function all_users(){
        $title = 'All Users';
        $users = User::all();
        return view('admin.users.all_users',compact('title','users'));
    }

    public function active_users(){
        $title = 'Active Users';
        $users = User::select('users.*')->join('ledgers','ledgers.user_id','users.id')
                ->where([['ledgers.type','Deposit'],['ledgers.status',1]])->groupBy('ledgers.user_id')->get();
        return view('admin.users.active_users',compact('title','users'));
    }

    public function inactive_users(){
        $title = 'In-Active Users';
        $users = User::select('users.*')->leftjoin('ledgers','ledgers.user_id','users.id')
                ->where('users.role',0)
                ->whereNull('ledgers.user_id')->get();
        return view('admin.users.inactive_users',compact('title','users'));
    }

    public function user_detail($id){
        $title = 'User Detail';
        $user = User::findorfail($id);
        $refs = User::select('users.*','ledgers.debit','plans.rcom')
                ->join('ledgers','ledgers.user_id','users.id')
                ->join('plans','plans.id','ledgers.plan_id')
                ->where('refId',$id)->get();
        $deposits = Ledger::where([['user_id',$id],['type','Deposit']])->get();
        $withdraws = Ledger::where([['user_id',$id],['type','Withdraw']])->get();
        return view('admin.users.user_detail',compact('title','user','refs','deposits','withdraws'));
    }

    public function change_password_view($id){
        $title = 'Change Password';
        return view('admin.users.change_password',compact('title','id'));
    }

    public function update_user_password(Request $request)
    {
        $request->validate([
            'pass' => ['required', 'string','min:6'],
        ]);
        
        $user = User::where('id',$request->user_id)->first();
        $user->password = \Hash::make($request->pass);
        $user->save();
        Alert::alert('Update', 'Password Changed', 'success');
        return redirect()->back();
    }

    public function histroy()
    {
        $title = 'Histroy';
        $user = auth()->user()->id;
        $rows = Ledger::where('user_id', $user)->get();
        return view('user.transactions', compact('title','rows'));
    }

    public function proof(Request $request)
    {
        $request->validate([
            'proof' => 'required|mimes:jpg,png|max:2048', 
        ]);

        if($request->has('proof')){
            $file = $request->file('proof');
            $path = $file->getRealPath();
            $name = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/proof/'), $name);

            $user = Ledger::where('id',$request->id)->first();
            $user->proof = $name;
            $user->update();
            Alert::alert('Message', 'Proof Uploaded', 'success');
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        $ledger = ledger::where('user_id',$id);
        if($ledger != Null)
            $ledger->delete();

        Alert::alert('Message', 'User Deleted', 'success');
        return redirect()->back();
    }

}
