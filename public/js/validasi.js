function validateForm(event) {
    event.preventDefault();
    let isValid = true;

    const nimInput = document.querySelector('.nimInput');
    const passwordInput = document.getElementById('password');
    const nimError = nimInput.nextElementSibling;
    const passwordError = passwordInput.nextElementSibling;

    nimError.style.display = 'none';
    passwordError.style.display = 'none';
    nimInput.style.border = '';
    passwordInput.style.border = '';

    // Validasi NIM
    if (nimInput.value.trim() === '') {
        nimError.textContent = 'NIM Harus Diisi';
        nimError.style.display = 'block';
        nimInput.style.border = '3px solid red';
        isValid = false;
    } else {
        // Validasi NIM ke database menggunakan AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', './server/validation/validate.php', false); // Sinkron untuk mempermudah validasi langsung
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(`nim=${nimInput.value.trim()}`);

        const response = JSON.parse(xhr.responseText);
        if (!response.isValid) {
            nimError.textContent = 'NIM Tidak Terdaftar';
            nimError.style.display = 'block';
            nimInput.style.border = '3px solid red';
            isValid = false;
        }
    }

    // Validasi Kata Sandi
    if (passwordInput.value.trim() === '') {
        passwordError.textContent = 'Kata Sandi Harus Diisi';
        passwordError.style.display = 'block';
        passwordInput.style.border = '3px solid red';
        isValid = false;
    }

    // Jika validasi sukses, kirim form
    if (isValid) {
        document.querySelector('.login-form').submit();
    }
}
