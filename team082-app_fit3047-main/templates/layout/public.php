<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <title>PowerProShop - Landing Page</title>
    <?= $this->Html->meta('icon', '/img/favicon.ico'); ?>


    <?= $this->Html->meta('viewport', 'width=device-width, initial-scale=1') ?>
    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->fetch('css') ?>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">Home</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>

                <?php if ($this->Identity->isLoggedIn()): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Admin', 'action' => 'dashboard']) ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'cart']) ?>">Carts</a></li
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'public_index']) ?>">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Contacts', 'action' => 'add']) ?>">Contact</a></li>
                    <li class="nav-item">
                        <?= $this->Html->link('FAQ', ['controller' => 'Pages', 'action' => 'display', 'faq'], ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main id="page-top">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</main>

<!-- Footer -->
<footer class="footer mt-auto py-3">

    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">Monash</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">team082@example.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+61 01234 56789</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
        <div class="container text-center">
            <span class="text-muted">Copyright &copy; Team 082 Website 2025</span>
        </div>
    </section>
</footer>

<!-- Scripts -->
<?= $this->Html->script('https://code.jquery.com/jquery-3.5.1.min.js') ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js') ?>
<?= $this->fetch('script') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>
</html>
