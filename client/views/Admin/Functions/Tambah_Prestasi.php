<?php include('./client/components/Admin/Sidebar.php'); ?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="font-bold kegiatan-title">Tambah Prestasi</h1>
        <div class="kegiatan-card">
            <form action="" class="kegiatan-form">
                <div class="kegiatan-group">
                    <label for="nama-kegiatan" class="kegiatan-label font-bold">Nama Kegiatan</label>
                    <input type="text" id="nama-kegiatan" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan nama kegiatan">
                </div>
                <div class="kegiatan-group">
                    <label for="deskripsi-kegiatan" class="kegiatan-label font-bold">Deskripsi Kegiatan</label>
                    <textarea id="deskripsi-kegiatan" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan deskripsi kegiatan"></textarea>
                </div>
                <hr class="kegiatan-hr">
                <div class="kegiatan-group">
                    <label for="jenis-kegiatan" class="kegiatan-label font-bold">Jenis Kegiatan</label>
                    <input type="text" id="jenis-kegiatan" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan jenis kegiatan">
                </div>
                <div class="kegiatan-group">
                    <label for="penyelenggara" class="kegiatan-label font-bold">Penyelenggara Kegiatan</label>
                    <input type="text" id="penyelenggara" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan Penyelenggara kegiatan">
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="provinsi" class="kegiatan-label font-bold">Provinsi</label>
                        <select id="provinsi" class="kegiatan-input kegiatan-select font-semi-bold">
                            <option selected>Pilih Provinsi</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="kegiatan-group">
                        <label for="kota" class="kegiatan-label font-bold">Kota/Kabupaten</label>
                        <select id="kota" class="kegiatan-input  kegiatan-select font-semi-bold">
                            <option selected>Pilih Kota/Kabupaten</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                </div>
                <hr class="kegiatan-hr">
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="provinsi" class="kegiatan-label font-bold">Tanggal Mulai</label>
                        <select id="provinsi" class="kegiatan-input kegiatan-select font-semi-bold">
                            <option selected>Pilih Provinsi</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="kegiatan-group">
                        <label for="kota" class="kegiatan-label font-bold">Tanggal Selesai</label>
                        <select id="kota" class="kegiatan-input  kegiatan-select font-semi-bold">
                            <option selected>Pilih Kota/Kabupaten</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>