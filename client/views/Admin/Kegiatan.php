<?php 
    include('./server/model/Event.php');
    include('./client/components/Admin/Sidebar.php'); 
?>
<section class="admin-section">
    <div class="admin-container">
        <div class="kegiatan-title font-bold">
            <p>Kegiatan Katalis</p>
            <div class="actions">
                <button type="button" class="button-primary font-bold"
                    onclick="window.location.href='/katalis/kegiatan/tambah_kegiatan'">Tambah Kegiatan </button>
            </div>
        </div>
        <div class="table-prestasi-container">
            <table class="table-prestasi-table">
                <thead class="table-prestasi-thead font-bold">
                    <tr>
                        <th scope="col" class="table-prestasi-th">No</th>
                        <th scope="col" class="table-prestasi-th">Nama Event</th>
                        <th scope="col" class="table-prestasi-th">Tingkat Lomba</th>
                        <th scope="col" class="table-prestasi-th">Instansi Penyelenggara</th>
                        <th scope="col" class="table-prestasi-th">Tanggal Mulai</th>
                        <th scope="col" class="table-prestasi-th">Tanggal Selesai</th>
                        <th scope="col" class="table-prestasi-th">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-regular">
                    <?php
                        $no = 1;
                        $event = new Event();
                        $allData = $event->getAllEvent();

                        if (!empty($allData)) {
                            foreach ($allData as $e) {
                                echo "
                                    <tr class='table-prestasi-row'>
                                        <th scope='row' class='table-prestasi-cell table-prestasi-header-cell'>
                                            $no</th>
                                        <td class='table-prestasi-cell'>$e[nama_event]</td>
                                        <td class='table-prestasi-cell'>" . ucwords($e['tingkat_lomba']) . "</td>
                                        <td class='table-prestasi-cell'>$e[instansi_penyelenggara]</td>
                                        <td class='table-prestasi-cell'>$e[tanggal_mulai]</td>
                                        <td class='table-prestasi-cell'>$e[tanggal_selesai]</td>
                                        <td class='table-prestasi-cell'>
                                            <a href='/katalis/kegiatan/edit?id=$e[id_event]' class='table-prestasi-link'>Detail</a>
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