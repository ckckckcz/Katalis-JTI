<?php
include('./client/components/Admin/Sidebar.php');
include('./server/model/Prestasi.php');
include('./server/model/Dosen.php');

$data = new Prestasi();
$dataDosen = new Dosen();
$result = $data->getAllById($_GET['id']);
$allDosen = $dataDosen->getAllDosen();
var_dump($result);
?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="font-bold kegiatan-title">Detail Prestasi</h1>
        <div class="kegiatan-card">
            <form action="../server/proses/prestasi/EditPrestasi.php" method="post" enctype="multipart/form-data"
            class="kegiatan-form">
            <div class="kegiatan-grid">
                <input id="id-prestasi" name="id-prestasi" type="text" class="kegiatan-input-file-hidden" value="<?php echo $_GET['id'] ?>"/>
                <div class="kegiatan-group">
                    <label for="nama-kompetisi" class="kegiatan-label font-bold">Nama Kompetisi</label>
                    <input type="text" id="nama-kompetisi" name="nama-kompetisi"
                    class="kegiatan-input font-semi-bold" placeholder="Masukkan nama kompetisi" value="<?= $result[0]['nama_kegiatan'] ?>">
                </div>
                <div class="kegiatan-group">
                    <label for="tingkat-lomba" class="kegiatan-label font-bold">Tingkat Kompetisi</label>
                    <select id="tingkat-lomba" name="tingkat-lomba"
                    class="kegiatan-input kegiatan-select font-semi-bold">
                    <?php 
                            if ($result[0]['tingkat_lomba'] == 'internasional') {
                                echo '<option value="lokal">Lokal</option>';
                                echo '<option value="nasional">National</option>';
                                echo "<option value='{$result[0]['tingkat_lomba']}' selected>International</option>";
                            } else if ($result[0]['tingkat_lomba'] == 'nasional') {
                                echo '<option value="lokal">Lokal</option>';
                                echo "<option value='{$result[0]['tingkat_lomba']}' selected>National</option>";
                                echo '<option value="nasional">International</option>';
                            } else {
                                echo "<option value='{$result[0]['tingkat_lomba']}' selected>Lokal</option>";
                                echo '<option value="lokal">National</option>';
                                echo '<option value="nasional">International</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="tempat-kompetisi" class="kegiatan-label font-bold">Tempat Kompetisi</label>
                        <input type="text" id="tempat-kompetisi" name="tempat-kompetisi"
                            class="kegiatan-input font-semi-bold" placeholder="Masukkan nama kompetisi" value="<?= $result[0]['lokasi'] ?>">
                    </div>
                    <div class="kegiatan-group">
                        <label for="jenis-kompetisi" class="kegiatan-label font-bold">Jenis Kompetisi</label>
                        <select id="jenis-kompetisi" name="jenis-kompetisi"
                            class="kegiatan-input kegiatan-select font-semi-bold">
                            <?php
                            if ($result[0]['jenis_kegiatan'] == 'akademik') {
                                echo "<option value='{$result[0]['jenis_kegiatan']}' selected>Akademik</option>";
                                echo '<option value="non_akademik">Non Akademik</option>';
                            } else if ($result[0]['jenis_kegiatan'] == 'non_akademik') {
                                echo '<option value="akademik">Akademik</option>';
                                echo "<option value='{$result[0]['jenis_kegiatan']}' selected>Non Akademik</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="tanggal-mulai" class="kegiatan-label font-bold">Tanggal Mulai</label>
                        <input type="date" id="tanggal-mulai" name="tanggal-mulai" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan nama kompetisi" value="<?= $result[0]['tanggal_mulai'] ?>">
                    </div>
                    <div class="kegiatan-group">
                        <label for="tanggal-selesai" class="kegiatan-label font-bold">Tanggal Selesai</label>
                        <input type="date" id="tanggal-selesai" name="tanggal-selesai"
                            class="kegiatan-input font-semi-bold" placeholder="Masukkan nama kompetisi" value="<?= $result[0]['tanggal_selesai'] ?>">
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="peringkat" class="kegiatan-label font-bold">Peringkat</label>
                        <select id="peringkat" name="peringkat"
                            class="kegiatan-input kegiatan-select font-semi-bold">
                            <?php 
                            if ($result[0]['peringkat'] == '1') {
                                echo "<option value='{$result[0]['peringkat']}' selected>1</option>";
                                echo '<option value="2">2</option>';
                                echo '<option value="3">3</option>';
                                echo '<option value="0">- (Tidak Juara)</option>';
                            } else if ($result[0]['peringkat'] == '2') {
                                echo '<option value="1">1</option>';
                                echo "<option value='{$result[0]['peringkat']}' selected>2</option>";
                                echo '<option value="3">3</option>';
                                echo '<option value="0">- (Tidak Juara)</option>';
                            } else if ($result[0]['peringkat'] == '3') {
                                echo '<option value="1">1</option>';
                                echo '<option value="2">2</option>';
                                echo "<option value='{$result[0]['peringkat']}' selected>3</option>";
                                echo '<option value="0">- (Tidak Juara)</option>';
                            } else {
                                echo '<option value="1">1</option>';
                                echo '<option value="2">2</option>';
                                echo '<option value="3">3</option>';
                                echo "<option value='{$result[0]['peringkat']}' selected>- (Tidak Juara)</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="kegiatan-group">
                        <label for="dosen-pembimbing" class="kegiatan-label font-bold">Dosen Pembimbing</label>
                        <select id="dosen-pembimbing" name="dosen-pembimbing"
                            class="kegiatan-input kegiatan-select font-semi-bold">
                            <?php 
                                echo "<option value='{$result[0]['id_dosen']}' selected>{$result[0]['dosen_pembimbing']}</option>";
                                foreach ($allDosen as $data) {
                                    if ($data['nip'] == $result[0]['id_dosen']) continue;
                                    echo "<option value='{$data['nip']}'>{$data['nama_lengkap']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="sertifikat" class="kegiatan-label font-bold">File Sertifikat</label>
                        <div class="kegiatan-input-file-container">
                            <label for="sertifikat" class="kegiatan-input-file-label">
                                <div class="kegiatan-input-file-content">
                                    <img id="file-preview" class="kegiatan-file-preview"
                                        alt="Preview Sertifikat" src="../public/Prestasi/Sertifikat/<?php echo $result[0]['file_sertifikat'] ?>" />
                                </div>
                                <input id="sertifikat" name="sertifikat" type="file"
                                    class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                    <div class="kegiatan-group">
                        <label for="surat-tugas" class="kegiatan-label font-bold">File Surat Tugas</label>
                        <div class="kegiatan-input-file-container">
                            <label for="file-surat-tugas" class="kegiatan-input-file-label">
                                <div class="kegiatan-input-file-content">
                                    <p class="kegiatan-input-file-highlight font-semi-bold">
                                        <?= htmlspecialchars($result[0]['surat_tugas'], ENT_QUOTES, 'UTF-8'); ?>
                                    </p>
                                </div>
                                <input id="surat-tugas" name="surat-tugas" type="file" class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                    <div class="kegiatan-group">
                        <label for="poster" class="kegiatan-label font-bold">Foto Poster</label>
                        <div class="kegiatan-input-file-container">
                            <label for="poster" class="kegiatan-input-file-label">
                                <div class="kegiatan-input-file-content">
                                    <img id="poster-preview" class="kegiatan-file-preview"
                                        alt="Preview Poster" src="../public/Prestasi/Poster/<?php echo $result[0]['file_poster'] ?>" />
                                </div>
                                <input id="poster" name="poster" type="file" class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                    <div class="kegiatan-group">
                        <label for="dokumentasi" class="kegiatan-label font-bold">Foto Dokumentasi</label>
                        <div class="kegiatan-input-file-container">
                            <label for="dokumentasi" class="kegiatan-input-file-label">
                                <div class="kegiatan-input-file-content">
                                    <img id="dokumentasi-preview" class=" kegiatan-file-preview"
                                        alt="Preview Dokumentasi" src="../public/Prestasi/Dokumentasi/<?php echo $result[0]['file_dokumentasi'] ?>" />
                                </div>
                                <input id="dokumentasi" name="dokumentasi" type="file"
                                    class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="kegiatan-group">
                    <label for="deskripsi" class="kegiatan-label font-bold">Deskripsi Kegiatan</label>
                    <textarea id="deskripsi" name="deskripsi" class="kegiatan-input kegiatan-deskripsi font-semi-bold"
                        placeholder="Masukkan deskripsi kegiatan"><?= $result[0]['deskripsi'] ?></textarea>
                </div>
                <div class="kegiatan-group">
                    <label for="status-validasi" class="kegiatan-label font-bold">Status Validasi</label>
                    <select id="status-validasi" name="status-validasi" class="kegiatan-input kegiatan-select font-semi-bold">
                        <?php
                        if ($result[0]['status_validasi'] == 'proses_validasi') {
                            echo "<option value='proses_validasi' selected>Proses Validasi</option>";
                            echo '<option value="data_tervalidasi">Data Tervalidasi</option>';
                            echo '<option value="tidak_divalidasi">Data Tidak Valid</option>';
                        } else if ($result[0]['status_validasi'] == 'data_tervalidasi') {
                            echo '<option value="proses_validasi">Proses Validasi</option>';
                            echo "<option value='data_tervalidasi' selected>Data Tervalidasi</option>";
                            echo '<option value="tidak_divalidasi">Data Tidak Valid</option>';
                        } else {
                            echo '<option value="proses_validasi">Proses Validasi</option>';
                            echo '<option value="data_tervalidasi">Data Tervalidasi</option>';
                            echo "<option value='tidak_divalidasi' selected>Data Tidak Valid</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="actions">
                    <button type="submit" name="submit" value="submit" class="button-primary font-bold">Submit
                        Prestasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Fungsi untuk menampilkan preview gambar
        function showPreview(input, previewId, iconId) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    // Menampilkan gambar pada elemen img
                    $(`#${previewId}`).attr('src', e.target.result).removeClass('hidden');
                    // Menyembunyikan ikon upload
                    $(`#${iconId}`).addClass('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Event listener untuk setiap input file
        $('#sertifikat').on('change', function () {
            showPreview(this, 'file-preview', 'upload-icon');
        });

        $('#poster').on('change', function () {
            showPreview(this, 'poster-preview', 'poster-upload-icon');
        });

        $('#dokumentasi').on('change', function () {
            showPreview(this, 'dokumentasi-preview', 'dokumentasi-upload-icon');
        });
    });
    $(document).ready(function () {
        $('#karya').on('change', function (event) {
            const file = event.target.files[0];

            if (file) {
                const fileName = file.name;
                const fileType = file.type;

                // Menyembunyikan teks instruksi, subtext, dan ikon default
                $('#file-description').addClass('hidden');
                $('#file-subtext').addClass('hidden');
                $('#default-icon').addClass('hidden');

                // Menampilkan nama file
                $('#file-name').removeClass('hidden').text(fileName);

                // Menampilkan ikon PDF jika file PDF
                if (fileType === 'application/pdf') {
                    $('#file-icon').removeClass('hidden');
                } else {
                    // Sembunyikan ikon PDF jika file bukan PDF
                    $('#file-icon').addClass('hidden');
                }
            } else {
                // Reset ke kondisi awal jika file dihapus
                $('#file-description').removeClass('hidden');
                $('#file-subtext').removeClass('hidden');
                $('#default-icon').removeClass('hidden');
                $('#file-name').addClass('hidden');
                $('#file-icon').addClass('hidden');
            }
        });
    });
</script>

<script>
    function setTextColor() {
        const selectElement = document.getElementById('status-validasi');
        const selectedValue = selectElement.value;

        // Set color based on value
        if (selectedValue === 'proses_validasi') {
            selectElement.style.color = 'orange'; // Warna teks untuk proses validasi
        } else if (selectedValue === 'data_tervalidasi') {
            selectElement.style.color = 'green'; // Warna teks untuk data tervalidasi
        } else if (selectedValue === 'tidak_divalidasi') {
            selectElement.style.color = 'red'; // Warna teks untuk data tidak valid
        }
    }
    document.getElementById('status-validasi').addEventListener('change', setTextColor);
    window.onload = setTextColor;
</script>