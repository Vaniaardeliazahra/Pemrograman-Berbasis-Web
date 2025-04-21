<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form']) && $_POST['form'] == "mahasiswa") {
    $conn->query("INSERT INTO mahasiswa VALUES ('$_POST[npm]', '$_POST[nama]', '$_POST[jurusan]', '$_POST[alamat]')");
}
?>

<form method="post">
    <input type="hidden" name="form" value="mahasiswa">
    NPM: <input name="npm" required>
    Nama: <input name="nama" required>
    Jurusan: 
    <select name="jurusan" required>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
    </select>
    Alamat: <textarea name="alamat"></textarea>
    <button type="submit">Simpan Mahasiswa</button>
</form>

<?php
$result = $conn->query("SELECT * FROM mahasiswa");
echo "<table><tr><th>NPM</th><th>Nama</th><th>Jurusan</th><th>Alamat</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>$row[npm]</td><td>$row[nama]</td><td>$row[jurusan]</td><td>$row[alamat]</td></tr>";
}
echo "</table>";
?>
