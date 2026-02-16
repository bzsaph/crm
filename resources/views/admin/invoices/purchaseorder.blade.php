<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Order - {{ $sale->invoice_number ?? 'DRAFT' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            margin: 0;
            padding: 0;
        }

        .header { padding: 20px; display: flex; justify-content: space-between; align-items: center; }
        .header img { height: 50px; }

        .po-details { padding: 20px; margin: 20px; border: 1px solid #ccc; border-radius: 5px; }

        .box { border: 1px solid black; padding: 10px; width: 45%; display: inline-block; vertical-align: top; }

        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 6px; text-align: left; }
        th { background: #f2f2f2; }

        .summary-table { width: 40%; margin-left: 60%; margin-top: 20px; }
        .summary-table td { border: 1px solid black; padding: 5px; text-align: right; }
        .summary-table tr:last-child td { font-weight: bold; }

        .footer { text-align: center; margin-top: 30px; font-size: 10px; }
    </style>
</head>
<body>

<div class="header">
    @if($company->logo && File::exists(public_path('logos/' . $company->logo)))
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logos/' . $company->logo))) }}" alt="Logo">
    @else
        <h3>{{ $company->name ?? 'Company Name' }}</h3>
    @endif

    <h2>PURCHASE ORDER</h2>
</div>

<div class="po-details">
    <p><strong>PO Number:</strong> {{ $sale->invoice_number ?? 'DRAFT' }}</p>
    <p><strong>PO Date:</strong> {{ $sale->invoice_date ? \Carbon\Carbon::parse($sale->invoice_date)->format('F j, Y') : '' }}</p>
    <p><strong>Expected Delivery:</strong> {{ $sale->delivery_date ? \Carbon\Carbon::parse($sale->delivery_date)->format('F j, Y') : '' }}</p>
</div>

<!-- Vendor Info -->
<div class="box">
    <strong>Vendor:</strong>
    <p>Name: ...........................</p>
    <p>Address: ........................</p>
    <p>Phone: ..........................</p>
    <p>TIN: ............................</p>
    <p>Email: ..........................</p>
</div>

<!-- Bill To -->
<div class="box">
    <strong>Bill To:</strong>
    <p>{{ $company->name ?? '' }}</p>
    <p>{{ $company->address ?? '' }}</p>
    <p>Phone: {{ $company->phone ?? '' }}</p>
    <p>TIN: {{ $company->tinnumber ?? '' }}</p>
    <p>Email: {{ $company->email ?? '' }}</p>
</div>

<!-- Items Table -->
<table>
    <thead>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Unit Cost</th>
           
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
       
           
                <tr>
                    <td>          </td>
                    <td>         </td>
                    <td>        </td>
                    <td>        </td>
                </tr>
    
            {{-- Empty rows for manual entry --}}
            @for($i = 0; $i < 9; $i++)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endfor
     
    </tbody>
</table>

<!-- Summary Table -->


<!-- Terms & Conditions -->
<div style="margin:20px;">
    <strong>Terms & Conditions:</strong>
    <p>Payment Terms: {{ $sale->payment_terms ?? '..........................................................................................................................................................................................................................................................As agreed' }}</p>
    <p>Delivery Period: Within {{ $sale->delivery_period ?? '............................... Days' }}</p>
    <p>Authorized By: _______________________________________________________</p>
</div>

<!-- Footer -->
<div class="footer">
    <p>{{ $company->name ?? '' }} | {{ $company->address ?? '' }}</p>
</div>

</body>
</html>
