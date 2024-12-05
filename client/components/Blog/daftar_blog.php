<?php
include './server/model/Berita.php';
include './server/php/cutText.php';

$data = new Berita();
$berita = $data->getAllBerita();

?>
<section class="blog-section">
    <div class="blog-container">
        <?php
        if (!empty($berita)) {
            foreach ($berita as $b) { ?>
                <div class="blog-card">
                    <img src="/katalis/public/Prestasi/Dokumentasi/<?php echo $b['file_dokumentasi']; ?>"
                        alt="Desk with laptop and flowers" class="blog-image" />
                    <div class="blog-content">
                        <div class="blog-title font-bold"><?php echo $b['nama_berita']; ?></div>
                        <div class="blog-text font-regular">
                            <?php echo cutText($b['deskripsi'], 10); ?>
                        </div>
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
</section>