<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Matter;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reports.index');
    }

    public function matter_select(Request $request)
    {

        $start = $request->start;
        $matters = Matter::all()->where('user_id', Auth::user()->id);
        return view('reports.matter_select', compact('matters', 'start'));
    }

    public function create(Matter $matter, Request $request)
    {
        $start = $request->start;
        return view('reports.create',  compact('matter', 'start'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request, Matter $matter)
    {

        $matter->status = $request->status;
        $matter->category = $request->category;
        $matter->product_name = $request->product_name;
        $matter->save();

        $report = new Report();
        $form = $request->all();
        unset($form['_token']);
        $report->fill($form)->save();
        return redirect(route('reports.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
