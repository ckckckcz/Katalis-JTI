<?php 

include('./client/components/Admin/Sidebar.php'); 
include './server/model/Berita.php';
include './server/php/cutText.php';

$data = new Berita();
$berita = $data->getAllBerita();
?>
<section class="admin-section">
    <div class="admin-container">
        <div class="berita-title font-bold">
            <p>Berita Katalis</p>
            <div class="actions">
                <button type="button" class="button-primary font-bold"
                    onclick="window.location.href='/katalis/kegiatan/tambah_berita'">Tambah Berita</button>
            </div>
        </div>
        <div class="blog-container">
        <?php
            if (!empty($berita)) {
                foreach ($berita as $b) { ?>
                <div class="blog-card">
                    <img src="/katalis/public/Prestasi/Dokumentasi/<?php echo $b['file_dokumentasi']; ?>" alt="Desk with laptop and flowers" class="blog-image" />
                    <div class="blog-content">
                        <div class="blog-title font-bold"><?php echo cutText($b['nama_berita'], 6); ?></div>
                        <div class="blog-text font-regular tanggalUpload"> <?php echo $b['tanggal_upload']; ?></div>
                        <div class="actions gap-5">
                            <button type="button" class="button-primary font-bold"
                                onclick="window.location.href='/katalis/detailBerita?id=<?php echo $b['id_berita'] ?>'">Baca Artikel</button>
                            <button type="button" class="button-edit font-bold"
                                onclick="window.location.href='/katalis/berita/edit?id=<?php echo $b['id_berita'] ?>'">Edit Artikel</button>
                        </div>
                    </div>
                </div>
                <?php 
                }
            } ?>
        </div>
    </div>
</section>
<script>
    function formatTanggal(tanggal) {
        const [tahun, bulan, hari] = tanggal.split('-');
        return `${hari}-${bulan}-${tahun}`;
    }
    document.querySelectorAll('.tanggalUpload').forEach(function(elem) {
        elem.textContent = formatTanggal(elem.textContent);
    });
</script>