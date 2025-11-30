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

    .products.view.content {
        width: 100%;
        max-width: 1140px;
        margin: 40px auto;
        padding: 30px 40px;
        background-color: #1e1e1e;
        border-radius: 10px;
        box-sizing: border-box;
    }

    .products.view.content h3 {
        color: #ffffff;
        margin-bottom: 25px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
    }

    th {
        color: #ffffff;
        font-weight: 700;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        border-bottom: 1px solid #444;
    }

    td {
        color: #b0b0b0;
        border-bottom: 1px solid #2a2a2a;
    }

    img {
        max-width: 400px;
        height: auto;
        border-radius: 6px;
        transition: transform 0.3s ease;
    }

    img:hover {
        transform: scale(1.03);
    }

    .text strong {
        color: #dddddd;
        font-size: 1.1em;
    }

    .text blockquote {
        margin-top: 10px;
        color: #f0f0f0;
        padding-left: 15px;
        border-left: 3px solid #40e0d0;
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
        margin-bottom: 8px;
        color: #40e0d0;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .side-nav-item:hover {
        color: #ffffff;
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
</style>

<div class="row">
    <div class="column column-80">
        <div class="products view content">
            <h3><?= h($product->name) ?></h3>

            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= h($product->category) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td>
                        <?php if (!empty($product->image)) : ?>
                            <?= $this->Html->image('products/' . $product->image, ['alt' => $product->name]) ?>
                        <?php else : ?>
                            <span>No image available</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($product->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock Level') ?></th>
                    <td><?= $product->stock_level === null ? '' : $this->Number->format($product->stock_level) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($product->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($product->modified) ?></td>
                </tr>
            </table>

            <div class="text">
                <strong><?= __('Supplier') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->Supplier)); ?>
                </blockquote>
            </div>

            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->description)); ?>
                </blockquote>
            </div>

            <div class="text-center mt-4">
                <?= $this->Html->link('← Back to Product List', ['action' => 'index'], ['class' => 'btn-back']) ?>
            </div>
        </div>
    </div>
</div>
