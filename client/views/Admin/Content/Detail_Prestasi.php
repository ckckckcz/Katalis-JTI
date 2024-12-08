<?php
include('./client/components/Admin/Sidebar.php');
include('./server/model/Prestasi.php');
include('./server/model/Dosen.php');

$data = new Prestasi();
$dataDosen = new Dosen();
$result = $data->getAllById($_GET['id']);
$allDosen = $dataDosen->getAllDosen();
?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="font-bold kegiatan-title">Detail Prestasi</h1>
        <div class="kegiatan-card">
            <form action="../server/proses/prestasi/EditPrestasi.php" method="post" enctype="multipart/form-data"
                class="kegiatan-form">
                <div class="kegiatan-grid">
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
                                    if ($data['nidn'] == $result[0]['id_dosen']) continue;
                                    echo "<option value='{$data['nidn']}'>{$data['nama_lengkap']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="karya" class="kegiatan-label font-bold">File Karya</label>
                        <div class="kegiatan-group">
                            <input type="text" id="tempat-kompetisi" name="tempat-kompetisi"
                                class="kegiatan-input font-semi-bold" placeholder="Masukkan nama kompetisi" disabled value="<?= $result[0]['file_karya'] ?>">
                        </div>
                        <div class="kegiatan-input-file-container">
                            <label for="karya" class="kegiatan-input-file-label">
                                <div class="kegiatan-input-file-content">
                                    <!-- Ikon file awal -->
                                    <svg id="default-icon" class="kegiatan-input-file-icon" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>

                                    <!-- Teks yang muncul sebelum file dipilih -->
                                    <p id="file-description" class="kegiatan-input-file-text">
                                        <span class="kegiatan-input-file-highlight font-semi-bold">Click to
                                            upload</span> or drag and drop
                                    </p>
                                    <p id="file-subtext" class="kegiatan-input-file-subtext font-semi-bold">SVG, PNG,
                                        JPG, or GIF (MAX. 800x400px)</p>
                                    <svg id="file-icon" class="kegiatan-input-file-icon hidden" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                                    </svg>
                                    <p id="file-name" class="kegiatan-input-file-highlight hidden font-semi-bold"></p>
                                </div>
                                <input id="karya" name="karya" type="file" class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                    <div class="kegiatan-group">
                        <label for="sertifikat" class="kegiatan-label font-bold">File Sertifikat</label>
                        <div class="kegiatan-group">
                            <img src="../public/Prestasi/Sertifikat/<?php echo $result[0]['file_sertifikat'] ?>" style="max-width: 80%;">
                        </div>
                        <div class="kegiatan-input-file-container">
                            <label for="sertifikat" class="kegiatan-input-file-label">
                                <div class="kegiatan-input-file-content">
                                    <img id="file-preview" class="hidden kegiatan-file-preview"
                                        alt="Preview Sertifikat" />
                                    <svg class="kegiatan-input-file-icon" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="kegiatan-input-file-text">
                                        <span class="kegiatan-input-file-highlight font-semi-bold">Click to
                                            upload</span> or drag and drop
                                    </p>
                                    <p class="kegiatan-input-file-subtext font-semi-bold">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="sertifikat" name="sertifikat" type="file"
                                    class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                    <div class="kegiatan-group">
                        <label for="poster" class="kegiatan-label font-bold">Foto Poster</label>
                        <div class="kegiatan-group">
                            <img src="../public/Prestasi/Poster/<?php echo $result[0]['file_poster'] ?>" style="max-width: 80%;">
                        </div>
                        <div class="kegiatan-input-file-container">
                            <label for="poster" class="kegiatan-input-file-label">
                                <div class="kegiatan-input-file-content">
                                    <img id="poster-preview" class="hidden kegiatan-file-preview"
                                        alt="Preview Poster" />
                                    <svg class="kegiatan-input-file-icon" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="kegiatan-input-file-text">
                                        <span class="kegiatan-input-file-highlight font-semi-bold">Click to
                                            upload</span> or drag and drop
                                    </p>
                                    <p class="kegiatan-input-file-subtext font-semi-bold">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="poster" name="poster" type="file" class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                    <div class="kegiatan-group">
                        <label for="dokumentasi" class="kegiatan-label font-bold">Foto Dokumentasi</label>
                        <div class="kegiatan-group">
                            <img src="../public/Prestasi/Dokumentasi/<?php echo $result[0]['file_dokumentasi'] ?>" style="max-width: 80%;">
                        </div>
                        <div class="kegiatan-input-file-container">
                            <label for="dokumentasi" class="kegiatan-input-file-label">
                                <div class="kegiatan-input-file-content">
                                    <img id="dokumentasi-preview" class="hidden kegiatan-file-preview"
                                        alt="Preview Dokumentasi" />
                                    <svg class="kegiatan-input-file-icon" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="kegiatan-input-file-text">
                                        <span class="kegiatan-input-file-highlight font-semi-bold">Click to
                                            upload</span> or drag and drop
                                    </p>
                                    <p class="kegiatan-input-file-subtext font-semi-bold">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="dokumentasi" name="dokumentasi" type="file"
                                    class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="kegiatan-group">
                        <label for="surat-tugas" class="kegiatan-label font-bold">File Surat Tugas</label>
                        <div class="kegiatan-group">
                            <input type="text" id="surat-tugas" name="surat-tugas"
                                class="kegiatan-input font-semi-bold" disabled value="<?= $result[0]['surat_tugas'] ?>">
                        </div>
                        <div class="kegiatan-input-file-container">
                            <label for="karya" class="kegiatan-input-file-label">
                                <div class="kegiatan-input-file-content">
                                    <!-- Ikon file awal -->
                                    <svg id="default-icon" class="kegiatan-input-file-icon" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>

                                    <!-- Teks yang muncul sebelum file dipilih -->
                                    <p id="file-description" class="kegiatan-input-file-text">
                                        <span class="kegiatan-input-file-highlight font-semi-bold">Click to
                                            upload</span> or drag and drop
                                    </p>
                                    <p id="file-subtext" class="kegiatan-input-file-subtext font-semi-bold">SVG, PNG,
                                        JPG, or GIF (MAX. 800x400px)</p>
                                    <svg id="file-icon" class="kegiatan-input-file-icon hidden" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                                    </svg>
                                    <p id="file-name" class="kegiatan-input-file-highlight hidden font-semi-bold"></p>
                                </div>
                                <input id="karya" name="karya" type="file" class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                <div class="kegiatan-group">
                    <label for="deskripsi" class="kegiatan-label font-bold">Deskripsi Kegiatan</label>
                    <textarea id="deskripsi" name="deskripsi" class="kegiatan-input kegiatan-deskripsi font-semi-bold"
                        placeholder="Masukkan deskripsi kegiatan"><?= $result[0]['surat_tugas'] ?></textarea>
                </div>
                <div class="kegiatan-group">
                    <label for="status-validasi" class="kegiatan-label font-bold">Status Validasi</label>
                    <select id="status-validasi" name="status-validasi"
                        class="kegiatan-input kegiatan-select font-semi-bold">
                        <?php 
                        if ($result[0]['status_validasi'] == 'proses_validasi') {
                            echo "<option value='{$result[0]['status_validasi']} selected'>Proses Validasi</option>";
                            echo '<option value="data_tervalidasi">Data Tervalidasi</option>';
                            echo '<option value="tidak_divalidasi">Data Tidak Valid</option>';
                        } else if ($result[0]['status_validasi'] == 'data_tervalidasi') {
                            echo '<option value="proses_validasi">Proses Validasi</option>';
                            echo "<option value='{$result[0]['status_validasi']}' selected>Data Tervalidasi</option>";
                            echo '<option value="tidak_divalidasi">Data Tidak Valid</option>';
                        } else {
                            echo '<option value="proses_validasi">Proses Validasi</option>';
                            echo '<option value="data_tervalidasi">Data Tervalidasi</option>';
                            echo "<option value='{$result[0]['status_validasi']}' selected>Data Tidak Valid</option>";
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