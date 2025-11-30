<div class="vh-100 d-flex justify-content-center align-items-center" style="background: linear-gradient(to right, #121212, #1c1c1c);">
    <div class="card shadow p-5" style="background: rgba(30,30,30,0.95); border-radius: 1rem; width: 100%; max-width: 420px; color: #f0f0f0; border: 1px solid #333;">

        <?= $this->Flash->render() ?>

        <h2 class="mb-3 text-center" style="font-family: 'Poppins', sans-serif; color: #40e0d0;">Welcome Back</h2>
        <h5 class="mb-4 text-center" style="font-family: 'Poppins', sans-serif; color: #ccc;">Login to PowerProShop</h5>

        <?= $this->Form->create(null, ['class' => 'needs-validation', 'novalidate' => true]) ?>

        <!-- Email -->
        <div class="mb-3 position-relative">
            <?= $this->Form->label('email', 'Email', ['class' => 'form-label text-white']) ?>
            <i class="bi bi-envelope" style="position: absolute; top: 52px; left: 12px; transform: translateY(-50%); color: #999;"></i>
            <?= $this->Form->control('email', [
                'label' => false,
                'class' => 'form-control ps-5',
                'placeholder' => 'Enter your email',
                'style' => 'background: #222; border-radius: 10px; border: 1px solid #444; color: #f0f0f0;'
            ]) ?>
        </div>

        <!-- Password -->
        <div class="mb-3 position-relative">
            <?= $this->Form->label('password', 'Password', ['class' => 'form-label text-white']) ?>
            <i class="bi bi-lock" style="position: absolute; top: 52px; left: 12px; transform: translateY(-50%); color: #999;"></i>
            <?= $this->Form->control('password', [
                'label' => false,
                'class' => 'form-control ps-5',
                'placeholder' => 'Enter your password',
                'id' => 'passwordInput',
                'style' => 'background: #222; border-radius: 10px; border: 1px solid #444; color: #f0f0f0;'
            ]) ?>
            <i class="bi bi-eye-slash toggle-password" id="togglePassword" style="position: absolute; top: 52px; right: 12px; transform: translateY(-50%); cursor: pointer; color: #999;"></i>
        </div>


        <!-- Login Button -->
        <div class="d-grid mb-4">
            <?= $this->Form->button(__('Login'), [
                'class' => 'btn btn-lg',
                'style' => 'border-radius: 10px; background-color: #40e0d0; color: #121212; font-weight: bold; border: none;'
            ]) ?>
        </div>

        <!-- Back to home -->
        <div class="text-center">
            <?= $this->Html->link('← Back to Homepage', ['controller' => 'Pages', 'action' => 'home'], [
                'class' => 'text-decoration-none',
                'style' => 'color: #aaa; font-size: 0.9rem;'
            ]) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>

<!-- Password toggle script -->
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('passwordInput');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
</script>
