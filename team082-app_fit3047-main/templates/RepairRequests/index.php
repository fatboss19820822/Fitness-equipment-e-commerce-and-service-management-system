<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\RepairRequest> $repairRequests
 */
?>


<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #f0f0f0;">Repair Request</h2>
        <?= $this->Html->link(__('New Repair Request'), ['action' => 'add'], [
            'class' => 'btn',
            'style' => 'background-color: #40e0d0; color: black; font-weight: bold;'
        ]) ?>
    </div>

    <div class="table-responsive rounded shadow-sm">
        <table class="table table-dark table-striped table-bordered align-middle mb-0">
            <thead>
            <tr>
                <?php foreach (['id', 'customer_name', 'email', 'address', 'suburb', 'brand_name', 'equipment_category', 'equipment_type', 'preferred_datetime'] as $col): ?>
                    <th><?= $this->Paginator->sort($col) ?></th>
                <?php endforeach; ?>
                <th class="text-center"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($repairRequests as $repairRequest): ?>
                <tr>
                    <td><?= $repairRequest->id ?></td>
                    <td><?= h($repairRequest->customer_name) ?></td>
                    <td><?= h($repairRequest->email) ?></td>
                    <td><?= h($repairRequest->address) ?></td>
                    <td><?= h($repairRequest->suburb) ?></td>
                    <td><?= h($repairRequest->brand_name) ?></td>
                    <td><?= h($repairRequest->equipment_category) ?></td>
                    <td><?= h($repairRequest->equipment_type) ?></td>
                    <td><?= h($repairRequest->preferred_datetime) ?></td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $repairRequest->id], ['class' => 'btn btn-info btn-sm me-2']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $repairRequest->id], ['class' => 'btn btn-warning btn-sm me-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $repairRequest->id], [
                                'class' => 'btn btn-danger btn-sm',
                                'confirm' => __('Are you sure you want to delete {0}?', $repairRequest->customer_name)
                            ]) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
