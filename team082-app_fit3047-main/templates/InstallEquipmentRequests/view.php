<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InstallEquipmentRequest $installEquipmentRequest
 */
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="bg-dark text-white p-4 rounded shadow">
            <h3 class="text-center text-white mb-4">
                <?= h($installEquipmentRequest->full_name) ?>
            </h3>

            <table class="table table-dark table-bordered">
                <tr>
                    <th><?= __('Booking Number') ?></th>
                    <td><?= h($installEquipmentRequest->booking_number) ?></td>
                </tr>

                <tr>
                    <th><?= __('Full Name') ?></th>
                    <td><?= h($installEquipmentRequest->full_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($installEquipmentRequest->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($installEquipmentRequest->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Brand Name') ?></th>
                    <td><?= h($installEquipmentRequest->brand_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment Category') ?></th>
                    <td><?= h($installEquipmentRequest->equipment_category) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment Type') ?></th>
                    <td><?= h($installEquipmentRequest->equipment_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Preferred Datetime') ?></th>
                    <td><?= h($installEquipmentRequest->preferred_datetime) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($installEquipmentRequest->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($installEquipmentRequest->modified) ?></td>
                </tr>
            </table>

            <div class="mt-4">
                <strong><?= __('Installation Address') ?></strong>
                <blockquote class="blockquote text-white-50 mt-2">
                    <?= $this->Text->autoParagraph(h($installEquipmentRequest->address)); ?>
                </blockquote>
            </div>

            <div class="text-center mt-4">
                <?= $this->Html->link(__('← Back to Requests'), ['action' => 'index'], [
                    'class' => 'btn',
                    'style' => 'background-color: #40e0d0; color: black; font-weight: bold;'
                ]) ?>
            </div>
        </div>
    </div>
</div>
