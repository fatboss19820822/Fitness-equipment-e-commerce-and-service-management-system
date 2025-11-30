<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RepairRequest $repairRequest
 */
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="bg-dark text-white p-4 rounded shadow">
            <h3 class="text-center mb-4 text-white"><?= h($repairRequest->customer_name) ?></h3>

            <table class="table table-dark table-bordered">
                <?php foreach ([
                                   'customer_name' => 'Customer Name',
                                   'email' => 'Email',
                                   'address' => 'Address',
                                   'suburb' => 'Suburb',
                                   'brand_name' => 'Brand Name',
                                   'equipment_category' => 'Equipment Category',
                                   'equipment_type' => 'Equipment Type',
                                   'equipment' => 'Equipment',
                                   'preferred_datetime' => 'Preferred Datetime',
                                   'created' => 'Created',
                                   'modified' => 'Modified',
                                   'id' => 'ID'
                               ] as $field => $label): ?>
                    <tr>
                        <th><?= __($label) ?></th>
                        <td><?= h($repairRequest->$field) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div class="text-center mt-4">
                <?= $this->Html->link(__('← Back to List'), ['action' => 'index'], [
                    'class' => 'btn',
                    'style' => 'background-color: #40e0d0; color: black; font-weight: bold;'
                ]) ?>
            </div>
        </div>
    </div>
</div>
