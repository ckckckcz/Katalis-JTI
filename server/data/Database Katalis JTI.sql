create database KATALIS;

use KATALIS;

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
	created_at DATETIME DEFAULT GETDATE()
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
	created_at DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (id_mahasiswa) REFERENCES Mahasiswa(nim) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Membuat tabel Berita
CREATE TABLE Berita (
    id_berita INT PRIMARY KEY IDENTITY(1,1),
    id_prestasi INT,
    nama_berita VARCHAR(50) NOT NULL,
    deskripsi TEXT,
    tanggal_upload DATE,
	created_at DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Menambahkan relasi User ke Mahasiswa dan Dosen
-- Menambahkan kolom nim_mahasiswa dan nip_dosen
--ALTER TABLE Users
--ADD nim_mahasiswa VARCHAR(10),
  --  nip_admin VARCHAR(20);

drop table Users;

-- Menambahkan relasi nim_mahasiswa ke tabel Mahasiswa
--ALTER TABLE Users
--ADD CONSTRAINT FK_User_Mahasiswa
--FOREIGN KEY (username) REFERENCES Mahasiswa(nim)
--ON DELETE CASCADE
--ON UPDATE CASCADE;

-- Menambahkan relasi nip_dosen ke tabel Dosen
--ALTER TABLE Users
--ADD CONSTRAINT FK_User_Admin
--FOREIGN KEY (username) REFERENCES Admin(nip)
--ON DELETE CASCADE
--ON UPDATE CASCADE;

select * from Users;

drop database KATALIS;


--dummy insert table masing masing table--

-- Insert dummy data into Users table
INSERT INTO Users (username, password, role) VALUES
('admin1', 'adminpass', 'admin'),
('mhs1', 'mhspass1', 'mahasiswa'),
('mhs2', 'mhspass2', 'mahasiswa'),
('admin2', 'adminpass2', 'admin'),
('mhs3', 'mhspass3', 'mahasiswa');

-- Insert dummy data into Mahasiswa table
INSERT INTO Mahasiswa (nim, nama_lengkap, prodi, tahun_angkatan, status_mahasiswa) VALUES
('MHS001', 'Budi Santoso', 'Teknik Informatika', '2020-08-15', 'aktif'),
('MHS002', 'Siti Nurhayati', 'Sistem Informasi', '2021-08-15', 'aktif'),
('MHS003', 'Agus Setiawan', 'Teknik Mesin', '2019-08-15', 'nonaktif'),
('MHS004', 'Dewi Permata', 'Teknik Elektro', '2020-08-15', 'aktif'),
('MHS005', 'Rudi Hartono', 'Teknik Sipil', '2018-08-15', 'nonaktif');

-- Insert dummy data into Admin table
INSERT INTO Admin (nip, nama_lengkap) VALUES
('12345', 'Suhendra'),
('54321', 'Yuniarti'),
('67890', 'Rahmat Hidayat'),
('98765', 'Sari Dewi'),
('45678', 'Agung Santoso');

-- Insert dummy data into Event table
INSERT INTO Event (nama_event, tingkat_lomba, instansi_penyelenggara, deskripsi, tanggal_mulai, tanggal_selesai, url_event, poster_gambar) VALUES
('Lomba Pemrograman Nasional', 'nasional', 'Kemenristek', 'Lomba Pemrograman Tingkat Nasional', '2024-05-10', '2024-05-15', 'https://lomba1.com', 'poster1.jpg'),
('Festival Seni Lokal', 'lokal', 'Komunitas Seni', 'Festival Seni Lokal Tahunan', '2024-03-01', '2024-03-03', 'https://lomba2.com', 'poster2.jpg'),
('Olimpiade Matematika', 'nasional', 'Universitas A', 'Olimpiade Matematika Nasional', '2024-06-20', '2024-06-25', 'https://lomba3.com', 'poster3.jpg'),
('Kompetisi Robotika', 'internasional', 'Robotika Global', 'Kompetisi Robotika Internasional', '2024-08-10', '2024-08-15', 'https://lomba4.com', 'poster4.jpg'),
('Pameran Teknologi', 'lokal', 'Tech Expo', 'Pameran Teknologi Terbaru', '2024-09-15', '2024-09-18', 'https://lomba5.com', 'poster5.jpg');

-- Insert dummy data into Prestasi table
INSERT INTO Prestasi (id_mahasiswa, nama_kegiatan, jenis_kegiatan, tanggal_mulai, tanggal_selesai, tingkat_lomba, peringkat, lokasi, deskripsi, dosen_pembimbing, file_karya, file_poster, file_dokumentasi, file_sertifikat) VALUES
('MHS001', 'Kompetisi Pemrograman', 'akademik', '2024-02-10', '2024-02-15', 'nasional', 'Juara 1', 'Jakarta', 'Kompetisi Pemrograman Nasional', 'Dr. Suhendra', 'karya1.pdf', 'poster1.jpg', 'doc1.jpg', 'sertifikat1.jpg'),
('MHS002', 'Lomba Debat', 'non_akademik', '2024-01-05', '2024-01-07', 'lokal', 'Juara 2', 'Bandung', 'Lomba Debat Mahasiswa', 'Dr. Yuniarti', 'karya2.pdf', 'poster2.jpg', 'doc2.jpg', 'sertifikat2.jpg'),
('MHS003', 'Olimpiade Fisika', 'akademik', '2024-03-20', '2024-03-25', 'nasional', 'Juara 3', 'Yogyakarta', 'Olimpiade Fisika Nasional', 'Dr. Rahmat Hidayat', 'karya3.pdf', 'poster3.jpg', 'doc3.jpg', 'sertifikat3.jpg'),
('MHS004', 'Kompetisi Fotografi', 'non_akademik', '2024-04-01', '2024-04-03', 'lokal', 'Juara Harapan', 'Surabaya', 'Kompetisi Fotografi Mahasiswa', 'Dr. Sari Dewi', 'karya4.pdf', 'poster4.jpg', 'doc4.jpg', 'sertifikat4.jpg'),
('MHS005', 'Lomba Menulis Essay', 'akademik', '2024-05-15', '2024-05-17', 'internasional', 'Juara 1', 'Bali', 'Lomba Menulis Essay Internasional', 'Dr. Agung Santoso', 'karya5.pdf', 'poster5.jpg', 'doc5.jpg', 'sertifikat5.jpg');

-- Insert dummy data into Berita table
INSERT INTO Berita (id_prestasi, nama_berita, deskripsi, tanggal_upload) VALUES
(1, 'Mahasiswa Raih Juara 1 di Kompetisi Pemrograman', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.', '2024-02-16'),
(2, 'Mahasiswa Raih Juara 2 di Lomba Debat', 'Prestasi luar biasa oleh mahasiswa Sistem Informasi.', '2024-01-08'),
(3, 'Mahasiswa Raih Juara 3 di Olimpiade Fisika', 'Prestasi membanggakan oleh mahasiswa Teknik Mesin.', '2024-03-26'),
(4, 'Mahasiswa Teknik Elektro Ikuti Kompetisi Fotografi', 'Mahasiswa Teknik Elektro berhasil masuk juara harapan.', '2024-04-04'),
(5, 'Mahasiswa Teknik Sipil Juara di Lomba Menulis', 'Prestasi internasional oleh mahasiswa Teknik Sipil.', '2024-05-18');



