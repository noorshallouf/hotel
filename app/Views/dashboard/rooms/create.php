<h1 class="page-title">Add New Room</h1>
<p class="page-subtitle">Create a new room in the hotel</p>

<form action="<?= base_url('dashboard/rooms/store') ?>" method="post" class="form-card">
    <?= csrf_field() ?>

    <div class="form-group">
        <label>Room Number</label>
        <input type="text" name="room_number" required>
    </div>

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" required>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>

    <div class="form-group">
        <label>Price Per Night</label>
        <input type="number" name="price_per_night" required>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status">
            <option value="available">Available</option>
            <option value="maintenance">Maintenance</option>
        </select>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
            Save Room
        </button>

        <a href="<?= base_url('dashboard/rooms') ?>" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
