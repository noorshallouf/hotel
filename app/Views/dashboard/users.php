<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crowny Hotel | Users</title>
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
            <a href="/dashboard/bookings" class="nav-item">
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
            <a href="/dashboard/users" class="nav-item active">
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
                <h1>Manage Users</h1>
                <p>View and manage all registered users</p>
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

        <!-- User Stats -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon users"><i class="fas fa-users"></i></div>
                <div class="stat-info">
                    <h3><?= $total_users ?? 0 ?></h3>
                    <p>Total Users</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon bookings"><i class="fas fa-user-check"></i></div>
                <div class="stat-info">
                    <h3><?= $active_users ?? 0 ?></h3>
                    <p>Active Users</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon rooms"><i class="fas fa-calendar-alt"></i></div>
                <div class="stat-info">
                    <h3><?= $users_with_bookings ?? 0 ?></h3>
                    <p>Users with Bookings</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon revenue"><i class="fas fa-user-plus"></i></div>
                <div class="stat-info">
                    <h3><?= $new_users ?? 0 ?></h3>
                    <p>New This Month</p>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="content-section">
            <div class="section-header">
                <h2>All Users</h2>
                <input type="text" class="table-search" placeholder="Search users...">
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td>#<?= esc($user['id']) ?></td>
                                <td><?= esc($user['name']) ?></td>
                                <td><?= esc($user['email']) ?></td>
                                <td><?= esc($user['phone']) ?></td>
                                <td><?= esc($user['role']) ?></td>
                                <td class="status"><?= esc($user['status'] ?? 'active') ?></td>
                                <td><?= esc($user['created_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No users found</td>
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
