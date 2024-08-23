<?php

namespace App\Http\Controllers;

use App\Report;
use App\Client;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $clientId='1';
        // Fetch reports for a specific client
        $reports = Report::where('client_id', $clientId)->get();
        return view('admin.reports.index', compact('reports', 'clientId'));
    }
    
    public function create()
    {
        // Fetch clients to be used in the view
        $clients = Client::all();
        return view('admin.reports.create', compact('clients'));
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

