CREATE DATABASE KATALIS_NEW;

use KATALIS_NEW

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
    peringkat VARCHAR(20),
    lokasi VARCHAR(255),
    deskripsi TEXT,
	dosen_pembimbing VARCHAR (100),
    file_karya VARCHAR(255),
    file_poster VARCHAR(255),
    file_dokumentasi VARCHAR(255),
    file_sertifikat VARCHAR(255),
	dibuat_pada DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (id_mahasiswa) REFERENCES Mahasiswa(nim) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Membuat tabel Berita
CREATE TABLE Berita (
    id_berita INT PRIMARY KEY IDENTITY(1,1),
    id_prestasi INT,
    nama_berita VARCHAR(50) NOT NULL,
    deskripsi TEXT,
    tanggal_upload DATE,
	dibuat_pada DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO Users (username, password, role) VALUES
('admin1', 'password1', 'admin'),
('admin2', 'password2', 'admin'),
('mahasiswa1', 'password3', 'mahasiswa'),
('mahasiswa2', 'password4', 'mahasiswa'),
('mahasiswa3', 'password5', 'mahasiswa');


INSERT INTO Mahasiswa (nim, nama_lengkap, prodi, tahun_angkatan, status_mahasiswa) VALUES
('1234567890', 'Budi Santoso', 'Teknik Informatika', '2024-09-01', 'aktif'),
('0987654321', 'Ani Wijaya', 'Sistem Informasi', '2024-09-01', 'aktif'),
('1122334455', 'Cahya Putra', 'Teknik Elektro', '2024-09-01', 'aktif'),
('2233445566', 'Dewi Lestari', 'Teknik Mesin', '2024-09-01', 'aktif'),
('3344556677', 'Eko Prasetyo', 'Teknik Sipil', '2024-09-01', 'aktif');


INSERT INTO Admin (nip, nama_lengkap) VALUES
('2024001', 'Agus Prasetyo'),
('2024002', 'Rina Kusuma'),
('2024003', 'Bambang Sugiarto'),
('2024004', 'Siti Aminah'),
('2024005', 'Doni Wahyudi');


INSERT INTO Event (nama_event, tingkat_lomba, instansi_penyelenggara, deskripsi, tanggal_mulai, tanggal_selesai, url_event, poster_gambar) VALUES
('Lomba Pemrograman Nasional', 'nasional', 'Kemenristek', 'Lomba Pemrograman Tingkat Nasional', '2024-05-10', '2024-05-15', 'https://lomba1.com', 'LOCAL_1234567890_Lomba Pemrograman Nasional_2024-05-10.jpg'),
('Festival Seni Lokal', 'lokal', 'Komunitas Seni', 'Festival Seni Lokal Tahunan', '2024-03-01', '2024-03-03', 'https://lomba2.com', 'LOCAL_0987654321_Festival Seni Lokal_2024-03-01.jpg'),
('Olimpiade Matematika', 'nasional', 'Universitas A', 'Olimpiade Matematika Nasional', '2024-06-20', '2024-06-25', 'https://lomba3.com', 'LOCAL_1122334455_Olimpiade Matematika_2024-06-20.jpg'),
('Kompetisi Robotika', 'internasional', 'Robotika Global', 'Kompetisi Robotika Internasional', '2024-08-10', '2024-08-15', 'https://lomba4.com', 'LOCAL_2233445566_Kompetisi Robotika_2024-08-10.jpg'),
('Pameran Teknologi', 'lokal', 'Tech Expo', 'Pameran Teknologi Terbaru', '2024-09-15', '2024-09-18', 'https://lomba5.com', 'LOCAL_3344556677_Pameran Teknologi_2024-09-15.jpg');


INSERT INTO Prestasi (id_mahasiswa, nama_kegiatan, jenis_kegiatan, tanggal_mulai, tanggal_selesai, tingkat_lomba, peringkat, lokasi, deskripsi, dosen_pembimbing, file_karya, file_poster, file_dokumentasi, file_sertifikat) VALUES
('1234567890', 'Kompetisi Pemrograman', 'akademik', '2024-05-10', '2024-05-15', 'nasional', 'Juara 1', 'Jakarta', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.', 'Dr. Sutrisno', 'LOCAL_1234567890_Kompetisi Pemrograman_2024-05-10_Karya.pdf', 'LOCAL_1234567890_Kompetisi Pemrograman_2024-05-10_Poster.jpg', 'LOCAL_1234567890_Kompetisi Pemrograman_2024-05-10_Dokumentasi.jpg', 'LOCAL_1234567890_Kompetisi Pemrograman_2024-05-10_Sertifikat.pdf'),
('0987654321', 'Lomba Debat', 'non_akademik', '2024-01-05', '2024-01-08', 'nasional', 'Juara 2', 'Surabaya', 'Prestasi luar biasa oleh mahasiswa Sistem Informasi.', 'Dr. Budi', 'LOCAL_0987654321_Lomba Debat_2024-01-05_Karya.pdf', 'LOCAL_0987654321_Lomba Debat_2024-01-05_Poster.jpg', 'LOCAL_0987654321_Lomba Debat_2024-01-05_Dokumentasi.jpg', 'LOCAL_0987654321_Lomba Debat_2024-01-05_Sertifikat.pdf'),
('1122334455', 'Olimpiade Fisika', 'akademik', '2024-03-20', '2024-03-25', 'nasional', 'Juara 3', 'Bandung', 'Prestasi membanggakan oleh mahasiswa Teknik Mesin.', 'Dr. Sari', 'LOCAL_1122334455_Olimpiade Fisika_2024-03-20_Karya.pdf', 'LOCAL_1122334455_Olimpiade Fisika_2024-03-20_Poster.jpg', 'LOCAL_1122334455_Olimpiade Fisika_2024-03-20_Dokumentasi.jpg', 'LOCAL_1122334455_Olimpiade Fisika_2024-03-20_Sertifikat.pdf'),
('2233445566', 'Kompetisi Fotografi', 'non_akademik', '2024-04-01', '2024-04-04', 'lokal', 'Juara Harapan', 'Malang', 'Mahasiswa Teknik Elektro berhasil masuk juara harapan.', 'Dr. Wulan', 'LOCAL_2233445566_Kompetisi Fotografi_2024-04-01_Karya.pdf', 'LOCAL_2233445566_Kompetisi Fotografi_2024-04-01_Poster.jpg', 'LOCAL_2233445566_Kompetisi Fotografi_2024-04-01_Dokumentasi.jpg', 'LOCAL_2233445566_Kompetisi Fotografi_2024-04-01_Sertifikat.pdf'),
('3344556677', 'Lomba Menulis', 'non_akademik', '2024-05-15', '2024-05-18', 'internasional', 'Juara 1', 'Yogyakarta', 'Prestasi internasional oleh mahasiswa Teknik Sipil.', 'Dr. Arif', 'LOCAL_3344556677_Lomba Menulis_2024-05-15_Karya.pdf', 'LOCAL_3344556677_Lomba Menulis_2024-05-15_Poster.jpg', 'LOCAL_3344556677_Lomba Menulis_2024-05-15_Dokumentasi.jpg', 'LOCAL_3344556677_Lomba Menulis_2024-05-15_Sertifikat.pdf');

-- tabel Berita
INSERT INTO Berita (id_prestasi, nama_berita, deskripsi, tanggal_upload) VALUES
(16, 'Mahasiswa Raih Juara 1 di Kompetisi Pemrograman', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.', '2024-02-16'),
(17, 'Mahasiswa Raih Juara 2 di Lomba Debat', 'Prestasi luar biasa oleh mahasiswa Sistem Informasi.', '2024-01-08'),
(18, 'Mahasiswa Raih Juara 3 di Olimpiade Fisika', 'Prestasi membanggakan oleh mahasiswa Teknik Mesin.', '2024-03-26'),
(19, 'Mahasiswa Teknik Elektro Ikuti Kompetisi Fotografi', 'Mahasiswa Teknik Elektro berhasil masuk juara harapan.', '2024-04-04'),
(20, 'Mahasiswa Teknik Sipil Juara di Lomba Menulis', 'Prestasi internasional oleh mahasiswa Teknik Sipil.', '2024-05-18');



select * from Users

SELECT id_prestasi, id_mahasiswa, nama_kegiatan FROM Prestasi;

drop table 



