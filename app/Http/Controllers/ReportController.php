<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Client;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('admin.reports.index', compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'report_content' => 'required',
        ]);

        Report::create($request->all());
        return redirect()->route('reports.index')->with('success', 'Report created.');
    }
}

