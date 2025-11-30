<?php $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)); ?>
<?php $subtotalFormatted = number_format($subtotal, 2); ?>

<style>
    body {
        background: linear-gradient(to bottom right, #1c1c1c, #121212);
        color: #ffffff;
        font-family: 'Poppins', sans-serif;
        margin: 0;
    }

    .checkout-container {
        max-width: 1140px;
        margin: 40px auto;
        padding: 30px 40px;
        background-color: #1e1e1e;
        border-radius: 10px;
        box-sizing: border-box;
    }

    h1,h2, h3, label {
        color: #ffffff;
        font-weight: 600;
        margin-bottom: 20px;
    }

    table#cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    table#cart-table th, table#cart-table td {
        padding: 12px 15px;
        text-align: left;
    }

    table#cart-table th {
        color: #ffffff;
        font-weight: 700;
        border-bottom: 1px solid #444;
    }

    table#cart-table td {
        color: #b0b0b0;
        border-bottom: 1px solid #2a2a2a;
    }

    table#cart-table tr:hover td {
        background-color: rgba(255, 255, 255, 0.03);
    }

    img {
        max-height: 100px;
        border-radius: 5px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        background-color: #333;
        color: #fff;
        border: 1px solid #444;
        border-radius: 5px;
        padding: 10px;
    }

    .form-control:focus {
        background-color: #ffffff;
        border-color: #40e0d0;
        box-shadow: 0 0 0 0.25rem rgba(64,224,208,0.25);
    }

    .alert-info {
        background-color: rgba(64, 224, 208, 0.1);
        border: 1px solid #40e0d0;
        color: #40e0d0;
        padding: 10px 15px;
        border-radius: 5px;
    }

    .btn-success {
        background-color: #40e0d0;
        color: #121212;
        font-weight: 600;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background-color: #37c3b3;
        color: #ffffff;
        transform: scale(1.05);
    }

    .checkout-summary p {
        font-size: 1.1em;
        margin-bottom: 8px;
    }

    .checkout-summary strong {
        color: #ffffff;
    }

    .checkout-summary span {
        color: #40e0d0;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
        margin-right: 10px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 24px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: #40e0d0;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }
</style>

<div class="checkout-container">
    <h1>Checkout</h1>

    <table class="table" id="cart-table">
        <thead>
        <tr>
            <th>Product</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cart as $item): ?>
            <tr>
                <td>
                    <?php if (!empty($item['image'])) : ?>
                        <?= $this->Html->image('products/' . $item['image'], [
                            'alt' => $item['name'],
                            'style' => 'max-height: 100px;'
                        ]) ?>
                    <?php else : ?>
                        <span>No image available</span>
                    <?php endif; ?>
                </td>
                <td><?= h($item['name']) ?></td>
                <td>$<?= h($item['price']) ?></td>
                <td><?= h($item['quantity']) ?></td>
                <td>$<?= h($item['price'] * $item['quantity']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>



    <div class="form-group">
        <label class="switch">
            <input type="checkbox" id="installation-toggle" onchange="toggleInstallation()">
            <span class="slider"></span>
        </label>
        <label for="installation-toggle">Include Installation (Add 20%)</label>
        <div id="install-success" class="alert alert-info" style="display: none; margin-top: 10px;">
            ✅ Installation included. Total updated with 20% increase.
        </div>
    </div>

    <div id="install-details" style="display: none;">
        <div class="form-group">
            <?= $this->Form->control('install_address', [
                'label' => 'Installation Address (if different, N/A if same as delivery address)',
                'placeholder' => 'Enter your full installation address here...',
                'class' => 'form-control'
            ]) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('install_datetime', [
                'label' => 'Preferred Installation Date & Time',
                'class' => 'form-control',
                'type' => 'datetime-local'
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <label for="discount-code">Discount Code</label>
        <div style="display: flex; gap: 10px;">
            <input type="text" id="discount-code" name="discount_code" class="form-control" placeholder="Enter code (e.g. SAVE10)">
            <button type="button" class="btn btn-success" onclick="applyDiscount()">Apply Discount</button>
        </div>
        <div id="discount-success" class="alert alert-info" style="display: none; margin-top: 10px;">
            ✅ Discount <strong>SAVE10</strong> applied. You saved <strong>10%</strong>!
        </div>
    </div>

    <div class="checkout-summary">
        <p><strong>Subtotal: $</strong><span id="subtotal"><?= $subtotalFormatted ?></span></p>
        <p><strong>Shipping: $</strong><span id="shipping">0.00</span></p>
        <p><strong>Discount: $</strong><span id="discount">0.00</span></p>
        <p><strong>Total: $</strong><span id="total"><?= $subtotalFormatted ?></span></p>
    </div>

    <?= $this->Form->create(null, ['url' => ['action' => 'placeOrder']]) ?>



    <div style="display: flex; align-items: center; text-align: center; margin: 30px 0;">
        <h1 style="text-align: center">Contact Form</h1>
    </div>
    <div class="form-group">
        <?= $this->Form->control('customer_name', [
            'label' => 'Full Name',
            'placeholder' => 'Enter your full name here...',
            'class' => 'form-control', 'required' => true]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('email', [
            'label' => 'Email',
            'placeholder' => 'Enter your email here...',
            'class' => 'form-control', 'required' => true]) ?>
    </div>


    <div class="form-group">
        <?= $this->Form->control('delivery_method', [
            'label' => 'Delivery Method',
            'type' => 'select',
            'options' => [
                'Free Shipping' => 'Free Shipping',
//                'Express' => 'Express (+$50)',
                'Pickup' => 'Pickup in Store'
            ],
            'class' => 'form-control',
            'id' => 'delivery-method',
            'required' => true
        ]) ?>
    </div>

    <div id="address-wrapper" class="form-group">
        <?= $this->Form->control('address', [
            'label' => 'Delivery Address (e.g. 123 Gym St, Suburb, VIC 3000)',
            'type' => 'textarea',
            'placeholder' => 'Enter your full delivery address here...',
            'class' => 'form-control',
            'id' => 'address-input',
            'rows' => 3,
            'required' => true
        ]) ?>

    </div>

    <div id="pickup-info" class="alert alert-info" style="display: none;">
        Pickup location: <strong>Monash University Clayton Campus</strong>
    </div>

    <div class="form-group">
        <h2 style="text-align: center">Check Out</h2>
        <div id="paypal-button-container" style=" color: white;"></div>
        <?= $this->Form->hidden('paypal_paid', ['value' => '0', 'id' => 'paypal-paid']) ?>
    </div>

    <?= $this->Form->end() ?>


</div>
<script src="https://www.paypal.com/sdk/js?client-id=ASyTAIdWuL-epwemhSM0YLv_7XgGv9ApO5kX6sDZsOrdH5qulSXECgmkPUW3gGQm7mf9DfTV1vIYqqE1&components=buttons&currency=USD"></script>

<script>
    let subtotal = parseFloat(<?= json_encode($subtotal) ?>);
    const deliveryField = document.getElementById('delivery-method');
    const shippingSpan = document.getElementById('shipping');
    const discountSpan = document.getElementById('discount');
    const totalSpan = document.getElementById('total');
    const addressWrapper = document.getElementById('address-wrapper');
    const pickupInfo = document.getElementById('pickup-info');
    const addressInput = document.getElementById('address-input');
    const discountInput = document.getElementById('discount-code');
    const discountSuccess = document.getElementById('discount-success');
    const installSuccess = document.getElementById('install-success');
    const installToggle = document.getElementById('installation-toggle');

    let shippingCost = 0;
    let discountValue = 0;
    let discountApplied = false;
    let installationAdded = false;

    function updateTotal() {
        let total = subtotal + shippingCost - discountValue;
        if (installationAdded) {
            total += subtotal * 0.20;
        }
        shippingSpan.textContent = shippingCost.toFixed(2);
        discountSpan.textContent = discountValue.toFixed(2);
        totalSpan.textContent = total.toFixed(2);
    }

    function updateTotalAndAddress() {
        const method = deliveryField.value;

        if (method === 'Express') {
            shippingCost = 50;
            addressWrapper.style.display = 'block';
            pickupInfo.style.display = 'none';
            addressInput.required = true;
        } else if (method === 'Pickup') {
            shippingCost = 0;
            addressWrapper.style.display = 'none';
            pickupInfo.style.display = 'block';
            addressInput.required = false;
        } else {
            shippingCost = 0;
            addressWrapper.style.display = 'block';
            pickupInfo.style.display = 'none';
            addressInput.required = true;
        }
        updateTotal();
    }

    function applyDiscount() {
        if (discountInput.value === 'SAVE10' && !discountApplied) {
            discountValue = subtotal * 0.10;
            discountApplied = true;
            discountSuccess.style.display = 'block';
            updateTotal();
        } else {
            alert("Invalid or already applied discount.");
        }
    }

    function toggleInstallation() {
        installationAdded = installToggle.checked;
        if (installationAdded) {
            installSuccess.style.display = 'block';
            document.getElementById('install-details').style.display = 'block';
        } else {
            installSuccess.style.display = 'none';
            document.getElementById('install-details').style.display = 'none';
        }
        updateTotal();
    }


    updateTotalAndAddress();

    // Hook change event to update address section dynamically
    deliveryField.addEventListener('change', updateTotalAndAddress);

    // PayPal button setup
    // paypal.Buttons({
    //     createOrder: function(data, actions) {
    //         const total = parseFloat(document.getElementById('total').innerText);
    //         return actions.order.create({
    //             purchase_units: [{
    //                 amount: {
    //                     value: total.toFixed(2)
    //                 }
    //             }]
    //         });
    //     },
    //     onApprove: function(data, actions) {
    //         return actions.order.capture().then(function(details) {
    //             // Success - update hidden field
    //             document.getElementById('paypal-paid').value = '1';
    //
    //             // Optional: disable PayPal UI, show loading
    //             alert('Payment successful! Submitting your order...');
    //
    //             // Submit the form manually
    //             const form = document.querySelector('form'); // assuming it's the only form
    //             form.submit();
    //         });
    //     },
    //     onCancel: function(data) {
    //         alert('Payment was cancelled. Please try again.');
    //     },
    //     onError: function(err) {
    //         console.error('PayPal error:', err);
    //         alert('There was an error with the payment. Please try again.');
    //     }
    //
    // }).render('#paypal-button-container');

    paypal.Buttons({
        createOrder: function(data, actions) {
            // Check if required fields are filled before creating the order
            const requiredFields = [
                'customer-name', // replace with your actual field ID or name
                'email',         // replace with your actual field ID or name
                'delivery-method' // replace with your actual field ID or name
            ];

            for (let id of requiredFields) {
                const field = document.getElementById(id);
                if (!field || !field.value.trim()) {
                    alert('Please fill in all required fields before paying.');
                    return actions.reject();
                }
            }

            const total = parseFloat(document.getElementById('total').innerText);
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total.toFixed(2)
                    }
                }]
            });
        },

        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Mark PayPal as paid
                document.getElementById('paypal-paid').value = '1';

                // Optionally show a success message
                alert('Payment successful! Submitting your order...');

                // Submit the form manually
                document.querySelector('form').submit();
            });
        },

        onCancel: function(data) {
            alert('Payment was cancelled. Please try again.');
        },

        onError: function(err) {
            console.error('PayPal error:', err);
            alert('There was an error with the payment. Please try again.');
        }
    }).render('#paypal-button-container');


    function validateAndPay() {
        const requiredFields = [
            'customer-name', 'email', 'delivery-method',
            ...(document.getElementById('delivery-method').value !== 'Pickup' ? ['address-input'] : [])
        ];

        let valid = true;
        for (let id of requiredFields) {
            const input = document.getElementById(id);
            if (!input || !input.value.trim()) {
                input?.classList.add('is-invalid');
                valid = false;
            } else {
                input?.classList.remove('is-invalid');
            }
        }

        if (!valid) {
            alert('Please fill in all required fields before proceeding to payment.');
            return;
        }

        document.getElementById('paypal-button-container').style.display = 'block';
    }
</script>

