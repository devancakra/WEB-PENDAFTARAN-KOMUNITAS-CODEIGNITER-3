<div class="container">
    <div class="row">
        <div class="col">
            <div class="info">
                <center>
                    <h2><i class="fas fa-th-list"></i>&nbsp;&nbsp;List Anggota Baru</h2>
                </center>
                <hr style="border: 1px grey solid;">
            </div><br>

            <?= $this->session->flashdata('msg'); ?>
            <?= $this->session->sess_destroy('msg'); ?>
            
            <nav class="navbar navbar-light justify-content-between">
                <form action="<?= base_url('menu/listpendaftaran') ?>" method="POST" class="form-inline" style="margin-top: 10px; margin-bottom: 10px;">
                    <form class="form-inline">
                        <div class="input-group">
                            <div class="btn-group mr-2" role="group" aria-label="cari">
                                <input class="form-control mr-sm-2" type="search" placeholder="Cari Nama Anggota..." name="keyword" autocomplete="off" autofocus>
                            </div>
                            <div class="btn-group" role="group" aria-label="tombolCari">
                                <input class="btn btn-primary" type="submit" name="submit" value="Cari">
                            </div>
                        </div>
                    </form>
                </form>
                <form class="form-inline" style="font-weight: bold;">
                    <?= $this->pagination->create_links(); ?>
                </form>
            </nav>

            <div style="overflow-x:auto;">
                <table id="table_id" class="table table-striped table-dark mydatatable" width="100%">
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
                        <?php foreach ($robotics as $data) : ?>
                            <tr>
                                <th scope="row"><?= ++$start; ?></th>
                                <td><?= $data['email']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['prodi']; ?></td>
                                <td><?= $data['wa']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .navbar {
        background-color: #4682B4;
    }
</style>