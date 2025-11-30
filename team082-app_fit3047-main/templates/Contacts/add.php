<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
            max-width: 500px;
            margin: 50px auto;
            animation: fadeIn 1.5s ease-in-out;
        }
        .form-control{
            color:white;
        }
        .form-control, select.form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #444;
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
        }
        .btn-turquoise:hover {
            background-color: #37c3b3;
            color: #ffffff;
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }

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
    <?= $this->Form->create($contact) ?>
    <h2 class="text-center mb-4"><?= __('Contact Us') ?></h2>
    <div class="mb-3">
        <?= $this->Form->control('name', [
            'label' => 'Name',
            'placeholder' => 'Enter your full name here...',
            'class' => 'form-control', 'required' => true]) ?>
    </div>
    <div class="mb-3">
        <?= $this->Form->control('email', [
            'label' => 'Email',
            'placeholder' => 'Enter your email here...',
            'class' => 'form-control', 'required' => true]) ?>
    </div>
    <div class="mb-3">
        <?= $this->Form->control('enquiry_type', [
            'label' => 'Type of Enquiry',
            'type' => 'select',
            'options' => [
                'Equipment Purchases' => 'Equipment Purchases',
                'Installation' => 'Installation',
                'Repairs' => 'Repairs',
                'Others' => 'Others'
            ],
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="mb-3">
        <?= $this->Form->control('message', [
            'label' => 'Message (max 300 characters)',
            'type' => 'textarea',
            'class' => 'form-control',
            'placeholder' => 'Enter your message here...',
            'required' => true,
            'id' => 'message-input',
            'max-length' => 300,
            'oninput' => 'updateCharCounter()'
        ]) ?>
        <div id="char-counter" class="char-counter"></div>
    </div>

    <?= $this->Recaptcha->display() ?>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-turquoise w-100']) ?>
    <div class="text-center">
        <?= $this->Html->link('← Back', $this->request->referer(true), [
            'class' => 'btn btn-outline-light mt-3'
        ]) ?>
    </div>

    <?= $this->Form->end() ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function updateCharCounter(){
        const textarea = document.getElementById('message-input');
        const counter = document.getElementById('char-counter');
        const remaining = 300 - textarea.value.length;

        if (remaining <=0){
            this.value = this.value.substring(0, 299);
        }

        counter.textContent = `${remaining} characters remaining`;
    }
    document.addEventListener('DOMContentLoaded', function(){
        updateCharCounter();
        const messageInput = document.getElementById('message-input');
        if (messageInput) {
            messageInput.addEventListener('input', updateCharCounter);
            messageInput.addEventListener('change', updateCharCounter);
        }
    });

</script>
</body>
</html>
