<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Purchase Order PO-2025-0001 — Yanjye Limited</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet"/>

  <style>
    /* ══════════════════════════════════════
       ROOT / SCREEN THEME
    ══════════════════════════════════════ */
    :root {
      --ink:      #090e1a;
      --surface:  #101624;
      --card:     #131d2c;
      --border:   #1e2d42;
      --accent:   #00d4ff;
      --accent2:  #7c3aed;
      --muted:    #637191;
      --text:     #dde6f4;
      --white:    #ffffff;
      --gold:     #f59e0b;
      --success:  #10b981;
      --danger:   #ef4444;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      background: var(--ink);
      font-family: 'DM Sans', sans-serif;
      color: var(--text);
      font-size: 14px;
      min-height: 100vh;
      background-image:
        radial-gradient(ellipse 65% 42% at 88% -8%,  rgba(0,212,255,.09) 0%, transparent 60%),
        radial-gradient(ellipse 45% 32% at -4% 85%, rgba(124,58,237,.09) 0%, transparent 55%);
    }

    /* ── Print button bar ─────────────────────────────── */
    .print-bar {
      background: var(--surface);
      border-bottom: 1px solid var(--border);
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      position: sticky;
      top: 0;
      z-index: 200;
    }
    .print-bar-left {
      display: flex; align-items: center; gap: 10px;
    }
    .logo-mark {
      width: 36px; height: 36px;
      background: linear-gradient(135deg, var(--accent), var(--accent2));
      border-radius: 9px;
      display: flex; align-items: center; justify-content: center;
      font-family: 'Syne', sans-serif;
      font-weight: 800; font-size: 13px; color: #fff;
      flex-shrink: 0;
    }
    .brand-name  { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 15px; color: var(--white); }
    .brand-sub   { font-size: 10px; color: var(--muted); letter-spacing: .07em; text-transform: uppercase; }
    .btn-print {
      background: linear-gradient(135deg, var(--accent), var(--accent2));
      border: none; color: #fff;
      font-family: 'Syne', sans-serif; font-weight: 700; font-size: 13px;
      padding: 8px 22px; border-radius: 9px;
      cursor: pointer; display: inline-flex; align-items: center; gap: 7px;
      box-shadow: 0 4px 18px rgba(0,212,255,.25);
      transition: transform .2s, box-shadow .2s;
      text-decoration: none;
    }
    .btn-print:hover { transform: translateY(-2px); box-shadow: 0 7px 24px rgba(0,212,255,.35); color: #fff; }

    /* ── Document wrapper ─────────────────────────────── */
    .doc-wrap {
      max-width: 900px;
      margin: 28px auto;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 24px 80px rgba(0,0,0,.55);
    }

    /* ── Doc Header ───────────────────────────────────── */
    .doc-header {
      background: var(--surface);
      padding: 28px 36px 22px;
      position: relative;
      border-bottom: 1px solid var(--border);
    }
    .doc-header::after {
      content: '';
      position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
      background: linear-gradient(90deg, var(--accent), var(--accent2));
    }
    .header-logo-block .co-name {
      font-family: 'Syne', sans-serif; font-size: 28px; font-weight: 800;
      background: linear-gradient(90deg, var(--accent), #a78bfa);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      line-height: 1;
    }
    .header-logo-block .co-address {
      margin-top: 6px; font-size: 12px; color: var(--muted); line-height: 1.7;
    }
    .doc-meta-block { text-align: right; }
    .doc-meta-block .doc-type-pill {
      display: inline-flex; align-items: center; gap: 6px;
      background: rgba(0,212,255,.12);
      border: 1px solid rgba(0,212,255,.30);
      border-radius: 6px;
      color: var(--accent); font-size: 11px; font-weight: 700;
      letter-spacing: .08em; text-transform: uppercase;
      padding: 4px 14px; margin-bottom: 10px;
    }
    .doc-num  { font-family: 'Syne', sans-serif; font-size: 20px; font-weight: 800; color: var(--accent); letter-spacing: -.02em; }
    .doc-num-lbl { font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: .08em; }
    .status-pill {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 4px 13px; border-radius: 99px; font-size: 11px; font-weight: 700;
      letter-spacing: .07em; text-transform: uppercase; margin-top: 8px;
    }
    .s-draft { background: rgba(245,158,11,.12); border: 1px solid rgba(245,158,11,.30); color: var(--gold); }
    .s-dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }

    /* ── Status bar strip ─────────────────────────────── */
    .status-strip {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      border-bottom: 1px solid var(--border);
    }
    .status-cell {
      padding: 14px 20px;
      border-right: 1px solid var(--border);
    }
    .status-cell:last-child { border-right: none; }
    .sc-label { font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: .07em; margin-bottom: 4px; }
    .sc-value { font-size: 13px; font-weight: 600; color: var(--text); font-family: 'Syne', sans-serif; }
    .sc-value.accent  { color: var(--accent); }
    .sc-value.gold    { color: var(--gold); }

    /* ── Doc body ─────────────────────────────────────── */
    .doc-body { padding: 28px 36px; }

    /* ── Section head ─────────────────────────────────── */
    .sec-head {
      display: flex; align-items: center; gap: 9px;
      margin-bottom: 14px;
    }
    .sec-icon {
      width: 28px; height: 28px; border-radius: 7px;
      background: linear-gradient(135deg,rgba(0,212,255,.13),rgba(124,58,237,.13));
      border: 1px solid var(--border);
      display: flex; align-items: center; justify-content: center;
      color: var(--accent); font-size: 12px; flex-shrink: 0;
    }
    .sec-title {
      font-family: 'Syne', sans-serif; font-weight: 700; font-size: 11px;
      text-transform: uppercase; letter-spacing: .09em; color: var(--text);
    }
    .sec-divider {
      height: 1px;
      background: linear-gradient(90deg, var(--border), transparent);
      margin-bottom: 18px;
    }

    /* ── Info grid (vendor / ship-to) ─────────────────── */
    .info-box {
      background: rgba(255,255,255,.03);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 18px 20px;
      height: 100%;
    }
    .info-box .ib-title { font-family: 'Syne', sans-serif; font-size: 15px; font-weight: 700; color: var(--white); margin-bottom: 5px; }
    .info-box .ib-line  { font-size: 12.5px; color: var(--muted); line-height: 1.75; }
    .info-box .ib-line strong { color: var(--text); font-weight: 500; }
    .info-box .ib-badge {
      display: inline-block; margin-top: 9px;
      background: rgba(0,212,255,.09); border: 1px solid rgba(0,212,255,.20);
      border-radius: 5px; padding: 2px 9px;
      font-size: 10.5px; color: var(--accent); font-weight: 600;
    }

    /* ── Order items table ────────────────────────────── */
    .items-table {
      width: 100%; border-collapse: collapse;
      margin-bottom: 0;
    }
    .items-table thead tr {
      background: var(--surface);
      border-bottom: 1px solid var(--border);
    }
    .items-table thead th {
      font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .08em;
      color: var(--muted); padding: 10px 12px; white-space: nowrap;
    }
    .items-table tbody tr { border-bottom: 1px solid rgba(30,45,66,.6); }
    .items-table tbody tr:nth-child(odd)  { background: rgba(255,255,255,.025); }
    .items-table tbody tr:nth-child(even) { background: rgba(255,255,255,.015); }
    .items-table tbody td { padding: 10px 12px; font-size: 13px; vertical-align: middle; color: var(--text); }
    .items-table tfoot tr { background: var(--surface); border-top: 1px solid var(--border); }
    .items-table tfoot td { padding: 9px 12px; font-size: 12px; color: var(--muted); }

    .num-col { text-align: right; }
    .ctr-col { text-align: center; }
    .row-badge {
      width: 26px; height: 26px; border-radius: 50%;
      background: rgba(0,212,255,.12); color: var(--accent);
      font-size: 11px; font-weight: 700;
      display: flex; align-items: center; justify-content: center;
    }
    .cat-pill {
      display: inline-block; padding: 2px 9px; border-radius: 5px;
      font-size: 10px; font-weight: 600; background: rgba(124,58,237,.12);
      border: 1px solid rgba(124,58,237,.25); color: #a78bfa;
    }
    .cat-net  { background: rgba(0,212,255,.09); border-color: rgba(0,212,255,.22); color: var(--accent); }
    .cat-sw   { background: rgba(16,185,129,.09); border-color: rgba(16,185,129,.22); color: #34d399; }
    .cat-svc  { background: rgba(245,158,11,.09); border-color: rgba(245,158,11,.22); color: var(--gold); }
    .total-accent { color: var(--accent); font-weight: 700; font-family: 'Syne', sans-serif; }

    /* ── Totals box ───────────────────────────────────── */
    .totals-box {
      background: rgba(255,255,255,.03);
      border: 1px solid var(--border);
      border-radius: 12px;
      overflow: hidden;
    }
    .totals-row {
      display: flex; justify-content: space-between; align-items: center;
      padding: 11px 18px; border-bottom: 1px solid var(--border);
      font-size: 13px;
    }
    .totals-row:last-child { border-bottom: none; }
    .tr-label { color: var(--muted); }
    .tr-value { font-weight: 600; color: var(--text); font-family: 'Syne', sans-serif; font-size: 13px; }
    .totals-row.grand-row {
      background: linear-gradient(90deg, rgba(0,212,255,.08), rgba(124,58,237,.08));
      border-top: 1px solid rgba(0,212,255,.25);
    }
    .totals-row.grand-row .tr-label { color: var(--accent); font-weight: 700; font-size: 14px; }
    .totals-row.grand-row .tr-value { color: var(--accent); font-size: 17px; font-weight: 800; }

    /* ── Notes box ────────────────────────────────────── */
    .notes-box {
      background: rgba(255,255,255,.03);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 16px 18px;
      height: 100%;
    }
    .notes-box ul { padding-left: 16px; margin: 0; }
    .notes-box li { font-size: 12.5px; color: var(--muted); line-height: 1.75; }
    .notes-box li strong { color: var(--text); }
    .notes-badge {
      display: inline-block; margin-top: 10px;
      background: rgba(0,212,255,.08); border: 1px solid rgba(0,212,255,.18);
      border-radius: 5px; padding: 3px 10px;
      font-size: 11px; color: var(--accent); font-weight: 600; font-family: 'Syne', sans-serif;
    }

    /* ── Signature block ──────────────────────────────── */
    .sig-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .sig-block {
      border: 1px dashed var(--border);
      border-radius: 12px; padding: 18px;
    }
    .sig-block .sb-role {
      font-family: 'Syne', sans-serif; font-size: 11px; font-weight: 700;
      color: var(--accent); text-transform: uppercase; letter-spacing: .07em;
      margin-bottom: 6px;
    }
    .sig-block .sb-field {
      font-size: 12px; color: var(--muted);
      border-bottom: 1px solid var(--border);
      padding-bottom: 4px; margin-bottom: 8px;
    }
    .sig-block .sb-line {
      height: 1px; background: var(--border);
      margin: 28px 0 6px;
    }
    .sig-block .sb-caption {
      font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: .07em;
    }

    /* ── Footer ───────────────────────────────────────── */
    .doc-footer {
      background: var(--surface);
      border-top: 1px solid var(--border);
      padding: 14px 36px;
      display: flex; justify-content: space-between; align-items: center;
    }
    .doc-footer p { font-size: 11px; color: var(--muted); margin: 0; }
    .doc-footer .f-right { text-align: right; }

    /* ── Utility ──────────────────────────────────────── */
    .mb-section { margin-bottom: 28px; }
    .table-wrap { border: 1px solid var(--border); border-radius: 12px; overflow: hidden; }

    /* ══════════════════════════════════════
       PRINT STYLES
    ══════════════════════════════════════ */
    @media print {
      @page { size: A4; margin: 12mm 14mm; }

      body {
        background: #fff !important;
        background-image: none !important;
        color: #111 !important;
        font-size: 10pt;
      }
      .print-bar { display: none !important; }

      .doc-wrap {
        max-width: 100% !important;
        margin: 0 !important;
        border: none !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        background: #fff !important;
      }

      /* Header */
      .doc-header {
        background: #0b0f1a !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
        border-bottom: 2px solid #00d4ff !important;
        padding: 16px 20px !important;
      }
      .header-logo-block .co-name { font-size: 22pt !important; }
      .header-logo-block .co-address { color: #8899aa !important; }

      /* Status strip */
      .status-strip { background: #f4f6fb !important; }
      .status-cell  { border-right: 1px solid #dde !important; padding: 8px 14px !important; }
      .sc-label { color: #888 !important; }
      .sc-value { color: #111 !important; font-size: 10pt !important; }
      .sc-value.accent { color: #00aacc !important; }
      .sc-value.gold   { color: #b07800 !important; }

      /* Body */
      .doc-body { padding: 16px 20px !important; }

      .info-box {
        background: #f8f9fc !important;
        border: 1px solid #dde !important;
        border-radius: 6px !important;
        padding: 12px !important;
      }
      .info-box .ib-title { color: #111 !important; font-size: 11pt !important; }
      .info-box .ib-line  { color: #444 !important; font-size: 9pt !important; }
      .info-box .ib-line strong { color: #111 !important; }
      .info-box .ib-badge { color: #006688 !important; background: #e0f4ff !important; border-color: #bde !important; }

      .sec-title { color: #003355 !important; font-size: 9pt !important; }
      .sec-icon  { display: none !important; }
      .sec-divider { background: #ccd !important; }

      /* Table */
      .table-wrap { border: 1px solid #ccd !important; border-radius: 4px !important; }
      .items-table thead tr  { background: #eef0f8 !important; }
      .items-table thead th  { color: #556 !important; font-size: 8pt !important; }
      .items-table tbody tr:nth-child(odd)  { background: #f9fafc !important; }
      .items-table tbody tr:nth-child(even) { background: #fff !important; }
      .items-table tbody td  { color: #222 !important; font-size: 9.5pt !important; }
      .row-badge { background: #ddf !important; color: #004488 !important; }
      .cat-pill  { background: #eee !important; border-color: #bbb !important; color: #444 !important; }
      .cat-net   { background: #dff !important; border-color: #9dd !important; color: #006 !important; }
      .cat-sw    { background: #dfd !important; border-color: #9d9 !important; color: #040 !important; }
      .cat-svc   { background: #fef !important; border-color: #dbb !important; color: #540 !important; }
      .total-accent { color: #003366 !important; }

      /* Totals */
      .totals-box { border: 1px solid #ccd !important; border-radius: 6px !important; }
      .totals-row { border-bottom: 1px solid #dde !important; }
      .totals-row.grand-row { background: #e8f4ff !important; border-top: 2px solid #0099cc !important; }
      .totals-row.grand-row .tr-label,
      .totals-row.grand-row .tr-value { color: #0066aa !important; }
      .tr-label { color: #666 !important; }
      .tr-value  { color: #111 !important; }

      /* Notes */
      .notes-box { background: #f8f9fc !important; border: 1px solid #dde !important; border-radius: 6px !important; }
      .notes-box li { color: #555 !important; font-size: 9pt !important; }
      .notes-badge { color: #006 !important; background: #ddf !important; border-color: #bbd !important; }

      /* Sig */
      .sig-block { border: 1px dashed #bbb !important; border-radius: 6px !important; }
      .sig-block .sb-role { color: #003366 !important; }
      .sig-block .sb-line { background: #ccd !important; }
      .sig-block .sb-caption { color: #888 !important; }

      /* Footer */
      .doc-footer { background: #f0f2f8 !important; border-top: 1px solid #ccd !important; }
      .doc-footer p { color: #666 !important; font-size: 8pt !important; }

      .doc-header::after { background: #00aacc !important; }
    }
  </style>
</head>
<body>

<!-- ═══════════ PRINT BAR (screen only) ═══════════ -->
<div class="print-bar">
  <div class="print-bar-left">
    <div class="logo-mark">YL</div>
    <div>
      <div class="brand-name">Yanjye Limited</div>
      <div class="brand-sub">Purchase Order — PO-2025-0001</div>
    </div>
  </div>
  <button class="btn-print" onclick="window.print()">
    <i class="fas fa-print"></i> Print / Save PDF
  </button>
</div>

<!-- ═══════════ DOCUMENT ═══════════ -->
<div class="doc-wrap">

  <!-- ── Header ── -->
  <div class="doc-header">
    <div class="row align-items-start">
      <div class="col-7 header-logo-block">
        <div class="co-name">Yanjye Limited</div>
        <div class="co-address">
          <i class="fas fa-map-marker-alt fa-xs mr-1"></i>KG 7 Ave, Kigali Innovation City, Rwanda<br>
          <i class="fas fa-phone-alt fa-xs mr-1"></i>+250 788 000 000&nbsp;&nbsp;
          <i class="fas fa-envelope fa-xs mr-1"></i>procurement@yanjye.rw&nbsp;&nbsp;
          VAT: RW123456789
        </div>
      </div>
      <div class="col-5 doc-meta-block">
        <div class="doc-type-pill"><i class="fas fa-file-invoice"></i>Purchase Order</div>
        <div class="doc-num-lbl">Document Number</div>
        <div class="doc-num">PO-2025-0001</div>
        <div><span class="status-pill s-draft"><span class="s-dot"></span>Draft</span></div>
      </div>
    </div>
  </div>

  <!-- ── Status Strip ── -->
  <div class="status-strip">
    <div class="status-cell">
      <div class="sc-label">Issue Date</div>
      <div class="sc-value">19 Feb 2025</div>
    </div>
    <div class="status-cell">
      <div class="sc-label">Required By</div>
      <div class="sc-value">05 Mar 2025</div>
    </div>
    <div class="status-cell">
      <div class="sc-label">Payment Terms</div>
      <div class="sc-value">Net 30 Days</div>
    </div>
    <div class="status-cell">
      <div class="sc-label">Shipping Method</div>
      <div class="sc-value accent">Express Delivery</div>
    </div>
  </div>

  <!-- ── Body ── -->
  <div class="doc-body">

    <!-- Vendor & Ship-To -->
    <div class="mb-section">
      <div class="sec-head">
        <div class="sec-icon"><i class="fas fa-building"></i></div>
        <div class="sec-title">Vendor Information &amp; Ship To</div>
      </div>
      <div class="sec-divider"></div>
      <div class="row">
        <div class="col-md-6 mb-3 mb-md-0">
          <div class="info-box">
            <div class="ib-title">TechSource Rwanda Ltd</div>
            <div class="ib-line">
              <strong>Contact:</strong> Jean-Paul Mugisha<br>
              <strong>Address:</strong> KN 4 St, Remera, Kigali<br>
              <strong>Phone:</strong> +250 722 111 222<br>
              <strong>Email:</strong> jp@techsource.rw<br>
              <strong>VAT:</strong> RW987654321
            </div>
            <span class="ib-badge">Verified Vendor</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <div class="ib-title">Yanjye Limited — IT Department</div>
            <div class="ib-line">
              <strong>Department:</strong> IT Infrastructure<br>
              <strong>Address:</strong> KG 7 Ave, Kigali Innovation City<br>
              <strong>Floor / Room:</strong> 3rd Floor, Room 301<br>
              <strong>Phone:</strong> +250 788 000 000<br>
              <strong>Contact:</strong> IT Manager
            </div>
            <span class="ib-badge">Internal Recipient</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Order Items -->
    <div class="mb-section">
      <div class="sec-head">
        <div class="sec-icon"><i class="fas fa-boxes"></i></div>
        <div class="sec-title">Order Items</div>
      </div>
      <div class="sec-divider"></div>
      <div class="table-wrap">
        <table class="items-table">
          <thead>
            <tr>
              <th class="ctr-col" style="width:38px;">#</th>
              <th>Description / Item</th>
              <th>Category</th>
              <th class="ctr-col">Qty</th>
              <th class="ctr-col">Unit</th>
              <th class="num-col">Unit Price (RWF)</th>
              <th class="num-col">Total (RWF)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="ctr-col"><div class="row-badge">1</div></td>
              <td><strong>Dell Latitude 5540 Laptop</strong><br><small style="color:var(--muted);font-size:11px;">16GB RAM, 512GB SSD, Intel Core i7</small></td>
              <td><span class="cat-pill">Hardware</span></td>
              <td class="ctr-col">5</td>
              <td class="ctr-col">Unit</td>
              <td class="num-col">950,000</td>
              <td class="num-col total-accent">4,750,000</td>
            </tr>
            <tr>
              <td class="ctr-col"><div class="row-badge">2</div></td>
              <td><strong>Cisco Catalyst 2960-X Switch 48-Port</strong><br><small style="color:var(--muted);font-size:11px;">Layer 2, PoE+, Gigabit</small></td>
              <td><span class="cat-pill cat-net">Networking</span></td>
              <td class="ctr-col">2</td>
              <td class="ctr-col">Unit</td>
              <td class="num-col">1,200,000</td>
              <td class="num-col total-accent">2,400,000</td>
            </tr>
            <tr>
              <td class="ctr-col"><div class="row-badge">3</div></td>
              <td><strong>Microsoft 365 Business Premium License</strong><br><small style="color:var(--muted);font-size:11px;">Annual subscription per user</small></td>
              <td><span class="cat-pill cat-sw">Software</span></td>
              <td class="ctr-col">20</td>
              <td class="ctr-col">License</td>
              <td class="num-col">85,000</td>
              <td class="num-col total-accent">1,700,000</td>
            </tr>
            <tr>
              <td class="ctr-col"><div class="row-badge">4</div></td>
              <td><strong>APC Smart-UPS 1500VA</strong><br><small style="color:var(--muted);font-size:11px;">Tower, LCD, 230V</small></td>
              <td><span class="cat-pill">Hardware</span></td>
              <td class="ctr-col">3</td>
              <td class="ctr-col">Unit</td>
              <td class="num-col">450,000</td>
              <td class="num-col total-accent">1,350,000</td>
            </tr>
            <tr>
              <td class="ctr-col"><div class="row-badge">5</div></td>
              <td><strong>Cat6 UTP Cable (305m Box)</strong><br><small style="color:var(--muted);font-size:11px;">23AWG, CM rated</small></td>
              <td><span class="cat-pill cat-net">Networking</span></td>
              <td class="ctr-col">4</td>
              <td class="ctr-col">Box</td>
              <td class="num-col">120,000</td>
              <td class="num-col total-accent">480,000</td>
            </tr>
            <tr>
              <td class="ctr-col"><div class="row-badge">6</div></td>
              <td><strong>IT Infrastructure Setup &amp; Configuration</strong><br><small style="color:var(--muted);font-size:11px;">Network, server room, cabling</small></td>
              <td><span class="cat-pill cat-svc">Services</span></td>
              <td class="ctr-col">1</td>
              <td class="ctr-col">Project</td>
              <td class="num-col">500,000</td>
              <td class="num-col total-accent">500,000</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6" class="text-right" style="font-size:11px;color:var(--muted);padding-right:16px;">6 line items — all amounts in Rwandan Franc (RWF)</td>
              <td class="num-col" style="color:var(--accent);font-weight:700;font-size:14px;font-family:'Syne',sans-serif;">11,180,000</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <!-- Totals + Notes -->
    <div class="mb-section">
      <div class="row">
        <div class="col-md-7 mb-3 mb-md-0">
          <div class="sec-head">
            <div class="sec-icon"><i class="fas fa-sticky-note"></i></div>
            <div class="sec-title">Notes &amp; Terms</div>
          </div>
          <div class="sec-divider"></div>
          <div class="notes-box">
            <ul>
              <li>Goods must be delivered within the agreed timeline.</li>
              <li>All items must match the specified technical requirements.</li>
              <li>All invoices must reference this Purchase Order number.</li>
              <li>Yanjye Limited reserves the right to reject non-conforming goods.</li>
              <li>Payment processed within <strong>30 days</strong> of verified delivery.</li>
              <li>Partial deliveries must be communicated in advance.</li>
            </ul>
            <div class="notes-badge">Project: PROJ-2025-IT-009 &nbsp;|&nbsp; Budget: IT-CAPEX-2025</div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="sec-head">
            <div class="sec-icon"><i class="fas fa-calculator"></i></div>
            <div class="sec-title">Order Summary</div>
          </div>
          <div class="sec-divider"></div>
          <div class="totals-box">
            <div class="totals-row">
              <span class="tr-label">Subtotal</span>
              <span class="tr-value">RWF 11,180,000</span>
            </div>
            <div class="totals-row">
              <span class="tr-label">Discount (5%)</span>
              <span class="tr-value" style="color:var(--danger);">− RWF 559,000</span>
            </div>
            <div class="totals-row">
              <span class="tr-label">After Discount</span>
              <span class="tr-value">RWF 10,621,000</span>
            </div>
            <div class="totals-row">
              <span class="tr-label">VAT / Tax (18%)</span>
              <span class="tr-value">RWF 1,911,780</span>
            </div>
            <div class="totals-row grand-row">
              <span class="tr-label">GRAND TOTAL</span>
              <span class="tr-value">RWF 12,532,780</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Signatures -->
    <div class="mb-section">
      <div class="sec-head">
        <div class="sec-icon"><i class="fas fa-signature"></i></div>
        <div class="sec-title">Authorisation &amp; Signatures</div>
      </div>
      <div class="sec-divider"></div>
      <div class="sig-grid">
        <div class="sig-block">
          <div class="sb-role">Prepared By</div>
          <div class="sb-field">Name: _________________________________</div>
          <div class="sb-field">Position / Title: _______________________</div>
          <div class="sb-line"></div>
          <div class="sb-caption">Signature &amp; Date</div>
        </div>
        <div class="sig-block">
          <div class="sb-role">Approved By</div>
          <div class="sb-field">Name: _________________________________</div>
          <div class="sb-field">Position / Title: _______________________</div>
          <div class="sb-line"></div>
          <div class="sb-caption">Signature &amp; Date</div>
        </div>
        <div class="sig-block">
          <div class="sb-role">Finance Officer</div>
          <div class="sb-field">Name: _________________________________</div>
          <div class="sb-field">Position / Title: _______________________</div>
          <div class="sb-line"></div>
          <div class="sb-caption">Signature &amp; Date</div>
        </div>
        <div class="sig-block">
          <div class="sb-role">Vendor Acknowledgement</div>
          <div class="sb-field">Name: _________________________________</div>
          <div class="sb-field">Position / Title: _______________________</div>
          <div class="sb-line"></div>
          <div class="sb-caption">Signature &amp; Date</div>
        </div>
      </div>
    </div>

  </div><!-- /doc-body -->

  <!-- ── Doc Footer ── -->
  <div class="doc-footer">
    <p><i class="fas fa-shield-alt mr-1"></i>Yanjye Limited — Confidential Business Document</p>
    <p class="f-right">
      www.yanjye.rw &nbsp;|&nbsp; PO-2025-0001 &nbsp;|&nbsp; Page 1 of 1
    </p>
  </div>

</div><!-- /doc-wrap -->

</body>
</html>
