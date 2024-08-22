<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Client;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();
        return view('admin.complaints.index', compact('complaints'));
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
