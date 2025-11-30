<?php $total = 0; ?>

<style>
    p{
        color:white;
    }
    body {
        background: linear-gradient(to bottom right, #1c1c1c, #121212);
        font-family: 'Poppins', sans-serif;
        color: #ffffff;
        margin: 0;
    }

    .cart-container {
        max-width: 1140px;
        margin: 40px auto;
        padding: 30px 40px;
        background-color: #1e1e1e;
        border-radius: 10px;
        box-sizing: border-box;
    }

    .cart-container h3,
    .cart-container label {
        color: #ffffff;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .cart-table {
        width: 100%;
        border-collapse: collapse;
    }

    .cart-table th,
    .cart-table td {
        padding: 12px 15px;
        text-align: left;
    }

    .cart-table th {
        color: #ffffff;
        font-weight: 700;
        border-bottom: 1px solid #444;
    }

    .cart-table td {
        color: #b0b0b0;
        border-bottom: 1px solid #2a2a2a;
    }

    .cart-table tr:hover td {
        background-color: rgba(255, 255, 255, 0.03);
    }

    .cart-image {
        max-height: 100px;
        border-radius: 5px;
    }

    .btn-sm {
        padding: 6px 10px;
        font-size: 0.9em;
        font-weight: 500;
        border-radius: 4px;
        border: none;
        text-decoration: none;
        cursor: pointer;
        margin: 0 4px;
    }

    .btn-secondary {
        background-color: #40e0d0;
        color: #121212;
    }

    .btn-secondary:hover {
        background-color: #37c3b3;
        color: #ffffff;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: #ffffff;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    .btn-success {
        background-color: #40e0d0;
        color: #121212;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 6px;
        border: none;
        text-decoration: none;
        margin-top: 20px;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background-color: #37c3b3;
        color: #ffffff;
        transform: scale(1.05);
    }

    .cart-summary {
        margin-top: 20px;
        font-size: 1.1em;
        color: #f0f0f0;
    }

    .cart-summary label {
        display: block;
        margin-top: 8px;
        font-size: 0.9em;
        color: #cccccc;
    }

    /* Responsive Styling */
    @media screen and (max-width: 768px) {
        .cart-container {
            padding: 20px;
        }

        .cart-table,
        .cart-table thead,
        .cart-table tbody,
        .cart-table th,
        .cart-table td,
        .cart-table tr {
            display: block;
            width: 100%;
        }

        .cart-table thead {
            display: none;
        }

        .cart-table tr {
            margin-bottom: 20px;
            background-color: #2a2a2a;
            border-radius: 10px;
            padding: 15px;
        }

        .cart-table td {
            text-align: right;
            padding: 8px 10px;
            position: relative;
        }

        .cart-table td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            top: 8px;
            font-weight: bold;
            text-transform: capitalize;
            color: #ffffff;
            text-align: left;
        }

        .cart-image {
            max-width: 100%;
            height: auto;
        }

        .btn-sm {
            font-size: 0.85em;
            padding: 4px 8px;
        }

        .btn-success {
            width: 100%;
            text-align: center;
            padding: 12px;
        }
    }
</style>

<div class="cart-container">
    <h3>Your Cart</h3>

    <?php if (!empty($cart)): ?>
        <table class="cart-table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $item): ?>
                <?php $subtotal = $item['price'] * $item['quantity']; ?>
                <tr>
                    <td data-label="Product">
                        <?php if (!empty($item['image'])): ?>
                            <?= $this->Html->image('products/' . $item['image'], [
                                'alt' => $item['name'],
                                'class' => 'cart-image'
                            ]) ?>
                        <?php else: ?>
                            <span>No image available</span>
                        <?php endif; ?>
                    </td>
                    <td data-label="Name"><?= h($item['name']) ?></td>
                    <td data-label="Price">$<?= $this->Number->format($item['price']) ?></td>
                    <td data-label="Quantity">
                        <?= $this->Html->link('-', ['action' => 'decrease', $item['id']], ['class' => 'btn btn-sm btn-secondary']) ?>
                        <?= h($item['quantity']) ?>
                        <?= $this->Html->link('+', ['action' => 'addToCart', $item['id']], ['class' => 'btn btn-sm btn-secondary']) ?>
                    </td>
                    <td data-label="Total">$<?= $this->Number->format($subtotal) ?></td>
                    <td data-label="Remove"><?= $this->Html->link('X', ['action' => 'remove', $item['id']], ['class' => 'btn btn-sm btn-secondary']) ?></td>
                </tr>
                <?php $total += $subtotal; ?>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="cart-summary">
            <p><strong>Subtotal: $<?= $this->Number->format($total) ?></strong></p>
            <label>Tax included and shipping calculated at checkout</label>
            <?= $this->Html->link('Checkout', ['controller' => 'Orders', 'action' => 'checkout'], ['class' => 'btn btn-success']) ?>
        </div>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>
