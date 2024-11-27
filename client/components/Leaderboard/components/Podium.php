<?php
include './server/model/Berita.php';
?>
<section class="podium-rank-section">
        <div class="podium-rank-container">
                <h5 class="podium-card-title font-bold">Data Ranking</h5>
                <div class="podium-grid">
                        <div class="podium-cards podium-2 font-bold">
                                <img class="badge-silver badge-img" src="/katalis/public/img/badge/silver.png" alt="">
                                Posisi - 2
                        </div>
                        <div class="podium-cards podium-1 font-bold">
                                <img class="badge-gold badge-img" src="/katalis/public/img/badge/gold.png" alt="">
                                Posisi - 1
                        </div>
                        <div class="podium-cards podium-3 font-bold">
                                <img class="badge-bronze badge-img" src="/katalis/public/img/badge/bronze.png" alt="">
                                Posisi - 3
                        </div>
                </div>
                <div href="#" class="podium-card">
                        <div class="table-podium-container">
                                <table class="table-podium-table">
                                        <thead class="table-podium-thead font-bold">
                                                <tr>
                                                        <th scope="col" class="table-podium-th">No</th>
                                                        <th scope="col" class="table-podium-th">Mahasiswa</th>
                                                        <th scope="col" class="table-podium-th">Prodi</th>
                                                        <th scope="col" class="table-podium-th">Kompetisi</th>
                                                        <!-- <th scope="col" class="table-podium-th">Kategori</th> -->
                                                        <th scope="col" class="table-podium-th">Poin</th>
                                                </tr>
                                        </thead>
                                        <tbody class="font-regular">
                                                <?php
                                                        $no = 1;
                                                        $data = new Berita();
                                                        $leaderboard = $data->getForLeaderboard();
                                                        
                                                        if (!empty($leaderboard)) {
                                                        foreach ($leaderboard as $l) {
                                                                echo "
                                                                        <tr class='table-prestasi-row'>
                                                                                <th scope='row' class='table-prestasi-cell table-prestasi-header-cell'>
                                                                                $no</th>
                                                                                <td class='table-prestasi-cell'>$l[nama_mahasiswa]</td>
                                                                                <td class='table-prestasi-cell'>$l[prodi]</td>
                                                                                <td class='table-prestasi-cell'>$l[nama_kegiatan]</td>
                                                                                <td class='table-prestasi-cell'>$l[total_poin]</td>
                                                                        </tr>";
                                                                        $no++;
                                                                }
                                                                } else {
                                                                echo "
                                                                <tr class='table-prestasi-row'>
                                                                        td class='table-prestasi-cell'>Data Kosong</td>
                                                                </tr>";
                                                                }
                                                        ?>
                                                <!-- <tr class="table-podium-row">
                                                        <th scope="row"
                                                                class="table-podium-cell table-podium-header-cell">
                                                                1</th>
                                                        <td class="table-podium-cell">Riovaldo Alfiyan Fahmi Rahman</td>
                                                        <td class="table-podium-cell">Compfest</td>
                                                        <td class="table-podium-cell">Nasional</td>
                                                        <td class="table-podium-cell">1200</td>
                                                </tr> -->
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
</section>