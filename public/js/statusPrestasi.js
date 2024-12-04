document.querySelectorAll('.prestasi-status').forEach((statusElement) => {
    const status = statusElement.textContent.trim().toLowerCase();
    if (status === 'disetujui') {
        statusElement.style.backgroundColor = 'rgba(1, 188, 141, 0.4)';
    } else if (status === 'ditolak') {
        statusElement.style.backgroundColor = 'rgba(255, 0, 0, 0.4)';
    } else if (status === 'proses'){
        statusElement.style.backgroundColor = 'rgba(255, 251, 0, 0.4)';
    }
});
