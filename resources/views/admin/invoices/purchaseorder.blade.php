<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Purchase Order - Yanjye Limited</title>

<style>

/* ===== RESET ===== */
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

body{
  font-family: Arial, Helvetica, sans-serif;
  background:#f4f6f9;
  padding:10px;
}

/* ===== PRINT BUTTON ===== */
.print-btn-container{
  text-align:right;
  margin-bottom:10px;
}

.print-btn{
  padding:6px 14px;
  background:#0d6efd;
  color:white;
  border:none;
  border-radius:4px;
  cursor:pointer;
  font-size:13px;
}

.print-btn:hover{
  background:#084298;
}

/* ===== DOCUMENT ===== */
.document{
  width:210mm;
  min-height:297mm;
  margin:auto;
  background:#ffffff;
  padding:15mm;
  box-shadow:0 5px 15px rgba(0,0,0,0.08);
  overflow:hidden;
}

/* ===== HEADER ===== */
.header{
  display:flex;
  justify-content:space-between;
  border-bottom:2px solid #0d6efd;
  padding-bottom:10px;
  margin-bottom:15px;
}

.company-info h1{
  font-size:18px;
  color:#0d6efd;
  display:flex;
  align-items:center;
  gap:8px;
}

.company-info img{
  height:35px;
  width:35px;
}

.company-info p{
  font-size:12px;
  color:#555;
  margin-top:4px;
  line-height:1.4;
}

.po-info{
  text-align:right;
}

.po-info h2{
  font-size:16px;
  margin-bottom:5px;
}

.po-info p{
  font-size:12px;
  line-height:1.4;
}

/* ===== SECTION ===== */
.section{
  margin-top:15px;
}

.section h3{
  font-size:13px;
  margin-bottom:6px;
  border-bottom:1px solid #ddd;
  padding-bottom:4px;
}

/* ===== TWO COLUMNS ===== */
.two-columns{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:12px;
}

.box{
  border:1px solid #ddd;
  padding:10px;
  border-radius:5px;
  font-size:12px;
  line-height:1.4;
}

/* ===== TABLE ===== */
table{
  width:100%;
  border-collapse:collapse;
  margin-top:8px;
  font-size:12px;
}

table th{
  background:#f0f3f8;
  padding:6px;
  border:1px solid #ddd;
  text-align:left;
}

table td{
  padding:6px;
  border:1px solid #ddd;
}

.text-right{
  text-align:right;
}

/* ===== NOTES ===== */
.notes ul{
  margin-left:15px;
  margin-top:5px;
}

.notes li{
  font-size:12px;
  margin-bottom:4px;
}

/* ===== SIGNATURES ===== */
.signatures{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:12px;
  margin-top:15px;
}

.signature-box{
  border:1px dashed #aaa;
  padding:10px;
  height:80px;
  font-size:12px;
}

/* ===== PRINT SETTINGS ===== */
@media print{

  .print-btn-container{
    display:none !important;
  }

  @page{
    size:A4;
    margin:10mm;
  }

  body{
    background:white;
    padding:0;
  }

  .document{
    box-shadow:none;
    padding:0;
  }

  *{
    page-break-inside:avoid !important;
  }
}

</style>
</head>

<body>

<!-- PRINT BUTTON -->
<div class="print-btn-container">
  <button class="print-btn" onclick="window.print()">Print / Save PDF</button>
</div>

<div class="document">

<!-- HEADER -->
<div class="header">
  <div class="company-info">
    <h1>
      <img src="test3.png" alt="Company Logo">
      Yanjye Limited
    </h1>
    <p>
      {{ $company->name ?? '' }}<br>
      {{ $company->address ?? '' }}<br>
      Phone: {{ $company->phone ?? '' }}<br>
      Email: {{ $company->email ?? '' }}<br>
      VAT: {{ $company->tinnumber ?? '' }}
    </p>
  </div>

  <div class="po-info">
    <h2>Purchase Order</h2>
    <p><strong>PO No:</strong> {{ $sale->invoice_number ?? 'DRAFT' }}</p>
    <p><strong>Issue Date:</strong> {{ $sale->invoice_date ? \Carbon\Carbon::parse($sale->invoice_date)->format('F j, Y') : '' }}</p>
    <p><strong>Required By:</strong> {{ $sale->invoice_date ? \Carbon\Carbon::parse($sale->invoice_date)->format('F j, Y') : '' }}</p>
    <p><strong>Payment Terms:</strong> Net 2 Days</p>
  </div>
</div>

<!-- VENDOR & BUYER -->
<div class="section">
  <h3>Vendor & Buyer Information</h3>
  <div class="two-columns">

    <div class="box">
      <strong>Buyer:</strong><br>
      {{ Auth::user()->name }} – IT Department<br>
      Gasogi Cyaruzinge<br>
      Phone: +250 788 377 874<br>
      Contact: CTO
    </div>

    <div class="box">
      <strong>Vendor:</strong><br>
      Kigali Smart Solutions Ltd<br>
      Contact: Mr. Salah Naser<br>
      Tona House, 1st Floor, Shop No.2<br>
      Kigali City, Rwanda<br>
      Phone: +250 793 190 001<br>
      Email: info@kigalismartsolutions.com<br>
      VAT: 121551638
    </div>

  </div>
</div>

<!-- ITEMS -->
<div class="section">
  <h3>Order Items</h3>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Qty</th>
        <th>Unit</th>
        <th class="text-right">Unit Price (RWF)</th>
        <th class="text-right">Total (RWF)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>SecuGen Hamster Plus HSDUO3P Fingerprint Reader</td>
        <td>33</td>
        <td>Unit</td>
        <td class="text-right">140,000</td>
        <td class="text-right">4,620,000</td>
      </tr>
    </tbody>
  </table>
</div>

<!-- NOTES -->
<div class="section notes">
  <h3>Notes & Terms</h3>
  <ul>
    <li>Goods must be delivered within the agreed timeline.</li>
    <li>All items must match the specified technical requirements.</li>
    <li>All invoices must reference this Purchase Order number.</li>
    <li>Payment will be processed within 2 days after verified delivery.</li>
    <li>An advance payment of 2,000,000 RWF shall be made.</li>
    <li>Failure to deliver may result in a 50% penalty.</li>
    <li>Total amount is inclusive of all applicable taxes.</li>
  </ul>
</div>

<!-- SIGNATURES -->
<div class="section">
  <h3>Authorisation & Signatures</h3>
  <div class="signatures">

    <div class="signature-box">
      Prepared By:<br><br>
      Signature: ____________________
    </div>

    <div class="signature-box">
      Approved By:<br><br>
      Signature: ____________________
    </div>

    <div class="signature-box">
      Finance Officer:<br><br>
      Signature: ____________________
    </div>

    <div class="signature-box">
      Vendor Acknowledgement:<br><br>
      Signature: ____________________
    </div>

  </div>
</div>

</div>

</body>
</html>
