<?php
include('./client/components/Admin/Sidebar.php');
?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="font-bold kegiatan-title">Tambah Dosen</h1>
        <div class="kegiatan-card">
            <form action="./server/proses/dosen/TambahDosen.php" method="post" class="kegiatan-form">
                <div class="kegiatan-group">
                    <label for="nip-dosen" class="kegiatan-label font-bold">NIP Dosen</label>
                    <input type="text" id="nip-dosen" name="nip-dosen" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan nip Dosen">
                    <span class="error-message font-bold"></span>
                </div>
                <div class="kegiatan-group">
                    <label for="nama-dosen" class="kegiatan-label font-bold">Nama Dosen</label>
                    <input type="text" id="nama-dosen" name="nama-dosen" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan nip Dosen">
                    <span class="error-message font-bold"></span>
                </div>
                <div class="kegiatan-group">
                    <label for="jurusan-dosen" class="kegiatan-label font-bold">Jurusan</label>
                    <input type="text" id="jurusan-dosen" name="jurusan-dosen" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan nip Dosen">
                    <span class="error-message font-bold"></span>
                </div>
                <div class="actions">
                    <button type="submit" id="submit-button-upload-event" class="button-primary font-bold">Submit
                        Dosen</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#submit-button-upload-event').on('click', function (e) {
            e.preventDefault(); // Mencegah submit form

            let isValid = true; // Status validasi

            // Periksa setiap input dan select
            $('.kegiatan-input, .kegiatan-select, .kegiatan-deskripsi').each(function () {
                const input = $(this);
                const value = input.val().trim();
                const errorMessage = input.siblings('.error-message');

                if (!value) {
                    isValid = false;
                    input.addClass('error-border'); // Tambahkan border merah
                    errorMessage.text('Form harus diisi').show(); // Tampilkan pesan error
                } else {
                    input.removeClass('error-border'); // Hilangkan border merah
                    errorMessage.hide(); // Sembunyikan pesan error
                }
            });

            // Jika validasi lolos, submit form
            if (isValid) {
                $('.kegiatan-form').submit();
            }
        });

        // Hilangkan error saat user mulai mengetik/memilih input
        $('.kegiatan-input, .kegiatan-select, .kegiatan-deskripsi').on('input change', function () {
            const input = $(this);
            input.removeClass('error-border');
            input.siblings('.error-message').hide();
        });
    });
</script>