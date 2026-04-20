function validateForm() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let error = document.getElementById("error");

    if (username === "" || password === "") {
        error.innerHTML = "All fields are required!";
        return false;
    }

    if (password.length < 6) {
        error.innerHTML = "Password must be at least 6 characters!";
        return false;
    }

    return true;
}