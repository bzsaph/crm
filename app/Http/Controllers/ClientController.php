<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

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
}
