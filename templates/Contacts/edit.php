<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>

<style>
    body {
        background: linear-gradient(to bottom right, #1c1c1c, #121212);
        color: #f0f0f0;
        font-family: 'Poppins', sans-serif;
    }

    .contact-edit-form {
        background-color: rgba(40, 40, 40, 0.95);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        max-width: 600px;
        margin: 60px auto;
        animation: fadeIn 1.5s ease-in-out;
    }

    .form-control,
    select.form-control {
        background-color: #333;
        color: white; /* base */
        border: 1px solid #444;
    }

    .form-control:focus,
    select.form-control:focus {
        background-color: #444;
        color: white !important; /* force white text on focus */
        border-color: #40e0d0;
        box-shadow: 0 0 0 0.25rem rgba(64, 224, 208, 0.25);
    }


    .form-group {
        margin-bottom: 1rem;
    }

    .btn-turquoise {
        background-color: #40e0d0;
        color: #ffffff;
        border: none;
        transition: transform 0.3s ease;
    }

    .btn-turquoise:hover {
        background-color: #37c3b3;
        color: #ffffff;
        transform: scale(1.05);
    }

    blockquote {
        font-size: 1rem;
        padding-left: 1rem;
        border-left: 4px solid #40e0d0;
        margin-top: 15px;
        color: #f0f0f0;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="contact-edit-form">
    <h3 class="text-center mb-4 text-white"><?= __('Edit Contact') ?></h3>

    <?= $this->Form->create($contact) ?>
    <fieldset>
        <div class="form-group">
            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'Name']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'Email']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('created_at', ['class' => 'form-control', 'label' => 'Created At']) ?>
        </div>
    </fieldset>

    <div class="mt-4">
        <strong><?= __('Message') ?></strong>
        <blockquote>
            <?= $this->Text->autoParagraph(h($contact->message)); ?>
        </blockquote>
    </div>

    <div class="text-center mt-4">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-turquoise']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
