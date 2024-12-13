<?php
include './server/model/Berita.php';
?>
<div class="prestasi-container">
        <h5 class="prestasi-card-title font-bold">Data Ranking</h5>
        
        <div class="table-prestasi-container">
                <table class="table-prestasi-table">
                        <thead class="table-prestasi-thead font-bold">
                                <tr>
                                        <th scope="col" class="table-prestasi-th">No</th>
                                        <th scope="col" class="table-prestasi-th">Mahasiswa</th>
                                        <th scope="col" class="table-prestasi-th">Prodi</th>
                                        <th scope="col" class="table-prestasi-th">Poin</th>
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
                        </tbody>
                </table>
        </div>
</div>
<script>
        document.querySelectorAll('.table-prestasi-cell').forEach(cell => {
                cell.textContent = cell.textContent.replace(/(\d+)\.0$/, '$1');
        });
</script>