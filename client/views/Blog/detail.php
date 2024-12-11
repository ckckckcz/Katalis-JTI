
<?php

$id = isset($_GET['id']) ? $_GET['id'] : 1; 

$jsonData = file_get_contents('./server/data/Blog.json');
$data = json_decode($jsonData, true);

if (isset($data[$id])) {
    $blog = $data[$id];
} else {
    echo "Data tidak ditemukan.";
    exit;
}
    function convertYoutubeUrlToEmbed($url)
    {
        if (
            preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches) ||
            preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)
        ) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }
        return $url; // Kembalikan URL asli jika tidak cocok
    }

    $videoUrl = $blog['video_url'];
    $embedUrl = convertYoutubeUrlToEmbed($videoUrl);
?>

<section class="blog-section">
    <h1 class="blog-detail-title font-bold"><?php echo $blog['title']; ?></h1>
    <hr class="blog-hr-2">
    <div class="blog-detail-paragraph font-regular">
        <?php
        foreach ($blog['description'] as $index => $paragraph) {
            echo "<p class='detail-paragraph'>{$paragraph}</p>";
            if ($index === 2) {
                $iframeHtml = "<div class='blog-img'>
                    <iframe width='560' height='315' src='{$embedUrl}' title='YouTube video player'
                        frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;
                        picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin'
                        allowfullscreen class='detail-img'></iframe>
                    <h5>{$blog['video_caption']}</h5>
                    </div>";
                echo $iframeHtml;
            }
        }
        ?>
    </div>
    <h1 class="font-bold blog-detail-diskusi">Diskusi</h1>
    <div class="kegiatan-group">
        <textarea id="deskripsi-kegiatan" class="blog-input font-semi-bold"
        placeholder="Tulis Komentar Anda Disini..."></textarea>
        <div class="actions gap-5">
            <button type="button" class="button-primary font-bold"onclick="window.location.href='/katalis/login'">Komentar</button>
            <button type="button" class="button-back font-bold"onclick="window.location.href='/katalis/blog'">Kembali</button>
        </div>
    </div>
    <hr class="blog-hr-2">
</section>
<?php include './client/components/Blog/components/related.php'; ?>