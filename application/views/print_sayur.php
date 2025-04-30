<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Sayuran</title>
</head>
<body>
    <table>
        <tr>
            <th>No.</th>
            <th>Nama Sayuran</th>
            <th>Jenis Sayuran</th>
            <th>Stok Sayuran</th>
            <th>Harga</th>
            <th>Foto</th>
        </tr>
        <?php
            $no = 1;
            foreach ($sayuran as $syr):
        ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $syr->nama_sayur?></td>
            <td><?= $syr->jenis_sayur?></td>
            <td><?= $syr->stok?></td>
            <td><?= $syr->harga?></td>
            <td><?= $syr->foto?></td>
        </tr>
        <?php endforeach;?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>