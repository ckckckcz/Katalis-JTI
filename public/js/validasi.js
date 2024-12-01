function validateForm(event) {
    let isValid = true;

    const nimInput = document.getElementById('nim');
    const passwordInput = document.getElementById('password');
    const nimError = nimInput.nextElementSibling;
    const passwordError = passwordInput.nextElementSibling;

    // Reset semua error dan style
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
    } else if (nimInput.value.trim() !== 'valid_nim') { // Simulasi validasi NIM
        nimError.textContent = 'NIM Tidak Terdaftar';
        nimError.style.display = 'block';
        nimInput.style.border = '3px solid red';
        isValid = false;
    }

    // Validasi Kata Sandi
    if (passwordInput.value.trim() === '') {
        passwordError.textContent = 'Kata Sandi Harus Diisi';
        passwordError.style.display = 'block';
        passwordInput.style.border = '3px solid red';
        isValid = false;
    } else if (passwordInput.value.trim() !== 'valid_password') { // Simulasi validasi Kata Sandi
        passwordError.textContent = 'Kata Sandi Salah';
        passwordError.style.display = 'block';
        passwordInput.style.border = '3px solid red';
        isValid = false;
    }

    // Return false jika ada error
    return isValid;
}
