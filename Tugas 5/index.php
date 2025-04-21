<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kampus</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        h2 { background: #444; color: white; padding: 10px; }
        form, table { background: white; padding: 15px; margin-bottom: 20px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        input, select, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 10px; padding: 10px 15px; }
    </style>
</head>
<body>

<h2>1. Data Mahasiswa</h2>
<?php include "mahasiswa.php"; ?>

<h2>2. Data Mata Kuliah</h2>
<?php include "matakuliah.php"; ?>

<h2>3. Ambil KRS</h2>
<?php include "krs.php"; ?>

</body>
</html>
