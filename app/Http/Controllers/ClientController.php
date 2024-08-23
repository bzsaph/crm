<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Display a listing of the clients.
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    // Show the form for creating a new client.
    public function create()
    {
        return view('admin.clients.create');
    }

    // Store a newly created client in the database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:clients',
            'phone' => 'nullable|string',
        ]);

        Client::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    // Display the specified client.
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    // Show the form for editing the specified client.
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
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
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
