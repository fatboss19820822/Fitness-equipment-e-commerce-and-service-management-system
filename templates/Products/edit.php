<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<style>
    body {
        background: linear-gradient(to bottom right, #1c1c1c, #121212);
        color: #f0f0f0;
        font-family: 'Poppins', sans-serif;
        margin: 0;
    }

    .products.form.content {
        width: 100%;
        max-width: 1140px;
        margin: 40px auto;
        padding: 30px 40px;
        background-color: #1e1e1e;
        border-radius: 10px;
        box-sizing: border-box;
    }

    fieldset {
        border: none;
        margin: 0;
        padding: 0;
    }

    legend {
        color: #ffffff;
        font-size: 1.4em;
        font-weight: bold;
        margin-bottom: 20px;
    }

    label {
        color: #ffffff;
        font-weight: 500;
        margin-bottom: 6px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    textarea,
    select {
        width: 100%;
        background-color: #333;
        color: #ffffff;
        border: 1px solid #444;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
        font-size: 1em;
        box-sizing: border-box;
    }

    input:focus,
    textarea:focus,
    select:focus {
        background-color: #444;
        border-color: #40e0d0;
        box-shadow: 0 0 0 0.2rem rgba(64,224,208,0.25);
        outline: none;
    }

    .button,
    .form input[type="submit"],
    button {
        background-color: #40e0d0;
        color: #ffffff;
        font-weight: 600;
        padding: 10px 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .button:hover,
    input[type="submit"]:hover,
    button:hover {
        background-color: #37c3b3;
        transform: scale(1.05);
    }

    .btn-back {
        background-color: #40e0d0;
        color: black;
        font-weight: bold;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #37c3b3;
        color: black;
    }

    .text-center {
        text-align: center;
    }
</style>

<div class="row">
    <div class="column column-80">
        <div class="products form content">
            <?= $this->Form->create($product, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Product') ?></legend>
                <?php
                echo $this->Form->control('name');
                echo $this->Form->control('category', [
                    'label' => 'Equipment Type',
                    'type' => 'select',
                    'options' => $categoryOptions,
                    'empty' => 'Select a category',
                    'default' => 'freeweight'
                ]);
                echo $this->Form->control('price');
                echo $this->Form->control('image_file', ['type' => 'file']);
                echo $this->Form->control('description');
                echo $this->Form->control('Supplier');
                echo $this->Form->control('stock_level');
                ?>
            </fieldset>

            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>

            <div class="text-center mt-4">
                <?= $this->Html->link('← Back to Product List', ['action' => 'index'], ['class' => 'btn-back']) ?>
            </div>
        </div>
    </div>
</div>
