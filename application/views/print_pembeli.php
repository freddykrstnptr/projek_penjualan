<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Pembeli</title>
</head>
<body>
    <table>
        <tr>
            <th>No.</th>
            <th>Nama Pembeli</th>
            <th>Gender</th>
            <th>No Telefon</th>
            <th>Alamat Pembeli</th>
        </tr>
        <?php
            $no = 1;
            foreach ($pembeli as $pbl):
        ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $pbl->nama_pembeli?></td>
            <td><?= $pbl->gender?></td>
            <td><?= $pbl->notelefon?></td>
            <td><?= $pbl->alamat_pembeli?></td>
        </tr>
        <?php endforeach;?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>