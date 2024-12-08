<?php 
    include('./client/components/Admin/Sidebar.php'); 
    include('./server/model/Prestasi.php');
    include('./client/components/Notification/Blog/notif_upload.php');
    $prestasi = new Prestasi();
?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="font-bold berita-title">Tambah Berita</h1>
        <div class="berita-card">
            <form id="berita-form" method="post" action="../server/proses/berita/TambahBerita.php" class="berita-form">
                <div class="berita-grid">
                    <div class="berita-group">
                        <label for="nama-berita" class="berita-label font-bold">Nama berita</label>
                        <input type="text" id="nama-berita" name="nama-berita" class="berita-input font-semi-bold"
                            placeholder="Masukkan nama berita">
                        <p id="nama-berita-error" class="error-message font-bold"></p>
                    </div>
                    <div class="berita-group">
                        <label for="prestasi" class="berita-label font-bold">Prestasi</label>
                        <select id="prestasi" name="prestasi" class="berita-input berita-select font-semi-bold">
                            <option value="">Pilih Prestasi</option>
                            <?php
                            $dataPrestasi = $prestasi->getForBerita();
                            foreach ($dataPrestasi as $prestasi) {
                                echo "<option value='{$prestasi['id_prestasi']}'>{$prestasi['input_prestasi']}</option>";
                            }
                            ?>
                        </select>
                        <p id="prestasi-error" class="error-message font-bold"></p>
                    </div>
                </div>
                <div class="berita-group">
                    <label for="deskripsi-berita" class="berita-label font-bold">Deskripsi berita</label>
                    <textarea id="deskripsi-berita" name="deskripsi-berita"
                        class="berita-input berita-deskripsi font-semi-bold"
                        placeholder="Masukkan deskripsi berita"></textarea>
                    <p id="deskripsi-berita-error" class="error-message font-bold"></p>
                </div>
                <div class="berita-group">
                    <label for="url-demo" class="berita-label font-bold">URL Karya</label>
                    <input type="text" id="url-demo" name="url-demo" class="berita-input font-semi-bold"
                        placeholder="Masukkan URL Karya">
                    <p id="url-demo-error" class="error-message font-bold"></p>
                </div>
                <div id="video-preview" class="hidden">
                    <iframe id="youtube-iframe" width="560" height="315" style="border-radius:1rem" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <hr class="berita-hr">
                <div class="actions">
                    <button type="submit" class="button-primary font-bold">Submit Berita</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
    $(document).ready(function() {
    $('#url-demo').on('input', function() {
        const url = $(this).val().trim();
        const youtubeRegex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/]+\/.*\/|(?:v|e(?:mbed)?)\/?([\w-]+))|youtu\.be\/([\w-]+))/;

        const match = url.match(youtubeRegex);
        if (match) {
            const videoId = match[1] || match[2];
            if (videoId) {
                const iframeUrl = `https://www.youtube.com/embed/${videoId}`;

                $('#youtube-iframe').attr('src', iframeUrl);
                $('#video-preview').removeClass('hidden');
            }
        } else {
            $('#video-preview').addClass('hidden');
        }
    });
});
$(document).ready(function () {
    $('#berita-form').on('submit', function (e) {
        e.preventDefault(); // Mencegah pengiriman form jika tidak valid

        let isValid = true; // Status validasi

        $('#nama-berita, #prestasi, #deskripsi-berita, #url-demo').each(function () {
            const input = $(this);
            const value = input.val().trim();
            const errorMessage = input.siblings('.error-message');

            if (!value) {
                isValid = false;
                input.addClass('error-border'); 
                errorMessage.text('Form harus diisi').show();
            } else {
                input.removeClass('error-border');
                errorMessage.hide(); 
            }
        })
        if (isValid) {
            this.submit();
        }
    });
    // Hilangkan error saat pengguna mengetik/memilih
    $('#nama-berita, #prestasi, #deskripsi-berita, #url-demo').on('input change', function () {
        const input = $(this);
        input.removeClass('error-border');
        input.siblings('.error-message').hide();
    });
});

</script>