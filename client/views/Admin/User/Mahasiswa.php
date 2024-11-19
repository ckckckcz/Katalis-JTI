<?php 
    include('./server/model/Mahasiswa.php');
    include('./client/components/Admin/Sidebar.php'); 
?>
<section class="admin-section">
    <div class="admin-container">
        <div class="kegiatan-title font-bold">
            <p>Data Mahasiswa</p>
            <!-- <div class="actions">
                <button type="button" class="button-primary font-bold"
                    onclick="window.location.href='/katalis/tambahKegiatan.php'">Tambah Kegiatan </button>
            </div> -->
        </div>
        <div class="table-prestasi-container">
            <table class="table-prestasi-table">
                <thead class="table-prestasi-thead font-bold">
                    <tr>
                        <th scope="col" class="table-prestasi-th">No</th>
                        <th scope="col" class="table-prestasi-th">Nim</th>
                        <th scope="col" class="table-prestasi-th">Nama Lengkap</th>
                        <th scope="col" class="table-prestasi-th">Prodi</th>
                        <th scope="col" class="table-prestasi-th">Tahun Angkatan</th>
                        <th scope="col" class="table-prestasi-th">Status Mahasiswa</th>
                        <th scope="col" class="table-prestasi-th">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-regular">
                <?php
                        $no = 1;
                        $mahasiswa = getAllMahasiswa();
                        
                        if (!empty($mahasiswa)) {
                            foreach ($mahasiswa as $m) {
                                echo "
                                    <tr class='table-prestasi-row'>
                                        <th scope='row' class='table-prestasi-cell table-prestasi-header-cell'>
                                            $no</th>
                                        <td class='table-prestasi-cell'>$m[nim]</td>
                                        <td class='table-prestasi-cell'>$m[nama_lengkap]</td>
                                        <td class='table-prestasi-cell'>$m[prodi]</td>
                                        <td class='table-prestasi-cell'>$m[tahun_angkatan]</td>
                                        <td class='table-prestasi-cell'>$m[status_mahasiswa]</td>
                                        <td class='table-prestasi-cell'>
                                            <a href='#' class='table-prestasi-link'>Detail</a>
                                        </td>
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
</section>