<?php
include('./client/components/Admin/Sidebar.php');

$id = isset($_GET['id']) ? $_GET['id'] : 1;

$jsonData = file_get_contents('./server/data/Blog.json');
$data = json_decode($jsonData, true);

if (isset($data[$id])) {
    $blog = $data[$id];
} else {
    echo "Data tidak ditemukan.";
    exit;
}
?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="blog-detail-title font-bold"><?php echo $blog['title']; ?></h1>
        <hr class="blog-hr-2">
        <div class="blog-detail-paragraph font-regular">
            <?php
            foreach ($blog['description'] as $index => $paragraph) {
                echo "<p class='detail-paragraph'>{$paragraph}</p>";

                if ($index === 2) {
                    echo "<div class='blog-img'>
                        <iframe width='560' height='315' src='{$blog['video_url']}' title='YouTube video player'
                            frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;
                            picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin'
                            allowfullscreen class='detail-img'></iframe>
                        <h5>{$blog['video_caption']}</h5>
                        </div>";
                }
            }
            ?>
        </div>
        <h1 class="font-bold blog-detail-diskusi">Diskusi</h1>
        <div class="kegiatan-group">
            <textarea id="deskripsi-kegiatan" class="blog-input font-semi-bold"
                placeholder="Tulis Komentar Anda Disini..."></textarea>
            <div class="actions">
                <button type="button" class="button-primary font-bold"
                    onclick="window.location.href='/katalis/login'">Komentar</button>
            </div>
        </div>
        <hr class="blog-hr-2">
    </div>
</section>