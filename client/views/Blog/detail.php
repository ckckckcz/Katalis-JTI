<?php
// Ambil id dari URL
$id = isset($_GET['id']) ? $_GET['id'] : 1; // Default id adalah 1

// Baca file JSON
$jsonData = file_get_contents('./server/data/Blog.json');
$data = json_decode($jsonData, true);

// Pastikan id yang diminta ada di data
if (isset($data[$id])) {
    $blog = $data[$id];
} else {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<section class="blog-section">
    <h1 class="blog-detail-title font-bold"><?php echo $blog['title']; ?></h1>
    <hr class="blog-hr-2">
    <div class="blog-detail-paragraph font-regular">
        <?php
        // Loop melalui setiap paragraf dan sisipkan video setelah paragraf ketiga
        foreach ($blog['description'] as $index => $paragraph) {
            echo "<p class='detail-paragraph'>{$paragraph}</p>";

            // Tampilkan video setelah paragraf ketiga
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
</section>