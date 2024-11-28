<?php include('./client/components/Admin/Sidebar.php'); ?>
<?php
// Baca data JSON
$data = json_decode(file_get_contents('./server/data/Lokasi.json'), true);

// Pisahkan data provinsi dan kota
$provinsiList = $data['provinsi'];
$kotaList = $data['kota'];
?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="font-bold kegiatan-title">Tambah Kegiatan</h1>
        <div class="kegiatan-card">
            <form action="" class="kegiatan-form">
                <div class="kegiatan-group">
                    <label for="nama-kegiatan" class="kegiatan-label font-bold">Nama Kegiatan</label>
                    <input type="text" id="nama-kegiatan" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan nama kegiatan">
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="Tingkat" class="kegiatan-label font-bold">Tingkat Kompetisi</label>
                        <select id="Tingkat" class="kegiatan-input kegiatan-select font-semi-bold">
                            <option selected>International</option>
                            <option value="">National</option>
                            <option value="">Kota / Kabupaten</option>
                            <option value="">Provinsi</option>
                            <option value="">Internal</option>
                        </select>
                    </div>
                    <div class="kegiatan-group">
                        <label for="nama-kompetisi" class="kegiatan-label font-bold">Tempat Kompetisi</label>
                        <input type="text" id="nama-kompetisi" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan nama kompetisi">
                    </div>
                </div>
                <div class="kegiatan-group">
                    <label for="nama-kompetisi" class="kegiatan-label font-bold">URL Kompetisi</label>
                    <input type="text" id="nama-kompetisi" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan nama kompetisi">
                </div>
                <div class="kegiatan-group">
                    <label for="deskripsi-kegiatan" class="kegiatan-label font-bold">Deskripsi Kegiatan</label>
                    <textarea id="deskripsi-kegiatan" class="kegiatan-input kegiatan-deskripsi font-semi-bold"
                        placeholder="Masukkan deskripsi kegiatan"></textarea>
                </div>
                <hr class="kegiatan-hr">
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="Tingkat" class="kegiatan-label font-bold">Tanggal Mulai</label>
                        <input type="date" id="nama-kompetisi" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan nama kompetisi">
                    </div>
                    <div class="kegiatan-group">
                        <label for="Tingkat" class="kegiatan-label font-bold">Tanggal Selesai</label>
                        <input type="date" id="nama-kompetisi" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan nama kompetisi">
                    </div>
                </div>
                <div class="kegiatan-group">
                    <label for="nama-kompetisi" class="kegiatan-label font-bold">File Poster Kompetisi</label>
                        <div class="kegiatan-input-file-container">
                            <label for="dropzone-file" class="kegiatan-input-file-label">
                                <div class="kegiatan-input-file-content">
                                    <svg class="kegiatan-input-file-icon" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="kegiatan-input-file-text"><span
                                            class="kegiatan-input-file-highlight font-semi-bold">Click to upload</span>
                                        or drag and
                                        drop</p>
                                    <p class="kegiatan-input-file-subtext font-semi-bold">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                </div>
                <div class="actions">
                    <button type="button" class="button-primary font-bold">Submit Kegiatan</button>
                </div>
            </form>
        </div>
    </div>
</section>