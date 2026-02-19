<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Delivery Order DO-2025-0001 — Yanjye Limited</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet"/>

  <style>
    /* ══════════════════════════════════════
       ROOT / SCREEN THEME
    ══════════════════════════════════════ */
    :root {
      --ink:      #060d18;
      --surface:  #0e1622;
      --card:     #111c2b;
      --border:   #1c2c40;
      --accent:   #00e5a0;   /* teal-green */
      --accent2:  #0ea5e9;   /* sky blue   */
      --muted:    #5f7090;
      --text:     #dde6f4;
      --white:    #ffffff;
      --gold:     #f59e0b;
      --danger:   #ef4444;
      --warn:     #f59e0b;
      --partial:  #f59e0b;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      background: var(--ink);
      font-family: 'DM Sans', sans-serif;
      color: var(--text);
      font-size: 14px;
      min-height: 100vh;
      background-image:
        radial-gradient(ellipse 60% 38% at 10% -6%,  rgba(0,229,160,.09) 0%, transparent 60%),
        radial-gradient(ellipse 42% 30% at 95% 92%, rgba(14,165,233,.09) 0%, transparent 55%);
    }

    /* ── Print bar (screen only) ──────────────────────── */
    .print-bar {
      background: var(--surface);
      border-bottom: 1px solid var(--border);
      padding: 10px 20px;
      display: flex; align-items: center; justify-content: space-between;
      position: sticky; top: 0; z-index: 200;
    }
    .print-bar-left { display: flex; align-items: center; gap: 10px; }
    .logo-mark {
      width: 36px; height: 36px;
      background: linear-gradient(135deg, var(--accent), var(--accent2));
      border-radius: 9px;
      display: flex; align-items: center; justify-content: center;
      font-family: 'Syne', sans-serif; font-weight: 800; font-size: 13px; color: #fff;
    }
    .brand-name { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 15px; color: var(--white); }
    .brand-sub  { font-size: 10px; color: var(--muted); letter-spacing: .07em; text-transform: uppercase; }
    .btn-print {
      background: linear-gradient(135deg, var(--accent), var(--accent2));
      border: none; color: var(--ink);
      font-family: 'Syne', sans-serif; font-weight: 800; font-size: 13px;
      padding: 8px 22px; border-radius: 9px;
      cursor: pointer; display: inline-flex; align-items: center; gap: 7px;
      box-shadow: 0 4px 18px rgba(0,229,160,.25);
      transition: transform .2s, box-shadow .2s;
    }
    .btn-print:hover { transform: translateY(-2px); box-shadow: 0 7px 24px rgba(0,229,160,.35); }

    /* ── Document wrapper ─────────────────────────────── */
    .doc-wrap {
      max-width: 900px; margin: 28px auto;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 18px; overflow: hidden;
      box-shadow: 0 24px 80px rgba(0,0,0,.55);
    }

    /* ── Header ───────────────────────────────────────── */
    .doc-header {
      background: var(--surface);
      padding: 28px 36px 22px;
      position: relative; border-bottom: 1px solid var(--border);
    }
    .doc-header::after {
      content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
      background: linear-gradient(90deg, var(--accent), var(--accent2));
    }
    .co-name {
      font-family: 'Syne', sans-serif; font-size: 28px; font-weight: 800;
      background: linear-gradient(90deg, var(--accent), var(--accent2));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; line-height: 1;
    }
    .co-address { margin-top: 6px; font-size: 12px; color: var(--muted); line-height: 1.7; }
    .doc-meta-block { text-align: right; }
    .doc-type-pill {
      display: inline-flex; align-items: center; gap: 6px;
      background: rgba(0,229,160,.12); border: 1px solid rgba(0,229,160,.30);
      border-radius: 6px; color: var(--accent);
      font-size: 11px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase;
      padding: 4px 14px; margin-bottom: 10px;
    }
    .doc-num     { font-family: 'Syne', sans-serif; font-size: 20px; font-weight: 800; color: var(--accent); letter-spacing: -.02em; }
    .doc-num-lbl { font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: .08em; }
    .status-pill {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 4px 13px; border-radius: 99px;
      font-size: 11px; font-weight: 700; letter-spacing: .07em; text-transform: uppercase; margin-top: 8px;
    }
    .s-transit { background: rgba(14,165,233,.12); border: 1px solid rgba(14,165,233,.30); color: var(--accent2); }
    .s-dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }

    /* ── Progress tracker ─────────────────────────────── */
    .progress-bar-wrap {
      background: var(--surface);
      border-bottom: 1px solid var(--border);
      padding: 16px 36px;
    }
    .tracker { display: flex; align-items: center; }
    .t-step  { display: flex; flex-direction: column; align-items: center; flex: 1; gap: 5px; }
    .t-circle {
      width: 34px; height: 34px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 12px; font-weight: 700;
      border: 2px solid var(--border); color: var(--muted);
      background: var(--surface); position: relative; z-index: 1;
    }
    .t-step.done   .t-circle { background: var(--accent); border-color: var(--accent); color: var(--ink); }
    .t-step.active .t-circle { border-color: var(--accent); color: var(--accent); background: rgba(0,229,160,.12); box-shadow: 0 0 0 4px rgba(0,229,160,.12); }
    .t-label { font-size: 10px; font-weight: 500; color: var(--muted); white-space: nowrap; text-align: center; }
    .t-step.done   .t-label  { color: var(--text); }
    .t-step.active .t-label  { color: var(--accent); font-weight: 700; }
    .t-line { flex: 1; height: 2px; background: var(--border); margin-bottom: 18px; }
    .t-line.done { background: var(--accent); }

    /* ── Status strip ─────────────────────────────────── */
    .status-strip { display: grid; grid-template-columns: repeat(4, 1fr); border-bottom: 1px solid var(--border); }
    .status-cell  { padding: 14px 20px; border-right: 1px solid var(--border); }
    .status-cell:last-child { border-right: none; }
    .sc-label { font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: .07em; margin-bottom: 4px; }
    .sc-value { font-size: 13px; font-weight: 600; color: var(--text); font-family: 'Syne', sans-serif; }
    .sc-value.accent  { color: var(--accent); }
    .sc-value.sky     { color: var(--accent2); }

    /* ── Body ─────────────────────────────────────────── */
    .doc-body { padding: 28px 36px; }
    .mb-section { margin-bottom: 28px; }

    /* ── Section head ─────────────────────────────────── */
    .sec-head { display: flex; align-items: center; gap: 9px; margin-bottom: 14px; }
    .sec-icon {
      width: 28px; height: 28px; border-radius: 7px;
      background: linear-gradient(135deg,rgba(0,229,160,.13),rgba(14,165,233,.13));
      border: 1px solid var(--border);
      display: flex; align-items: center; justify-content: center;
      color: var(--accent); font-size: 12px; flex-shrink: 0;
    }
    .sec-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 11px; text-transform: uppercase; letter-spacing: .09em; color: var(--text); }
    .sec-divider { height: 1px; background: linear-gradient(90deg, var(--border), transparent); margin-bottom: 18px; }

    /* ── Info box ─────────────────────────────────────── */
    .info-box {
      background: rgba(255,255,255,.03);
      border: 1px solid var(--border);
      border-radius: 12px; padding: 18px 20px; height: 100%;
    }
    .info-box .ib-title { font-family: 'Syne', sans-serif; font-size: 15px; font-weight: 700; color: var(--white); margin-bottom: 5px; }
    .info-box .ib-line  { font-size: 12.5px; color: var(--muted); line-height: 1.75; }
    .info-box .ib-line strong { color: var(--text); font-weight: 500; }
    .info-box .ib-badge {
      display: inline-block; margin-top: 9px;
      background: rgba(0,229,160,.09); border: 1px solid rgba(0,229,160,.22);
      border-radius: 5px; padding: 2px 9px;
      font-size: 10.5px; color: var(--accent); font-weight: 600;
    }

    /* ── Driver info row ──────────────────────────────── */
    .driver-grid {
      display: grid; grid-template-columns: repeat(4, 1fr); gap: 0;
      background: rgba(255,255,255,.03); border: 1px solid var(--border); border-radius: 12px; overflow: hidden;
    }
    .driver-cell { padding: 14px 18px; border-right: 1px solid var(--border); }
    .driver-cell:last-child { border-right: none; }
    .dc-label { font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: .07em; margin-bottom: 4px; }
    .dc-value { font-size: 13px; font-weight: 600; color: var(--text); }

    /* ── Items table ──────────────────────────────────── */
    .table-wrap { border: 1px solid var(--border); border-radius: 12px; overflow: hidden; }
    .items-table { width: 100%; border-collapse: collapse; }
    .items-table thead tr { background: var(--surface); border-bottom: 1px solid var(--border); }
    .items-table thead th { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; color: var(--muted); padding: 10px 12px; white-space: nowrap; text-align: center; }
    .items-table th:nth-child(2) { text-align: left; }
    .items-table tbody tr { border-bottom: 1px solid rgba(28,44,64,.6); }
    .items-table tbody tr:nth-child(odd)  { background: rgba(255,255,255,.025); }
    .items-table tbody tr:nth-child(even) { background: rgba(255,255,255,.015); }
    .items-table tbody td { padding: 10px 12px; font-size: 13px; vertical-align: middle; color: var(--text); text-align: center; }
    .items-table tbody td:nth-child(2) { text-align: left; }

    .row-badge { width: 26px; height: 26px; border-radius: 50%; background: rgba(0,229,160,.12); color: var(--accent); font-size: 11px; font-weight: 700; display: flex; align-items: center; justify-content: center; margin: auto; }
    .cat-pill { display: inline-block; padding: 2px 8px; border-radius: 5px; font-size: 10px; font-weight: 600; }
    .cat-hw  { background: rgba(124,58,237,.12); border: 1px solid rgba(124,58,237,.25); color: #a78bfa; }
    .cat-net { background: rgba(0,229,160,.09); border: 1px solid rgba(0,229,160,.22); color: var(--accent); }
    .cat-sw  { background: rgba(16,185,129,.09); border: 1px solid rgba(16,185,129,.22); color: #34d399; }
    .cat-svc { background: rgba(245,158,11,.09); border: 1px solid rgba(245,158,11,.22); color: var(--gold); }

    .cond-good    { color: var(--accent); font-weight: 700; font-size: 12px; }
    .cond-partial { color: var(--warn);   font-weight: 700; font-size: 12px; }
    .cond-pending { color: var(--muted);  font-weight: 600; font-size: 12px; }
    .rem-zero { color: var(--accent); font-weight: 700; }
    .rem-nonz { color: var(--warn);   font-weight: 700; }

    /* ── Shipment + Timeline grid ─────────────────────── */
    .ship-grid {
      display: grid; grid-template-columns: repeat(4, 1fr);
      background: rgba(255,255,255,.03); border: 1px solid var(--border);
      border-radius: 12px 12px 0 0; overflow: hidden;
    }
    .ship-cell { padding: 13px 18px; border-right: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .ship-cell:nth-child(4), .ship-cell:nth-child(8) { border-right: none; }
    .ship-cell:nth-child(5), .ship-cell:nth-child(6), .ship-cell:nth-child(7), .ship-cell:nth-child(8) { border-bottom: none; }
    .sc2-label { font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: .07em; margin-bottom: 3px; }
    .sc2-value { font-size: 13px; color: var(--text); font-weight: 500; }
    .handling-badge {
      display: inline-block; padding: 2px 9px; border-radius: 5px;
      background: rgba(14,165,233,.10); border: 1px solid rgba(14,165,233,.22);
      color: var(--accent2); font-size: 11px; font-weight: 600;
    }

    /* ── Timeline ─────────────────────────────────────── */
    .timeline-box {
      background: rgba(255,255,255,.03); border: 1px solid var(--border);
      border-top: none; border-radius: 0 0 12px 12px;
      overflow: hidden;
    }
    .tl-row {
      display: flex; align-items: center; gap: 14px;
      padding: 11px 18px; border-bottom: 1px solid var(--border);
    }
    .tl-row:last-child { border-bottom: none; }
    .tl-dot { width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0; }
    .tl-dot.done   { background: var(--accent); }
    .tl-dot.future { background: var(--border); }
    .tl-label { font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: .07em; width: 130px; flex-shrink: 0; }
    .tl-value { font-size: 13px; color: var(--text); font-weight: 500; }
    .tl-value.pending { color: var(--muted); font-style: italic; }

    /* ── Checklist ────────────────────────────────────── */
    .checklist { display: flex; flex-direction: column; gap: 6px; }
    .check-item {
      display: flex; align-items: center; gap: 12px;
      background: rgba(255,255,255,.03); border: 1px solid var(--border);
      border-radius: 9px; padding: 9px 14px;
    }
    .check-item.checked { border-color: rgba(0,229,160,.30); background: rgba(0,229,160,.04); }
    .check-box {
      width: 20px; height: 20px; border-radius: 6px;
      border: 2px solid var(--border);
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0; font-size: 10px;
    }
    .check-item.checked .check-box { background: var(--accent); border-color: var(--accent); color: var(--ink); }
    .check-text { font-size: 13px; }
    .check-item.checked .check-text { color: var(--accent); }
    .check-item:not(.checked) .check-text { color: var(--muted); }

    /* ── Remarks ──────────────────────────────────────── */
    .remarks-box {
      background: rgba(245,158,11,.05); border: 1px solid rgba(245,158,11,.20);
      border-radius: 10px; padding: 14px 18px; margin-top: 14px;
    }
    .remarks-box .rb-label { font-size: 10px; color: var(--gold); text-transform: uppercase; letter-spacing: .07em; margin-bottom: 5px; }
    .remarks-box .rb-text  { font-size: 12.5px; color: var(--text); line-height: 1.7; }

    /* ── Signatures ───────────────────────────────────── */
    .sig-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .sig-block { border: 1px dashed var(--border); border-radius: 12px; padding: 18px; }
    .sb-role { font-family: 'Syne', sans-serif; font-size: 11px; font-weight: 700; color: var(--accent); text-transform: uppercase; letter-spacing: .07em; margin-bottom: 6px; }
    .sb-field { font-size: 12px; color: var(--muted); border-bottom: 1px solid var(--border); padding-bottom: 4px; margin-bottom: 8px; }
    .sb-line  { height: 1px; background: var(--border); margin: 28px 0 6px; }
    .sb-caption { font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: .07em; }

    /* ── Footer ───────────────────────────────────────── */
    .doc-footer {
      background: var(--surface); border-top: 1px solid var(--border);
      padding: 14px 36px; display: flex; justify-content: space-between; align-items: center;
    }
    .doc-footer p { font-size: 11px; color: var(--muted); margin: 0; }

    /* ══════════════════════════════════════
       PRINT STYLES
    ══════════════════════════════════════ */
    @media print {
      @page { size: A4; margin: 12mm 14mm; }

      body {
        background: #fff !important;
        background-image: none !important;
        color: #111 !important; font-size: 10pt;
      }
      .print-bar { display: none !important; }

      .doc-wrap {
        max-width: 100% !important; margin: 0 !important;
        border: none !important; border-radius: 0 !important;
        box-shadow: none !important; background: #fff !important;
      }

      /* Header */
      .doc-header {
        background: #08120e !important;
        -webkit-print-color-adjust: exact; print-color-adjust: exact;
        border-bottom: 2px solid #00cc88 !important; padding: 14px 20px !important;
      }
      .co-address { color: #8899aa !important; }

      /* Tracker */
      .progress-bar-wrap { background: #f4f6fb !important; padding: 10px 20px !important; }
      .t-circle { border-color: #ccd !important; color: #888 !important; background: #fff !important; box-shadow: none !important; }
      .t-step.done .t-circle   { background: #009966 !important; border-color: #009966 !important; color: #fff !important; }
      .t-step.active .t-circle { border-color: #009966 !important; color: #009966 !important; background: #e5fff5 !important; box-shadow: none !important; }
      .t-label { color: #888 !important; font-size: 8pt !important; }
      .t-step.active .t-label { color: #009966 !important; }
      .t-step.done .t-label   { color: #222 !important; }
      .t-line { background: #dde !important; }
      .t-line.done { background: #009966 !important; }

      /* Status strip */
      .status-strip { background: #f4f6fb !important; }
      .status-cell { border-right: 1px solid #dde !important; padding: 8px 14px !important; }
      .sc-label { color: #888 !important; }
      .sc-value { color: #111 !important; font-size: 10pt !important; }
      .sc-value.sky { color: #006688 !important; }

      /* Body */
      .doc-body { padding: 14px 20px !important; }

      .info-box { background: #f8f9fc !important; border: 1px solid #dde !important; border-radius: 6px !important; padding: 12px !important; }
      .info-box .ib-title { color: #111 !important; font-size: 11pt !important; }
      .info-box .ib-line  { color: #444 !important; font-size: 9pt !important; }
      .info-box .ib-line strong { color: #111 !important; }
      .info-box .ib-badge { color: #006644 !important; background: #e0fff5 !important; border-color: #9dd !important; }

      .driver-grid { background: #f8f9fc !important; border: 1px solid #dde !important; border-radius: 6px !important; }
      .driver-cell { border-right: 1px solid #dde !important; padding: 9px 12px !important; }
      .dc-label { color: #888 !important; }
      .dc-value { color: #111 !important; }

      .sec-title { color: #003344 !important; font-size: 9pt !important; }
      .sec-icon  { display: none !important; }
      .sec-divider { background: #ccd !important; }

      /* Table */
      .table-wrap { border: 1px solid #ccd !important; border-radius: 4px !important; }
      .items-table thead tr  { background: #eef0f8 !important; }
      .items-table thead th  { color: #556 !important; font-size: 8pt !important; }
      .items-table tbody tr:nth-child(odd)  { background: #f9fafc !important; }
      .items-table tbody tr:nth-child(even) { background: #fff !important; }
      .items-table tbody td  { color: #222 !important; font-size: 9.5pt !important; }
      .row-badge { background: #dff !important; color: #006644 !important; }
      .cat-pill { background: #eee !important; border-color: #ccc !important; color: #444 !important; }
      .cat-net  { background: #dff !important; border-color: #9dd !important; color: #006 !important; }
      .cat-sw   { background: #dfd !important; border-color: #9d9 !important; color: #040 !important; }
      .cat-svc  { background: #ffe !important; border-color: #ddb !important; color: #540 !important; }
      .cond-good    { color: #009966 !important; }
      .cond-partial { color: #b07800 !important; }
      .cond-pending { color: #888 !important; }
      .rem-zero { color: #009966 !important; }
      .rem-nonz { color: #b07800 !important; }

      /* Shipment */
      .ship-grid { background: #f8f9fc !important; border: 1px solid #dde !important; border-radius: 6px 6px 0 0 !important; }
      .ship-cell { border-right: 1px solid #dde !important; border-bottom: 1px solid #dde !important; padding: 9px 12px !important; }
      .sc2-value { color: #222 !important; }
      .handling-badge { color: #004466 !important; background: #ddf !important; border-color: #bbd !important; }

      /* Timeline */
      .timeline-box { background: #f8f9fc !important; border: 1px solid #dde !important; border-radius: 0 0 6px 6px !important; border-top: none !important; }
      .tl-row { border-bottom: 1px solid #dde !important; padding: 8px 14px !important; }
      .tl-dot.done   { background: #009966 !important; }
      .tl-dot.future { background: #ccc !important; }
      .tl-label { color: #888 !important; font-size: 8pt !important; }
      .tl-value { color: #222 !important; font-size: 9.5pt !important; }
      .tl-value.pending { color: #999 !important; }

      /* Checklist */
      .check-item { background: #f8f9fc !important; border: 1px solid #dde !important; border-radius: 5px !important; padding: 6px 10px !important; }
      .check-item.checked { background: #e8fff5 !important; border-color: #9dcebb !important; }
      .check-box { border-color: #bbb !important; }
      .check-item.checked .check-box { background: #009966 !important; border-color: #009966 !important; color: #fff !important; }
      .check-item.checked .check-text { color: #006644 !important; }
      .check-item:not(.checked) .check-text { color: #888 !important; }
      .check-text { font-size: 9pt !important; }

      /* Remarks */
      .remarks-box { background: #fffbeb !important; border-color: #f59e0b !important; }
      .remarks-box .rb-label { color: #b07800 !important; }
      .remarks-box .rb-text  { color: #222 !important; }

      /* Sig */
      .sig-block { border: 1px dashed #bbb !important; border-radius: 6px !important; }
      .sb-role { color: #004422 !important; }
      .sb-line { background: #ccd !important; }
      .sb-caption { color: #888 !important; }

      /* Footer */
      .doc-footer { background: #f0f2f8 !important; border-top: 1px solid #ccd !important; }
      .doc-footer p { color: #666 !important; font-size: 8pt !important; }

      .doc-header::after { background: #00cc88 !important; }
    }
  </style>
</head>
<body>

<!-- ═══════════ PRINT BAR ═══════════ -->
<div class="print-bar">
  <div class="print-bar-left">
    <div class="logo-mark">YL</div>
    <div>
      <div class="brand-name">Yanjye Limited</div>
      <div class="brand-sub">Delivery Order — DO-2025-0001</div>
    </div>
  </div>
  <button class="btn-print" onclick="window.print()">
    <i class="fas fa-print"></i> Print / Save PDF
  </button>
</div>

<!-- ═══════════ DOCUMENT ═══════════ -->
<div class="doc-wrap">

  <!-- Header -->
  <div class="doc-header">
    <div class="row align-items-start">
      <div class="col-7">
        <div class="co-name">Yanjye Limited</div>
        <div class="co-address">
          <i class="fas fa-map-marker-alt fa-xs mr-1"></i>KG 7 Ave, Kigali Innovation City, Rwanda<br>
          <i class="fas fa-phone-alt fa-xs mr-1"></i>+250 788 000 000&nbsp;&nbsp;
          <i class="fas fa-envelope fa-xs mr-1"></i>logistics@yanjye.rw&nbsp;&nbsp;VAT: RW123456789
        </div>
      </div>
      <div class="col-5 doc-meta-block">
        <div class="doc-type-pill"><i class="fas fa-truck"></i>Delivery Order</div>
        <div class="doc-num-lbl">Document Number</div>
        <div class="doc-num">DO-2025-0001</div>
        <div><span class="status-pill s-transit"><span class="s-dot"></span>In Transit</span></div>
      </div>
    </div>
  </div>

  <!-- Progress Tracker -->
  <div class="progress-bar-wrap">
    <div class="tracker">
      <div class="t-step done">
        <div class="t-circle"><i class="fas fa-check" style="font-size:10px;"></i></div>
        <div class="t-label">Order Placed</div>
      </div>
      <div class="t-line done"></div>
      <div class="t-step done">
        <div class="t-circle"><i class="fas fa-check" style="font-size:10px;"></i></div>
        <div class="t-label">Confirmed</div>
      </div>
      <div class="t-line done"></div>
      <div class="t-step active">
        <div class="t-circle"><i class="fas fa-truck" style="font-size:10px;"></i></div>
        <div class="t-label">In Transit</div>
      </div>
      <div class="t-line"></div>
      <div class="t-step">
        <div class="t-circle">4</div>
        <div class="t-label">Out for Delivery</div>
      </div>
      <div class="t-line"></div>
      <div class="t-step">
        <div class="t-circle">5</div>
        <div class="t-label">Delivered</div>
      </div>
    </div>
  </div>

  <!-- Status Strip -->
  <div class="status-strip">
    <div class="status-cell">
      <div class="sc-label">PO Reference</div>
      <div class="sc-value">PO-2025-0001</div>
    </div>
    <div class="status-cell">
      <div class="sc-label">Dispatch Date</div>
      <div class="sc-value">19 Feb 2025</div>
    </div>
    <div class="status-cell">
      <div class="sc-label">Expected Delivery</div>
      <div class="sc-value">22 Feb 2025</div>
    </div>
    <div class="status-cell">
      <div class="sc-label">Carrier</div>
      <div class="sc-value sky">Yanjye Logistics</div>
    </div>
  </div>

  <!-- Body -->
  <div class="doc-body">

    <!-- Sender / Recipient -->
    <div class="mb-section">
      <div class="sec-head">
        <div class="sec-icon"><i class="fas fa-exchange-alt"></i></div>
        <div class="sec-title">Dispatched From &amp; Deliver To</div>
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
              <strong>Email:</strong> dispatch@techsource.rw
            </div>
            <span class="ib-badge"><i class="fas fa-warehouse fa-xs mr-1"></i>Origin Warehouse</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <div class="ib-title">Yanjye Limited — IT Department</div>
            <div class="ib-line">
              <strong>Contact:</strong> IT Manager<br>
              <strong>Address:</strong> KG 7 Ave, Kigali Innovation City<br>
              <strong>Floor / Room:</strong> 3rd Floor, Room 301<br>
              <strong>Phone:</strong> +250 788 000 000
            </div>
            <span class="ib-badge"><i class="fas fa-map-pin fa-xs mr-1"></i>Delivery Destination</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Driver / Vehicle -->
    <div class="mb-section">
      <div class="sec-head">
        <div class="sec-icon"><i class="fas fa-id-card"></i></div>
        <div class="sec-title">Driver &amp; Vehicle Information</div>
      </div>
      <div class="sec-divider"></div>
      <div class="driver-grid">
        <div class="driver-cell">
          <div class="dc-label">Driver Name</div>
          <div class="dc-value">Emmanuel Hakizimana</div>
        </div>
        <div class="driver-cell">
          <div class="dc-label">Driver ID / Licence</div>
          <div class="dc-value">RW-DL-2021-5529</div>
        </div>
        <div class="driver-cell">
          <div class="dc-label">Vehicle Plate</div>
          <div class="dc-value">RAC 456 B</div>
        </div>
        <div class="driver-cell">
          <div class="dc-label">Vehicle Type</div>
          <div class="dc-value">Van / Pickup</div>
        </div>
      </div>
    </div>

    <!-- Delivered Items -->
    <div class="mb-section">
      <div class="sec-head">
        <div class="sec-icon"><i class="fas fa-boxes"></i></div>
        <div class="sec-title">Delivered Items</div>
      </div>
      <div class="sec-divider"></div>
      <div class="table-wrap">
        <table class="items-table">
          <thead>
            <tr>
              <th style="width:36px;">#</th>
              <th style="text-align:left;">Item / Description</th>
              <th>Category</th>
              <th>Qty Ordered</th>
              <th>Qty Delivered</th>
              <th>Remaining</th>
              <th>Serial / Tag</th>
              <th>Condition</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><div class="row-badge">1</div></td>
              <td style="text-align:left;"><strong>Dell Latitude 5540 Laptop</strong><br><small style="color:var(--muted);font-size:11px;">16GB RAM, 512GB SSD</small></td>
              <td><span class="cat-pill cat-hw">Hardware</span></td>
              <td>5</td><td>5</td>
              <td><span class="rem-zero">0</span></td>
              <td style="font-size:11px;">SN-DL-001 – 005</td>
              <td><span class="cond-good">✓ Good</span></td>
            </tr>
            <tr>
              <td><div class="row-badge">2</div></td>
              <td style="text-align:left;"><strong>Cisco Catalyst 2960-X Switch</strong><br><small style="color:var(--muted);font-size:11px;">48-Port, PoE+</small></td>
              <td><span class="cat-pill cat-net">Networking</span></td>
              <td>2</td><td>2</td>
              <td><span class="rem-zero">0</span></td>
              <td style="font-size:11px;">CS-2960-A, B</td>
              <td><span class="cond-good">✓ Good</span></td>
            </tr>
            <tr>
              <td><div class="row-badge">3</div></td>
              <td style="text-align:left;"><strong>Microsoft 365 Business Premium</strong><br><small style="color:var(--muted);font-size:11px;">Annual license</small></td>
              <td><span class="cat-pill cat-sw">Software</span></td>
              <td>20</td><td>20</td>
              <td><span class="rem-zero">0</span></td>
              <td style="font-size:11px;">MS365-KEY-001</td>
              <td><span class="cond-good">✓ Good</span></td>
            </tr>
            <tr>
              <td><div class="row-badge">4</div></td>
              <td style="text-align:left;"><strong>APC Smart-UPS 1500VA</strong><br><small style="color:var(--muted);font-size:11px;">Tower, LCD, 230V</small></td>
              <td><span class="cat-pill cat-hw">Hardware</span></td>
              <td>3</td><td>2</td>
              <td><span class="rem-nonz">1</span></td>
              <td style="font-size:11px;">APC-UPS-01, 02</td>
              <td><span class="cond-partial">⚠ Partial</span></td>
            </tr>
            <tr>
              <td><div class="row-badge">5</div></td>
              <td style="text-align:left;"><strong>Cat6 UTP Cable (305m Box)</strong><br><small style="color:var(--muted);font-size:11px;">23AWG, CM rated</small></td>
              <td><span class="cat-pill cat-net">Networking</span></td>
              <td>4</td><td>4</td>
              <td><span class="rem-zero">0</span></td>
              <td style="font-size:11px;">CAT6-BOX-01–04</td>
              <td><span class="cond-good">✓ Good</span></td>
            </tr>
            <tr>
              <td><div class="row-badge">6</div></td>
              <td style="text-align:left;"><strong>IT Infrastructure Setup Service</strong><br><small style="color:var(--muted);font-size:11px;">Network, cabling, config</small></td>
              <td><span class="cat-pill cat-svc">Services</span></td>
              <td>1</td><td>0</td>
              <td><span class="rem-nonz">1</span></td>
              <td style="font-size:11px;">—</td>
              <td><span class="cond-pending">○ Pending</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Shipment + Timeline -->
    <div class="mb-section">
      <div class="sec-head">
        <div class="sec-icon"><i class="fas fa-shipping-fast"></i></div>
        <div class="sec-title">Shipment Details &amp; Delivery Timeline</div>
      </div>
      <div class="sec-divider"></div>
      <div class="ship-grid">
        <div class="ship-cell">
          <div class="sc2-label">No. of Packages</div>
          <div class="sc2-value">6 packages</div>
        </div>
        <div class="ship-cell">
          <div class="sc2-label">Total Weight</div>
          <div class="sc2-value">42 kg</div>
        </div>
        <div class="ship-cell">
          <div class="sc2-label">Tracking Number</div>
          <div class="sc2-value">YL-TRK-2025-1124</div>
        </div>
        <div class="ship-cell">
          <div class="sc2-label">Handling</div>
          <div class="sc2-value"><span class="handling-badge">Electronic Equipment</span></div>
        </div>
        <div class="ship-cell">
          <div class="sc2-label">Dimensions</div>
          <div class="sc2-value">60 × 50 × 40 cm</div>
        </div>
        <div class="ship-cell">
          <div class="sc2-label">Vehicle Plate</div>
          <div class="sc2-value">RAC 456 B</div>
        </div>
        <div class="ship-cell" style="grid-column: span 2;">
          <div class="sc2-label">Delivery Notes</div>
          <div class="sc2-value">Deliver to reception, 3rd floor. Call ahead: +250 788 000 000</div>
        </div>
      </div>
      <div class="timeline-box">
        <div class="tl-row">
          <div class="tl-dot done"></div>
          <div class="tl-label">Order Placed</div>
          <div class="tl-value">Wednesday, 19 Feb 2025</div>
        </div>
        <div class="tl-row">
          <div class="tl-dot done"></div>
          <div class="tl-label">Dispatched</div>
          <div class="tl-value">Wednesday, 19 Feb 2025 — 09:30 AM</div>
        </div>
        <div class="tl-row">
          <div class="tl-dot done"></div>
          <div class="tl-label">Expected Arrival</div>
          <div class="tl-value">Saturday, 22 Feb 2025</div>
        </div>
        <div class="tl-row">
          <div class="tl-dot future"></div>
          <div class="tl-label">Actual Delivery</div>
          <div class="tl-value pending">To be confirmed upon receipt</div>
        </div>
      </div>
    </div>

    <!-- Inspection Checklist -->
    <div class="mb-section">
      <div class="sec-head">
        <div class="sec-icon"><i class="fas fa-clipboard-check"></i></div>
        <div class="sec-title">Goods Receipt &amp; Inspection Checklist</div>
      </div>
      <div class="sec-divider"></div>
      <div class="row">
        <div class="col-md-6 mb-3 mb-md-0">
          <div class="checklist">
            <div class="check-item checked">
              <div class="check-box"><i class="fas fa-check"></i></div>
              <span class="check-text">All packages received and counted</span>
            </div>
            <div class="check-item checked">
              <div class="check-box"><i class="fas fa-check"></i></div>
              <span class="check-text">Items match delivery order manifest</span>
            </div>
            <div class="check-item checked">
              <div class="check-box"><i class="fas fa-check"></i></div>
              <span class="check-text">Packaging intact — no visible damage</span>
            </div>
            <div class="check-item checked">
              <div class="check-box"><i class="fas fa-check"></i></div>
              <span class="check-text">Serial numbers / asset tags verified</span>
            </div>
            <div class="check-item checked">
              <div class="check-box"><i class="fas fa-check"></i></div>
              <span class="check-text">Delivery invoice matches expected values</span>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="checklist">
            <div class="check-item checked">
              <div class="check-box"><i class="fas fa-check"></i></div>
              <span class="check-text">Warranty cards / certificates included</span>
            </div>
            <div class="check-item">
              <div class="check-box"></div>
              <span class="check-text">Software licenses / keys provided</span>
            </div>
            <div class="check-item">
              <div class="check-box"></div>
              <span class="check-text">User manuals / documentation included</span>
            </div>
            <div class="check-item">
              <div class="check-box"></div>
              <span class="check-text">Goods registered in asset management system</span>
            </div>
            <div class="check-item">
              <div class="check-box"></div>
              <span class="check-text">IT Setup Service completed on-site</span>
            </div>
          </div>
        </div>
      </div>
      <div class="remarks-box">
        <div class="rb-label"><i class="fas fa-exclamation-triangle fa-xs mr-1"></i>Remarks / Discrepancy Notes</div>
        <div class="rb-text">
          APC UPS unit #3 not included in this delivery — backorder expected within 5 business days. Vendor reference: BO-2025-APC-003.<br>
          IT Infrastructure Setup Service scheduled for 26 Feb 2025 pending site readiness confirmation from IT Manager.
        </div>
      </div>
    </div>

    <!-- Signatures -->
    <div class="mb-section">
      <div class="sec-head">
        <div class="sec-icon"><i class="fas fa-signature"></i></div>
        <div class="sec-title">Acknowledgement &amp; Signatures</div>
      </div>
      <div class="sec-divider"></div>
      <div class="sig-grid">
        <div class="sig-block">
          <div class="sb-role">Dispatched By</div>
          <div class="sb-field">Name: _________________________________</div>
          <div class="sb-field">Position / Title: _______________________</div>
          <div class="sb-line"></div>
          <div class="sb-caption">Signature &amp; Date</div>
        </div>
        <div class="sig-block">
          <div class="sb-role">Driver / Carrier Agent</div>
          <div class="sb-field">Driver Name: __________________________</div>
          <div class="sb-field">Driver ID / Licence: ___________________</div>
          <div class="sb-line"></div>
          <div class="sb-caption">Signature &amp; Date</div>
        </div>
        <div class="sig-block">
          <div class="sb-role">Received By (Yanjye Ltd)</div>
          <div class="sb-field">Name: _________________________________</div>
          <div class="sb-field">Department / Position: _________________</div>
          <div class="sb-line"></div>
          <div class="sb-caption">Signature &amp; Date</div>
        </div>
        <div class="sig-block">
          <div class="sb-role">Verified By (IT / Store)</div>
          <div class="sb-field">IT Officer / Storekeeper: ______________</div>
          <div class="sb-field">Employee ID: __________________________</div>
          <div class="sb-line"></div>
          <div class="sb-caption">Signature &amp; Date</div>
        </div>
      </div>
    </div>

  </div><!-- /doc-body -->

  <!-- Footer -->
  <div class="doc-footer">
    <p><i class="fas fa-shield-alt mr-1"></i>Yanjye Limited — Confidential Business Document</p>
    <p>www.yanjye.rw &nbsp;|&nbsp; DO-2025-0001 &nbsp;|&nbsp; Page 1 of 1</p>
  </div>

</div><!-- /doc-wrap -->

</body>
</html>
