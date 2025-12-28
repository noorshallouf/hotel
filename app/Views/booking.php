<?php
$isLoggedIn = session()->get('isLoggedIn');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Crowny Hotel | Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/booking.css') ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<!-- ================= HEADER ================= -->
<header>
    <div class="content flex_space">
        <div class="logo">
            <img src="<?= base_url('images/logo.png') ?>" alt="Crowny Hotel">
        </div>
        <nav>
            <ul>
                <li><a href="<?= base_url('/') ?>">Home</a></li>
                <li><a href="<?= base_url('/booking') ?>">Booking</a></li>

                <?php if ($isLoggedIn): ?>
                    <li><a href="<?= base_url('/logout') ?>">Logout</a></li>
                <?php else: ?>
                    <li><a href="<?= base_url('/login') ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<!-- ================= LOGIN REQUIRED MESSAGE ================= -->
<?php if (!$isLoggedIn): ?>
    <div class="login-required-message" style="display:block;">
        <p>You must login to book a room.</p>
        <a href="<?= base_url('/login') ?>" class="primary-btn">Login</a>
    </div>
<?php endif; ?>

<div class="booking-page-container">

    <!-- ================= SEARCH FORM ================= -->
    <?php if ($isLoggedIn): ?>
        <section id="searchFormSection" class="booking-form">
            <h2><i class="fas fa-search"></i> Search Available Rooms</h2>

            <form method="GET">
                <div class="form-grid">
                    <input type="date" name="check_in" required>
                    <input type="date" name="check_out" required>
                    <input type="number" name="adults" placeholder="Adults" min="1" required>
                    <input type="number" name="children" placeholder="Children" min="0" required>
                </div>

                <button type="submit" class="primary-btn">
                    Check Availability
                </button>
            </form>
        </section>
    <?php endif; ?>

    <!-- ================= AVAILABLE ROOMS ================= -->
    <?php if ($isLoggedIn): ?>
        <section class="room-selection">
            <h2><i class="fas fa-hotel"></i> Available Rooms</h2>

            <div class="rooms-grid">
                <?php if (!empty($rooms)): ?>
                    <?php foreach ($rooms as $room): ?>
                        <div class="room-card">
                            <img src="<?= base_url('uploads/' . $room['image']) ?>"
                                 alt="<?= esc($room['title']) ?>">

                            <div class="room-info">
                                <h3><?= esc($room['title']) ?></h3>
                                <p><?= esc($room['description']) ?></p>

                                <strong>
                                    $<?= esc($room['price_per_night']) ?> / night
                                </strong>

                                <form method="POST" action="<?= base_url('booking/create') ?>">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="room_id" value="<?= $room['id'] ?>">

                                    <button type="submit" class="secondary-btn">
                                        Book Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No rooms available.</p>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

</div>

<!-- ================= FOOTER ================= -->
<footer>
    <p>&copy; <?= date('Y') ?> Crowny Hotel. All rights reserved.</p>
</footer>

</body>
</html>
