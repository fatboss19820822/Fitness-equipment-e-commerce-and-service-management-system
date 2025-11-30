<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<style>
    /* Ensures header links stay white */
    .table thead th a {
        color: white !important;
        text-decoration: none;
    }
</style>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-white"><?= __('Users') ?></h3>
        <?= $this->Html->link(__('New User'), ['action' => 'add'], [
            'class' => 'btn',
            'style' => 'background-color: #40e0d0; color: black; font-weight: bold;'
        ]) ?>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-striped table-bordered align-middle">
            <thead class="bg-dark border-bottom border-secondary">
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('roles') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="text-center"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->roles) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-info btn-sm me-2']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-warning btn-sm me-2']) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $user->id],
                                [
                                    'method' => 'post',
                                    'confirm' => __('Are you sure you want to delete the user with email "{0}"?', $user->email),
                                    'class' => 'btn btn-danger btn-sm'
                                ]
                            ) ?>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<!--    <div class="paginator text-white mt-3">-->
<!--        <ul class="pagination justify-content-center">-->
<!--            --><?php //= $this->Paginator->first('<< ' . __('first')) ?>
<!--            --><?php //= $this->Paginator->prev('< ' . __('previous')) ?>
<!--            --><?php //= $this->Paginator->numbers() ?>
<!--            --><?php //= $this->Paginator->next(__('next') . ' >') ?>
<!--            --><?php //= $this->Paginator->last(__('last') . ' >>') ?>
<!--        </ul>-->
<!--        <p class="text-center">-->
<!--            --><?php //= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
<!--        </p>-->
<!--    </div>-->
</div>
