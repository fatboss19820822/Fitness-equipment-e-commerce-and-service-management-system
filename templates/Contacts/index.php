<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contact> $contacts
 */
?>

<style>
    th a {
        color: white !important;
        text-decoration: none;
    }

    th a:hover {
        color: #40e0d0 !important;
        text-decoration: underline;
    }
</style>
<div class="container">
 <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-white"><?= __('Contacts') ?></h3>
        <?= $this->Html->link(__('New Contact'), ['action' => 'add'], [
            'class' => 'btn',
            'style' => 'background-color: #40e0d0; color: black; font-weight: bold;'
        ]) ?>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-striped table-bordered align-middle">
            <thead class="bg-dark border-bottom border-secondary">
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('created_at') ?></th>
                <th class="text-center"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= $this->Number->format($contact->id) ?></td>
                    <td><?= h($contact->name) ?></td>
                    <td><a href="mailto:<?= h($contact->email) ?>"><?= h($contact->email) ?></a></td>
                    <td><?= h($contact->created_at) ?></td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $contact->id], ['class' => 'btn btn-info btn-sm me-2']) ?>

                            <?php if ($this->Identity->get('role') !== 'employee'): ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->id], ['class' => 'btn btn-warning btn-sm me-2']) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $contact->id],
                                    [
                                        'confirm' => __('Are you sure you want to delete {0}?', $contact->name),
                                        'class' => 'btn btn-danger btn-sm'
                                    ]
                                ) ?>
                            <?php endif; ?>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
