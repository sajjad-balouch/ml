<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Alert;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Payment Accounts';
        $rows = Account::all();
        return view('admin.accounts.index',compact('title','rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'New Payment Account';
        return view('admin.accounts.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'qrcode' => 'required|mimes:jpg,JPG,png|max:2048', 
        ]);

        if($request->has('qrcode')){
            $file = $request->file('qrcode');
            $path = $file->getRealPath();
            $name = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/qrcodes/'), $name);

            $row = new Account();
            $row->qrcode = $name;
            $row->name = $request->name;
            $row->number = $request->number;
            $row->account_type = $request->account_type;
            $row->save();
            Alert::alert('Message', 'Payment Account Saved', 'success');
            return redirect()->route('admin.accounts');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = Account::findorfail($id);
        $row->delete();
        Alert::alert('Message','Payment Account Deleted','success');
        return redirect()->back();
    }
}
