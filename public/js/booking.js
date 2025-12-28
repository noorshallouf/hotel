/* =====================================================
   Booking Page JavaScript
   UI ONLY – Compatible with CodeIgniter 4
   ===================================================== */

document.addEventListener('DOMContentLoaded', function () {

    /* ===============================
       Hide Flash Messages Automatically
    =============================== */
    const messages = document.querySelectorAll(
        '.alert, .login-required-message, .success-message'
    );

    messages.forEach(msg => {
        setTimeout(() => {
            msg.style.transition = 'opacity 0.5s ease';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500);
        }, 4000);
    });

    /* ===============================
       Date Validation (Frontend UX)
    =============================== */
    const checkIn  = document.querySelector('input[name="check_in"]');
    const checkOut = document.querySelector('input[name="check_out"]');

    if (checkIn && checkOut) {
        checkIn.addEventListener('change', () => {
            checkOut.min = checkIn.value;
        });
    }

    /* ===============================
       Confirm Booking Before Submit
    =============================== */
    document.querySelectorAll('form[action*="booking/create"]').forEach(form => {
        form.addEventListener('submit', function (e) {

            const inDate  = form.querySelector('input[name="check_in"]')?.value;
            const outDate = form.querySelector('input[name="check_out"]')?.value;

            if (!inDate || !outDate) {
                e.preventDefault();
                alert('Please select check-in and check-out dates first.');
                return;
            }

            const confirmAction = confirm(
                'Are you sure you want to book this room?'
            );

            if (!confirmAction) {
                e.preventDefault();
            }
        });
    });

    /* ===============================
       Optional: Smooth Scroll
    =============================== */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

});
