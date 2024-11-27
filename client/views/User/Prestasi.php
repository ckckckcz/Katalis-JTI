<?php 
    include('./client/components/User/Sidebar.php'); 
    include('./server/model/Prestasi.php'); 
?>
<section class="user-section">
    <div class="user-container">
        <div class="kegiatan-title font-bold">
            <p>Daftar Prestasi</p>
            <?php
                if(isset($_SESSION['is_login']) == true) {
                    if($_SESSION['user_role'] == 'mahasiswa') {
                        echo '
                            <div class="actions">
                                <button type="button" class="button-primary font-bold"
                                    onclick="window.location.href=\'/katalis/kegiatan/tambah_prestasi\'">Tambah Prestasi
                                </button>
                            </div>';
                    }
                    else  {
                        
                    }
                } else {
                    
                }
            ?>
        </div>
        <div class="table-prestasi-container">
            <table class="table-prestasi-table">
                <thead class="table-prestasi-thead font-bold">
                    <tr>
                        <th scope="col" class="table-prestasi-th">No</th>
                        <th scope="col" class="table-prestasi-th">Kompetisi</th>
                        <th scope="col" class="table-prestasi-th">Kategori</th>
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
                                td class='table-prestasi-cell'>Data Kosong</td>
                            </tr>";
                            die;
                        }
                        $prestasi = $data->getAllByMhs($_SESSION['user_data']['nim']);
                        
                        if (!empty($prestasi)) {
                            foreach ($prestasi as $p) {
                                echo "
                                    <tr class='table-prestasi-row'>
                                        <th scope='row' class='table-prestasi-cell table-prestasi-header-cell'>
                                            $no</th>
                                        <td class='table-prestasi-cell'>$p[nama_kegiatan]</td>
                                        <td class='table-prestasi-cell'>" . ucwords($p['tingkat_lomba']) . "</td>
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