<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>

<style>
    th a {
        color: white !important;
        text-decoration: none;
    }

    th a:hover {
        color: #40e0d0 !important;
        text-decoration: underline;
    }
</style>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 style="color: #f0f0f0;">Orders</h2>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], [
                'class' => 'btn',
                'style' => 'background-color: #40e0d0; color: black; font-weight: bold;'
            ]) ?>
        </div>

        <div class="table-responsive rounded shadow-sm">
            <table class="table table-dark table-striped table-bordered align-middle mb-0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('customer_name') ?></th>
                    <th><?= $this->Paginator->sort('total_amount') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="text-center"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= h($order->customer_name) ?></td>
                        <td>$<?= $this->Number->format($order->total_amount) ?></td>
                        <td><?= h($order->status) ?></td>
                        <td><?= h($order->created) ?></td>
                        <td class="text-center">
                            <?= $this->Html->link('View', ['action' => 'view', $order->id], ['class' => 'btn btn-info btn-sm me-2']) ?>
                            <?= $this->Html->link('Edit', ['action' => 'edit', $order->id], ['class' => 'btn btn-warning btn-sm me-2']) ?>
                            <?= $this->Form->postLink('Delete', ['action' => 'delete', $order->id], [
                                'confirm' => __('Are you sure you want to delete Order from {0}?', $order->customer_name),
                                'class' => 'btn btn-danger btn-sm'
                            ]) ?>
                            <?= $this->Form->postLink(
                                'Complete Order',
                                ['action' => 'complete', $order->id],
                                ['confirm' => 'Are you sure?', 'class' => 'btn btn-success btn-sm me-2']
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
