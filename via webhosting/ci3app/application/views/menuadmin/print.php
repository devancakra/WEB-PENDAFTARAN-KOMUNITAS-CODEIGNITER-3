<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="icon" href="<?php echo base_url('vendor/img/robotics.ico') ?>">

    <title><?php echo $judul; ?></title>
</head>

<body>
    <center>
        <h2 style="margin-top:50px;">
            Data Anggota Baru Robotics Community
        </h2>
        <p style="margin-top:-10px;">
            Universitas Pembangunan Nasional Veteran Jatim
        </p>
    </center>
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

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>