<?php 

include('./client/components/Admin/Sidebar.php'); 
include './server/model/Berita.php';

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
                        <div class="blog-title font-bold"><?php echo $b['nama_berita']; ?></div>
                        <div class="blog-text font-regular"><?php echo $b['deskripsi']; ?></div>
                        <div class="actions">
                            <button type="button" class="button-primary font-bold"
                                onclick="window.location.href='/katalis/blog/read'">Baca Artikel</button>
                        </div>
                    </div>
                </div>
                <?php 
                }
            } ?>
        </div>
    </div>
</section>