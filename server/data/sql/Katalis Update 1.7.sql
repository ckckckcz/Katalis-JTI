CREATE TABLE Users (
    id_user INT PRIMARY KEY IDENTITY(1,1),
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    role VARCHAR(20) CHECK (role IN ('admin', 'mahasiswa')) NOT NULL
);

CREATE TABLE Mahasiswa (
    nim VARCHAR(20) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    tahun_angkatan date NOT NULL,
    status_mahasiswa VARCHAR(20) DEFAULT 'aktif' CHECK (status_mahasiswa IN ('aktif', 'nonaktif'))
);

CREATE TABLE Dosen (
	nip VARCHAR(20) PRIMARY KEY,	
    nama_lengkap VARCHAR(50) NOT NULL,
    Jurusan VARCHAR(100) NOT NULL
);

CREATE TABLE Admin (
    nip VARCHAR(20) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL
);

CREATE TABLE Event (
    id_event INT PRIMARY KEY IDENTITY(1,1),
    nama_event VARCHAR(100) NOT NULL,
    tingkat_lomba VARCHAR(20) CHECK (tingkat_lomba IN ('lokal', 'nasional', 'internasional')) NOT NULL,
	instansi_penyelenggara VARCHAR (255)NOT NULL,
    deskripsi TEXT,
    tanggal_mulai DATE NOT NULL,
    tanggal_selesai DATE NOT NULL,
    url_event VARCHAR(255) NOT NULL,
    poster_gambar VARCHAR(255) NOT NULL,
	dibuat_pada DATE DEFAULT GETDATE()
	);

