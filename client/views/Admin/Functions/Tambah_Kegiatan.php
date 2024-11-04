<?php include('./client/components/Admin/Sidebar.php'); ?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="font-bold kegiatan-title">Tambah Kegiatan</h1>
        <div class="kegiatan-card">
            <form action="" class="kegiatan-form">
                <div class="kegiatan-group">
                    <label for="text" class="kegiatan-label font-bold">Nama Kegiatan</label>
                    <input type="text" id="text" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan nama kegiatan">
                    </p>
                </div>
                <div class="kegiatan-group">
                    <label for="text" class="kegiatan-label font-bold">Deskripsi Kegiatan</label>
                    <textarea type="text" id="text" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan deskripsi kegiatan"></textarea>
                    </p>
                </div>
                <hr class="kegiatan-hr">
                <div class="kegiatan-group">
                    <label for="text" class="kegiatan-label font-bold">Jenis Kegiatan</label>
                    <input type="text" id="text" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan jenis kegiatan">
                    </p>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="text" class="kegiatan-label font-bold">Provinsi</label>
                        <input type="text" id="text" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan provinsi">
                        </p>
                    </div>
                    <div class="kegiatan-group">
                        <label for="text" class="kegiatan-label font-bold">Kota/Kabupaten</label>
                        <input type="text" id="text" class="kegiatan-input font-semi-bold" placeholder="Masukkan kota">
                        </p>
                    </div>
                </div>
                <div class="kegiatan-group">
                    <label for="text" class="kegiatan-label font-bold">Penyelenggara Kegiatan</label>
                    <input type="text" id="text" class="kegiatan-input font-semi-bold"
                        placeholder="Masukkan Penyelenggara kegiatan">
                    </p>
                </div>
                <hr class="kegiatan-hr">
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="text" class="kegiatan-label font-bold">Tanggal Mulai</label>
                        <input type="text" id="text" class="kegiatan-input font-semi-bold" placeholder="Masukkan kota">
                        </p>
                    </div>
                    <div class="kegiatan-group">
                        <label for="text" class="kegiatan-label font-bold">Tanggal Selesai</label>
                        <input type="text" id="text" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan Penyelenggara kegiatan">
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>