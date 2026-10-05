<!DOCTYPE html>
<html lang="en">
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
            <td><?= htmlspecialchars($mhs['nim']) ?></td>
            <td><?= htmlspecialchars($mhs['nama']) ?></td>
            <td><?= htmlspecialchars($mhs['alamat']) ?></td>
            <td><?= htmlspecialchars($mhs['telp']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <hr>
    Admin, <?= htmlspecialchars($nama_user) ?>
</body>
</html>
