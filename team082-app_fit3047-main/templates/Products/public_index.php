<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<?= $this->Html->css('public-products') ?>
<?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>
<?= $this->Html->script('https://code.jquery.com/ui/1.13.2/jquery-ui.min.js') ?>
<?= $this->Html->css('https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css') ?>

<!-- Fullscreen Gym Theme Background -->
    <div class="container px-4">

        <!-- Heading -->
        <h2 class="text-center mt-4">Gym Equipment We Sell</h2>

        <!-- Filters -->
        <div class="row g-4 justify-content-center mb-5">
            <div class="col-md-4">
                <?= $this->Form->create(null, ['type' => 'get']) ?>
                <label for="key" class="form-label text-white">Search:</label>
                <?= $this->Form->control('key', [
                    'label' => false,
                    'placeholder' => 'Search product...',
                    'class' => 'form-control'
                ]) ?>
                <?= $this->Form->end() ?>
            </div>

            <div class="col-md-4">
                <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'publicIndex']]) ?>
                <label for="category" class="form-label text-white">Category:</label>
                <select name="category" id="category" onchange="this.form.submit()" class="form-select">
                    <option value="">All Categories</option>
                    <option value="Free Weight" <?= $this->request->getQuery('category') === 'Free Weight' ? 'selected' : '' ?>>Free Weight</option>
                    <option value="Machine" <?= $this->request->getQuery('category') === 'Machine' ? 'selected' : '' ?>>Machine</option>
                    <option value="Cardio" <?= $this->request->getQuery('category') === 'Cardio' ? 'selected' : '' ?>>Cardio</option>
                    <option value="Accessory" <?= $this->request->getQuery('category') === 'Accessory' ? 'selected' : '' ?>>Accessory</option>
                </select>
                <?= $this->Form->end() ?>
            </div>

            <div class="col-md-4">
                <label for="amount" class="form-label text-white">Price range:</label>
                <input type="text" id="amount" readonly style="border:0; color:white; font-weight:bold; width: 100%; background:transparent;" class="form-control mb-2">
                <div id="slider-range"></div>
            </div>
        </div>

        <div class="row mt-2 mb-4">
            <div class="col text-center">
                <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'publicIndex']) ?>" class="btn btn-outline-light">
                    Reset Filters
                </a>
            </div>
        </div>

        <script>
            $(function() {
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 10000,
                    values: [<?= h($this->request->getQuery('min_price') ?? 0) ?>, <?= h($this->request->getQuery('max_price') ?? 10000) ?>],
                    slide: function(event, ui) {
                        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                    },
                    change: function(event, ui) {
                        window.location.href = "?min_price=" + ui.values[0] + "&max_price=" + ui.values[1];
                    }
                });
                $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
            });
        </script>

        <!-- Products Grid -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
            <?php foreach ($products as $product): ?>
                <div class="col d-flex align-items-stretch">
                    <div class="card product-card text-center border-0 shadow-sm h-100" style="background-color: #2a2a2a; border-radius: 20px; transition: transform 0.3s ease;">
                        <div class="p-2">
                            <?php if (!empty($product->image)) : ?>
                                <?= $this->Html->image('products/' . $product->image, [
                                    'alt' => $product->name,
                                    'class' => 'img-fluid',
                                    'style' => 'height: 230px; object-fit: contain; padding: 5px;'
                                ]) ?>
                            <?php endif; ?>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h5 class="card-title" style="color: #ffffff; font-size: 1.3rem;"><?= h($product->name) ?></h5>
                                <p class="fw-bold" style="color: #40e0d0; font-size: 1.1rem;">$<?= $this->Number->format($product->price) ?></p>
                            </div>

                            <div class="d-flex justify-content-center gap-2">
                                <?= $this->Html->link('Add to Cart', ['controller' => 'Products', 'action' => 'addToCart', $product->id], [
                                    'class' => 'btn btn-success',
                                    'style' => 'font-weight: 500;',
                                    'data-bs-toggle' => 'tooltip',
                                    'data-bs-placement' => 'top',
                                    'title' => 'Add this product to your cart'
                                ]) ?>

                                <?= $this->Html->link('View', ['controller' => 'Products', 'action' => 'publicView', $product->id], [
                                    'class' => 'btn btn-outline-light',
                                    'style' => 'font-weight: 500;',
                                    'data-bs-toggle' => 'tooltip',
                                    'data-bs-placement' => 'top',
                                    'title' => 'View product details'
                                ]) ?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

<style>
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(64, 224, 208, 0.4);
    }

    h2.text-center.mt-4 {
        font-family: "Varela Round", sans-serif;
        color: #ffffff;
        margin-bottom: 30px;
        font-weight: 700;
    }

</style>
