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
                <h3 class="notification-modal__title font-bold">Apakah anda yakin ingin upload berita ini ?</h3>
                <button id="confirm-upload" type="button" class="font-semi-bold notification-modal__confirm">
                    Upload Berita
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
    $('#confirm-upload').on('click', function () {  
        // Ambil data form
        const formData = {
            prestasi: $('#prestasi').val(),
            nama_berita: $('#nama-berita').val(),
            deskripsi_berita: $('#deskripsi-berita').val(),
            url_demo: $('#url-demo').val(),
        };

        // Kirim data melalui AJAX
        $.ajax({
            url: '../server/proses/berita/TambahBerita.php', // Sesuaikan dengan path logic server
            type: 'POST',
            data: formData,
            success: function (response) {
                // Tampilkan notifikasi berhasil
                console.log('Berita berhasil disimpan:\n' + response);
                window.location.href = "/katalis/berita";
                // Tutup modal
                // $('#popup-modal').addClass('hidden');
            },
            error: function (xhr, status, error) {
                // Tampilkan error jika gagal
                console.log('Terjadi kesalahan: ' + error);
            },
        });
    });
</script> 