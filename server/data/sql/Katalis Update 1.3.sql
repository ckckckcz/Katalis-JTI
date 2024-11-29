-- Membuat tabel User
CREATE TABLE Users (
    id_user INT PRIMARY KEY IDENTITY(1,1),
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    role VARCHAR(20) CHECK (role IN ('admin', 'mahasiswa')) NOT NULL
);

-- Membuat tabel Mahasiswa
CREATE TABLE Mahasiswa (
    nim VARCHAR(10) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    tahun_angkatan date NOT NULL,
    status_mahasiswa VARCHAR(20) DEFAULT 'aktif' CHECK (status_mahasiswa IN ('aktif', 'nonaktif'))
);

-- Membuat tabel Admin
CREATE TABLE Admin (
    nip VARCHAR(20) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL
);

-- Membuat tabel Event
CREATE TABLE Event (
    id_event INT PRIMARY KEY IDENTITY(1,1),
    nama_event VARCHAR(100) NOT NULL,
    tingkat_lomba VARCHAR(20) CHECK (tingkat_lomba IN ('lokal', 'nasional', 'internasional')) NOT NULL,
	instansi_penyelenggara VARCHAR (255),
    deskripsi TEXT,
    tanggal_mulai DATE,
    tanggal_selesai DATE,
    url_event VARCHAR(255),
    poster_gambar VARCHAR(255),
	dibuat_pada DATETIME DEFAULT GETDATE()
	);

