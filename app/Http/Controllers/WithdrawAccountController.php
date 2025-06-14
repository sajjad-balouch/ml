<?php

namespace App\Http\Controllers;

use App\Models\Withdraw_account;
use Illuminate\Http\Request;
use Alert;

class WithdrawAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Withdraw Account';
        $rows = Withdraw_account::all();
        return view('admin.withdraw_types.index',compact('title','rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'New Withdraw Account';
        return view('admin.withdraw_types.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $row = new Withdraw_account();
        $row->bank_name = $request->bank_name;
        $row->save();
        Alert::alert('Message', 'Withdraw Account Saved', 'success');
        return redirect()->route('admin.withdraw_accounts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Withdraw_account $withdraw_account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Withdraw Account - Edit';
        $row = Withdraw_account::findorfail($id);
        return view('admin.withdraw_types.create', compact('title','row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $row = Withdraw_account::findorfail($id);
        $row->bank_name = $request->bank_name;
        $row->save();
        Alert::alert('Message', 'Withdraw Account Updated', 'success');
        return redirect()->route('admin.withdraw_accounts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = Withdraw_account::findorfail($id);
        $row->delete();
        Alert::alert('Message','Withdraw Account Deleted','success');
        return redirect()->back();
    }
}
