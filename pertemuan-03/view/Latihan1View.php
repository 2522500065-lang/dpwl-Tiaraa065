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
        
        <?php foreach ($datamhs as $mhs) { ?>
    <tr>
        <td><?= $mhs['nim']; ?></td>
        <td><?= $mhs['nama']; ?></td>
        <td><?= $mhs['alamat']; ?></td>
        <td><?= $mhs['telp']; ?></td>
    </tr>
<?php } ?>
</table>

Admin, <?= htmlspecialchars($nama_user) ?>
</body>
</html>