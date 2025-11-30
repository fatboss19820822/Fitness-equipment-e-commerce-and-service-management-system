<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RepairRequest $repairRequest
 */
?>
<style>
    .form-control:focus,
    select.form-control:focus {
        background-color: #444;
        color: white !important; /* force white text on focus */
        border-color: #40e0d0;
        box-shadow: 0 0 0 0.25rem rgba(64, 224, 208, 0.25);
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="repairRequests form content bg-dark text-white p-4 rounded shadow-sm">
            <h3 class="text-center mb-4 text-white"><?= __('Edit Repair Request') ?></h3>
            <?= $this->Form->create($repairRequest) ?>
            <fieldset>
                <legend class="text-white"><?= __('Request Details') ?></legend>

                <div class="form-group"><?= $this->Form->control('customer_name', ['class' => 'form-control', 'label' => ['class' => 'text-white']]) ?></div>
                <div class="form-group"><?= $this->Form->control('email', ['class' => 'form-control', 'label' => ['class' => 'text-white']]) ?></div>
                <div class="form-group"><?= $this->Form->control('address', ['class' => 'form-control', 'label' => ['class' => 'text-white']]) ?></div>
                <div class="form-group"><?= $this->Form->control('suburb', ['class' => 'form-control', 'label' => ['class' => 'text-white']]) ?></div>
                <div class="form-group"><?= $this->Form->control('brand_name', ['class' => 'form-control', 'label' => ['class' => 'text-white']]) ?></div>
                <div class="form-group"><?= $this->Form->control('equipment_category', [
                        'class' => 'form-select',
                        'options' => ['free weight' => 'Free Weight', 'cardio' => 'Cardio', 'machine' => 'Machine'],
                        'label' => ['class' => 'text-white']
                    ]) ?></div>
                <div class="form-group"><?= $this->Form->control('equipment_type', ['class' => 'form-control', 'label' => ['class' => 'text-white']]) ?></div>
<!--                <div class="form-group">--><?php //= $this->Form->control('equipment', ['class' => 'form-control', 'label' => ['class' => 'text-white']]) ?><!--</div>-->
                <div class="form-group"><?= $this->Form->control('preferred_datetime', ['class' => 'form-control', 'type' => 'datetime-local', 'label' => ['class' => 'text-white']]) ?></div>

            </fieldset>
            <div class="text-center mt-4">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-turquoise btn-lg']) ?>
            </div>

            <?= $this->Form->end() ?>

            <div class="text-center mt-4">
                <?= $this->Html->link(__('← Back to List'), ['action' => 'index'], [
                    'class' => 'btn',
                    'style' => 'background-color: #40e0d0; color: black; font-weight: bold;'
                ]) ?>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-turquoise {
        background-color: #40E0D0;
        color: white;
        border: none;
    }
    .btn-turquoise:hover {
        background-color: #30c6b7;
    }
    .form-control, .form-select {
        background-color: #333;
        border-color: #555;
        color: white;
    }
    .form-control:focus, .form-select:focus {
        background-color: #333;
        border-color: #40E0D0;
        box-shadow: 0 0 5px rgba(64, 224, 208, 0.6);
    }
    .form-group {
        margin-bottom: 15px;
    }
</style>
