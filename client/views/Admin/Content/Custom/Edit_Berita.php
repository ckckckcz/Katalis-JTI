<?php
include('./client/components/Admin/Sidebar.php');
include('./server/model/Berita.php');
include('./server/model/Prestasi.php');
include('./client/components/Notification/Blog/notif_edit.php');
$prestasi = new Prestasi();
$berita = new Berita();
$old = $berita->getById($_GET['id']);
?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="font-bold berita-title">Edit Berita</h1>
        <div class="berita-card">
            <form id="edit-berita-form" action="../server/proses/berita/EditBerita.php" method="post"
                class="berita-form">
                <div class="berita-grid">
                    <div class="berita-group">
                        <label for="nama-berita" class="berita-label font-bold">Nama berita</label>
                        <input type="text" id="nama-berita" name="nama-berita" class="berita-input font-semi-bold"
                            placeholder="Masukkan nama berita" value="<?php echo $old[0]['nama_berita'] ?>">
                        <p id="nama-berita-error" class="error-message font-semi-bold"></p>
                        <input type="text" id="id-berita" name="id-berita" class="berita-input-file-hidden"
                            value="<?php echo $_GET['id'] ?>">
                    </div>
                    <div class="berita-group">
                        <label for="prestasi" class="berita-label font-bold">Prestasi</label>
                        <select id="prestasi" name="prestasi" class="berita-input berita-select font-semi-bold">
                            <?php
                            $dataPrestasi = $prestasi->getForBerita();
                            echo "<option value='{$old[0]['id_prestasi']}' selected>{$old[0]['input_prestasi']}</option>";
                            foreach ($dataPrestasi as $prestasi) {
                                if ($old[0]['id_prestasi'] == $prestasi['id_prestasi'])
                                    continue;
                                echo "<option value='{$prestasi['id_prestasi']}'>{$prestasi['input_prestasi']}</option>";
                            }
                            ?>
                        </select>
                        <p id="prestasi-error" class="error-message font-semi-bold"></p>
                    </div>
                </div>
                <div class="berita-group">
                    <label for="deskripsi-berita" class="berita-label font-bold">Deskripsi berita</label>
                    <textarea id="deskripsi-berita" name="deskripsi-berita"
                        class="berita-input berita-deskripsi font-semi-bold"
                        placeholder="Masukkan deskripsi berita"><?php echo $old[0]['deskripsi'] ?></textarea>
                    <p id="deskripsi-berita-error" class="error-message font-semi-bold"></p>
                </div>
                <div class="berita-group">
                    <label for="url-demo" class="berita-label font-bold">URL Karya</label>
                    <input type="text" id="url-demo" name="url-demo" class="berita-input font-semi-bold"
                        placeholder="Masukkan URL Karya" value="<?php echo $old[0]['url_demo'] ?>">
                    <p id="url-demo-error" class="error-message font-semi-bold"></p>
                </div>

                <div id="video-preview" class="hidden">
                    <iframe id="youtube-iframe" width="560" height="315" style="border-radius:1rem" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <hr class="berita-hr">
                <div class="actions gap-5">
                    <button type="submit" class="button-primary font-bold">Submit Edit</button>
                    <button type="button" class="button-delete font-bold"
                        onclick="window.location.href='/katalis/berita'">Batal Edit</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
    $('#edit-berita-form').on('submit', function (e) {
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
        });
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