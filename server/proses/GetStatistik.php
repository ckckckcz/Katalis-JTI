<?php

require_once '../model/Prestasi.php';

$data = new Prestasi();

$regional = array_fill(0, 12, 0);
$nasional = array_fill(0, 12, 0);
$international = array_fill(0, 12, 0);

$dataRegional = $data->getCountForStatistik('lokal');
$dataNasional = $data->getCountForStatistik('nasional');
$dataInternasional = $data->getCountForStatistik('internasional');


foreach ($dataRegional as $row) {
    $bulan = $row['bulan'] - 1;
    $jumlah = $row['jumlah'];

    $regional[$bulan] = $jumlah;
}

foreach ($dataNasional as $row) {
    $bulan = $row['bulan'] - 1;
    $jumlah = $row['jumlah'];

    $nasional[$bulan] = $jumlah;
}

foreach ($dataInternasional as $row) {
    $bulan = $row['bulan'] - 1;
    $jumlah = $row['jumlah'];

    $international[$bulan] = $jumlah;
}

echo json_encode([
    'Regional' => $regional,
    'Nasional' => $nasional,
    'International' => $international
]);

