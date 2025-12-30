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
            font-size: 11px;
        }
        .header {
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            height: 50px;
        }
        .invoice-details {
            padding: 20px;
            background-color: white;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .recipient, .services {
            border: 1px solid black;
            margin: 0;
            padding: 10px;
            display: inline-block;
            width: 45%;
            vertical-align: top;
            border-radius: 5px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        .details {
            margin-bottom: 20px;
        }
        h2, h3 {
            font-size: 14px;
            margin: 0 0 8px;
        }
        p {
            font-size: 8px;
            margin: 0;
            line-height: 1.5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
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
        .summary-table {
            display: flex;
            justify-content: flex-end;
            margin: 20px 0;
            width: 40%; /* Increased from 20% to 40% */
            margin-left: 60%; /* Adjusted to keep it aligned to the right */
        }

        .summary {
            border-collapse: collapse;
            font-size: 9px;
        }
        .summary td {
            padding: 3px 5px;
            border: 1px solid black;
            text-align: right;
        }
        .summary tr:last-child td {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        @if($company->logo && File::exists(public_path('logos/' . $company->logo)))
            <img id="logoPreview" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logos/' . $company->logo))) }}" alt="Company Logo">
        @else
            <p>{{ $company->name ?? 'Company Name' }}</p>
        @endif
    </div>

    <div class="invoice-details">
        <p>Invoice No: {{ $sale->invoice_number }}</p>
        <p>Created: {{ \Carbon\Carbon::parse($sale->created_at)->format('F j, Y') }}</p>
        <p>Due: {{ \Carbon\Carbon::parse($sale->created_at)->addDays(15)->format('F j, Y') }}</p>
    </div>

    <div class="recipient">
        <strong>Bill From:</strong>
        <p>Company Name: {{ $company->name ?? 'Company Name' }}</p>
        <p>Address: {{ $company->address ?? 'Company Address' }}</p>
        <p>Phone: {{ $company->phone ?? 'Company Phone' }}</p>
        <p>TIN: {{ $company->tinnumber ?? '..............' }}</p>
        <p>Contact Email: {{ $company->email ?? '...........' }}</p>
        <p>Monthly Invoiced: {{ \Carbon\Carbon::parse($sale->invoicedate)->format('F d, Y') }}</p>
    </div>

    <div class="services">
        <strong>Bill To:</strong>
        <p>Company Name: {{ $sale->client->name ?? '..........' }}</p>
        <p>Address: {{ $sale->client->address ?? 'Client Address' }}</p>
        <p>Phone: {{ $sale->client->phone ?? '............' }}</p>
        <p>TIN: {{ $sale->client->tinnumber ?? '........' }}</p>
        <p>Contact Email: {{ $sale->client->email ?? '...........' }}</p>
    </div>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>VAT</th>
                    <th>Unit Price</th>
                   
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPrice = 0;
                    $totalVAT = 0;
                @endphp
                @foreach($sale->products as $product)
                    @php
                        $productTotal = $product->total_price;
                        $vat = ($product->total_price * ($product->tax_rate ?? 0)) / 100;
                        $totalPrice += $productTotal;
                        $totalVAT += $vat;
                    @endphp
                    <tr>
                        <td>{{ $product->stock->item_name ?? 'N/A' }}</td>
                        
                        <td>{{ $product->quantity ?? 'N/A' }}</td>
                        <td>{{ number_format($vat, 2 ) }}</td>
                        <td>{{ number_format($product->unit_price, 2) }}</td>
                        <td>{{ number_format($productTotal, 2) }}</td>
                     
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="summary-table">
        <table class="summary">
            <tr>
                <td>Subtotal:</td>
                <td>{{ number_format($totalPrice, 2) }} RWF</td>
            </tr>
            <tr>
                <td>Total VAT:</td>
                <td>{{ number_format($totalVAT, 2) }} RWF</td>
            </tr>
            <tr>
                <td><strong>Grand Total:</strong></td>
                <td><strong>{{ number_format($totalPrice + $totalVAT, 2) }} RWF</strong></td>
            </tr>
        </table>
    </div>

    <div class="recipient">
        <strong>Payment Method</strong>
        <p>Bank Name: {{  $company->bkname  ?? '...........' }}</p>
        <p>Account Owner: {{ $company->acowner  ?? '...........' }}</p>
        <p>Account Number: {{$company->bkaccount ?? '...........' }}</p>
        <p>Note: {{ $company->notes ?? '...........' }}</p>
    </div>

    <div class="footer">
        <p>Company Name: {{ $company->name ?? 'Company Name' }}</p>
        <p>Company Address: {{ $company->address ?? 'Company Address' }}</p>
    </div>
</body>
</html>
