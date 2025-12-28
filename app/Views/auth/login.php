<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Crowny Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
</head>
<body>

<div class="auth-container">
    <div class="auth-card">
        <div class="logo">
            👑
        </div>

        <h1>Crowny Hotel</h1>
        <p class="subtitle">Welcome to our booking system</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post">
            <input type="email" name="email" placeholder="Email address" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>

        <a href="<?= base_url('/') ?>" class="back-link">← Back to Home</a>
    </div>
</div>

</body>
</html>
