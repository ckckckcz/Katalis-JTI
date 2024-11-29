document.querySelectorAll('.mahasiswa-status').forEach((statusElement) => {
    const status = statusElement.textContent.trim().toLowerCase();
    if (status === 'aktif') {
        statusElement.style.backgroundColor = 'rgba(1, 188, 141, 0.4)';
    } else if (status === 'nonaktif') {
        statusElement.style.backgroundColor = 'rgba(255, 0, 0, 0.4)';
    }
});
