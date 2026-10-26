<!DOCTYPE html>
<html lang="en">
</html>

<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telp</th>
        </tr>
        
        <?php foreach ($datamhs as $mhs): ?>
            <tr> 
            <? {

            echo "<td>" . $mhs['nim'] . "</td>";
            echo "<td>" .$mhs['nama'] . "</td>";
            echo "<td>" .$mhs['alamat'] . "</td>";
            echo "<td>" .$mhs['telp'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    Admin, <?= htmlspecialchars($nama_user) ?>
</body>

</html>