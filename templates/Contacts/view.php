<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>

<style>
    body {
        background: linear-gradient(to bottom right, #1c1c1c, #121212);
        font-family: 'Poppins', sans-serif;
    }

    .contact-view-card {
        background-color: #1f1f1f;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
        max-width: 720px;
        margin: 60px auto;
        color: white;
    }

    dl {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    dt {
        font-weight: bold;
        font-size: 0.95rem;
        color: #40e0d0;
    }

    dd {
        margin: 0 0 10px 0;
        font-size: 1rem;
        color: #e0e0e0;
    }

    blockquote {
        font-size: 1rem;
        padding-left: 1rem;
        border-left: 4px solid #40e0d0;
        margin-top: 15px;
        color: #f0f0f0;
    }

    .btn-back {
        background: transparent;
        border: 1px solid #ccc;
        color: #fff;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background-color: #40e0d0;
        color: #000;
        border-color: #40e0d0;
    }
</style>

<div class="contact-view-card">
    <h3 class="text-center mb-4 text-white"><?= h($contact->name) ?></h3>

    <dl>
        <dt><?= __('Name') ?></dt>
        <dd><?= h($contact->name) ?></dd>

        <dt><?= __('Email') ?></dt>
        <dd><?= h($contact->email) ?></dd>

        <dt><?= __('ID') ?></dt>
        <dd><?= $this->Number->format($contact->id) ?></dd>

        <dt><?= __('Created At') ?></dt>
        <dd><?= h($contact->created_at) ?></dd>
    </dl>

    <div class="mt-4">
        <dt><?= __('Message') ?></dt>
        <blockquote>
            <?= $this->Text->autoParagraph(h($contact->message)); ?>
        </blockquote>
    </div>

    <div class="text-center mt-4">
        <?= $this->Html->link(__('← Back to Contact List'), ['action' => 'index'], ['class' => 'btn btn-back']) ?>
    </div>
</div>
