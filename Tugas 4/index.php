<?php 
include 'tiket_pesawat.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Rute Penerbangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Pendaftaran Rute Penerbangan</h2>
        <form method="POST">
            Nama Maskapai: <input type="text" name="maskapai" value="<?= isset($maskapai) ? htmlspecialchars($maskapai) : '' ?>" required><br><br>

            Bandara Asal:
            <select name="asal" required>
                <?php foreach ($bandara_asal as $nama => $pjk): ?>
                    <option value="<?= $nama ?>" <?= (isset($asal) && $asal == $nama) ? 'selected' : '' ?>><?= $nama ?></option>
                <?php endforeach; ?>
            </select><br><br>

            Bandara Tujuan:
            <select name="tujuan" required>
                <?php foreach ($bandara_tujuan as $nama => $pjk): ?>
                    <option value="<?= $nama ?>" <?= (isset($tujuan) && $tujuan == $nama) ? 'selected' : '' ?>><?= $nama ?></option>
                <?php endforeach; ?>
            </select><br><br>

            Harga Tiket: <input type="number" name="harga" value="<?= isset($harga) ? htmlspecialchars($harga) : '' ?>" required><br><br>

            <input type="submit" value="Proses">
        </form>

        <?php if (isset($total) && $total): ?>
            <div class="hasil">
            <h2>Hasil Pendaftaran</h2>
                <p><strong>Nomor:</strong> <?= $nomor ?></p>
                <p><strong>Tanggal:</strong> <?= $tanggal ?></p>
                <p><strong>Nama Maskapai:</strong> <?= $maskapai ?></p>
                <p><strong>Asal Penerbangan:</strong> <?= $asal ?></p>
                <p><strong>Tujuan Penerbangan:</strong> <?= $tujuan ?></p>
                <p><strong>Harga Tiket:</strong> Rp <?= number_format($harga, 0, ',', '.') ?></p>
                <p><strong>Pajak:</strong> Rp <?= number_format($pajak, 0, ',', '.') ?></p>
                <p><strong>Total Harga Tiket:</strong> Rp <?= number_format($total, 0, ',', '.') ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
