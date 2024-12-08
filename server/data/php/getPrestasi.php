<?php
require_once __DIR__ . '../../config/Database.php';

$sql = "SELECT tingkat_lomba, MONTH(dibuat_pada) AS bulan, COUNT(*) AS jumlah 
        FROM prestasi 
        GROUP BY tingkat_lomba, MONTH(dibuat_pada)
        ORDER BY tingkat_lomba, bulan";

$result = $conn->query($sql);

$regional = array_fill(0, 12, 0);
$nasional = array_fill(0, 12, 0);
$international = array_fill(0, 12, 0);

// Proses data dari query
while ($row = $result->fetch_assoc()) {
    $tingkat_lomba = $row['tingkat_lomba'];
    $bulan = $row['bulan'] - 1; // Menyesuaikan dengan indeks array (bulan dimulai dari 1, tapi array dimulai dari 0)
    $jumlah = $row['jumlah'];

    if ($tingkat_lomba == 'Regional') {
        $regional[$bulan] = $jumlah;
    } elseif ($tingkat_lomba == 'Nasional') {
        $nasional[$bulan] = $jumlah;
    } elseif ($tingkat_lomba == 'International') {
        $international[$bulan] = $jumlah;
    }
}

$conn->close();

// Mengirim data dalam format JSON
echo json_encode([
    'Regional' => $regional,
    'Nasional' => $nasional,
    'International' => $international
]);
?>