document.addEventListener("DOMContentLoaded", function() {
    // Contact form functionality
    const form = document.querySelector('.php-email-form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Simulate form submission
        document.querySelector('.loading').style.display = 'block';

        setTimeout(function() {
            document.querySelector('.loading').style.display = 'none';
            document.querySelector('.sent-message').style.display = 'block';

            setTimeout(function() {
                document.querySelector('.sent-message').style.display = 'none';
            }, 5000);
        }, 2000);
    });
});
