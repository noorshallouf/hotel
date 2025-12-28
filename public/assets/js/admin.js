/* =====================================================
   Admin Dashboard JS (UI ONLY)
   Compatible with CodeIgniter 4
   ===================================================== */

document.addEventListener('DOMContentLoaded', function () {

    /* ==============================
       Sidebar Toggle (Mobile)
    ============================== */
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    }

    /* ==============================
       Close Sidebar on Outside Click
    ============================== */
    document.addEventListener('click', (e) => {
        if (
            sidebar &&
            !sidebar.contains(e.target) &&
            !sidebarToggle?.contains(e.target)
        ) {
            sidebar.classList.remove('active');
        }
    });

    /* ==============================
       Dashboard Cards Animation
    ============================== */
    const counters = document.querySelectorAll('[data-count]');

    counters.forEach(counter => {
        const target = +counter.getAttribute('data-count');
        let current = 0;
        const increment = Math.ceil(target / 60);

        const updateCounter = () => {
            current += increment;
            if (current >= target) {
                counter.innerText = target;
            } else {
                counter.innerText = current;
                requestAnimationFrame(updateCounter);
            }
        };

        updateCounter();
    });

    /* ==============================
       Status Badge Styling
    ============================== */
    document.querySelectorAll('.status').forEach(status => {
        const text = status.innerText.toLowerCase();

        status.classList.remove('pending', 'confirmed', 'cancelled');

        if (text.includes('pending')) {
            status.classList.add('pending');
        } else if (text.includes('confirmed')) {
            status.classList.add('confirmed');
        } else if (text.includes('cancelled')) {
            status.classList.add('cancelled');
        }
    });

    /* ==============================
       Table Row Hover Effect
    ============================== */
    document.querySelectorAll('table tbody tr').forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.classList.add('hover');
        });
        row.addEventListener('mouseleave', () => {
            row.classList.remove('hover');
        });
    });

    /* ==============================
       Search Filter (Tables)
    ============================== */
    const searchInput = document.querySelector('.table-search');

    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const value = this.value.toLowerCase();
            const rows = document.querySelectorAll('table tbody tr');

            rows.forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(value)
                    ? ''
                    : 'none';
            });
        });
    }

    /* ==============================
       Notification Counter (UI Only)
    ============================== */
    const notificationCount = document.querySelector('.notification-count');
    if (notificationCount) {
        notificationCount.innerText = notificationCount.innerText || '0';
    }

    /* ==============================
       Current Date & Time
    ============================== */
    const dateTime = document.querySelector('.current-datetime');

    if (dateTime) {
        setInterval(() => {
            const now = new Date();
            dateTime.innerText = now.toLocaleString();
        }, 1000);
    }

    /* ==============================
       Utility Functions
    ============================== */
    window.formatCurrency = function (value) {
        return '$' + Number(value).toLocaleString();
    };

    window.formatDate = function (date) {
        return new Date(date).toLocaleDateString();
    };

});
