<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InstallEquipmentRequest $installEquipmentRequest
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
        <div class="installEquipmentRequests form content bg-dark text-white p-4 rounded shadow-sm">
            <h3 class="text-center text-white mb-4"><?= __('Edit Install Equipment Request') ?></h3>
            <?= $this->Form->create($installEquipmentRequest) ?>
            <fieldset>
                <legend class="text-white"><?= __('Request Details') ?></legend>

                <div class="form-group">
                    <?= $this->Form->control('full_name', [
                        'label' => ['class' => 'text-white', 'text' => 'Full Name'],
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('company_name', [
                        'label' => ['class' => 'text-white', 'text' => 'Company Name (Optional)'],
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('email', [
                        'label' => ['class' => 'text-white', 'text' => 'Email Address'],
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('address', [
                        'label' => ['class' => 'text-white', 'text' => 'Installation Address'],
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('brand_name', [
                        'label' => ['class' => 'text-white', 'text' => 'Brand Name'],
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('equipment_category', [
                        'label' => ['class' => 'text-white', 'text' => 'Equipment Category'],
                        'options' => ['free weight' => 'Free Weight', 'cardio' => 'Cardio', 'machine' => 'Machine'],
                        'class' => 'form-select'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('equipment_type', [
                        'label' => ['class' => 'text-white', 'text' => 'Specific Equipment Type'],
                        'class' => 'form-control'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('preferred_datetime', [
                        'label' => ['class' => 'text-white', 'text' => 'Preferred Installation Date & Time'],
                        'class' => 'form-control',
                        'type' => 'datetime-local'
                    ]) ?>
                </div>
            </fieldset>

            <div class="form-group mt-4 text-center">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-turquoise btn-lg']) ?>
            </div>

            <div class="text-center mt-3">
                <?= $this->Html->link(__('← Back to List'), ['action' => 'index'], [
                    'class' => 'btn btn-outline-light'
                ]) ?>
            </div>

            <?= $this->Form->end() ?>
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

    .form-control,
    .form-select {
        background-color: #333333;
        border-color: #555555;
        color: white;
    }

    .form-control:focus,
    .form-select:focus {
        background-color: #333333;
        border-color: #40E0D0;
        box-shadow: 0 0 5px rgba(64, 224, 208, 0.6);
    }

    .form-group {
        margin-bottom: 15px;
    }
</style>
