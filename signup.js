var cache = Math.floor(Math.random() * 90000) + 10000;
document.getElementById('cache').innerText = cache;

function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var dob = document.getElementById('dob').value;
    var gender = document.getElementById('gender').value;
    var college = document.getElementById('College').value;
    var cacheAnswer = document.getElementById('cacheAnswer').value;

    if (!/^[a-zA-Z\s]+$/.test(name)) {
        alert('Name should not contain any numbers or special characters.');
    } else if (name.length < 10) {
        alert('Name should be at least 10 characters long.');
    } else if (!/@(gmail\.com|yahoo\.com|manipal\.edu)$/.test(email)) {
        alert('Email should be a Gmail, Yahoo, or Manipal email.');
    } else if (password.length < 8) {
        alert('Password must be at least 8 characters long.');
    } else if (password !== confirmPassword) {
        alert('Passwords do not match.');
    } else if (!dob) {
        alert('Please enter your date of birth.');
    } else if (!gender) {
        alert('Please select your gender.');
    } else if (!college) {
        alert('Please enter your college name.');
    } else if (cacheAnswer != cache) {
        alert('Invalid cache.');
    } else {
        document.getElementById('signupForm').submit();
    }
}
