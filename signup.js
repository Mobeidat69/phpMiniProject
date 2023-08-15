document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signup-form');
    form.addEventListener('submit', function(event) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password-confirm').value;

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            event.preventDefault();
            return; // Stop further execution
        }

        const dobYear = document.getElementById('dob-year').value;
        const currentYear = new Date().getFullYear();
        if (currentYear - dobYear < 18) {
            alert('You must be at least 18 years old to register.');
            event.preventDefault();
            return; // Stop further execution
        }

        var name = document.getElementById("firstname").value;
        var email = document.getElementById("email").value;

        fetch("signup-process.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ name: name, email: email }),
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                document.getElementById("firstname").value = "";
                document.getElementById("email").value = "";
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
});
