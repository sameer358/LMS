// script.js
document.addEventListener('DOMContentLoaded', function () {
    const signupForm = document.getElementById('signup-form');
    const loginForm = document.getElementById('login-form');

    signupForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(signupForm);

        fetch('signup.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                signupForm.reset();
            }
        })
        .catch(error => console.error(error));
    });

    loginForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(loginForm);

        fetch('login.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                window.location.href = 'dashboard.html'; // Redirect to the dashboard on success
            }
        })
        .catch(error => console.error(error));
    });
});
