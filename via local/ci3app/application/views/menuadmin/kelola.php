<div class="container">
    <div class="row">
        <div class="col">
            <div class="info">
                <center>
                    <h2><i class="fas fa-th-list"></i>&nbsp;&nbsp;Kelola Data Robotics Community</h2>
                </center>
                <hr style="border: 1px grey solid;">
            </div><br>

            <?= $this->session->flashdata('msg'); ?>
            <?= $this->session->sess_destroy('msg'); ?>

            <nav class="navbar navbar-light justify-content-between">
                <form action="<?= base_url('admin/kelola') ?>" method="POST" class="form-inline" style="margin-bottom: 10px;">
                    <form class="form-inline">
                        <div class="input-group">
                            <div class="btn-group mr-2" role="group" aria-label="cari">
                                <input class="form-control mr-sm-2" type="search" placeholder="Cari Nama Anggota..." name="keyword">
                            </div>
                            <div class="btn-group" role="group" aria-label="tombolCari">
                                <b>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Cari">
                                </b>
                            </div>
                        </div>
                    </form>
                </form>
                <div class="btn-group btn-group-toggle" style="background:none;">
                    <form>
                        <div class="input-group">
                            <div class="btn-group mr-2" role="group" aria-label="multibutton" style="margin-top: 10px;height: 40px;">
                                <div class="btn-group" role="group" aria-label="add">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#create">
                                        <b>
                                            <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah
                                        </b>
                                    </button>
                                </div>
                                <div class="btn-group" role="group" aria-label="excel">
                                    <a href="<?= base_url('admin/excel') ?>" type="button" class="btn btn-success" name="excel">
                                        <b>
                                            <i class="fas fa-file-csv"></i>&nbsp;&nbsp;Excel
                                        </b>
                                    </a>
                                </div>
                                <div class="btn-group" role="group" aria-label="print">
                                    <a href="<?= base_url('admin/print') ?>" type="button" class="btn btn-light" name="print">
                                        <b>
                                            <i class="fas fa-print"></i>&nbsp;&nbsp;Print
                                        </b>
                                    </a>
                                </div>
                            </div>
                            <div class="btn-group" role="group" aria-label="pagination" style="margin-top: 10px;">
                                <form class="form-inline" style="font-weight: bold;">
                                    <?= $this->pagination->create_links(); ?>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
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
                            <th scope="col">Opsi/Pilihan Admin</th>
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
                                <td class="btn-class">
                                    <button type="button" class="edit btn btn-warning btn-sm" data-toggle="modal" data-target="#update"><i class="fas fa-edit"></i>&nbsp;&nbsp;Ubah</button>
                                    <button type="button" class="del btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="far fa-trash-alt"></i>&nbsp;&nbsp;Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- ADD -->
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color:black;" class="modal-title" id="exampleModalLabel">TAMBAH DATA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?php echo base_url('admin/create') ?>" method="POST">
                            <div class="modal-body bg-dark">
                                <div class="avatar">
                                    <i class="pencil fas fa-pencil-alt"></i>
                                    <i class="book fas fa-book-open"></i>
                                </div>
                                <div class="form-group">
                                    <div class="box-registry">
                                        <i class="fas fa-envelope-open-text"></i>
                                        <input type="email" placeholder="Email" name="email" autofocus required autocomplete="off">
                                    </div>

                                    <div class="box-registry">
                                        <i class="fas fa-child"></i>
                                        <input type="text" placeholder="Nama Lengkap" name="nama" required autocomplete="off">
                                    </div>

                                    <div class="box-registry">
                                        <i class="fas fa-building"></i>
                                        <input type="text" placeholder="Program Studi" name="prodi" required autocomplete="off">
                                    </div>

                                    <div class="box-registry">
                                        <i class="fab fa-whatsapp"></i>
                                        <input type="text" placeholder="No Whatsapp" name="wa" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="button-class">
                                    <button type="submit" name="create" class="btn btn-primary">
                                        <i class="fas fa-check"></i>&nbsp;&nbsp;Tambah
                                    </button>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" class="button btn btn-danger">
                                        <i class="fas fa-times"></i>&nbsp;&nbsp;Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- EDIT -->
            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color:black;" class="modal-title" id="exampleModalLabel">UBAH DATA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?= base_url('admin/update/') . $data['id'] ?>" method="POST">
                            <input type="hidden" name="_method" value="UPDATE">
                            <div class="modal-body bg-dark">
                                <div class="avatar">
                                    <i class="edicon far fa-edit"></i>
                                    <i class="book fas fa-book-open"></i>
                                </div>
                                <div class="form-group">
                                    <div class="box-registry">
                                        <i class="fas fa-envelope-open-text"></i>
                                        <input type="email" placeholder="Email" name="email" value="" autofocus required autocomplete="off">
                                    </div>

                                    <div class="box-registry">
                                        <i class="fas fa-child"></i>
                                        <input type="name" placeholder="Nama Lengkap" name="nama" value="" required autocomplete="off">
                                    </div>

                                    <div class="box-registry">
                                        <i class="fas fa-building"></i>
                                        <input type="text" placeholder="Program Studi" name="prodi" value="" required autocomplete="off">
                                    </div>

                                    <div class="box-registry">
                                        <i class="fab fa-whatsapp"></i>
                                        <input type="text" placeholder="No Whatsapp" name="wa" value="" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="button-class">
                                    <button type="submit" name="update" class="btn btn-primary">
                                        <i class="fas fa-check"></i>&nbsp;&nbsp;Ubah
                                    </button>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" class="button btn btn-danger">
                                        <i class="fas fa-times"></i>&nbsp;&nbsp;Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- DELETE -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color:black;" class="modal-title" id="exampleModalLabel">HAPUS DATA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?= base_url('admin/delete/') . $data['id'] ?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="modal-body bg-dark">
                                <div class="avatar">
                                    <i class="delicon far fa-trash-alt"></i>
                                    <i class="book fas fa-book-open"></i>
                                </div>
                                <div class="modal-body">
                                    <h5>Apakah anda yakin akan menghapus data ini ?</h5>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="button-class">
                                    <button type="submit" name="delete" class="btn btn-primary">
                                        <i class="fas fa-check"></i>&nbsp;&nbsp;Hapus
                                    </button>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" class="button btn btn-danger">
                                        <i class="fas fa-times"></i>&nbsp;&nbsp;Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .registry {
        margin: 0 auto;
        margin-top: 2%;
        top: 50%;
        left: 50%;
        background: -webkit-linear-gradient(right, #1a6093, #2b8fd9, #1e6ea9);
        opacity: 0.8;
        padding: 40px;
        max-width: 700px;
        width: 100%;
        box-shadow: 0px 0px 25px 10px black;
        border-radius: 15px;
    }

    .avatar {
        margin: 0 auto;
        margin-top: -70px;
        left: 50%;
        font-size: 30px;
        background: #17a2b8;
        width: 80px;
        height: 80px;
        line-height: 50px;
        text-align: center;
        border-radius: 50%;
    }

    .ico {
        margin-top: 35px;
    }

    .box-registry {
        display: flex;
        justify-content: space-between;
        margin: 10px;
        border-bottom: 2px solid white;
        padding: 4px 0;
    }

    .box-registry i {
        font-size: 18px;
        color: white;
        padding: 5px 0;
    }

    .box-registry input {
        width: 92%;
        padding: 5px 0;
        background: none;
        border: none;
        outline: none;
        color: white;
        font-size: 15px;
    }

    .box-registry input::placeholder {
        color: white;
    }

    .box-registry input:hover {
        background: rgba(10, 10, 10, s 0.5);
    }

    .button-class {
        margin: 0 auto;
    }

    .button {
        margin-top: 15px;
        margin-left: 8px;
        margin-right: 5px;
        background: none;
        border: 1px solid white;
        padding: 7px;
        color: white;
        font-size: 15px;
        letter-spacing: 3px;
        cursor: pointer;
        border-radius: 15px;
    }

    .button:hover {
        background: #17a2b8;
        border: 1px aqua solid;
        border-style: dotted;
    }

    .pencil {
        position: relative;
        top: -2px;
        left: 10px;
        width: 100%;
    }

    .book {
        position: relative;
        top: -18px;
        width: 100%;
    }
</style>