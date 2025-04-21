<?php
include "config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form']) && $_POST['form'] == "krs") {
    $conn->query("INSERT INTO krs(mahasiswa_npm, matakuliah_kodemk) VALUES ('$_POST[mahasiswa_npm]', '$_POST[matakuliah_kodemk]')");
}

if (isset($_GET['hapus_krs'])) {
    $id = intval($_GET['hapus_krs']);
    $conn->query("DELETE FROM krs WHERE id = $id");
}

?>
<h3>Tambah KRS</h3>
<form method="post">
    <input type="hidden" name="form" value="krs">
    Mahasiswa:
    <select name="mahasiswa_npm" required>
        <?php
        $mhs = $conn->query("SELECT * FROM mahasiswa");
        while ($row = $mhs->fetch_assoc()) {
            echo "<option value='$row[npm]'>$row[nama] ($row[npm])</option>";
        }
        ?>
    </select>
    Mata Kuliah:
    <select name="matakuliah_kodemk" required>
        <?php
        $mk = $conn->query("SELECT * FROM matakuliah");
        while ($row = $mk->fetch_assoc()) {
            echo "<option value='$row[kodemk]'>$row[nama] ($row[kodemk])</option>";
        }
        ?>
    </select>
    <button type="submit">Tambah KRS</button>
</form>

<?php
if (isset($_POST['edit_krs']) && $_POST['edit_krs'] == 1) {
    $id = intval($_POST['id']);
    $npm = $_POST['mahasiswa_npm'];
    $kodemk = $_POST['matakuliah_kodemk'];
    $conn->query("UPDATE krs SET mahasiswa_npm = '$npm', matakuliah_kodemk = '$kodemk' WHERE id = $id");
}

if (isset($_GET['edit_krs'])) {
    $id = intval($_GET['edit_krs']);
    $data = $conn->query("SELECT * FROM krs WHERE id = $id")->fetch_assoc();
    ?>
    <h3>Edit KRS</h3>
    <form method="post">
        <input type="hidden" name="edit_krs" value="1">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        Mahasiswa:
        <select name="mahasiswa_npm" required>
            <?php
            $mhs = $conn->query("SELECT * FROM mahasiswa");
            while ($row = $mhs->fetch_assoc()) {
                $selected = $row['npm'] == $data['mahasiswa_npm'] ? "selected" : "";
                echo "<option value='$row[npm]' $selected>$row[nama] ($row[npm])</option>";
            }
            ?>
        </select>
        Mata Kuliah:
        <select name="matakuliah_kodemk" required>
            <?php
            $mk = $conn->query("SELECT * FROM matakuliah");
            while ($row = $mk->fetch_assoc()) {
                $selected = $row['kodemk'] == $data['matakuliah_kodemk'] ? "selected" : "";
                echo "<option value='$row[kodemk]' $selected>$row[nama] ($row[kodemk])</option>";
            }
            ?>
        </select>
        <button type="submit">Simpan Perubahan</button>
    </form>
    <?php
}

echo "<h3>Data KRS yang Sudah Diambil</h3>";
$result = $conn->query("SELECT krs.id, m.nama AS nama_mhs, mk.nama AS nama_mk, mk.jumlah_sks
                        FROM krs
                        JOIN mahasiswa m ON m.npm = krs.mahasiswa_npm
                        JOIN matakuliah mk ON mk.kodemk = krs.matakuliah_kodemk");

echo "<table>
        <tr><th>No</th><th>Nama Mahasiswa</th><th>Mata Kuliah</th><th>Keterangan</th><th>Aksi</th></tr>";
$no = 1;
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>$no</td>
            <td>$row[nama_mhs]</td>
            <td>$row[nama_mk]</td>
            <td><span style='color:#d63384; font-weight:bold;'>$row[nama_mhs]</span> Mengambil Mata Kuliah <span style='color:#0d6efd; font-weight:bold;'>$row[nama_mk]</span> ({$row['jumlah_sks']} SKS)</td>
            <td>
                <a href='?hapus_krs={$row['id']}' onclick=\"return confirm('Hapus data ini?')\">Hapus</a>
            </td>
          </tr>";
    $no++;
}
echo "</table>";
?>
