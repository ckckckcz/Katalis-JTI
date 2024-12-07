<?php
include('./client/components/User/Sidebar.php');
include('./server/model/Prestasi.php');

$data = new Prestasi();
$result = $data->getAllById($_GET['id']);
?>
<section class="user-section">
    <div class="user-container">
        <h1 class="font-bold kegiatan-title">Detail Prestasi</h1>
        <div class="kegiatan-card">
            <form enctype="multipart/form-data"
                class="kegiatan-form">
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="nama-kompetisi" class="kegiatan-label font-bold">Nama Kompetisi</label>
                        <input type="text" id="nama-kompetisi" name="nama-kompetisi"
                            class="kegiatan-input font-semi-bold" disabled value="<?php echo $result[0]['nama_kegiatan'] ?>">
                    </div>
                    <div class="kegiatan-group">
                        <label for="tingkat-lomba" class="kegiatan-label font-bold">Tingkat Kompetisi</label>
                        <select id="tingkat-lomba" name="tingkat-lomba"
                            class="kegiatan-input kegiatan-select font-semi-bold">
                            <option value="<?php echo $result[0]['tingkat_lomba'] ?>"><?php echo ucwords($result[0]['tingkat_lomba']) ?></option>
                        </select>
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="tempat-kompetisi" class="kegiatan-label font-bold">Tempat Kompetisi</label>
                        <input type="text" id="tempat-kompetisi" name="tempat-kompetisi"
                            class="kegiatan-input font-semi-bold" disabled value="<?php echo $result[0]['lokasi'] ?>">
                    </div>
                    <div class="kegiatan-group">
                        <label for="jenis-kompetisi" class="kegiatan-label font-bold">Jenis Kompetisi</label>
                        <select id="jenis-kompetisi" name="jenis-kompetisi"
                            class="kegiatan-input kegiatan-select font-semi-bold">
                            <option value="<?php echo $result[0]['jenis_kegiatan'] ?>"><?php echo ucwords($result[0]['jenis_kegiatan']) ?></option>
                        </select>
                    </div>
                </div>
                <div class="kegiatan-group">
                    <label for="status" class="kegiatan-label font-bold">Status Validasi</label>
                    <input type="text" id="nama-kompetisi" name="nama-kompetisi" class="kegiatan-input font-semi-bold" value="<?php 
                    echo preg_replace_callback('/_(.)/', function ($matches) { 
                        return ' ' . strtoupper($matches[1]);
                    }, ucfirst($result[0]['status_validasi'])); ?>" disabled>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="tanggal-mulai" class="kegiatan-label font-bold">Tanggal Mulai</label>
                        <input type="date" id="tanggal-mulai" name="tanggal-mulai" class="kegiatan-input font-semi-bold"
                            disabled value="<?php echo $result[0]['tanggal_mulai'] ?>">
                    </div>
                    <div class="kegiatan-group">
                        <label for="tanggal-selesai" class="kegiatan-label font-bold">Tanggal Selesai</label>
                        <input type="date" id="tanggal-selesai" name="tanggal-selesai"
                            class="kegiatan-input font-semi-bold" disabled value="<?php echo $result[0]['tanggal_selesai'] ?>">
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="peringkat" class="kegiatan-label font-bold">Peringkat</label>
                        <?php
                            if($result[0]['peringkat'] == 0){
                                echo '<input type="number" id="peringkat" name="peringkat" class="kegiatan-input font-semi-bold" placeholder="-" disabled>';
                            } else {
                                echo '<input type="number" id="peringkat" name="peringkat" class="kegiatan-input font-semi-bold"
                                value="' . $result[0]['peringkat'] . '">';
                            }
                        ?>
                    </div>
                    <div class="kegiatan-group">
                        <label for="dosen-pembimbing" class="kegiatan-label font-bold">Dosen Pembimbing</label>
                        <input type="text" id="dosen-pembimbing" name="dosen-pembimbing"
                            class="kegiatan-input font-semi-bold" value="<?php echo $result[0]['dosen_pembimbing'] ?>" disabled>
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="karya" class="kegiatan-label font-bold">File Karya</label>
                        <img id="dokumentasi-preview-user" class="kegiatan-file-preview" alt="Preview Dokumentasi" src="" />
                    </div>
                    <div class="kegiatan-group">
                        <label for="sertifikat" class="kegiatan-label font-bold">File Sertifikat</label>
                        <img id="dokumentasi-preview-user" class="kegiatan-file-preview" alt="Preview Dokumentasi" src="" />
                    </div>
                    <div class="kegiatan-group">
                        <label for="poster" class="kegiatan-label font-bold">Foto Poster</label>
                        <img id="dokumentasi-preview-user" class="kegiatan-file-preview" alt="Preview Dokumentasi" src="" />
                    </div>
                    <div class="kegiatan-group">
                        <label for="dokumentasi" class="kegiatan-label font-bold">Foto Dokumentasi</label>
                        <img id="dokumentasi-preview-user" class="kegiatan-file-preview" alt="Preview Dokumentasi" src="" />
                    </div>
                </div>
                <div class="kegiatan-group">
                    <label for="surat-tugas" class="kegiatan-label font-bold">File Surat Tugas</label>
                    <img id="dokumentasi-preview-user" class="kegiatan-file-preview" alt="Preview Dokumentasi" src="" />
                </div>
                <div class="kegiatan-group">
                    <label for="deskripsi" class="kegiatan-label font-bold">Deskripsi Kegiatan</label>
                    <textarea id="deskripsi" name="deskripsi" class="kegiatan-input kegiatan-deskripsi font-semi-bold"
                        placeholder="Masukkan deskripsi kegiatan" disabled><?php echo $result[0]['deskripsi'] ?></textarea>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>