<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index(Client $client)
    {
   

        $complaints = Complaint::where('status','open')->get(); // Retrieve complaints related to the client
     
        return view('admin.complaints.index', compact('complaints', 'client'));
    }
    

    
public function create(Client $client)
{
    return view('admin.complaints.create', compact('client'));
}


    

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'complaint_text' => 'required|string',
            'status' => 'required|in:open,resolved,closed',
        ]);
    
        // Create a new complaint
        Complaint::create([
            'client_id' => $request->client_id,
            'complaint_text' => $request->complaint_text,
            'status' => $request->status,
            'loged_in_id' => Auth::user()->id, // Set the ID of the currently logged-in user
        ]);
    
        // Redirect with success message
        return redirect()->route('complaints.index')->with('success', 'Complaint added successfully!');
    }

    // ComplaintController.php

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaints.show', compact('complaint'));
    }
// ComplaintController.php

    public function edit($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaints.edit', compact('complaint'));
    }
    // ComplaintController.php

public function update(Request $request, $id)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'complaint_text' => 'required|string',
        'status' => 'required|in:open,resolved,closed',
    ]);

    // Find the complaint by ID
    $complaint = Complaint::findOrFail($id);

    // Update the complaint with validated data
    $complaint->update($validatedData);

    // Redirect with a success message
    return redirect()->route('complaints.index', ['client' => $complaint->client_id])
                     ->with('success', 'Complaint updated successfully.');
}


}
