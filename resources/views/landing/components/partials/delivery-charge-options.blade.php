@php
    $deliveryCharges = \App\Models\DeliveryCharge::query()
        ->where('status', 1)
        ->orderBy('id')
        ->get(['id', 'title', 'amount']);
@endphp

@once
    <style>
        .landing-delivery-free{display:flex;align-items:center;justify-content:space-between;margin:10px 0;padding:7px 9px;border:1px solid #e7e5e4;border-radius:6px;background:#f5f5f4;font-size:13px}.landing-delivery-options{min-width:0;margin:10px 0;padding:0;border:0}.landing-delivery-options legend{margin-bottom:6px;font-size:13px;font-weight:700}.landing-delivery-options__list{display:grid;grid-auto-flow:column;grid-auto-columns:minmax(140px,1fr);gap:6px;overflow-x:auto;padding-bottom:3px;scrollbar-width:thin}.landing-delivery-option{display:grid;grid-template-columns:15px minmax(0,1fr);align-items:center;gap:2px 7px;min-height:44px;padding:6px 8px;border:1px solid #e7e5e4;border-radius:6px;background:#fff;cursor:pointer}.landing-delivery-option:has(input:checked){border-color:#171717;background:#f5f5f4}.landing-delivery-option input{grid-row:1 / span 2;width:14px;height:14px;margin:0;accent-color:#171717}.landing-delivery-option span{min-width:0;overflow:hidden;font-size:12px;line-height:1.2;text-overflow:ellipsis;white-space:nowrap}.landing-delivery-option strong{font-size:12px;line-height:1.2;white-space:nowrap}
    </style>
@endonce

@if(!empty($selectedProduct['is_free_shipping']))
    <div class="landing-delivery-free">
        <span>Delivery</span>
        <strong>Free</strong>
    </div>
@elseif($deliveryCharges->isNotEmpty())
    <fieldset class="landing-delivery-options" data-delivery-options>
        <legend>Delivery area</legend>
        <div class="landing-delivery-options__list">
            @foreach($deliveryCharges as $charge)
                <label class="landing-delivery-option">
                    <input
                        type="radio"
                        name="delivery_charge_id"
                        value="{{ $charge->id }}"
                        data-delivery-amount="{{ (float) $charge->amount }}"
                        @checked($loop->first)
                        required
                    >
                    <span title="{{ $charge->title }}">{{ $charge->title }}</span>
                    <strong>{{ function_exists('priceFormate') ? priceFormate($charge->amount) : number_format((float) $charge->amount, 2) }}</strong>
                </label>
            @endforeach
        </div>
    </fieldset>

    <script>
        (() => {
            const options = document.currentScript.previousElementSibling?.matches('style')
                ? document.currentScript.previousElementSibling.previousElementSibling
                : document.currentScript.previousElementSibling;
            const form = options?.closest('[data-landing-order-form]');

            if (!form) return;

            const firstDeliveryCharge = form.querySelector('[name="delivery_charge_id"]');

            if (firstDeliveryCharge && !form.querySelector('[name="delivery_charge_id"]:checked')) {
                firstDeliveryCharge.checked = true;
            }

            const parseMoney = (value) => {
                const normalized = String(value ?? '')
                    .replace(/[০-৯]/g, digit => '০১২৩৪৫৬৭৮৯'.indexOf(digit))
                    .replace(/[^0-9.]/g, '');
                return Number.parseFloat(normalized) || 0;
            };
            const formatMoney = amount => `৳${Number(amount).toLocaleString('en-US', { maximumFractionDigits: 2 })}`;
            const updateTotals = () => {
                const packageInput = form.querySelector('[name="quantity"]:checked');
                const packageCard = packageInput?.closest('[data-package-card], [data-mobile-package-card], [data-bari12-package], [data-sheikh-package]');
                const subtotal = parseMoney(packageCard?.dataset.price);
                const chargeInput = form.querySelector('[name="delivery_charge_id"]:checked');
                const shipping = Number.parseFloat(chargeInput?.dataset.deliveryAmount || '0') || 0;

                form.querySelectorAll('[data-checkout-subtotal]').forEach(el => el.textContent = formatMoney(subtotal));
                form.querySelectorAll('[data-checkout-shipping]').forEach(el => el.textContent = formatMoney(shipping));
                form.querySelectorAll('[data-checkout-total]').forEach(el => el.textContent = formatMoney(subtotal + shipping));
            };

            form.addEventListener('change', event => {
                if (event.target.matches('[name="quantity"], [name="delivery_charge_id"]')) updateTotals();
            });
            window.requestAnimationFrame(updateTotals);
        })();
    </script>
@endif
