<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form']) && $_POST['form'] == "matakuliah") {
    $conn->query("INSERT INTO matakuliah VALUES ('$_POST[kodemk]', '$_POST[nama]', $_POST[jumlah_sks])");
}
?>

<form method="post">
    <input type="hidden" name="form" value="matakuliah">
    Kode MK: <input name="kodemk" required>
    Nama Mata Kuliah: <input name="nama" required>
    Jumlah SKS: <input type="number" name="jumlah_sks" required>
    <button type="submit">Simpan Mata Kuliah</button>
</form>

<?php
$result = $conn->query("SELECT * FROM matakuliah");
echo "<table><tr><th>Kode MK</th><th>Nama</th><th>SKS</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>$row[kodemk]</td><td>$row[nama]</td><td>$row[jumlah_sks]</td></tr>";
}
echo "</table>";
?>
