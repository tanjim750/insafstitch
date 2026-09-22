<style>
    .gs-sf-slip {
        width: 76mm;
        min-height: 76mm;
        margin: 0 auto;
        background: #fff;
        border: 1px solid #111;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 9px;
        line-height: 1.2;
        page-break-after: always;
    }
    .gs-sf-header {
        min-height: 12mm;
        padding: 2mm 3mm 1.5mm;
        text-align: center;
        border-bottom: 1px solid #111;
    }
    .gs-sf-brand-row {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2mm;
        font-size: 10px;
        line-height: 1.1;
    }
    .gs-sf-brand-row img {
        width: 8mm;
        height: 8mm;
        object-fit: contain;
    }
    .gs-sf-merchant {
        margin-top: 1mm;
        color: #555;
        font-size: 7px;
    }
    .gs-sf-barcode {
        padding: 1.5mm 2mm .5mm;
        text-align: center;
        border-bottom: 1px solid #111;
    }
    .gs-sf-barcode img {
        display: block;
        width: 100%;
        height: 18mm;
        object-fit: fill;
    }
    .gs-sf-main {
        display: grid;
        grid-template-columns: 22mm 1fr;
        gap: 2mm;
        padding: 2mm 3mm;
        border-bottom: 1px solid #111;
    }
    .gs-sf-qr img {
        width: 20mm;
        height: 20mm;
        display: block;
    }
    .gs-sf-meta {
        display: grid;
        gap: 1.2mm;
        align-content: center;
    }
    .gs-sf-meta div {
        display: grid;
        grid-template-columns: 18mm 1fr auto;
        gap: 1.5mm;
        align-items: baseline;
    }
    .gs-sf-meta span,
    .gs-sf-customer span {
        color: #333;
        font-size: 8px;
        font-weight: 400;
    }
    .gs-sf-meta strong,
    .gs-sf-meta b,
    .gs-sf-customer strong {
        font-size: 8.5px;
        font-weight: 800;
    }
    .gs-sf-note-text {
        font-style: normal;
        font-size: 8.5px;
        font-weight: 400;
    }
    .gs-sf-customer {
        padding: 1.5mm 3mm;
        border-bottom: 1px solid #111;
    }
    .gs-sf-customer div {
        display: grid;
        grid-template-columns: 18mm 1fr;
        gap: 1.5mm;
        margin-bottom: .7mm;
    }
    .gs-sf-customer div:last-child {
        margin-bottom: 0;
    }
    .gs-sf-cod {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 2mm 3mm;
        padding: 1.5mm 2mm;
        border: 1px solid #111;
        font-size: 9px;
        font-weight: 800;
    }
    .gs-sf-cod strong {
        font-size: 17px;
        line-height: 1;
    }
    .gs-sf-footer {
        display: grid;
        grid-template-columns: 1fr auto auto;
        gap: 2mm;
        align-items: center;
        padding: 1.5mm 3mm;
        border-top: 1px solid #d1d5db;
        color: #777;
        font-size: 7px;
    }
    .gs-sf-footer img {
        width: 18mm;
        max-height: 5mm;
        object-fit: contain;
    }
    @media print {
        .gs-sf-slip {
            margin: 0;
            border-color: #111;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>
