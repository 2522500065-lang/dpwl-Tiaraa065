<html lang="en">
<body>
    <table border="1" cellpadding="5" cellspacing="0">
        <?php
            echo '<tr>';
            echo '<td>' . $mhs['nim'] . '</td>';
            echo '<td>' . $mhs['nama'] . '</td>';
            echo '<td>' . $mhs['alamat'] . '</td>';
            echo '<td>' . $mhs['telp'] . '</td>';
            echo '</tr>';
        ?>
    </table>
    Admin, <?= htmlspecialchars($nama_user) ?>
</body>
</html>
