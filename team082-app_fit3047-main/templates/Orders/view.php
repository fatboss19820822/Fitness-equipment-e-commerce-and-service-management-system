<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<style>
    body {
        background: linear-gradient(to bottom right, #1c1c1c, #121212);
        color: #f0f0f0;
        font-family: 'Poppins', sans-serif;
        margin: 0;
    }

    .orders.view.content {
        width: 100%;
        max-width: 1140px;
        margin: 40px auto;
        padding: 30px 40px;
        background-color: #1e1e1e;
        border-radius: 10px;
        box-sizing: border-box;
    }

    .orders.view.content h3 {
        color: #ffffff;
        margin-bottom: 25px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
    }

    th {
        color: #ffffff;
        font-weight: 700;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        border-bottom: 1px solid #444;
    }

    td {
        color: #b0b0b0;
        border-bottom: 1px solid #2a2a2a;
    }

    img {
        max-width: 400px;
        height: auto;
        border-radius: 6px;
        transition: transform 0.3s ease;
    }

    img:hover {
        transform: scale(1.03);
    }

    .text strong {
        color: #dddddd;
        font-size: 1.1em;
    }

    .text blockquote {
        margin-top: 10px;
        color: #f0f0f0;
        padding-left: 15px;
        border-left: 3px solid #40e0d0;
    }

    .side-nav {
        padding: 20px;
        background-color: #222;
        border-radius: 10px;
        margin: 40px 20px;
    }

    .side-nav h4 {
        color: #ffffff;
        margin-bottom: 10px;
    }

    .side-nav-item {
        display: block;
        margin-bottom: 8px;
        color: #40e0d0;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .side-nav-item:hover {
        color: #ffffff;
    }

    .btn-back {
        background-color: #40e0d0;
        color: black;
        font-weight: bold;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #37c3b3;
        color: black;
    }
</style>

<div class="row">
    <div class="column column-80">
        <div class="orders view content">
            <h3><?= h($order->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer Name') ?></th>
                    <td><?= h($order->customer_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($order->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('address') ?></th>
                    <td><?= h($order->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($order->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Amount') ?></th>
                    <td><?= $this->Number->format($order->total_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($order->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($order->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Order Items') ?></h4>
                <?php if (!empty($order->order_items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
<!--                            <th class="actions">--><?php //= __('Actions') ?><!--</th>-->
                        </tr>
                        <?php foreach ($order->order_items as $orderItem) : ?>
                        <tr>
                            <td><?= h($orderItem->id) ?></td>
                            <td><?= h($orderItem->order_id) ?></td>
                            <td><?= h($orderItem->product_id) ?></td>
                            <td><?= h($orderItem->quantity) ?></td>
                            <td><?= h($orderItem->price) ?></td>
                            <td><?= h($orderItem->created) ?></td>
                            <td><?= h($orderItem->modified) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
<!--                            <td class="actions">-->
<!--                                --><?php //= $this->Html->link(__('View'), ['controller' => 'OrderItems', 'action' => 'view', $orderItem->id]) ?>
<!--                                --><?php //= $this->Html->link(__('Edit'), ['controller' => 'OrderItems', 'action' => 'edit', $orderItem->id]) ?>
<!--                                --><?php //= $this->Form->postLink(
//                                    __('Delete'),
//                                    ['controller' => 'OrderItems', 'action' => 'delete', $orderItem->id],
//                                    [
//                                        'method' => 'delete',
//                                        'confirm' => __('Are you sure you want to delete # {0}?', $orderItem->id),
//                                    ]
//                                ) ?>
<!--                            </td>-->
