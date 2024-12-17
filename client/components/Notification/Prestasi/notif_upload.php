<div id="popup-modal" tabindex="-1" class="notification-modal hidden">
    <div class="notification-modal__content">
        <div class="notification-modal__box">
            <button type="button" class="notification-modal__close" id="close-modal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="notification-modal__body">
                <svg class="notification-modal__icon-large" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

                <h3 class="notification-modal__title font-bold">Apakah Anda yakin ingin mengupload prestasi ini?</h3>
                <button id="confirm-upload" type="button" class="font-semi-bold notification-modal__confirm">
                    Upload Prestasi
                </button>
                <button id="cancel-upload" type="button" class="font-semi-bold notification-modal__cancel">
                    Kembali
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
    // Tampilkan modal ketika tombol submit ditekan
    $('#tambah-prestasi-form').on('submit', function (e) {
        e.preventDefault(); // Mencegah submit form default
        $('#popup-modal').removeClass('hidden');
    });

    // Tombol 'Kembali' untuk menutup modal
    $('#cancel-upload, #close-modal').on('click', function () {
        $('#popup-modal').addClass('hidden');
    });

    // Tombol 'Upload Prestasi' untuk mengirim data melalui AJAX
    $('#confirm-upload').on('click', function () {
        // Ambil data dari form
        const formData = new FormData($('#tambah-prestasi-form')[0]);

        // Kirim data ke server dengan AJAX
        $.ajax({
            url: '../server/proses/prestasi/TambahPrestasi.php', // Ubah sesuai dengan endpoint Anda
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log('Prestasi berhasil diupload: ' + response);
                alert('Prestasi berhasil diupload!');
                // Redirect ke URL tertentu
                window.location.href = 'http://localhost/katalis/user/daftarPrestasi';
            },
            error: function (xhr, status, error) {
                console.log('Terjadi kesalahan: ' + error);
                alert('Gagal mengupload prestasi. Silakan coba lagi.');
            }
        });

        // Tutup modal setelah konfirmasi
        $('#popup-modal').addClass('hidden');
    });
});
</script>
