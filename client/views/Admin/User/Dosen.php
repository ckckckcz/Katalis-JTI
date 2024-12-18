<?php
include('./client/components/Admin/Sidebar.php');
include('./server/model/Dosen.php');
?>
<section class="admin-section">
    <div class="admin-container">
        <div class="kegiatan-title font-bold">
            <p>Data Dosen</p>
            <div class="actions">
                <button type="button" class="button-primary font-bold"
                    onclick="window.location.href='/katalis/tambahDosen'">Tambah Dosen </button>
            </div>
        </div>
        <div class="table-prestasi-container">
            <table class="table-prestasi-table">
                <thead class="table-prestasi-thead font-bold">
                    <tr>
                        <th scope="col" class="table-prestasi-th">No</th>
                        <th scope="col" class="table-prestasi-th">Nip</th>
                        <th scope="col" class="table-prestasi-th">Nama Lengkap</th>
                        <th scope="col" class="table-prestasi-th">Jurusan</th>
                        <th scope="col" class="table-prestasi-th">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-regular">
                <?php
                    $no = 1;
                    $data = new Dosen();
                    $dosen = $data->getAllDosen();

                    if (!empty($dosen)) {
                        foreach ($dosen as $d) {
                            echo "
                                        <tr class='table-prestasi-row'>
                                            <th scope='row' class='table-prestasi-cell table-prestasi-header-cell'>
                                                $no</th>
                                            <td class='table-prestasi-cell'>$d[nip]</td>
                                            <td class='table-prestasi-cell'>$d[nama_lengkap]</td>
                                            <td class='table-prestasi-cell'>$d[Jurusan]</td>
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