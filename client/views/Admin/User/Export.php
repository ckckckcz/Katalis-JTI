<?php

include('./client/components/Admin/Sidebar.php');
include('./server/model/Prestasi.php');


?>
<section class="admin-section">
    <div class="admin-container">
        <div class="kegiatan-title font-bold">
            <p>Export Data</p>
            <div class="actions">
                <button type="button" class="button-primary font-bold" id="dwnldBtn">Download Data</button>
            </div>
        </div>
        <hr class="blog-hr-2">
        <form id="berita-form" method="GET" action="" class="berita-form">
            <div class="kegiatan-grid">
                <div class="kegiatan-group">
                    <label for="start-date" class="kegiatan-label font-bold">Tanggal Awal</label>
                    <input type="date" id="start-date" name="start-date" class="kegiatan-input font-semi-bold"
                        value="<?= isset($_GET['start-date']) == true ? $_GET['start-date'] : '' ?>">
                </div>
                <div class="kegiatan-group">
                    <label for="end-date" class="kegiatan-label font-bold">Tanggal Akhir</label>
                    <input type="date" id="end-date" name="end-date" class="kegiatan-input font-semi-bold"
                        value="<?= isset($_GET['end-date']) == true ? $_GET['end-date'] : '' ?>">
                </div>
            </div>
            <div class="kegiatan-title font-bold">
                <div class="actions">
                    <button type="submit" class="button-primary font-bold">Terapkan Filter</button>
                </div>
            </div>
        </form>
        <div class="table-prestasi-container">
            <table class="table-prestasi-table" id="export-table">
                <thead class="table-prestasi-thead font-bold">
                    <tr>
                        <th scope="col" class="table-prestasi-th">No</th>
                        <th scope="col" class="table-prestasi-th">NIM</th>
                        <th scope="col" class="table-prestasi-th">Nama Mahasiswa</th>
                        <th scope="col" class="table-prestasi-th">Jenis Prestasi</th>
                        <th scope="col" class="table-prestasi-th">Tingkat Lomba</th>
                        <th scope="col" class="table-prestasi-th">Peringkat</th>
                        <th scope="col" class="table-prestasi-th">Lokasi</th>
                        <th scope="col" class="table-prestasi-th">Tanggal Lomba</th>
                    </tr>
                </thead>
                <tbody class="font-regular">
                    <?php
                    $no = 1;
                    $data = new Prestasi();
                    if (isset($_GET['start-date']) && $_GET['start-date'] != '' && isset($_GET['end-date']) && $_GET['end-date'] != '') {
                        $prestasi = $data->getWithRangeDate($_GET['start-date'], $_GET['end-date']);
                    } else {
                        $prestasi = $data->getForDefaultExport();
                    }

                    if (!empty($prestasi)) {
                        foreach ($prestasi as $p) {
                            echo "
                                    <tr class='table-prestasi-row'>
                                        <th scope='row' class='table-prestasi-cell table-prestasi-header-cell'>
                                            $no</th>
                                        <td class='table-prestasi-cell'>$p[nim_mahasiswa]</td>
                                        <td class='table-prestasi-cell'>$p[nama_mahasiswa]</td>
                                        <td class='table-prestasi-cell'>" . ucwords($p['jenis_kegiatan']) . "</td>
                                        <td class='table-prestasi-cell'>" . ucwords($p['tingkat_lomba']) . "</td>
                                        <td class='table-prestasi-cell'>$p[peringkat]</td>
                                        <td class='table-prestasi-cell'>$p[lokasi]</td>
                                        <td class='table-prestasi-cell'>$p[tanggal_mulai_tanggal_selesai]</td>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dwnldBtn').on('click', function () {
            downloadExcelTable('export-table', 'DataMahasiswaBerprestasi');
        });

        function downloadExcelTable(tableID, filename = '') {
            const linkToDownloadFile = document.createElement("a");
            const fileType = 'application/vnd.ms-excel';
            const selectedTable = document.getElementById(tableID);
            const selectedTableHTML = selectedTable.outerHTML.replace(/ /g, '%20');

            filename = filename ? filename + '.xls' : 'excel_data.xls';
            document.body.appendChild(linkToDownloadFile);

            if (navigator.msSaveOrOpenBlob) {
                const myBlob = new Blob(['\ufeff', selectedTableHTML], {
                    type: fileType
                });
                navigator.msSaveOrOpenBlob(myBlob, filename);
            } else {
                // Create a link to download
                // the excel the file
                linkToDownloadFile.href = 'data:' + fileType + ', ' + selectedTableHTML;

                // Setting the name of
                // the downloaded file
                linkToDownloadFile.download = filename;

                // Clicking the download link 
                // on click to the button
                linkToDownloadFile.click();
            }
        }
    });
</script>