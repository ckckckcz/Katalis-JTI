<?php
include './server/model/Berita.php';

$data = new Berita();
$berita = $data->getAllBerita();

function cutText($text, $maxWords = 10)
{
    $words = explode(' ', $text);
    if (count($words) > $maxWords) {
        return implode(' ', array_slice($words, 0, $maxWords)) . '...';
    }
    return $text;
}
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