<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Crowny Hotel | Rooms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">

    <!-- Icons -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<div class="dashboard-container">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-crown"></i> Crowny Hotel</h2>
        </div>

        <nav class="sidebar-nav">
            <a href="<?= base_url('dashboard') ?>" class="nav-item">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="<?= base_url('dashboard/bookings') ?>" class="nav-item">
                <i class="fas fa-calendar-check"></i> Bookings
            </a>
            <a href="<?= base_url('dashboard/rooms') ?>" class="nav-item active">
                <i class="fas fa-bed"></i> Rooms
            </a>
            <a href="<?= base_url('dashboard/room-types') ?>" class="nav-item">
                <i class="fas fa-layer-group"></i> Room Types
            </a>
            <a href="<?= base_url('dashboard/payments') ?>" class="nav-item">
                <i class="fas fa-credit-card"></i> Payments
            </a>
            <a href="<?= base_url('dashboard/users') ?>" class="nav-item">
                <i class="fas fa-users"></i> Users
            </a>
            <a href="<?= base_url('/') ?>" class="nav-item">
                <i class="fas fa-external-link-alt"></i> View Website
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">

        <!-- Header -->
        <header class="main-header">
            <div>
                <h1>Manage Rooms</h1>
                <p>View and manage all hotel rooms</p>
            </div>

            <div class="header-user">
                <div class="user-info">
                    <div class="user-name">Admin</div>
                    <div class="user-role">Administrator</div>
                </div>
                <div class="user-avatar">A</div>
                <a href="<?= base_url('logout') ?>" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </header>

        <!-- Actions -->
        <div class="content-section">
            <div class="actions-bar">
                <a href="<?= base_url('dashboard/rooms/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Room
                </a>

                <input type="text" id="searchRooms" class="table-search"
                       placeholder="Search rooms...">
            </div>

            <div class="filters">
                <button class="btn btn-secondary" onclick="filterRooms('all')">All</button>
                <button class="btn btn-secondary" onclick="filterRooms('available')">Available</button>
                <button class="btn btn-secondary" onclick="filterRooms('booked')">Booked</button>
                <button class="btn btn-secondary" onclick="filterRooms('maintenance')">Maintenance</button>
            </div>
        </div>

        <!-- Rooms List -->
        <div class="content-section">
            <h2>All Rooms (<?= count($rooms) ?>)</h2>

            <?php if (empty($rooms)): ?>
                <p>No rooms found.</p>
            <?php else: ?>
                <div class="card-grid">
                    <?php foreach ($rooms as $room): ?>
                        <div class="card status-<?= esc($room['status']) ?>">
                            <div class="card-body">
                                <h3><?= esc($room['title']) ?></h3>

                                <p>
                                    Room #: <?= esc($room['room_number']) ?><br>
                                    Price: $<?= esc($room['price_per_night']) ?> / night<br>
                                    Status: <strong><?= ucfirst($room['status']) ?></strong>
                                </p>

                                <div class="card-actions">
                                    <a href="#" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>

    </main>

</div>

<script>
    function filterRooms(status) {
        document.querySelectorAll('.card').forEach(card => {
            if (status === 'all') {
                card.style.display = '';
            } else {
                card.style.display = card.classList.contains('status-' + status)
                    ? ''
                    : 'none';
            }
        });
    }

    document.getElementById('searchRooms')?.addEventListener('input', function () {
        const value = this.value.toLowerCase();
        document.querySelectorAll('.card').forEach(card => {
            card.style.display = card.innerText.toLowerCase().includes(value)
                ? ''
                : 'none';
        });
    });
</script>

</body>
</html>
