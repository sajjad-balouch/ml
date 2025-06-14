<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ledger;
use Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Home';
        return view('admin.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pending_deposits()
    {
        $title = 'Pending Deposits';
        $rows = Ledger::where([['type','Deposit'],['status',0]])->get();
        return view('admin.pending_deposits',compact('rows','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function approved_deposits()
    {
        $title = 'Approved Deposits';
        $rows = Ledger::where([['type','Deposit'],['status',1]])->get();
        return view('admin.approved_deposits',compact('rows','title'));
    }

    public function approve_deposit($id)
    {
        $row = Ledger::findorfail($id);
        $row->status = 1;
        $row->update();
        Alert::alert('Message','Deposit Approved');
        return redirect()->back();
    }

    
    public function pending_withdraw()
    {
        $title = 'Pending Withdraw';
        $rows = Ledger::where([['type','Withdraw'],['status',0]])->get();
        return view('admin.pending_withdraw',compact('rows','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function approved_withdraw()
    {
        $title = 'Approved Withdraw';
        $rows = Ledger::where([['type','Withdraw'],['status',1]])->get();
        return view('admin.approved_withdraw',compact('rows','title'));
    }

    public function approve_withdraw($id)
    {
        $row = Ledger::findorfail($id);
        $row->status = 1;
        $row->update();
        Alert::alert('Message','Withdraw Approved');
        return redirect()->back();
    }

    public function destroy_withdraw($id)
    {
        $row = Ledger::findorfail($id);
        $row->delete();
        Alert::alert('Message','Withdraw Deleted','success');
        return redirect()->back();
    }
}
