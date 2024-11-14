<?php include('./client/components/User/Sidebar.php'); ?>
<section class="user-section">
    <div class="user-container">
        <div class="kegiatan-title font-bold">
            <p>Daftar Prestasi</p>
            <!-- <div class="actions">
                <button type="button" class="button-primary font-bold"
                    onclick="window.location.href='/katalis/kegiatan/tambah_prestasi'">Tambah Prestasi </button>
            </div> -->
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
                    <tr class="table-prestasi-row">
                        <th scope="row" class="table-prestasi-cell table-prestasi-header-cell">
                            1</th>
                        <td class="table-prestasi-cell">Compfest</td>
                        <td class="table-prestasi-cell">Nasional</td>
                        <td class="table-prestasi-cell">
                            <a href="#" class="table-prestasi-link">Detail</a>
                        </td>
                    </tr>
                    <tr class="table-prestasi-row">
                        <th scope="row" class="table-prestasi-cell table-prestasi-header-cell">
                            2</th>
                        <td class="table-prestasi-cell">KMPIN</td>
                        <td class="table-prestasi-cell">Nasional</td>
                        <td class="table-prestasi-cell">
                            <a href="#" class="table-prestasi-link">Detail</a>
                        </td>
                    </tr>
                    <tr class="table-prestasi-row">
                        <th scope="row" class="table-prestasi-cell table-prestasi-header-cell">
                            3</th>
                        <td class="table-prestasi-cell">Gemastik</td>
                        <td class="table-prestasi-cell">Nasioanl</td>
                        <td class="table-prestasi-cell">
                            <a href="#" class="table-prestasi-link">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>