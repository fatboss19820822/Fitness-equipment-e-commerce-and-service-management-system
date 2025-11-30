<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="bg-dark text-white p-4 rounded shadow">
            <h3 class="text-center text-white mb-4"><?= h($user->email) ?></h3>

            <table class="table table-dark table-bordered">
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>

            <div class="text-center mt-4">
                <?= $this->Html->link(__('← Back to List Users'), ['action' => 'index'], [
                    'class' => 'btn',
                    'style' => 'background-color: #40e0d0; color: black; font-weight: bold;'
                ]) ?>
            </div>
        </div>
    </div>
</div>
