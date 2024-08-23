<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\Client;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();
        return view('admin.complaints.index', compact('complaints'));
    }
    public function create($clientId)
    {
        // Fetch clients or any required data
        $client = Client::find($clientId);
        
        if (!$client) {
            return redirect()->route('clients.index')->with('error', 'Client not found.');
        }

        return view('admin.complaints.create', compact('client'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'complaint_text' => 'required',
        ]);

        Complaint::create($request->all());
        return redirect()->route('complaints.index')->with('success', 'Complaint registered.');
    }
}
