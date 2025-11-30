<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon', '/img/favicon.ico'); ?>
    <?= $this->Html->css(['https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css']) ?>
    <style>
        body {
            background-color: #121212 !important;
            color: #f0f0f0;
        }

        main {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        /* Subheading for each group */
        .content-blocks--list-subheading {
            margin-top: 2rem;
            font-size: 1.25rem;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 0.5rem;
        }

        /* Quick links */
        .contentBlocks div a {
            color: #40e0d0;
            text-decoration: none;
            margin-right: 0.75rem;
        }

        .contentBlocks div a:hover {
            text-decoration: underline;
        }

        /* List group */
        .content-blocks--list-group {
            list-style: none;
            padding-left: 0;
            margin-top: 1rem;
        }

        .content-blocks--list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 1rem;
            margin-bottom: 0.75rem;
            background-color: #f8f9fa;
            transition: background-color 0.2s ease-in-out;
        }

        /* Text content */
        .content-blocks--text {
            max-width: 75%;
        }

        .content-blocks--display-name {
            font-weight: 500;
            font-size: 1.1rem;
            color: #343a40;
        }

        .content-blocks--description {
            font-size: 0.95rem;
            color: #6c757d;
            margin-top: 0.25rem;
        }

        /* Actions (Edit/Restore) */
        .content-blocks--actions a {
            margin-left: 1rem;
            font-size: 0.9rem;
            color: #40e0d0;
        }

        .content-blocks--actions a:hover {
            text-decoration: underline;
        }

        h3{
            color: white;
        }
        .contentBlocks.index.content{
            background: #333333;
        }
        .content-blocks--list-group-item{
            background: #333333;
        }
        .content-blocks--display-name{
            color: white;
        }
        .content{
            background: #333333;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'Admin', 'action' => 'dashboard']) ?>">Admin Panel</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <?= $this->Html->link('Home', '/', ['class' => 'nav-link']) ?>

                <li class="nav-item"><?= $this->Html->link('Dashboard', ['controller' => 'Admin', 'action' => 'dashboard'], ['class' => 'nav-link']) ?></li>
                <li class="nav-item"><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']) ?></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Fullscreen Dark Content -->
<main>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</main>

<?= $this->Html->script(['https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js']) ?>
</body>
</html>
