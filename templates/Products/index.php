<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<style>
    body {
        background: linear-gradient(to bottom right, #1c1c1c, #121212);
        color: #f0f0f0;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    .page-container {
        width: 100%;
        padding: 20px 0;
        background-color: #121212;
    }

    .products.index.content {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 30px 40px;
        box-sizing: border-box;
        background-color: #1e1e1e;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.3);
    }

    .products.index.content h3 {
        margin-bottom: 30px;
        color: #ffffff;
        text-align: center;
        font-size: 2.2rem;
        padding: 0 20px;
    }

    /* Header Actions */
    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .search-filter {
        flex: 1;
        min-width: 300px;
        max-width: 500px;
    }

    .white-input {
        color: white;
        background-color: #2a2a2a;
        border: 1px solid #444;
        border-radius: 5px;
        padding: 8px 12px;
        width: 100%;
    }

    .white-input:focus {
        color: black;
        background-color: white;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #cccccc;
    }

    /* Buttons */
    .btn {
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        border: none;
    }

    .btn-primary {
        background-color: #40e0d0;
        color: #121212;
    }

    .btn-primary:hover {
        background-color: #37c3b3;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: #444;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #555;
        transform: translateY(-2px);
    }

    .btn-danger {
        background-color: #dc3545;
        color: #ffffff;
    }

    .btn-danger:hover {
        background-color: #b02a37;
        transform: translateY(-2px);
    }

    /* Product cards grid */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
        margin-top: 30px;
        padding: 0 20px;
    }

    .product-card {
        background: #2a2a2a;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .product-image-container {
        height: 200px;
        overflow: hidden;
        position: relative;
        background: #333;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-image {
        transform: scale(1.05);
    }

    .product-details {
        padding: 20px;
    }

    .product-name {
        font-size: 1.2rem;
        margin: 0 0 10px 0;
        color: #ffffff;
        font-weight: 600;
    }

    .product-category {
        display: inline-block;
        background: rgba(64, 224, 208, 0.2);
        color: #40e0d0;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 1.4rem;
        color: #ffffff;
        margin: 10px 0;
        font-weight: 700;
    }

    .product-meta {
        display: flex;
        justify-content: space-between;
        color: #aaa;
        font-size: 0.9rem;
        margin: 10px 0;
    }

    .product-stock {
        font-weight: 600;
        margin: 10px 0;
    }

    .in-stock {
        color: #4CAF50;
    }

    .low-stock {
        color: #FFC107;
    }

    .out-of-stock {
        color: #F44336;
    }

    .product-actions {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .no-products {
        text-align: center;
        padding: 40px;
        color: #ccc;
        grid-column: 1 / -1;
    }

    /* Pagination */
    .paginator {
        margin-top: 50px;
        text-align: center;
        padding: 0 20px;
    }

    .pagination {
        display: inline-flex;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination a, .pagination span {
        color: #40e0d0;
        padding: 8px 16px;
        border: 1px solid #40e0d0;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .pagination a:hover {
        background-color: #40e0d0;
        color: #121212;
    }

    .paginator p {
        margin-top: 15px;
        color: #ccc;
        font-size: 0.95em;
    }

    @media (max-width: 768px) {
        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        }

        .products.index.content {
            padding: 20px 15px;
        }

        .header-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .search-filter {
            max-width: 100%;
        }
    }

</style>

<div class="container">
    <div class="products index content">
        <div class="header-actions">
            <h3><?= __('Product Management') ?></h3>
            <div class="search-filter">
                <?= $this->Form->create(null, ['type' => 'get']) ?>
                <label for="key">Search Products:</label>
                <?= $this->Form->control('key', [
                    'label' => false,
                    'placeholder' => 'Search by name or category...',
                    'class' => 'white-input',
                    'value' => $this->request->getQuery('key')
                ]) ?>
                <?= $this->Form->end() ?>

                <div class="mt-2">
                    <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']) ?>" class="btn btn-secondary">
                        Reset Filters
                    </a>
                </div>
            </div>

            <?= $this->Html->link(__('Add New Product'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>

        <?php if ($products->items()->isEmpty()) : ?>
            <div class="no-products">
                <p>No products found. <?= $this->Html->link('Add a new product', ['action' => 'add']) ?></p>
            </div>
        <?php else : ?>
            <div class="products-grid">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image-container">
                            <?php if (!empty($product->image)) : ?>
                                <?= $this->Html->image('products/' . $product->image, [
                                    'alt' => $product->name,
                                    'class' => 'product-image'
                                ]) ?>
                            <?php else : ?>
                                <div style="height: 100%; display: flex; align-items: center; justify-content: center;">
                                    <span>No image available</span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="product-details">
                            <h3 class="product-name"><?= h($product->name) ?></h3>
                            <span class="product-category"><?= h($product->category) ?></span>
                            <div class="product-price">$<?= $this->Number->format($product->price) ?></div>

                            <div class="product-meta">
                                <span>Stock:
                                    <span class="<?=
                                    ($product->stock_level == 0) ? 'out-of-stock' :
                                        (($product->stock_level < 3) ? 'low-stock' : 'in-stock') ?>">
                                        <?= $product->stock_level === null ? 'N/A' : $this->Number->format($product->stock_level) ?>
                                    </span>
                                </span>
                                <span>Created: <?= $product->created->format('m/d/Y') ?></span>
                            </div>

                            <div class="product-actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $product->id], ['class' => 'btn btn-secondary']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' => 'btn btn-primary']) ?>

                                <?php if ($this->Identity->get('role') !== 'employee'): ?>
                                    <?= $this->Form->postLink(
                                        __('Delete'),
                                        ['action' => 'delete', $product->id],
                                        [
                                            'class' => 'btn btn-danger',
                                            'confirm' => __('Are you sure you want to delete {0}?', $product->name),
                                            'method' => 'delete'
                                        ]
                                    ) ?>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

<!--        <div class="paginator">-->
<!--            <ul class="pagination">-->
<!--                --><?php //= $this->Paginator->first('<< ' . __('first')) ?>
<!--                --><?php //= $this->Paginator->prev('< ' . __('previous')) ?>
<!--                --><?php //= $this->Paginator->numbers() ?>
<!--                --><?php //= $this->Paginator->next(__('next') . ' >') ?>
<!--                --><?php //= $this->Paginator->last(__('last') . ' >>') ?>
<!--            </ul>-->
<!--            <p>--><?php //= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?><!--</p>-->
<!--        </div>-->
    </div>
</div>