-- Membuat tabel Prestasi
CREATE TABLE Prestasi (
    id_prestasi INT PRIMARY KEY IDENTITY(1,1),
    id_mahasiswa VARCHAR(10),
    nama_kegiatan VARCHAR(100) NOT NULL,
    jenis_kegiatan VARCHAR(20) CHECK (jenis_kegiatan IN ('akademik', 'non_akademik')) NOT NULL,
    tanggal_mulai DATE,
    tanggal_selesai DATE,
    tingkat_lomba VARCHAR(20) CHECK (tingkat_lomba IN ('lokal', 'nasional', 'internasional')) NOT NULL,
    peringkat INT,
    lokasi VARCHAR(255),
    deskripsi TEXT,
	dosen_pembimbing VARCHAR (100),
    file_karya VARCHAR(255),
    file_poster VARCHAR(255),
    file_dokumentasi VARCHAR(255),
    file_sertifikat VARCHAR(255),
    status_validasi VARCHAR(20) CHECK (status_validasi IN ('proses_validasi', 'tidak_divalidasi', 'data_tervalidasi')) NOT NULL,
	dibuat_pada DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (id_mahasiswa) REFERENCES Mahasiswa(nim) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Membuat tabel Berita
CREATE TABLE Berita (
    id_berita INT PRIMARY KEY IDENTITY(1,1),
    id_prestasi INT,
    nama_berita VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    tanggal_upload DATE,
	dibuat_pada DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Users (username, password, role) VALUES
('2024005', 'password1', 'admin'),
('2024001', 'password2', 'admin'),
('0987654321', 'password3', 'mahasiswa'),
('1234567890', 'password4', 'mahasiswa'),
('2233445566', 'password5', 'mahasiswa');


INSERT INTO Mahasiswa (nim, nama_lengkap, prodi, tahun_angkatan, status_mahasiswa) VALUES
('1234567890', 'Cakra Wangsa M.A.W', 'Teknik Informatika', '2024-09-01', 'aktif'),
('0987654321', 'Galung Erlyan Tama', 'Teknik Informatika', '2024-09-01', 'aktif'),
('1122334455', 'Naditya P A', 'Teknik Informatika', '2024-09-01', 'aktif'),
('2233445566', 'Riovaldo Alfiyan F R', 'Teknik Informatika', '2024-09-01', 'aktif'),
('3344556677', 'Roy Wijaya', 'Teknik Informatika', '2024-09-01', 'aktif');


INSERT INTO Admin (nip, nama_lengkap) VALUES
('2024001', 'Agus Prasetyo'),
('2024002', 'Rina Kusuma'),
('2024003', 'Bambang Sugiarto'),
('2024004', 'Siti Aminah'),
('2024005', 'Doni Wahyudi');

-- Mengisi tabel Event 
INSERT INTO Event (nama_event, tingkat_lomba, instansi_penyelenggara, deskripsi, tanggal_mulai, tanggal_selesai, url_event, poster_gambar) VALUES
('Lomba Pemrograman Nasional', 'nasional', 'Kemenristek', 'Lomba Pemrograman Tingkat Nasional', '2024-05-10', '2024-05-15', 'https://lomba1.com', 'AI Innovation Challenge.jpg'),
('Lomba Pemrograman Lokal', 'lokal', 'Komunitas Pemrograman', 'Lomba Pemrograman Tingkat Lokal', '2024-03-01', '2024-03-03', 'https://lomba2.com', 'Intuitiva UI UX Competition.jpg'),
('Lomba Pemrograman Universitas', 'nasional', 'Universitas A', 'Lomba Pemrograman Tingkat Universitas', '2024-06-20', '2024-06-25', 'https://lomba3.com', 'FESIFO 2.0.jpg');

-- Mengisi tabel Prestasi dengan data dummy
INSERT INTO Prestasi (id_mahasiswa, nama_kegiatan, jenis_kegiatan, tanggal_mulai, tanggal_selesai, tingkat_lomba, peringkat, lokasi, deskripsi, dosen_pembimbing, file_karya, file_poster, file_dokumentasi, file_sertifikat) VALUES
('1234567890', 'AI Innovation Challenge', 'akademik', '2024-05-10', '2024-05-15', 'nasional', 2, 'Jakarta', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.', 'Dr. Sutrisno', 'Sqill Quest.pdf', 'AI Innovation Challenge_2024.jpg', 'dokumentasi AI Innovation Challenge.jpg', 'sertif AI Innovation Challenge.jpg'),
('0987654321', 'Intuitiva UI UX Competition', 'akademik', '2024-01-05', '2024-01-08', 'nasional', 0, 'Malang', 'Prestasi luar biasa oleh mahasiswa Teknik Informatika.', 'Dr. Budi', 'Pintar Path.pdf', 'Intuitiva UI UX Competition_2024.jpg', 'dokumentasi Intuitiva UI UX Competition.jpg', 'sertif Intuitiva UI UX Competition.jpg'),
('1122334455', 'FESIFO 2.0', 'akademik', '2024-03-20', '2024-03-25', 'nasional', 0, 'Garut', 'Prestasi membanggakan oleh mahasiswa Teknologi Informasi.', 'Dr. Sari', 'ReWear.pdf', 'FESIFO 2.0_2024.jpg', 'dokumentasi FESIFO 2.0.jpg', 'sertif FESIFO 2.0.jpg');


-- Mengisi tabel Berita
INSERT INTO Berita (id_prestasi, nama_berita, deskripsi, tanggal_upload) VALUES
(1, 'Mahasiswa Raih Juara 2 AI Innovation Challenge', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.', '2024-02-16'),
(2, 'Mahasiswa Raih 10 Besar Intuitiva UI UX Competition', 'Prestasi luar biasa oleh mahasiswa Teknik Informatika.', '2024-01-08'),
(3, 'Mahasiswa Raih 10 Besar FESIFO 2.0 ', 'Prestasi membanggakan oleh mahasiswa Teknologi Informasi.', '2024-03-26');

--rank Leaderboard
SELECT 
    ROW_NUMBER() OVER (ORDER BY SUM(
        CASE 
            WHEN p.tingkat_lomba = 'internasional' THEN 3
            WHEN p.tingkat_lomba = 'nasional' THEN 2
            WHEN p.tingkat_lomba = 'lokal' THEN 1
            ELSE 0
        END
    ) DESC) AS ranking,
    m.nama_lengkap AS nama_mahasiswa,
    m.prodi,
    SUM(
        CASE 
            WHEN p.tingkat_lomba = 'internasional' THEN 3
            WHEN p.tingkat_lomba = 'nasional' THEN 2
            WHEN p.tingkat_lomba = 'lokal' THEN 1
            ELSE 0
        END
    ) AS total_poin
FROM 
    Mahasiswa m
JOIN 
    Prestasi p ON m.nim = p.id_mahasiswa
GROUP BY 
    m.nama_lengkap, m.prodi
ORDER BY 
    total_poin DESC;
