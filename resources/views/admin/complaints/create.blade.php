@extends('layouts.adminapp')

<!-- Add Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />

@section('content')
<div class="container">
    <h1>Add New Complaint</h1>
    <form action="{{ route('complaints.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="client_id">Client</label>
            <select class="form-control" id="client_id" name="client_id" required>
                <option value="">Select a client</option>
            </select>
        </div>
        <div class="form-group">
            <label for="complaint_text">Complaint Content</label>
            <textarea class="form-control" id="complaint_text" name="complaint_text" required></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="open">Open</option>
                <option value="resolved">Resolved</option>
                <option value="closed">Closed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Complaint</button>
    </form>
</div>

<!-- Add jQuery and Select2 JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    console.log('Document is ready.');

    $('#client_id').select2({
        placeholder: 'Select a client',
        ajax: {
            url: '{{ route('clients.search') }}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                console.log('AJAX request sent with query:', params.term);
                return {
                    query: params.term
                };
            },
            processResults: function (data) {
                console.log('Received data:', data);
                return {
                    results: $.map(data, function (client) {
                        console.log('Processing client:', client);
                        return {
                            text: client.name,
                            id: client.id
                        };
                    })
                };
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            },
            cache: true
        }
    }).on('select2:select', function(e) {
        console.log('Client selected:', e.params.data);
    }).on('select2:opening', function() {
        console.log('Select2 dropdown is opening.');
    }).on('select2:close', function() {
        console.log('Select2 dropdown is closing.');
    });

    console.log('Select2 has been initialized.');
});
</script>
@endsection
