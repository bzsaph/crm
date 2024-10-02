<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 11px; /* Base font size */
        }
        .header {
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007BFF; /* Header background color */
        }
        .header img {
            height: 50px;
        }
        .invoice-details {
            padding: 20px;
            background-color: white; /* White background for details */
            margin: 20px;
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .recipient, .services {
            border: 1px solid black;
            margin: 0; /* No margins */
            padding: 10px; /* Padding inside the boxes */
            display: inline-block;
            width: 45%;
            vertical-align: top;
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .details {
            margin-bottom: 20px;
        }
        h2, h3 {
            font-size: 14px; /* Smaller heading size */
            margin: 0 0 8px; /* Margin below heading */
        }
        p {
            font-size: 8px; /* Smaller paragraph size */
            margin: 0; /* Remove top margin */
            line-height: 1.5; /* Improved readability */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 10px; /* Smaller table text size */
        }
        th, td {
            border: 1px solid black;
            padding: 5px; /* Reduced padding */
            text-align: left;
        }
        .footer {
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #aaa;
            opacity: 0.5;
        }
        /* Button styles */
        .button {
            display: inline-block;
            background-color: black; /* Button color */
            color: white;
            padding: 5px 10px; /* Button padding */
            text-decoration: none;
            border-radius: 5px; /* Rounded corners */
            font-size: 8px; /* Smaller button text */
            margin: 0; /* No margins */
        }
        .summary-table {
            display: flex;
            justify-content: flex-end; /* Aligns the table to the right */
            margin: 20px 0; /* Add margin to space it from surrounding elements */
            width: 20%;
            margin-left: 80%;
        }
        .summary {
            border-collapse: collapse; /* Collapses table borders */
            font-size: 9px; /* Smaller font size */
        }
        .summary td {
            padding: 3px 5px; /* Smaller padding */
            border: 1px solid black; /* Border for table cells */
            text-align: right; /* Aligns text to the right */
        }
        .summary tr:last-child td {
            font-weight: bold; /* Bold text for the last row */
        }
    </style>
</head>
<body>
    <div class="header">
        @if($company->logo && File::exists(public_path('logos/' . $company->logo)))
            <img id="logoPreview" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logos/' . $company->logo))) }}" alt="Company Logo">
        @else
            <img id="logoPreview" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('path_to_default_logo/default.png'))) }}" alt="Default Company Logo">
        @endif
    </div>

    <div class="invoice-details">
        <h2>Invoice #{{ $sale->id }}</h2>
        <p>Invoice No: {{ $sale->invoice_number }}</p>
        <p>Created: {{ \Carbon\Carbon::parse($sale->created_at)->format('F j, Y') }}</p>
        <p>Due: {{ \Carbon\Carbon::parse($sale->created_at)->addDays(15)->format('F j, Y') }}</p>
    </div>

    <div class="recipient">
        <strong>Bill From:</strong>
        <p>Company Name: {{ $company->name ?? 'Company Name' }}</p>
        <p>Address: {{ $company->address ?? 'Company Address' }}</p>
        <p>Phone: {{ $company->phone ?? 'Company Phone' }}</p>
        <p>TIN: {{ $company->tin ?? '..............' }}</p>
        <p>Contact Email: {{ $company->contact_email ?? '...........' }}</p>
    </div>

    <div class="services">
        <strong>Bill To:</strong>
        <p>Company Name: {{ $sale->client->name ?? '..........' }}</p>
        <p>Address: {{ $sale->client->address ?? 'Client Address' }}</p>
        <p>Phone: {{ $sale->client->phone ?? '............' }}</p>
        <p>TIN: {{ $sale->client->tin ?? '........' }}</p>
        <p>Contact Email: {{ $sale->client->email ?? '...........' }}</p>
    </div>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->products as $product)
                <tr>
                    <td>{{ $product->stock->item_name ?? 'N/A' }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->unit_price, 2) }}</td>
                    <td>{{ number_format($product->total_price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="summary-table">
        <table class="summary">
            <tr>
                <td>Total Amount:</td>
                <td>{{ number_format($sale->products->sum('total_price'), 2) }} RWF</td>
            </tr>
            <tr>
                <td>Tax %:</td>
                <td>0</td>
            </tr>
            <tr>
                <td><strong>Total:</strong></td>
                <td><strong>{{ number_format($sale->products->sum('total_price'), 2) }} RWF</strong></td>
            </tr>
        </table>
    </div>
    
    <div>
        <p>Payment Method: Bank transfer or check</p>
        Make all checks payable to: <br>
        Name:..............<br>
        Bank Name:................<br>
        Bank Account:.............. <br>
        Note:  TAX EXCLUSIVE
  
    </div>

    <div class="footer">
        <p>Company Name: {{ $company->name ?? 'Company Name' }}</p> <br>
      
    </div>
</body>
</html>
