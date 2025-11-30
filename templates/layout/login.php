<?php
use Cake\Core\Configure;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?> - PowerProShop</title>
    <?= $this->Html->meta('icon') ?>

    <!-- Fonts and Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Load reCAPTCHA script -->
    <?php
    if (isset($this->Recaptcha)) {
        echo $this->Recaptcha->script();
    }
    ?>
</head>


<body>

<main class="main">
    <?= $this->fetch('content') ?>
</main>


</body>
</html>
