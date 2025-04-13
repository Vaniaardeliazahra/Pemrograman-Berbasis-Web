<?php
$bandara_asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

ksort($bandara_asal);
ksort($bandara_tujuan);

$maskapai = $asal = $tujuan = $harga = $pajak = $total = "";
$nomor = rand(100000, 999999);
$tanggal = date("d-m-Y");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maskapai = $_POST['maskapai'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $harga = (int)$_POST['harga'];

    $pajak_asal = isset($bandara_asal[$asal]) ? $bandara_asal[$asal] : 0;
    $pajak_tujuan = isset($bandara_tujuan[$tujuan]) ? $bandara_tujuan[$tujuan] : 0;
    $pajak = $pajak_asal + $pajak_tujuan;

    $total = $harga + $pajak;
}
?>
