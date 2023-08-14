document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signup-form');
    form.addEventListener('submit', function(event) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password-confirm').value;
        
        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            event.preventDefault();
        }
        
        const dobYear = document.getElementById('dob-year').value;
        const currentYear = new Date().getFullYear();
        if (currentYear - dobYear < 18) {
            alert('You must be at least 18 years old to register.');
            event.preventDefault();
        }
    });
});
