<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $sale->id }}</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            font-size: 10px; /* Set global font size to 10px */
        }

        .invoice-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #eee;
        }

        .logo img {
            max-width: 100px; /* Adjust logo size */
            height: auto;
        }

        .info {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .info .section {
            width: 48%; /* Adjust width to fit side by side */
        }

        .info h3 {
            margin-bottom: 5px;
            color: #333;
            font-size: 10px;
            font-weight: bold;
        }

        .info p {
            margin: 2px 0;
            color: #555;
            font-size: 10px;
        }

        .table-container {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 12px;
            border: 1px solid #eee;
            text-align: left;
            font-size: 10px; /* Set table font size to 10px */
        }

        table th {
            background-color: #f9f9f9;
            color: #333;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 10px;
        }

        .watermark {
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #aaa;
            opacity: 0.5;
        }

        @media (max-width: 600px) {
            .header,
            .info {
                flex-direction: column;
                align-items: flex-start;
            }

            .header .invoice-details,
            .info .section {
                width: 100%;
                margin-top: 10px;
            }

            .info .section {
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <div class="logo">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/logos/' . $company->logo))) }}" alt="Company Logo">
            </div>
            <div class="invoice-details">
                <h2>Invoice #{{ $sale->id }}</h2>
                <p>Invoice No: {{ $sale->invoice_number }}</p>
                <p>Created: {{ \Carbon\Carbon::parse($sale->created_at)->format('F j, Y') }}</p>
                <p>Due: {{ \Carbon\Carbon::parse($sale->created_at)->addDays(30)->format('F j, Y') }}</p>
            </div>
        </div>

        <div class="info">
            <div class="section company-info">
                <h3>Company</h3>
                <p>Name: {{ $company->name ?? 'Company Name' }}</p>
                <p>Address: {{ $company->address ?? 'Company Address' }}</p>
                <p>Phone: {{ $company->phone ?? 'Company Phone' }}</p>
                <p>Tin: {{ $company->tin ?? 'N/A' }}</p>
                <p>Payment Method: {{ $company->payment_method ?? 'N/A' }}</p>
                <p>Contact Email: {{ $company->contact_email ?? 'N/A' }}</p>
            </div>

            <div class="section client-info">
                <h3>Bill To:</h3>
                <p>Company: {{ $sale->client->name ?? 'N/A' }}</p>
                <p>Phone: {{ $sale->client->phone ?? 'N/A' }}</p>
                <p>Email: {{ $sale->client->email ?? 'N/A' }}</p>
                <p>Tin: {{ $sale->client->tin ?? 'N/A' }}</p>
            </div>
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

        <div class="total">
            <h3>Total: {{ number_format($sale->products->sum('total_price'), 2) }} RWF</h3>
        </div>

        <div class="watermark">
            {{ $company->name ?? 'Company Name' }} | Confidential Invoice
        </div>
    </div>
</body>
</html>
