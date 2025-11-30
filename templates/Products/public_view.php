<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="py-5" style="background: linear-gradient(to bottom right, #1c1c1c, #121212); min-height: 100vh; font-family: 'Poppins', sans-serif;">
    <div class="container px-4">

        <div class="card mx-auto shadow-lg p-5" style="max-width: 950px; background-color: #1e1e1e; color: #f0f0f0; border-radius: 20px;">

            <!-- Back Button -->
            <div class="mb-5">
                <?= $this->Html->link('← Back to Products', ['controller' => 'Products', 'action' => 'publicIndex'], [
                    'class' => 'btn btn-outline-light btn-sm',
                    'style' => 'font-size: 1rem; padding: 8px 16px;'
                ]) ?>
            </div>

            <div class="row g-5 align-items-center">
                <!-- Product Image -->
                <div class="col-md-6 text-center">
                    <?php if (!empty($product->image)) : ?>
                        <?= $this->Html->image('products/' . $product->image, [
                            'alt' => $product->name,
                            'class' => 'img-fluid rounded',
                            'style' => 'max-height: 400px; object-fit: contain; background: #2c2c2c; padding: 12px; border-radius: 12px;'
                        ]) ?>
                    <?php endif; ?>
                </div>

                <!-- Product Details -->
                <div class="col-md-6">

                    <h1 class="fw-bold mb-3" style="font-size: 2.5rem; color: #ccc;"><?= h($product->name) ?></h1>

                    <p class="badge bg-secondary mb-3" style="font-size: 1rem;"><?= h($product->category) ?></p>

                    <h2 class="text-success mb-4" style="font-size: 2rem;">$<?= $this->Number->format($product->price) ?></h2>

                    <?php
                    if ($product->stock_level == 0) {
                        echo '<span class="badge bg-danger mb-4" style="font-size: 1rem;">Out of Stock</span>';
                    } elseif ($product->stock_level < 3) {
                        echo '<span class="badge bg-warning text-dark mb-4" style="font-size: 1rem;">Low Stock (' . h($product->stock_level) . ' left)</span>';
                    } else {
                        echo '<span class="badge bg-success mb-4" style="font-size: 1rem;">In Stock</span>';
                    }
                    ?>

                    <div class="mt-4 d-grid gap-2">
                        <?php if ($product->stock_level > 0) : ?>
                            <?= $this->Html->link('Add to Cart', ['action' => 'addToCart', $product->id], [
                                'class' => 'btn btn-primary btn-lg',
                                'style' => 'font-size: 1.25rem; padding: 12px;'
                            ]) ?>
                        <?php else: ?>
                            <button class="btn btn-secondary btn-lg" disabled style="font-size: 1.25rem; padding: 12px;">Out of Stock</button>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

            <!-- Divider -->
            <hr class="my-5" style="border-color: #444;">

            <!-- Product Description -->
            <?php if (!empty($product->description)) : ?>
                <div class="text-center px-3">
                    <h4 class="fw-bold mb-3" style="font-size: 1.8rem; color: #ccc;">Description</h4>
                    <p style="color: #ccc; font-size: 1.1rem; line-height: 1.8;"><?= nl2br(h($product->description)) ?></p>
                </div>
            <?php endif; ?>

        </div>

    </div>
</div>
