<?php

header("Content-type: application/vnc-ms-excel");
header("Content-Disposition: attachment; filename=Data Anggota Baru Robotics.xls");

?>

<html>

<body>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Program Studi</th>
                <th scope="col">No Whatsapp</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($robotics as $data) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $data['email']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['prodi']; ?></td>
                    <td><?= $data['wa']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>