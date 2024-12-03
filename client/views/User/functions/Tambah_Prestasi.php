<?php
include('./client/components/User/Sidebar.php');
include('./server/model/Prestasi.php');
?>
<section class="admin-section">
    <div class="admin-container">
        <h1 class="font-bold kegiatan-title">Tambah Prestasi</h1>
        <div class="kegiatan-card">
            <form action="../server/proses/prestasi/TambahPrestasi.php" method="post" enctype="multipart/form-data" class="kegiatan-form">
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="nama-kompetisi" class="kegiatan-label font-bold">Nama Kompetisi</label>
                        <input type="text" id="nama-kompetisi" name="nama-kompetisi" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan nama kompetisi">
                    </div>
                    <div class="kegiatan-group">
                        <label for="tingkat-lomba" class="kegiatan-label font-bold">Tingkat Kompetisi</label>
                        <select id="tingkat-lomba" name="tingkat-lomba" class="kegiatan-input kegiatan-select font-semi-bold">
                            <option value="internasional">International</option>
                            <option value="nasional">National</option>
                            <option value="lokal">Lokal</option>
                        </select>
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="tempat-kompetisi" class="kegiatan-label font-bold">Tempat Kompetisi</label>
                        <input type="text" id="tempat-kompetisi" name="tempat-kompetisi" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan nama kompetisi">
                    </div>
                    <div class="kegiatan-group">
                        <label for="jenis-kompetisi" class="kegiatan-label font-bold">Jenis Kompetisi</label>
                        <select id="jenis-kompetisi" name="jenis-kompetisi" class="kegiatan-input kegiatan-select font-semi-bold">
                            <option value="akademik">Akademik</option>
                            <option value="non_akademik">Non Akademik</option>
                        </select>
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="tanggal-mulai" class="kegiatan-label font-bold">Tanggal Mulai</label>
                        <input type="date" id="tanggal-mulai" name="tanggal-mulai" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan nama kompetisi">
                    </div>
                    <div class="kegiatan-group">
                        <label for="tanggal-selesai" class="kegiatan-label font-bold">Tanggal Selesai</label>
                        <input type="date" id="tanggal-selesai" name="tanggal-selesai" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan nama kompetisi">
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="peringkat" class="kegiatan-label font-bold">Peringkat</label>
                        <input type="number" id="peringkat" name="peringkat" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan peringkat (1,2,3) jika ada">
                    </div>
                    <div class="kegiatan-group">
                        <label for="dosen-pembimbing" class="kegiatan-label font-bold">Dosen Pembimbing</label>
                        <input type="text" id="dosen-pembimbing" name="dosen-pembimbing" class="kegiatan-input font-semi-bold"
                            placeholder="Masukkan nama dosen pembimbing">
                    </div>
                </div>
                <div class="kegiatan-grid">
                    <div class="kegiatan-group">
                        <label for="karya" class="kegiatan-label font-bold">File Karya</label>
                        <div class="kegiatan-input-file-container">
                            <label for="karya" class="kegiatan-input-file-label">
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
                                <input id="karya" name="karya" type="file" class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                    <div class="kegiatan-group">
                        <label for="sertifikat" class="kegiatan-label font-bold">File Sertifikat</label>
                        <div class="kegiatan-input-file-container">
                            <label for="sertifikat" class="kegiatan-input-file-label">
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
                                <input id="sertifikat" name="sertifikat" type="file" class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                    <div class="kegiatan-group">
                        <label for="poster" class="kegiatan-label font-bold">Foto Poster</label>
                        <div class="kegiatan-input-file-container">
                            <label for="poster" class="kegiatan-input-file-label">
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
                                <input id="poster" name="poster" type="file" class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                    <div class="kegiatan-group">
                        <label for="dokumentasi" class="kegiatan-label font-bold">Foto Dokumentasi</label>
                        <div class="kegiatan-input-file-container">
                            <label for="dokumentasi" class="kegiatan-input-file-label">
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
                                <input id="dokumentasi" name="dokumentasi" type="file" class="kegiatan-input-file-hidden" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="kegiatan-group">
                    <label for="deskripsi" class="kegiatan-label font-bold">Deskripsi Kegiatan</label>
                    <textarea id="deskripsi" name="deskripsi" class="kegiatan-input kegiatan-deskripsi font-semi-bold"
                        placeholder="Masukkan deskripsi kegiatan"></textarea>
                </div>
                <div class="actions">
                    <button type="submit" name="submit" value="submit" class="button-primary font-bold">Submit Prestasi</button>
                </div>
            </form>
        </div>
    </div>
</section>