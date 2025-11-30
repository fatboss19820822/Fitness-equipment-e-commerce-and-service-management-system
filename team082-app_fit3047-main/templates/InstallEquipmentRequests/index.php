<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InstallEquipmentRequest> $installEquipmentRequests
 */
?>
<style>
    .install-table td {
        color: #ffffff !important;
    }

    .install-table th a {
        color: #ffffff !important;
        text-decoration: none;
    }
</style>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-white"><?= __('Install Equipment Requests') ?></h3>
        <?= $this->Html->link(__('New Request'), ['action' => 'add'], [
            'class' => 'btn',
            'style' => 'background-color: #40e0d0; color: black; font-weight: bold;'
        ]) ?>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-striped table-bordered align-middle install-table">
            <thead class="bg-dark border-bottom border-secondary">
            <tr>
                <?php foreach (['id', 'full_name', 'company_name', 'email', 'equipment_category', 'equipment_type', 'preferred_datetime', 'status'] as $col): ?>
                    <th><?= $this->Paginator->sort($col) ?></th>
                <?php endforeach; ?>
                <th class="text-center"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($installEquipmentRequests as $request): ?>
                <tr>
                    <td><?= $request->id ?></td>
                    <td><?= h($request->full_name) ?></td>
                    <td><?= h($request->company_name) ?></td>
                    <td><?= h($request->email) ?></td>
                    <td><?= h($request->equipment_category) ?></td>
                    <td><?= h($request->equipment_type) ?></td>
                    <td><?= h($request->preferred_datetime) ?></td>
                    <td>
                        <?= $this->Form->create($request, ['url' => ['action' => 'updateStatus', $request->id]]) ?>
                        <?= $this->Form->select('status', ['Pending' => 'Pending', 'Ongoing' => 'Ongoing', 'Complete' => 'Complete'], [
                            'default' => $request->status,
                            'class' => 'form-select form-select-sm text-dark',
                            'onchange' => 'this.form.submit();'
                        ]) ?>
                        <?= $this->Form->end() ?>
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $request->id], ['class' => 'btn btn-info btn-sm me-2']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $request->id], ['class' => 'btn btn-warning btn-sm me-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $request->id], [
                                'class' => 'btn btn-danger btn-sm',
                                'confirm' => __('Are you sure you want to delete request {0}?', $request->full_name)
                            ]) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