CREATE TABLE Prestasi (
    id_prestasi INT PRIMARY KEY IDENTITY(1,1),
    id_mahasiswa VARCHAR(20),
	id_dosen VARCHAR (20),
    nama_kegiatan VARCHAR(100) NOT NULL,
    jenis_kegiatan VARCHAR(20) CHECK (jenis_kegiatan IN ('akademik', 'non_akademik')) NOT NULL,
    tanggal_mulai DATE NOT NULL,
    tanggal_selesai DATE NOT NULL,
    tingkat_lomba VARCHAR(20) CHECK (tingkat_lomba IN ('lokal', 'nasional', 'internasional')) NOT NULL,
    peringkat INT NOT NULL,
    lokasi VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    file_poster VARCHAR(255) NOT NULL,
    file_dokumentasi VARCHAR(255) NOT NULL,
    file_sertifikat VARCHAR(255)NOT NULL,
	surat_tugas VARCHAR (255) NOT NULL,
	status_validasi VARCHAR(20) CHECK (status_validasi IN ('proses_validasi', 'tidak_divalidasi', 'data_tervalidasi')) NOT NULL,
	dibuat_pada DATE DEFAULT GETDATE(),
    FOREIGN KEY (id_mahasiswa) REFERENCES Mahasiswa(nim) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_dosen) REFERENCES Dosen(nip) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Berita (
    id_berita INT PRIMARY KEY IDENTITY(1,1),
    id_prestasi INT,
    nama_berita VARCHAR(255) NOT NULL,
    deskripsi TEXT,
	url_demo VARCHAR (1025) NOT NULL,
	tanggal_upload DATE DEFAULT GETDATE(),
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Notifikasi (
    id_notifikasi INT PRIMARY KEY IDENTITY(1,1),
    id_prestasi INT NULL,
    id_user INT NULL,
    pesan TEXT NOT NULL, 
    status_baca BIT DEFAULT 0, 
    dibuat_pada DATE DEFAULT GETDATE(), 
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_user) REFERENCES Users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Users (username, password, role) VALUES
('2024005', 'password1', 'admin'),
('2024001', 'password2', 'admin'),
('2341720032', 'password3', 'mahasiswa'),
('2341720054', 'password4', 'mahasiswa'),
('24410702300', 'password5', 'mahasiswa'),
('2341720209', 'password6', 'mahasiswa'),
('2341720120', 'password7', 'mahasiswa'),
('22341760184', 'password8', 'mahasiswa'),
('2341720092', 'password9', 'mahasiswa');


INSERT INTO Mahasiswa (nim, nama_lengkap, prodi, tahun_angkatan, status_mahasiswa) VALUES
('2341720032', 'Cakra Wangsa M.A.W', 'Teknik Informatika', '2024-09-01', 'aktif'),
('2341720054', 'Galung Erlyan Tama', 'Teknik Informatika', '2024-09-01', 'aktif'),
('24410702300', 'Naditya Prasetya Andino', 'Teknik Informatika', '2024-09-01', 'aktif'),
('2341720209', 'Riovaldo Alfiyan Fahmi Rahman', 'Teknik Informatika', '2024-09-01', 'aktif'),
('2341720120', 'Roy Wijaya', 'Teknik Informatika', '2024-09-01', 'aktif'),
('2341760184', 'Yonanda Mayla Rusdiati', 'Sistem Informasi Bisnis', '2024-09-01', 'aktif'),
('2341720092', 'Fikri Muhammad Abdillah', 'Teknik Informatika', '2024-09-01', 'aktif');


INSERT INTO Admin (nip, nama_lengkap) VALUES
('2024001', 'Agus Prasetyo'),
('2024002', 'Rina Kusuma'),
('2024003', 'Bambang Sugiarto'),
('2024004', 'Siti Aminah'),
('2024005', 'Doni Wahyudi');

INSERT INTO Dosen (nip, nama_lengkap, jurusan) VALUES
('197903132008121002', 'Arief Prasetyo, S.Kom', 'Teknologi Informasi'),
('197305102008011010', 'Indra Dharma Wijaya, ST., MMT', 'Teknologi Informasi'),
('198211302014041001', 'Luqman Affandi, S.Kom., MMSI', 'Teknologi Informasi');

INSERT INTO Event (nama_event, tingkat_lomba, instansi_penyelenggara, deskripsi, tanggal_mulai, tanggal_selesai, url_event, poster_gambar) VALUES
('AI Innovation Challenge', 'nasional', 'Universitas Indonesia', 'Lomba Pemrograman Machine Learning Tingkat Nasional', '2024-05-10', '2024-05-15', 'https://compfest.id/competition', 'AI Innovation Challenge_2024.jpg'),
('Capture The Flag', 'nasional', 'Universitas Indonesia', 'Lomba Capture The Flag Cyber Security', '2024-08-31', '2024-10-06', 'https://compfest.id/competition', 'Cyber Security Compfest_2024.jpg'),
('KMIPN VI', 'nasional', 'Politeknik Negeri Jakarta', 'Lomba Pemrograman Internet Of Things', '2024-07-01', '2024-07-04', 'https://tik.pnj.ac.id/readmore/kmipn-vi', 'KMIPN VI_2024.jpg'),
('Intuitiva UI UX Competition', 'lokal', 'YOTH', 'Lomba Desain UI/UX', '2024-03-04', '2024-03-17', 'https://linktr.ee/Intultiva24', 'Intuitiva UI UX Competition_2024.jpg'),
('FESIFO 2.0', 'nasional', 'Insitut Pendidikan Garut', 'Lomba Desain UI/UX', '2024-05-21', '2024-05-25', 'https://linktr.ee/FESIFO2024', 'FESIFO 2.0_2024.jpg');


INSERT INTO Prestasi (id_mahasiswa, id_dosen, nama_kegiatan, jenis_kegiatan, tanggal_mulai, tanggal_selesai, tingkat_lomba, peringkat, lokasi, deskripsi, file_poster, file_dokumentasi, file_sertifikat, surat_tugas, status_validasi) VALUES
('2341720209', '197903132008121002', 'AI Innovation Challenge', 'akademik', '2024-05-10', '2024-05-15', 'nasional', 2, 'Jakarta', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.', 'poster AI Innovation Challenge_1.jpg', 'dokumentasi AI Innovation Challenge_1.jpg', 'sertif AI Innovation Challenge_1.jpg', 'surat_tugas_AI_Innovation_Challenge_1.pdf', 'proses_validasi'),
('2341720092', '197903132008121002', 'Capture The Flag Compfest', 'akademik', '2024-08-31', '2024-09-01', 'nasional', 1, 'Jakarta', 'Prestasi yang sangat membanggakan diperoleh oleh mahasiswa Teknologi Informasi.', 'poster CTF Compfest_2.jpg', 'dokumentasi CTFCompfest_2.jpg', 'sertif CTFCompfest_2.pdf', 'ST COMPFEST 24_2.pdf', 'proses_validasi'),
('2341760184', '197305102008011010', 'KMIPN VI', 'akademik', '2024-07-01', '2024-07-04', 'nasional', 3, 'Jakarta', 'Prestasi yang sangat membanggakan diperoleh oleh mahasiswa Sistem Informasi Bisnis.', 'poster KMIPN VI_3.jpg', 'dokumentasi KMIPN VI_3.jpg', 'sertif KMIPN VI_3.pdf', 'SURAT TUGAS KMIPN_3.pdf', 'proses_validasi'),
('2341720209', '197305102008011010', 'Intuitiva UI UX Competition', 'akademik', '2024-03-04', '2024-01-17', 'nasional', 0, 'Malang', 'Prestasi luar biasa oleh mahasiswa Teknik Informatika.', 'poster Intuitiva UI UX Competition_4.jpg', 'dokumentasi Intuitiva UI UX Competition_4.jpg', 'sertif Intuitiva UI UX Competition_4.jpg', 'surat_tugas_Intuitiva_UI_UX_Competition_5.pdf', 'proses_validasi'),
('2341720209', '198211302014041001', 'FESIFO 2.0', 'akademik', '2024-05-21', '2024-05-25', 'nasional', 0, 'Garut', 'Prestasi membanggakan oleh mahasiswa Teknologi Informasi.', 'poster FESIFO 2.0_5.jpg', 'dokumentasi FESIFO 2.0_5.jpg', 'sertif FESIFO 2.0_5.jpg', 'surat_tugas_FESIFO_2.0_5.pdf', 'proses_validasi');

INSERT INTO Berita (id_prestasi, nama_berita, deskripsi, url_demo) VALUES
(1, 'Mahasiswa Raih Juara 2 AI Innovation Challenge', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.', 'https://youtu.be/oaYWN9_gLzk?si=a0J-4dT05GALLbQJ'),
(2, 'Mahasiswa Raih Juara 1 Capture The Flag Compfest', 'Prestasi yang sangat membanggakan diperoleh oleh mahasiswa Teknologi Informasi.', 'https://youtu.be/rZZXTcz19G0?si=2bcPuLf4jmdLwhn-'), 
(3, 'Mahasiswa Raih Juara 3 KMIPN VI', 'Prestasi yang sangat membanggakan diperoleh oleh mahasiswa Sistem Informasi Bisnis.', 'https://youtu.be/3K-yPSmZoxA?si=HZrqQntNATiluWze'),

--Notifikasi
INSERT INTO Notifikasi (id_prestasi, id_user, pesan, status_baca)
VALUES 
(1, 1, 'Prestasi telah divalidasi oleh admin.', 0),
(2, 2, 'Prestasi Anda sedang diproses validasi.', 0),
(3, 3, 'Selamat! Prestasi Anda telah divalidasi.', 1);

--admin
INSERT INTO Notifikasi (id_prestasi, id_user, pesan, status_baca)
VALUES
(1, 1, 'Harap segera verifikasi prestasi.', 0),
(2, 1, 'Proses validasi prestasi sedang berjalan.', 0),
(3, 1, 'Prestasi telah berhasil divalidasi.', 0);

--mahasiswa
INSERT INTO Notifikasi (id_prestasi, id_user, pesan, status_baca)
VALUES
(1, 2, 'Silakan lengkapi dokumen prestasi.', 0),
(2, 2, 'Dokumen prestasi sedang diverifikasi.', 0),
(3, 2, 'Prestasi Anda telah divalidasi.', 0),
(1, 3, 'Data anda kurang valid.', 0),
(2, 3, 'Input ulang data File sertifikat!.', 0),
(3, 3, 'Selamat! Verifikasi prestasi telah selesai.', 0);


--Leaderboard
SELECT DISTINCT
    ROW_NUMBER() OVER (ORDER BY total_poin DESC) AS ranking,
    nama_mahasiswa,
    prodi,
    total_poin
FROM (
    SELECT 
        m.nama_lengkap AS nama_mahasiswa,
        m.prodi,
        SUM(
            CASE 
                WHEN p.tingkat_lomba = 'internasional' AND p.peringkat = 1 THEN 6
                WHEN p.tingkat_lomba = 'internasional' AND p.peringkat = 2 THEN 5
                WHEN p.tingkat_lomba = 'internasional' AND p.peringkat = 3 THEN 4
                WHEN p.tingkat_lomba = 'nasional' AND p.peringkat = 1 THEN 4
                WHEN p.tingkat_lomba = 'nasional' AND p.peringkat = 2 THEN 3
                WHEN p.tingkat_lomba = 'nasional' AND p.peringkat = 3 THEN 2
                WHEN p.tingkat_lomba = 'lokal' AND p.peringkat = 1 THEN 2
                WHEN p.tingkat_lomba = 'lokal' AND p.peringkat = 2 THEN 1
                WHEN p.tingkat_lomba = 'lokal' AND p.peringkat = 3 THEN 0.5
                ELSE 0
            END
        ) AS total_poin
    FROM 
        Mahasiswa m
    JOIN 
        Prestasi p ON m.nim = p.id_mahasiswa
    GROUP BY 
        m.nama_lengkap, m.prodi
) AS Subquery
ORDER BY 
    total_poin DESC;



--Filter Mawapres
SELECT *
FROM Prestasi
where DAY(dibuat_pada) BETWEEN 1 AND 30;

--export data Mawapres
SELECT 
    p.id_prestasi,
    m.nama_lengkap AS nama_mahasiswa,
    p.id_mahasiswa AS nim_mahasiswa,
    p.jenis_kegiatan,
    p.tingkat_lomba,
    p.peringkat,
    p.lokasi,
    CONCAT(p.tanggal_mulai, ' s.d. ', p.tanggal_selesai) AS tanggal_mulai_tanggal_selesai,
    p.deskripsi,
    p.dibuat_pada AS tanggal_dibuat
FROM 
    Prestasi p
JOIN 
    Mahasiswa m ON p.id_mahasiswa = m.nim;

	SELECT id_prestasi FROM Prestasi;

--traffic update
WITH AllMonths AS (
    SELECT 1 AS bulan
    UNION ALL
    SELECT 2
    UNION ALL
    SELECT 3
    UNION ALL
    SELECT 4
    UNION ALL
    SELECT 5
    UNION ALL
    SELECT 6
    UNION ALL
    SELECT 7
    UNION ALL
    SELECT 8
    UNION ALL
    SELECT 9
    UNION ALL
    SELECT 10
    UNION ALL
    SELECT 11
    UNION ALL
    SELECT 12
)
SELECT 
    m.bulan,
    COALESCE(p.tingkat_lomba, 'nasional') AS tingkat_lomba, 
    COUNT(p.id_prestasi) AS hasil_count
FROM AllMonths m
LEFT JOIN Prestasi p
    ON m.bulan = MONTH(p.dibuat_pada) 
   AND YEAR(p.dibuat_pada) = YEAR(GETDATE())
   AND p.tingkat_lomba = 'nasional' -- Filter tingkat lomba yang diinginkan
GROUP BY m.bulan, p.tingkat_lomba
ORDER BY m.bulan;


--notifikasi
--mhs
CREATE OR ALTER PROCEDURE GetMahasiswaNotifikasi
    @nim VARCHAR(20)
AS
BEGIN
    SELECT 
        n.id_notifikasi,
        COALESCE(p.nama_kegiatan, 'Informasi Umum') AS prestasi,
        n.pesan,
        n.dibuat_pada,
        n.status_baca AS status,
        n.id_notifikasi AS id_status
    FROM Notifikasi n
    LEFT JOIN Prestasi p ON n.id_prestasi = p.id_prestasi
    LEFT JOIN Mahasiswa m ON p.id_mahasiswa = m.nim
    WHERE m.nim = @nim 
    ORDER BY n.dibuat_pada DESC;
END;


--atmin
CREATE OR ALTER PROCEDURE GetAdminNotifikasi
    @nip_admin VARCHAR(20)
AS
BEGIN
    SELECT 
        n.id_notifikasi,
        COALESCE(p.nama_kegiatan, 'Informasi Umum') AS prestasi,
        n.pesan,
        n.dibuat_pada,
        n.status_baca AS status,
        n.id_notifikasi AS id_status,
        COALESCE(m.nama_lengkap, 'Sistem') AS mahasiswa_nama,
        COALESCE(m.nim, 'N/A') AS mahasiswa_nim,
        COALESCE(p.tingkat_lomba, 'N/A') AS prestasi_tingkat,
        COALESCE(p.status_validasi, 'N/A') AS status_validasi
    FROM Notifikasi n
    LEFT JOIN Prestasi p ON n.id_prestasi = p.id_prestasi
    LEFT JOIN Mahasiswa m ON p.id_mahasiswa = m.nim
    LEFT JOIN Users u ON n.id_user = u.id_user
    WHERE u.username = @nip_admin
    ORDER BY n.dibuat_pada DESC;
END;




EXEC GetMahasiswaNotifikasi @nim = '2341760184'

EXEC GetAdminNotifikasi @nip_admin = '2024005'

--membuat notifikasi baru
CREATE OR ALTER PROCEDURE CreateNotification
    @id_prestasi INT = NULL,
    @id_user INT = NULL,
    @pesan TEXT
AS
BEGIN
    INSERT INTO Notifikasi (id_prestasi, id_user, pesan)
    VALUES (@id_prestasi, @id_user, @pesan);
    
    SELECT SCOPE_IDENTITY() AS new_notification_id;
END;

-- Menambah notifikasi baru
EXEC CreateNotification 
    @id_prestasi = 2, 
    @id_user = 2, 
    @pesan = 'Data anda Tidak Lengkap!.';



--menandai notifikasi jika sudah dibaca
CREATE OR ALTER PROCEDURE MarkNotificationAsRead
    @id_notifikasi INT
AS
BEGIN
    UPDATE Notifikasi
    SET status_baca = 1
    WHERE id_notifikasi = @id_notifikasi;
END;

-- Menandai notifikasi dengan id_notifikasi = 1 sebagai telah dibaca
EXEC MarkNotificationAsRead 
    @id_notifikasi = 1;


--melihat notifikasi yang sudah dibaca
CREATE OR ALTER PROCEDURE GetReadNotifications
    @id_user INT
AS
BEGIN
    SELECT 
        n.id_notifikasi,
        COALESCE(p.nama_kegiatan, 'Informasi Umum') AS prestasi,
        n.pesan,
        n.dibuat_pada,
        n.status_baca AS status,
        n.id_notifikasi AS id_status
    FROM Notifikasi n
    LEFT JOIN Prestasi p ON n.id_prestasi = p.id_prestasi
    WHERE n.id_user = @id_user AND n.status_baca = 1
    ORDER BY n.dibuat_pada DESC;
END;


-- Melihat notifikasi yang telah dibaca oleh user dengan id_user = 1
EXEC GetReadNotifications 
    @id_user = 1;


--view kegiatan mhs
CREATE VIEW ViewPrestasi AS
SELECT
    nama_kegiatan,
    jenis_kegiatan,
    tanggal_mulai,
    tanggal_selesai,
    tingkat_lomba,
    lokasi,
    deskripsi
FROM Prestasi;

SELECT * FROM ViewPrestasi;

SELECT * FROM ViewPrestasi
WHERE nama_kegiatan = 'KMIPN VI'
ORDER BY tanggal_mulai DESC;
