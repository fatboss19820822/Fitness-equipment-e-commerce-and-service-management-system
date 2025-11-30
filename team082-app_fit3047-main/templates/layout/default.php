<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * @var \App\View\AppView $this
 */
$cakeDescription = 'PowerProShop';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon', '/img/favicon.ico'); ?>

    <?= $this->Html->css(['normalize.min', 'bootstrap5.min', 'fonts', 'cake']) ?>
    <?= $this->Html->css('custom') ?>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">

    <style>
        html, body {
            background: linear-gradient(to bottom right, #1c1c1c, #121212);
            font-family: 'Quicksand', sans-serif;
            color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .top-nav {
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1c1c1c;
            padding: 0.5rem 1rem;
        }

        .top-nav-title a {
            font-family: 'Quicksand', sans-serif;
            font-weight: 700;
            font-size: 2rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            background: linear-gradient(to top, #ffffff, #c0c0c0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
        }

        .top-nav-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-nav-links a {
            color: #fff;
            padding: 6px 10px;
            text-decoration: none;
            font-weight: 500;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .top-nav-links a:hover {
            background-color: #40e0d0;
            color: #121212;
        }

        @media screen and (max-width: 768px) {
            .top-nav {
                flex-direction: column;
                align-items: flex-start;
            }

            .top-nav-links {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
            }

            .top-nav-links a {
                width: 100%;
                padding: 10px;
            }
        }

        .content{
            background: #1c1c1c;
        }

        h3 {
            color: white;
        }
        p{
            color: black;
        }

    </style>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<nav class="top-nav">
    <div class="top-nav-title">
        <a  class="website-title" href="<?= $this->Url->build('/') ?>">
            <?= $this->ContentBlock->text('website-title'); ?>
        </a>
    </div>

    <div class="top-nav-links">
        <?= $this->Html->link('Home', '/') ?>

        <?php if ($this->Identity->isLoggedIn()): ?>
            <?php $roles = $this->Identity->get('roles'); ?>
            <?php if ($roles === 'admin'): ?>
                <?= $this->Html->link('Admin Dashboard', ['controller' => 'Admin', 'action' => 'dashboard']) ?>
            <?php elseif (in_array($roles, ['manager', 'employee'])): ?>
                <?= $this->Html->link('Orders', ['controller' => 'Orders', 'action' => 'index']) ?>
                <?= $this->Html->link('Products', ['controller' => 'Products', 'action' => 'index']) ?>
                <?= $this->Html->link('Contacts', ['controller' => 'Contacts', 'action' => 'index']) ?>
                <?= $this->Html->link('Repairs', ['controller' => 'RepairRequests', 'action' => 'index']) ?>
            <?php endif; ?>
            <?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?>
        <?php else: ?>
            <?= $this->Html->link('Repair', ['controller' => 'RepairRequests', 'action' => 'add']) ?>
            <?= $this->Html->link('Install', ['controller' => 'InstallEquipmentRequests', 'action' => 'add']) ?>
            <?= $this->Html->link('Products', ['controller' => 'Products', 'action' => 'public_index']) ?>
            <?= $this->Html->link('Contacts', ['controller' => 'Contacts', 'action' => 'add']) ?>
            <?= $this->Html->link('FAQ', ['controller' => 'Pages', 'action' => 'display', 'faq'], ['class' => 'nav-link']) ?>
            <?= $this->Html->link('Cart 🛒', ['controller' => 'Products', 'action' => 'cart']) ?>
            <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?>
        <?php endif; ?>
    </div>
</nav>

<div class="main">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</div>

</body>
</html>
