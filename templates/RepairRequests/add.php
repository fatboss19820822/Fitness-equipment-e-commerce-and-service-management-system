<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RepairRequest $repairRequest
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Equipment Repair</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <style>
        body {
            background: linear-gradient(to bottom right, #1c1c1c, #121212);
            color: #f0f0f0;
            font-family: 'Poppins', sans-serif;
        }
        .contact-form {
            background-color: rgba(40,40,40,0.9);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
            max-width: 800px;
            margin: 50px auto;
            animation: fadeIn 1.5s ease-in-out;
        }
        .form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #444;
        }
        .form-control:focus {
            background-color: #fff;
            color: #000;
            border-color: #40e0d0;
            box-shadow: 0 0 0 0.25rem rgba(64,224,208,0.25);
        }
        .btn-turquoise {
            background-color: #40e0d0;
            color: #fff;
            transition: transform 0.3s ease;
        }
        .btn-turquoise:hover {
            background-color: #37c3b3;
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .section-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.2rem;
            font-weight: 600;
            color: #40e0d0;
        }

        input::placeholder,
        textarea::placeholder {
            color: gray !important;
            opacity: 1;
        }
    </style>
</head>
<body>

<div class="contact-form">
    <?= $this->Form->create($repairRequest) ?>
    <h2 class="text-center mb-4"><?= __('Request Equipment Repair') ?></h2>

    <div class="row">
        <!-- Personal Details -->
        <div class="col-md-6">
            <div class="section-title"><?= __('Personal Details') ?></div>
            <div class="mb-3">
                <?= $this->Form->control('customer_name', [
                    'label' => 'Full Name',
                    'placeholder' => 'Enter your name here... ',
                    'class' => 'form-control',
                    'required' => true]) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('email', [
                    'label' => 'Email Address',
                    'placeholder' => 'Enter your email here... ',
                    'class' => 'form-control',
                    'type' => 'email', 'required' => true]) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('address', [
                    'label' => 'Street Address',
                    'placeholder' => 'Enter your address here... ',
                    'class' => 'form-control']) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('suburb', [
                    'placeholder' => 'Enter your suburb here... ',
                    'label' => 'Suburb',
                    'class' => 'form-control']) ?>
            </div>
        </div>

        <!-- Repair Details -->
        <div class="col-md-6">
            <div class="section-title"><?= __('Repair Details') ?></div>
            <div class="mb-3">
                <?= $this->Form->control('brand_name', [
                    'placeholder' => 'Enter the brand name here... ',
                    'label' => 'Brand Name',
                    'class' => 'form-control']) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('equipment_category', [
                    'placeholder' => 'Select Equipment Category here... ',
                    'label' => 'Equipment Category',
                    'type' => 'select',
                    'options' => ['free weight' => 'Free Weight', 'cardio' => 'Cardio', 'machine' => 'Machine'],
                    'class' => 'form-control'
                ]) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('equipment_type', [
                    'placeholder' => 'Enter the equipment type here... ',
                    'label' => 'Specific Equipment Type',
                    'class' => 'form-control']) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('preferred_datetime', [
                    'label' => 'Preferred Repair Date & Time',
                    'class' => 'form-control',
                    'type' => 'datetime-local'
                ]) ?>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-4">
        <?= $this->Form->button(__('Submit Request'), ['class' => 'btn btn-turquoise w-100']) ?>
    </div>
    <div class="text-center">
        <?= $this->Html->link('← Back', $this->request->referer(true), [
            'class' => 'btn btn-outline-light mt-3'
        ]) ?>
    </div>


    <?= $this->Form->end() ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
