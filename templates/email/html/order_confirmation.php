<h2>Hi <?= h($customerName) ?>,</h2>

<p>Thank you for your order (#<?= h($order->id) ?>) placed on <?= $order->created->format('d M Y, H:i') ?>.</p>

<h3>Order Summary:</h3>
<ul>
    <?php foreach ($items as $item): ?>
        <li><?= h($item->product->name) ?> x <?= $item->quantity ?> - $<?= number_format($item->price, 2) ?></li>
    <?php endforeach; ?>
</ul>

<p><strong>Shipping:</strong> <?= h($order->delivery_method) ?> - $<?= number_format($order->shipping_cost, 2) ?></p>
<p><strong>Total Paid:</strong> $<?= number_format($total, 2) ?></p>

<p>Your order is being processed and you’ll receive updates soon.</p>

<p>– PowerProShop Team</p>
