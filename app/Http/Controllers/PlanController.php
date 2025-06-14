<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Alert;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Plans';
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Plans - New';
        return view('admin.plans.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plan = new Plan();
        $plan->pamount = $request->pamount;
        $plan->damount = $request->damount;
        $plan->rcom = $request->rcom;
        $plan->pdur = $request->pdur;
        $plan->save();
        Alert::alert('Message', 'Plan Saved', 'success');
        return redirect()->route('plans');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Plans - Edit';
        $plan = Plan::findorfail($id);
        return view('admin.plans.create', compact('title','plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $plan = Plan::findorfail($id);
        $plan->pamount = $request->pamount;
        $plan->damount = $request->damount;
        $plan->rcom = $request->rcom;
        $plan->pdur = $request->pdur;
        $plan->update();
        Alert::alert('Message', 'Plan Updated', 'success');
        return redirect()->route('plans');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plan = Plan::findorfail($id);
        $plan->delete();
        Alert::alert('Message','Plan Deleted','success');
        return redirect()->back();
    }
}
