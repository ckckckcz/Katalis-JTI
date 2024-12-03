<?php
include './server/model/Event.php';

$data = new Event();
$evt = $data->getAllEvent();

?>
<section class="competition-section">
    <div class="competition-container">
        <?php
        if (!empty($evt)) {
            foreach ($evt as $e) { ?>
            <div class="competition-card">
                <img src="/katalis/public/Prestasi/PosterEvent/<?php echo $e['poster_gambar']; ?>" alt="Modern workspace with desktop" class="competition-image" />
                <div class="competition-content">
                    <div class="competition-title font-bold"><?php echo $e['nama_event']; ?></div>
                    <div class="competition-text font-regular"><?php echo $e['deskripsi']; ?></div>
                    <div class="actions">
                        <button type="button" class="button-primary font-bold"
                            onclick="window.location.href='/katalis/competition/read'">Lihat Kompetisi</button>
                    </div>
                </div>
            </div>
            <?php 
            }
        }
        ?>
    </div>
</section>