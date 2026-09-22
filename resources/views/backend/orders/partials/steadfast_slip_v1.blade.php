@php
    $businessName = config('services.steadfast.slip_business_name') ?: ($info->site_name ?? config('app.name'));
    $merchantId = config('services.steadfast.merchant_id') ?: '';
    $trackingId = trim((string)($item->courier_tracking_id ?? ''));
    $trackingCode = trim((string)($item->courier_tracking_code ?? ''));
    $invoiceNo = trim((string)($item->invoice_no ?? $item->id));
    $barcodeValue = $trackingId !== '' ? $trackingId : ($trackingCode !== '' ? $trackingCode : (string)($item->invoice_no ?? $item->id));
    $qrValue = $barcodeValue;
    $customerName = trim(($item->first_name ?? '') . ' ' . ($item->last_name ?? ''));
    $orderNote = trim((string)($item->note ?? ''));
    $deliveryLabel = 'Home';
    $totalWeight = 0;

    foreach ($item->details ?? [] as $detail) {
        $productWeight = (float)($detail->product->weight ?? 0);
        if ($productWeight <= 0) {
            $productWeight = 1;
        }
        $totalWeight += $productWeight * (float)($detail->quantity ?? 1);
    }

    if ($totalWeight <= 0) {
        $totalWeight = (float)($item->weight ?? 1);
    }

    if ($totalWeight <= 0) {
        $totalWeight = 1;
    }

    $weightLabel = rtrim(rtrim(number_format($totalWeight, 2), '0'), '.') . ' KG';
    $codAmount = (float)($item->final_amount ?? 0);
@endphp

<div class="gs-sf-slip">
    <div class="gs-sf-header">
        <div class="gs-sf-brand-row">
            <img src="{{ getImage('uploads/img', $info->site_logo ?? '') }}" alt="logo">
            <strong>{{ $businessName }}</strong>
        </div>
        @if($merchantId !== '')
            <div class="gs-sf-merchant">Merchant ID: {{ $merchantId }}</div>
        @endif
    </div>

    <div class="gs-sf-barcode">
        <img src="https://bwipjs-api.metafloor.com/?bcid=code128&text={{ urlencode($barcodeValue) }}&scale=2&height=18&includetext=true&textxalign=center" alt="Barcode">
    </div>

    <div class="gs-sf-main">
        <div class="gs-sf-qr">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=95x95&data={{ urlencode($qrValue) }}" alt="QR Code">
        </div>
        <div class="gs-sf-meta">
            <div><span>INVOICE</span><strong>{{ $invoiceNo }}</strong></div>
            <div><span>DELIVERY</span><strong>{{ $deliveryLabel }}</strong></div>
            <div><span>WEIGHT</span><strong>{{ $weightLabel }}</strong></div>
        </div>
    </div>

    <div class="gs-sf-customer">
        <div><span>NAME</span><strong>{{ $customerName !== '' ? $customerName : 'N/A' }}</strong></div>
        <div><span>PHONE</span><strong>{{ $item->mobile ?? '' }}</strong></div>
        <div><span>ADDRESS</span><strong>{{ $item->shipping_address ?? '' }}</strong></div>
        <div><span>AREA</span><strong>{{ $item->area_name ?? '' }}</strong></div>
        @if($orderNote !== '')
            <div><span>NOTE</span><em class="gs-sf-note-text">{{ $orderNote }}</em></div>
        @endif
    </div>

    <div class="gs-sf-cod">
        <span>CASH ON DELIVERY</span>
        <strong>৳ {{ number_format($codAmount, 0) }}</strong>
    </div>

    <div class="gs-sf-footer">
        <span>Printed: {{ now()->format('d/m/y h:ia') }}</span>
        <img src="{{ asset('images/steadfast-logo.png') }}" alt="SteadFast">
        <span>steadfast.com.bd</span>
    </div>
</div>
