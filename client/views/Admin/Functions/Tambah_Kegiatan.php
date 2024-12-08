<?php
    include('./client/components/Admin/Sidebar.php');
    include('./client/components/Notification/Event/notif_upload.php');  
?>
<?php
// Baca data JSON
$data = json_decode(file_get_contents('./server/data/Lokasi.json'), true);

// Pisahkan data provinsi dan kota
$provinsiList = $data['provinsi'];
$kotaList = $data['kota'];
?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="font-bold kegiatan-title">Tambah Kegiatan</h1>
        <div class="kegiatan-card">
            <form action="../server/proses/event/TambahEvent.php" method="post" enctype="multipart/form-data"
                class="kegiatan-form">
                <div class="kegiatan-group">
                    <label for="nama-kegiatan" class="kegiatan-label font-bold">Nama Kegiatan</label>
                    <input type="text" id="nama-kegiatan" name="nama-kegiatan" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan nama kegiatan">
                    <span class="error-message font-bold"></span>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="tingkat" class="kegiatan-label font-bold">Tingkat Kompetisi</label>
                        <select id="tingkat" name="tingkat-lomba" class="kegiatan-input kegiatan-select font-semi-bold">
                            <option value="">Pilih Tingkat Kompetisi</option>
                            <option value="internasional">International</option>
                            <option value="nasional">National</option>
                            <option value="lokal">Lokal</option>
                        </select>
                        <span class="error-message font-bold"></span>
                    </div>
                    <div class="kegiatan-group">
                        <label for="tempat-kompetisi" class="kegiatan-label font-bold">Tempat Kompetisi</label>
                        <input type="text" id="tempat-kompetisi" name="tempat-kompetisi"
                            class="kegiatan-input font-semi-bold" placeholder="Masukkan nama kompetisi">
                        <span class="error-message font-bold"></span>
                    </div>
                </div>
                <div class="kegiatan-group">
                    <label for="url-kompetisi" class="kegiatan-label font-bold">URL Kompetisi</label>
                    <input type="text" id="url-kompetisi" name="url-kompetisi" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan nama kompetisi">
                    <span class="error-message font-bold"></span>
                </div>
                <div class="kegiatan-group">
                    <label for="deskripsi-kegiatan" class="kegiatan-label font-bold">Deskripsi Kegiatan</label>
                    <textarea id="deskripsi-kegiatan" name="deskripsi-kegiatan"
                        class="kegiatan-input kegiatan-deskripsi font-semi-bold"
                        placeholder="Masukkan deskripsi kegiatan"></textarea>
                    <span class="error-message font-bold"></span>
                </div>
                <hr class="kegiatan-hr">
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="tanggal-mulai" class="kegiatan-label font-bold">Tanggal Mulai</label>
                        <input type="date" id="tanggal-mulai" name="tanggal-mulai"
                            class="kegiatan-input font-semi-bold">
                        <span class="error-message font-bold"></span>
                    </div>
                    <div class="kegiatan-group">
                        <label for="tanggal-selesai" class="kegiatan-label font-bold">Tanggal Selesai</label>
                        <input type="date" id="tanggal-selesai" name="tanggal-selesai"
                            class="kegiatan-input font-semi-bold">
                        <span class="error-message font-bold"></span>
                    </div>
                </div>
                <div class="kegiatan-group">
                    <label for="poster-kompetisi" class="kegiatan-label font-bold">File Poster Kompetisi</label>
                    <div class="kegiatan-input-file-container">
                        <label for="dropzone-file" class="kegiatan-input-file-label">
                            <div class="kegiatan-input-file-content">
                                <img id="poster-kompetisi-preview" class="hidden kegiatan-file-preview"
                                    alt="Preview Poster" />
                                <svg id="default-icon-kompetisi" class="kegiatan-input-file-icon" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p id="file-description-kompetisi" class="kegiatan-input-file-text">
                                    <span class="kegiatan-input-file-highlight font-semi-bold">Click to upload</span> or
                                    drag and drop
                                </p>
                                <p id="file-subtext-kompetisi" class="kegiatan-input-file-subtext font-semi-bold">SVG,
                                    PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" name="poster-kompetisi" type="file"
                                class="kegiatan-input-file-hidden" />
                        </label>
                    </div>
                    <span class="error-message font-bold"></span>
                </div>
                <div class="actions">
                    <button type="submit" id="submit-button-upload-event" class="button-primary font-bold">Submit
                        Kegiatan</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
    $(document).ready(function () {
    $('#dropzone-file').on('change', function (event) {
        const file = event.target.files[0];
        
        if (file) {
            const fileName = file.name;
            const fileType = file.type;

            // Menyembunyikan teks instruksi dan ikon default
            $('#file-description-kompetisi').addClass('hidden');
            $('#file-subtext-kompetisi').addClass('hidden');
            $('#default-icon-kompetisi').addClass('hidden');

            // Menampilkan preview gambar jika file adalah gambar
            if (fileType.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#poster-kompetisi-preview').attr('src', e.target.result).removeClass('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                // Sembunyikan gambar jika file bukan gambar
                $('#poster-kompetisi-preview').addClass('hidden');
            }
        } else {
            // Reset ke kondisi awal jika file dihapus
            $('#file-description-kompetisi').removeClass('hidden');
            $('#file-subtext-kompetisi').removeClass('hidden');
            $('#default-icon-kompetisi').removeClass('hidden');
            $('#poster-kompetisi-preview').addClass('hidden');
        }
    });
});
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