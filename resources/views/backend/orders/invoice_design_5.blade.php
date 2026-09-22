<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Steadfast Order Slip</title>
    <style>
        * { box-sizing: border-box; }
        html, body { margin: 0; padding: 0; background: #f3f4f6; color: #000; font-family: Arial, Helvetica, sans-serif; }
        .no-print { display: flex; justify-content: center; padding: 16px; }
        .btn-print { border: 0; border-radius: 4px; background: #111827; color: #fff; font-weight: 700; padding: 8px 14px; cursor: pointer; }
        .gs-sf-page { padding: 10px 0 24px; }
        @page { size: 76mm auto; margin: 0; }
        @media print {
            html, body { background: #fff; }
            .no-print { display: none !important; }
            .gs-sf-page { padding: 0; }
        }
    </style>
    @include('backend.orders.partials.steadfast_slip_v1_styles')
</head>
<body>
    <div class="no-print">
        <button class="btn-print" onclick="window.print()">Print Steadfast Slip</button>
    </div>

    <div class="gs-sf-page">
        @include('backend.orders.partials.steadfast_slip_v1', ['item' => $item, 'info' => $info])
    </div>
</body>
</html>
