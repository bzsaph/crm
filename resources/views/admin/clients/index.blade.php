@extends('layouts.adminapp')
@section('content')
    <h1>Clients</h1>
    <a href="{{ route('clients.create') }}">Add New Client</a>
    <ul>
        @foreach ($clients as $client)
            <li>
                <a href="{{ route('clients.show', $client) }}">{{ $client->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
