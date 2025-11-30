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

    .side-nav {
        padding: 20px;
        background-color: #222;
        border-radius: 10px;
        margin: 40px 20px;
    }

    .side-nav h4 {
        color: #ffffff;
        margin-bottom: 10px;
    }

    .side-nav-item {
        display: block;
        margin-bottom: 10px;
        color: #40e0d0;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .side-nav-item:hover {
        color: #ffffff;
    }
</style>

<div class="row">
    <div class="column column-80">
        <div class="products form content">
            <?= $this->Form->create($product, ['type' => 'file']) ?>
            <?= $this->Form->create($product, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Product') ?></legend>
                <?php
                echo $this->Form->control('name', [
                    'label' => 'Product Name',
                    'placeholder' => 'e.g. Adjustable Dumbbell Set'
                ]);

                echo $this->Form->control('category', [
                    'label' => 'Equipment Type',
                    'type' => 'select',
                    'options' => $categoryOptions,
                    'empty' => 'Select a category',
                    'default' => 'freeweight'
                ]);

                echo $this->Form->control('price', [
                    'label' => 'Price (AUD)',
                    'type' => 'number',
                    'step' => '0.01',
                    'min' => '0',
                    'placeholder' => 'e.g. 299.99'
                ]);

                echo $this->Form->control('image_file', [
                    'type' => 'file',
                    'label' => 'Upload Product Image',
                    'accept' => 'image/*'
                ]);

                echo $this->Form->control('description', [
                    'placeholder' => 'Brief description of the product...'
                ]);

                echo $this->Form->control('supplier', [
                    'label' => 'Supplier Name',
                    'placeholder' => 'e.g. FitGear Supplies Ltd.'
                ]);

                echo $this->Form->control('stock_level', [
                    'label' => 'Available Stock',
                    'type' => 'number',
                    'min' => '0',
                    'placeholder' => 'e.g. 25'
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
            <div class="text-center">
                <?= $this->Html->link('← Back', $this->request->referer(true), [
                    'class' => 'btn btn-outline-light mt-3'
                ]) ?>
            </div>


        </div>
    </div>

</div>

