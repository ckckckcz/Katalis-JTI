<?php include('./client/components/Admin/Sidebar.php'); ?>
<section class="admin-section">
    <div class="admin-container">
        <div class="kegiatan-title font-bold">
            <p>Export Data</p>
            <div class="actions">
                <button type="button" class="button-primary font-bold"
                    onclick="window.location.href='/katalis/tambahKegiatan.php'">Download Data</button>
            </div>
        </div>
        <div class="table-prestasi-container">
            <table class="table-prestasi-table">
                <thead class="table-prestasi-thead font-bold">
                    <tr>
                        <th scope="col" class="table-prestasi-th">No</th>
                        <th scope="col" class="table-prestasi-th">Mahasiswa</th>
                        <th scope="col" class="table-prestasi-th">Kompetisi</th>
                        <th scope="col" class="table-prestasi-th">Kategori</th>
                        <th scope="col" class="table-prestasi-th">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-regular">
                    <tr class="table-prestasi-row">
                        <th scope="row" class="table-prestasi-cell table-prestasi-header-cell">
                            1</th>
                        <td class="table-prestasi-cell">Riovaldo Alfiyan Fahmi Rahman</td>
                        <td class="table-prestasi-cell">Compfest</td>
                        <td class="table-prestasi-cell">Nasional</td>
                        <td class="table-prestasi-cell">
                            <a href="#" class="table-prestasi-link">Edit</a>
                            <a href="#" class="table-prestasi-link">Hapus</a>
                        </td>
                    </tr>
                    <tr class="table-prestasi-row">
                        <th scope="row" class="table-prestasi-cell table-prestasi-header-cell">
                            2</th>
                        <td class="table-prestasi-cell">Arya Mahendra Wijaya</td>
                        <td class="table-prestasi-cell">KMPIN</td>
                        <td class="table-prestasi-cell">Nasional</td>
                        <td class="table-prestasi-cell">
                            <a href="#" class="table-prestasi-link">Edit</a>
                            <a href="#" class="table-prestasi-link">Hapus</a>
                        </td>
                    </tr>
                    <tr class="table-prestasi-row">
                        <th scope="row" class="table-prestasi-cell table-prestasi-header-cell">
                            3</th>
                        <td class="table-prestasi-cell">Bagaskara Pradipta Satriya</td>
                        <td class="table-prestasi-cell">Gemastik</td>
                        <td class="table-prestasi-cell">Nasioanl</td>
                        <td class="table-prestasi-cell">
                            <a href="#" class="table-prestasi-link">Edit</a>
                            <a href="#" class="table-prestasi-link">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>