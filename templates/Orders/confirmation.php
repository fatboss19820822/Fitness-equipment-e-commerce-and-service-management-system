<div style="text-align: center; margin-top: 100px; color: #ffffff;">
    <h1 style="font-size: 3rem; color: #40e0d0;">✅ Order Confirmed!</h1>
    <p style="font-size: 1.5rem; margin-top: 20px; ; color: #ffffff">Thank you for your purchase.</p>

    <div style="margin-top: 30px; font-size: 1.2rem;">
        <p style=" color: #ffffff;"><strong>Order ID:</strong> <?= h($order->id) ?></p>
        <p style=" color: #ffffff;"><strong>Order Date:</strong> <?= $order->created ? $order->created->format('d M Y, H:i') : 'N/A' ?></p>
    </div>

    <div style="margin-top: 30px;">
        <h3 style="color: #40e0d0;">🛒 Items in your order:</h3>
        <?php if (!empty($orderItems)): ?>
            <ul style="list-style: none; padding: 0; font-size: 1.1rem; color: #ffffff;">
                <?php foreach ($orderItems as $item): ?>
                    <li style=" color: #ffffff;"><?= h($item->product->name) ?> (x<?= h($item->quantity) ?>)</li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No items found in this order.</p>
        <?php endif; ?>
    </div>

    <p style="font-size: 1.3rem; margin-top: 20px; color: #ffffff;">
        <strong>Total:</strong> $<?= number_format($order->total_amount, 2) ?>
    </p>

    <p style="margin-top: 20px; color: #ffffff;">We'll email you once your items are on the way.</p>

    <a href="<?= $this->Url->build('/') ?>"" style="
        display: inline-block;
        margin-top: 30px;
        padding: 15px 30px;
        background-color: #40e0d0;
        color: #121212;
        text-decoration: none;
        border-radius: 12px;
        font-size: 1.2rem;
        font-weight: bold;
        transition: background-color 0.3s;
    "
       onmouseover="this.style.backgroundColor='#37c3b3';"
       onmouseout="this.style.backgroundColor='#40e0d0';">
        Back to Homepage
    </a>
</div>
