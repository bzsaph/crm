<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    // Display a listing of the clients.
    public function index()
    {
    $user = Auth::user();

    if ($user->hasRole('super_admin')) {
        // Super admin can see all clients
        $clients = Client::all();
    } else {
        // Get the companies the user is associated with
        $companyIds = $user->companies->pluck('id')->toArray();

        // Get clients that belong to those companies
        if (count($companyIds) > 0) {
            // Get clients that belong to the companies the user is associated with
            $clients = Client::whereIn('company_id', $companyIds)->get();
        } else {
            // If the user isn't associated with any company, you can handle this case as needed
            $clients = collect();  // Or show a message to the user indicating no clients found
        }
    }

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
       
         $activeUsers = User::activeInSameCompanies()->get();
         // This will give you the raw SQL query
   
        return view('admin.clients.create', compact('activeUsers'));;
    }

  public function store(Request $request)
{
    // Validate input data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:clients,email',
        'phone' => 'nullable|string|max:20',
        'managed_by' => 'nullable|string|max:255',
        'status' => 'required|in:0,1', // status is a string, not boolean
        'client_type' => 'required|in:vendor,client',
        'tinnumber' => 'required|string|max:255',
        'address' => 'required|string|max:255',
    ]);

    // Add the authenticated user as the logged_in_id
    $validatedData['loged_in_id'] = auth()->user()->id;
        $validatedData['company_id'] =1;
    

    // Create a new client
    Client::create($validatedData);

    return redirect()->route('companies.create')->with('success', 'Client created successfully!');
}


    // Display the specified client.
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    // Show the form for editing the specified client.
    public function edit(Client $client)
    {
     
       // Get the currently logged-in user
       $loggedInUser = Auth::user();

       // Fetch active users from the same company as the logged-in user
       $activeUsers = User::activeInSameCompanies()->get();

       return view('admin.clients.edit', compact('client', 'activeUsers'));
        }

    // Update the specified client in the database.
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable|string',
        ]);

        $client->update($request->all());
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    // Remove the specified client from the database.
    public function destroy(Client $client)
    {
        // $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $clients = Client::where('name', 'LIKE', "%{$query}%")->get(['id', 'name']);

        return response()->json($clients);
    }
    
    

}
