<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="users form content bg-dark text-white p-4 rounded shadow-sm">
            <h3 class="text-center text-white"><?= __('Edit User') ?></h3>
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend class="text-white"><?= __('User Details') ?></legend>

                <!-- Email field as readonly -->
                <div class="form-group">
                    <label class="text-white"><?= __('Email Address') ?></label>
                    <p class="form-control-plaintext text-white-50 bg-transparent"><?= h($user->email) ?></p>
                </div>


                <!-- Password field is hidden/commented for now -->
                <!--
                <div class="form-group">
                    <?= $this->Form->control('password', [
                    'class' => 'form-control',
                    'label' => ['class' => 'text-white', 'text' => 'Password'],
                    'type' => 'password'
                ]) ?>
                </div>
                -->

                <div class="form-group">
                    <?= $this->Form->control('roles', [
                        'class' => 'form-select',
                        'label' => ['class' => 'text-white', 'text' => 'Roles'],
                        'options' => [
                            'admin' => 'Admin',
                            'manager' => 'Manager',
                            'employee' => 'Employee'
                        ],
                        'empty' => __('Select Roles')
                    ]) ?>
                </div>
            </fieldset>

            <div class="form-group mt-3 text-center">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-turquoise btn-lg']) ?>
            </div>

            <div class="text-center mt-3">
                <?= $this->Html->link(__('← Back to List Users'), ['action' => 'index'], [
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
