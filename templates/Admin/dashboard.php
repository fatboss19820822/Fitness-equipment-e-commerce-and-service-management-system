<!-- Flash Message Rendering -->
<?= $this->Flash->render() ?>

<style>
    .admin-card {
        border: 1px solid transparent;
        transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
    }

    .admin-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        border: 1px solid #40e0d0;
    }

    /* Flash message style override (optional, for dark theme) */
    .flash.success {
        background-color: #28a745;
        color: #fff;
        padding: 15px;
        text-align: center;
        border-radius: 4px;
        margin-bottom: 30px;
    }
</style>

<div style="background-color: #121212; min-height: 100vh; padding: 40px 0;">
    <div class="container">
        <h1 class="text-center mb-5" style="color: #f0f0f0;">Welcome to Admin Dashboard</h1>

        <div class="row g-4 justify-content-center">

            <!-- Manage Contacts Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center p-3 admin-card" style="background-color: #1e1e1e; border: none; color: #f0f0f0;">
                    <h5 class="card-title mb-3">📬 Manage Contacts</h5>
                    <p class="card-text">View and manage customer contacts.</p>
                    <?= $this->Html->link('Go to Contacts', ['controller' => 'Contacts', 'action' => 'index'], ['class' => 'btn btn-info mt-3 text-dark fw-bold']) ?>
                </div>
            </div>

            <!-- Manage Products Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center p-3 admin-card" style="background-color: #1e1e1e; border: none; color: #f0f0f0;">
                    <h5 class="card-title mb-3">📦 Manage Products</h5>
                    <p class="card-text">Manage your product catalog.</p>
                    <?= $this->Html->link('Go to Products', ['controller' => 'Products', 'action' => 'index'], ['class' => 'btn btn-info mt-3 text-dark fw-bold']) ?>
                </div>
            </div>

            <!-- Manage Orders Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center p-3 admin-card" style="background-color: #1e1e1e; border: none; color: #f0f0f0;">
                    <h5 class="card-title mb-3">📑 Manage Orders</h5>
                    <p class="card-text">View and process customer orders.</p>
                    <?= $this->Html->link('Go to Orders', ['controller' => 'Orders', 'action' => 'index'], ['class' => 'btn btn-info mt-3 text-dark fw-bold']) ?>
                </div>
            </div>

            <!-- Manage Users Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center p-3 admin-card" style="background-color: #1e1e1e; border: none; color: #f0f0f0;">
                    <h5 class="card-title mb-3">👤 Manage Users</h5>
                    <p class="card-text">View and manage staff users.</p>
                    <?= $this->Html->link('Go to Users', ['controller' => 'Users', 'action' => 'index'], ['class' => 'btn btn-info mt-3 text-dark fw-bold']) ?>
                </div>
            </div>

            <!-- Manage Repair Requests Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center p-3 admin-card" style="background-color: #1e1e1e; border: none; color: #f0f0f0;">
                    <h5 class="card-title mb-3">🛠 Manage Repair Requests</h5>
                    <p class="card-text">View and manage repair submissions.</p>
                    <?= $this->Html->link('Go to Repairs', ['controller' => 'RepairRequests', 'action' => 'index'], ['class' => 'btn btn-info mt-3 text-dark fw-bold']) ?>
                </div>
            </div>

            <!-- Manage Install Equipment Requests Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center p-3 admin-card" style="background-color: #1e1e1e; border: none; color: #f0f0f0;">
                    <h5 class="card-title mb-3">🏋️ Manage Install Requests</h5>
                    <p class="card-text">View and manage install requests.</p>
                    <?= $this->Html->link('Go to Installations', ['controller' => 'InstallEquipmentRequests', 'action' => 'index'], ['class' => 'btn btn-info mt-3 text-dark fw-bold']) ?>
                </div>
            </div>

            <!-- Website Customization Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center p-3 admin-card" style="background-color: #1e1e1e; border: none; color: #f0f0f0;">
                    <h5 class="card-title mb-3">⚙️ Website Customization</h5>
                    <p class="card-text">View and edit the website.</p>
                    <?= $this->Html->link('Go to Content Blocks', ['plugin' => 'ContentBlocks', 'controller' => 'ContentBlocks', 'action' => 'index'], ['class' => 'btn btn-info mt-3 text-dark fw-bold']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
