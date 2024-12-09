<?php 
    include('./client/components/User/Sidebar.php'); 
    include('./server/model/Prestasi.php'); 
?>
<section class="user-section">
    <div class="user-container">
        <div class="kegiatan-title font-bold">
            <p>Daftar Prestasi</p>
            <div class="actions">
                <button type="button" class="button-primary font-bold"
                    onclick="window.location.href='/katalis/user/tambahPrestasi'">Tambah Prestasi </button>
            </div>
        </div>
        <div class="table-prestasi-container">
            <table class="table-prestasi-table">
                <thead class="table-prestasi-thead font-bold">
                    <tr>
                        <th scope="col" class="table-prestasi-th">No</th>
                        <th scope="col" class="table-prestasi-th">Kompetisi</th>
                        <th scope="col" class="table-prestasi-th">Tingkat Lomba</th>
                        <th scope="col" class="table-prestasi-th">Kategori</th>
                        <th scope="col" class="table-prestasi-th">Peringkat</th>
                        <th scope="col" class="table-prestasi-th">Status</th>
                        <th scope="col" class="table-prestasi-th">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-regular">
                <?php
                        $no = 1;
                        $data = new Prestasi();
                        if (isset($_SESSION['is_login']) == false) {
                            echo "
                            <tr class='table-prestasi-row'>
                                <td class='table-prestasi-cell'>Data Kosong</td>
                            </tr>";
                            die;
                        }
                        $prestasi = $data->getAllByMhs($_SESSION['user_data']['nim']);
                        
                        if (!empty($prestasi)) {
                            foreach ($prestasi as $p) {
                            $status = $p['status_validasi'];
                            $class = ($status === 'disetujui') ? 'disetujui' : (($status === 'ditolak') ? 'ditolak' : 'proses');
                                echo "
                                    <tr class='table-prestasi-row'>
                                        <th scope='row' class='table-prestasi-cell table-prestasi-header-cell'>
                                            $no</th>
                                        <td class='table-prestasi-cell'>$p[nama_kegiatan]</td>
                                        <td class='table-prestasi-cell'>" . ucwords($p['tingkat_lomba']) . "</td>
                                        <td class='table-prestasi-cell'>" . ucwords($p['jenis_kegiatan']) . "</td>";
                                        if ($p['peringkat'] == 0) {
                                            echo "<td class='table-prestasi-cell'>-</td>";
                                        } else {
                                            echo "<td class='table-prestasi-cell'>" . $p['peringkat'] . "</td>";
                                        }
                                echo "
                                        <td class='table-prestasi-cell'>
                                            <span class='prestasi-status $class'> " .
                                                ucwords(preg_replace('/_/', ' ', $p['status_validasi']))
                                            . " </span>
                                        </td>
                                        <td class='table-prestasi-cell'>
                                            <a href='/katalis/user/detailPrestasi?id=$p[id_prestasi]' class='table-prestasi-link'>Detail</a>
                                        </td>
                                    </tr>";
                                $no++;
                            }
                        } else {
                            echo "
                            <tr class='table-prestasi-row'>
                                <td class='table-prestasi-cell'>Data Kosong</td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>