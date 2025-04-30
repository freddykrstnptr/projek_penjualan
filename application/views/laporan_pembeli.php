<!DOCTYPE html>
<html lang="en"><head>
    <title>PDF Data Pembeli</title>
</head><body>
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
</body>
</html>