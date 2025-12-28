<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crowny Hotel | Room Types</title>
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
            <a href="/dashboard/room-types" class="nav-item active">
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
                <h1>Room Types</h1>
                <p>Manage room categories and pricing</p>
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

        <!-- Actions -->
        <div class="content-section">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <button class="btn btn-primary" onclick="showAddRoomTypeForm()">
                    <i class="fas fa-plus"></i> Add New Room Type
                </button>
                <a href="/dashboard" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Room Types -->
        <div class="content-section">
            <div class="section-header">
                <h2>All Room Types (<?= count($room_types ?? []) ?>)</h2>
            </div>

            <div class="card-grid">
                <?php if (!empty($room_types)): ?>
                    <?php foreach ($room_types as $type): ?>
                        <div class="card">
                            <div class="card-header">
                                <h3><?= esc($type['name']) ?></h3>
                            </div>

                            <div class="card-body">
                                <p><?= esc($type['description']) ?></p>

                                <div class="card-meta">
                                    <div>
                                        <strong>$<?= esc($type['price_per_night']) ?></strong>
                                        <small>per night</small>
                                    </div>
                                    <div>
                                        <i class="fas fa-users"></i>
                                        <?= esc($type['capacity']) ?> Guests
                                    </div>
                                </div>

                                <div class="amenities">
                                    <?php foreach (explode(',', $type['amenities']) as $amenity): ?>
                                        <span class="tag"><?= esc(trim($amenity)) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-secondary" onclick="editRoomType(<?= $type['id'] ?>)">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-danger" onclick="deleteRoomType(<?= $type['id'] ?>)">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No room types found.</p>
                <?php endif; ?>
            </div>
        </div>

    </main>
</div>

<!-- Modal (UI only) -->
<div id="addRoomTypeModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Add New Room Type</h3>
            <button onclick="closeAddRoomTypeForm()">×</button>
        </div>

        <form id="addRoomTypeForm">
            <input type="text" placeholder="Room Type Name" required>
            <textarea placeholder="Description" required></textarea>
            <input type="number" placeholder="Price per Night" required>
            <input type="number" placeholder="Capacity" required>
            <input type="text" placeholder="Amenities (comma separated)">
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="closeAddRoomTypeForm()">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url('js/admin.js') ?>"></script>
<script>
function showAddRoomTypeForm() {
    document.getElementById('addRoomTypeModal').style.display = 'flex';
}
function closeAddRoomTypeForm() {
    document.getElementById('addRoomTypeModal').style.display = 'none';
}
function editRoomType(id) {
    alert('Edit room type ID: ' + id);
}
function deleteRoomType(id) {
    if (confirm('Are you sure?')) {
        alert('Delete room type ID: ' + id);
    }
}
</script>

</body>
</html>
