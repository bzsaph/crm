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
        .header { padding: 20px; display: flex; justify-content: space-between; align-items: center; }
        .header img { height: 50px; }
        .invoice-details { padding: 20px; background-color: white; margin: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .recipient, .services { border: 1px solid black; margin: 0; padding: 10px; display: inline-block; width: 45%; vertical-align: top; border-radius: 5px; box-shadow: 0 1px 2px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 10px; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; }
        .summary-table { display: flex; justify-content: flex-end; margin: 20px 0; width: 40%; margin-left: 60%; }
        .summary { border-collapse: collapse; font-size: 9px; }
        .summary td { padding: 3px 5px; border: 1px solid black; text-align: right; }
        .summary tr:last-child td { font-weight: bold; }
        .footer { position: absolute; bottom: 10px; left: 0; width: 100%; text-align: center; font-size: 10px; color: #aaa; opacity: 0.5; }
    </style>
</head>
<body>
    <div class="header">
        @if($company->logo && File::exists(public_path('logos/' . $company->logo)))
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logos/' . $company->logo))) }}" alt="Company Logo">
        @else
            <p>{{ $company->name ?? 'Company Name' }}</p>
        @endif
    </div>

    <div class="invoice-details">
       
        <p>Perform Invoice No: {{ $sale->invoice_number }}</p>
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
                    <th>Unit Price</th>
                    <th>VAT</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $subtotal = 0;
                    $totalVAT = 0;
                @endphp
                @foreach($sale->products as $product)
                    @php
                        $unitPrice = $product->unit_price;
                        $quantity = $product->quantity;
                        $taxRate = $product->tax_rate ?? 0;
                        $lineTotal = $unitPrice * $quantity;
                        $vat = ($lineTotal * $taxRate) / 100;
                        $subtotal += $lineTotal;
                        $totalVAT += $vat;
                    @endphp
                    <tr>
                        <td>{{ $product->stock->item_name ?? 'N/A' }}</td>
                        <td>{{ $quantity }}</td>
                        <td>{{ number_format($unitPrice, 2) }}</td>
                        <td>{{ number_format($vat, 2) }}</td>
                        <td>{{ number_format($lineTotal + $vat, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="summary-table">
        <table class="summary">
            <tr>
                <td>Subtotal:</td>
                <td>{{ number_format($subtotal, 2) }} RWF</td>
            </tr>
            <tr>
                <td>Total VAT:</td>
                <td>{{ number_format($totalVAT, 2) }} RWF</td>
            </tr>
            <tr>
                <td><strong>Grand Total:</strong></td>
                <td><strong>{{ number_format($subtotal + $totalVAT, 2) }} RWF</strong></td>
            </tr>
        </table>
    </div>

    <div class="recipient">
        <strong>Payment Method</strong>
        <p>Bank Name: {{  $company->bkname  ?? '...........' }}</p>
        <p>Account Awner: {{ $company->acowner  ?? '...........' }}</p>
        <p>Count Number: {{$company->bkaccount ?? '...........' }}</p>
        <p>Note: {{ $company->notes ?? '...........' }}</p>
        <p>Please Note: Valid For 18 days start from : {{ \Carbon\Carbon::parse($sale->invoicedate)->format('F d, Y') }}  </p>
        <p>Delivery Period : With In 4 Weeks Upon Receiving LPO </p>
         <p>Company Name: {{ $company->name ?? 'Company Name' }}</p>  <p>Company Address: {{ $company->address ?? 'Company address' }}</p><br>
    </div>
    

    <div class="footer">
        <p>Company Name: {{ $company->name ?? 'Company Name' }}</p>  <p>Company Name: {{ $company->address ?? 'Company address' }}</p><br>
      
    </div>
    
</body>
</html>
