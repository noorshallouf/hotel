<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crowny Hotel | Payments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    <script src="<?= base_url('assets/js/admin.js') ?>" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            <a href="/dashboard/bookings" class="nav-item">
                <i class="fas fa-calendar-check"></i> Bookings
            </a>
            <a href="/dashboard/rooms" class="nav-item">
                <i class="fas fa-bed"></i> Rooms
            </a>
            <a href="/dashboard/room-types" class="nav-item">
                <i class="fas fa-layer-group"></i> Room Types
            </a>
            <a href="/dashboard/payments" class="nav-item active">
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
                <h1>Payments</h1>
                <p>Manage and track all payments</p>
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

        <!-- Stats -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon revenue"><i class="fas fa-money-bill-wave"></i></div>
                <div class="stat-info">
                    <h3>$<?= number_format($total_revenue ?? 0) ?></h3>
                    <p>Total Revenue</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon bookings"><i class="fas fa-check-circle"></i></div>
                <div class="stat-info">
                    <h3><?= $paid_count ?? 0 ?></h3>
                    <p>Paid Payments</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon users"><i class="fas fa-clock"></i></div>
                <div class="stat-info">
                    <h3><?= $pending_count ?? 0 ?></h3>
                    <p>Pending Payments</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon rooms"><i class="fas fa-times-circle"></i></div>
                <div class="stat-info">
                    <h3><?= $failed_count ?? 0 ?></h3>
                    <p>Failed Payments</p>
                </div>
            </div>
        </div>

        <!-- Payments Table -->
        <div class="content-section">
            <div class="section-header">
                <h2>Recent Payments</h2>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Booking</th>
                            <th>Guest</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($payments)): ?>
                            <?php foreach ($payments as $payment): ?>
                                <tr>
                                    <td>#<?= esc($payment['id']) ?></td>
                                    <td>#<?= esc($payment['booking_id']) ?></td>
                                    <td><?= esc($payment['user_name']) ?></td>
                                    <td>$<?= esc($payment['amount']) ?></td>
                                    <td><?= esc($payment['method']) ?></td>
                                    <td><?= esc($payment['created_at']) ?></td>
                                    <td class="status"><?= esc($payment['status']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No payments found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

<script src="<?= base_url('js/admin.js') ?>"></script>
</body>
</html>
