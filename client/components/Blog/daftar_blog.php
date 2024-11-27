<?php
include './server/model/Berita.php';

$data = new Berita();
$berita = $data->getAllBerita();

?>
<section class="blog-section">
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
        <div class="blog-card">
            <img src="/katalis/public/img/article/ctf.jpg" alt="Modern workspace with desktop" class="blog-image" />
            <div class="blog-content">
                <div class="blog-title font-bold">Champion CTF pada Acara Compfest-16</div>
                <div class="blog-text font-regular">Here are the biggest enterprise technology acquisitions</div>
                <div class="actions">
                    <button type="button" class="button-primary font-bold"
                        onclick="window.location.href='/katalis/blog/read'">Baca Artikel</button>
                </div>
            </div>
        </div>
        <div class="blog-card">
            <img src="/katalis/public/img/article/igi.jpg" alt="Team collaboration in office" class="blog-image" />
            <div class="blog-content">
                <div class="blog-title font-bold">Pemenang Kategori IGI Best Narative</div>
                <div class="blog-text font-regular">Here are the biggest enterprise technology acquisitions</div>
                <div class="actions">
                    <button type="button" class="button-primary font-bold"
                        onclick="window.location.href='/katalis/blog/read'">Baca Artikel</button>
                </div>
            </div>
        </div>
        <div class="blog-card">
            <img src="/katalis/public/img/article/igi.jpg" alt="Team collaboration in office" class="blog-image" />
            <div class="blog-content">
                <div class="blog-title font-bold">Pemenang Kategori IGI Best Narative</div>
                <div class="blog-text font-regular">Here are the biggest enterprise technology acquisitions</div>
                <div class="actions">
                    <button type="button" class="button-primary font-bold"
                        onclick="window.location.href='/katalis/blog/read'">Baca Artikel</button>
                </div>
            </div>
        </div>
        <div class="blog-card">
            <img src="/katalis/public/img/article/aic.jpg" alt="Desk with laptop and flowers" class="blog-image" />
            <div class="blog-content">
                <div class="blog-title font-bold">Pemenang AIC Audience Award, dan 2nd Runner-Up</div>
                <div class="blog-text font-regular">Here are the biggest enterprise technology acquisitions</div>
                <div class="actions">
                    <button type="button" class="button-primary font-bold"
                        onclick="window.location.href='/katalis/blog/read'">Baca Artikel</button>
                </div>
            </div>
        </div>
        <div class="blog-card">
            <img src="/katalis/public/img/article/ctf.jpg" alt="Modern workspace with desktop" class="blog-image" />
            <div class="blog-content">
                <div class="blog-title font-bold">Champion CTF pada Acara Compfest-16</div>
                <div class="blog-text font-regular">Here are the biggest enterprise technology acquisitions</div>
                <div class="actions">
                    <button type="button" class="button-primary font-bold"
                        onclick="window.location.href='/katalis/blog/read'">Baca Artikel</button>
                </div>
            </div>
        </div>
        <div class="blog-card">
            <img src="/katalis/public/img/article/igi.jpg" alt="Team collaboration in office" class="blog-image" />
            <div class="blog-content">
                <div class="blog-title font-bold">Pemenang Kategori IGI Best Narative</div>
                <div class="blog-text font-regular">Here are the biggest enterprise technology acquisitions</div>
                <div class="actions">
                    <button type="button" class="button-primary font-bold"
                        onclick="window.location.href='/katalis/blog/read'">Baca Artikel</button>
                </div>
            </div>
        </div>
        <div class="blog-card">
            <img src="/katalis/public/img/article/igi.jpg" alt="Team collaboration in office" class="blog-image" />
            <div class="blog-content">
                <div class="blog-title font-bold">Pemenang Kategori IGI Best Narative</div>
                <div class="blog-text font-regular">Here are the biggest enterprise technology acquisitions</div>
                <div class="actions">
                    <button type="button" class="button-primary font-bold"
                        onclick="window.location.href='/katalis/blog/read'">Baca Artikel</button>
                </div>
            </div>
        </div>
    </div>
</section>