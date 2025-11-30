<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repair Request</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <style>
        body {
            background: linear-gradient(to bottom right, #1c1c1c, #121212);
            color: #f0f0f0;
            font-family: 'Poppins', sans-serif;
        }
        .contact-form {
            background-color: rgba(40, 40, 40, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            margin: 50px auto;
            animation: fadeIn 1.5s ease-in-out;
        }
        .form-control, select.form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #444;
            padding: 10px;
        }
        .form-control:focus, select.form-control:focus {
            background-color: #ffffff;
            border-color: #40e0d0;
            box-shadow: 0 0 0 0.25rem rgba(64,224,208,0.25);
        }
        .btn-turquoise {
            background-color: #40e0d0;
            color: #ffffff;
            transition: transform 0.3s ease;
            padding: 12px;
        }
        .btn-turquoise:hover {
            background-color: #37c3b3;
            color: #ffffff;
            transform: scale(1.05);
        }
        .text-white-50 {
            color: rgba(255, 255, 255, 0.7);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="dark-form">
    <div class="contact-form">
        <?= $this->Form->create() ?>
        <h2 class="text-center mb-4"><?= __('Repair Request Form') ?></h2>
        <p class="text-center text-white-50 mb-4">Complete the form below and a member of our team will contact you ASAP.</p>

        <div class="row">
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('full_name', ['label' => 'Full Name', 'class' => 'form-control form-dark', 'required' => true]) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('company_name', ['label' => 'Company/Business Name', 'class' => 'form-control form-dark']) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('address', ['label' => 'Address', 'class' => 'form-control form-dark', 'required' => true]) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('suburb', ['label' => 'Suburb', 'class' => 'form-control form-dark', 'required' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('contact_number', ['label' => 'Contact Number', 'class' => 'form-control form-dark', 'required' => true]) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('mobile_number', ['label' => 'Mobile Number', 'class' => 'form-control form-dark']) ?>
            </div>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('email', ['label' => 'Email', 'class' => 'form-control form-dark', 'required' => true]) ?>
        </div>

        <h5 class="mt-4 mb-3 text-white">Equipment Fault Details</h5>

        <div class="row">
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('brand', ['label' => 'Brand', 'class' => 'form-control form-dark', 'required' => true]) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('model_number', ['label' => 'Model Number', 'class' => 'form-control form-dark']) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('serial_number', ['label' => 'Serial Number', 'class' => 'form-control form-dark']) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('preventative_maintenance', [
                    'label' => 'Preventative Maintenance?',
                    'options' => ['Yes' => 'Yes', 'No' => 'No'],
                    'class' => 'form-control form-dark',
                    'required' => true
                ]) ?>
            </div>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('fault_description', ['label' => 'Describe Fault', 'type' => 'textarea', 'class' => 'form-control form-dark', 'rows' => 3, 'required' => true]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('equipment_list', ['label' => 'If yes, list equipment', 'type' => 'textarea', 'class' => 'form-control form-dark', 'rows' => 2]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('additional_info', ['label' => 'Additional Information', 'type' => 'textarea', 'class' => 'form-control form-dark', 'rows' => 2]) ?>
        </div>

        <div class="text-center">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-turquoise button w-100']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<!--     Recaptcha (optional, comment out if not needed) -->
<!--     --><?php //= $this->Recaptcha->display() ?><!-- -->


    <?= $this->Form->end() ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
