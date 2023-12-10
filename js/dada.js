const loginForm = document.getElementById('login-form');
const signupButton = document.getElementById('signup-button');

loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
});

signupButton.addEventListener('click', () => {
    window.location.href = 'signup.html'; // Replace with the actual URL
});