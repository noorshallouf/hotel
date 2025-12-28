<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crowny Hotel | Manage Bookings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    <script src="<?= base_url('assets/js/admin.js') ?>" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<button class="mobile-toggle">
    <i class="fas fa-bars"></i>
</button>

<div class="dashboard-container">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-crown"></i> Crowny Hotel</h2>
        </div>

        <nav class="sidebar-nav">
            <a href="/dashboard" class="nav-item">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="/dashboard/bookings" class="nav-item active">
                <i class="fas fa-calendar-check"></i> Bookings
            </a>
            <a href="/dashboard/rooms" class="nav-item">
                <i class="fas fa-bed"></i> Rooms
            </a>
            <a href="/dashboard/room-types" class="nav-item">
                <i class="fas fa-layer-group"></i> Room Types
            </a>
            <a href="/dashboard/payments" class="nav-item">
                <i class="fas fa-credit-card"></i> Payments
            </a>
            <a href="/dashboard/users" class="nav-item">
                <i class="fas fa-users"></i> Users
            </a>
            <a href="/" class="nav-item">
                <i class="fas fa-external-link-alt"></i> View Website
            </a>
        </nav>
    </aside>

    <!-- Main -->
    <main class="main-content">

        <!-- Header -->
        <header class="main-header">
            <div>
                <h1>Manage Bookings</h1>
                <p>View and manage all hotel bookings</p>
            </div>

            <div class="header-user">
                <div class="user-info">
                    <div class="user-name">Admin</div>
                    <div class="user-role">Administrator</div>
                </div>
                <div class="user-avatar">A</div>
                <a href="/logout" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </header>

        <!-- Search -->
        <div class="content-section">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <input type="text" class="table-search" placeholder="Search bookings...">
                <a href="/dashboard" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="content-section">
            <div class="section-header">
                <h2>All Bookings</h2>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Guest</th>
                            <th>Room</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($bookings)): ?>
                            <?php foreach ($bookings as $booking): ?>
                                <tr>
                                    <td>#<?= esc($booking['id']) ?></td>
                                    <td><?= esc($booking['user_name']) ?></td>
                                    <td><?= esc($booking['room_name']) ?></td>
                                    <td><?= esc($booking['check_in']) ?></td>
                                    <td><?= esc($booking['check_out']) ?></td>
                                    <td>$<?= esc($booking['total_price']) ?></td>
                                    <td class="status"><?= esc($booking['status']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No bookings found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

<!-- JS -->
<script src="<?= base_url('js/admin.js') ?>"></script>

</body>
</html>
