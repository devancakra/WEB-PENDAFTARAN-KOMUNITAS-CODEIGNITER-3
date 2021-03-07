<div class="container">
    <div class="row">
        <div class="col">
            <div class="info">
                <center>
                    <h2><i class="fas fa-user-edit"></i>&nbsp;&nbsp;Pendaftaran Anggota Baru</h2>
                </center>
                <hr style="border: 1px grey solid;">
            </div><br>

            <form action="<?php echo base_url('menu/add') ?>" method="POST">
                <div class="registry">
                    <div class="avatar">
                        <i class="pencil fas fa-pencil-alt"></i>
                        <i class="book fas fa-book-open"></i>
                    </div>

                    <?= $this->session->flashdata('msg'); ?>
                    <?= $this->session->sess_destroy('msg'); ?>

                    <div class="box-registry">
                        <i class="fas fa-envelope-open-text"></i>
                        <input type="email" placeholder="Email" name="email" id="email" autofocus autocomplete="off" required>
                    </div>

                    <div class="box-registry">
                        <i class="fas fa-child"></i>
                        <input type="text" placeholder="Nama Lengkap" name="nama" id="nama" autocomplete="off" required>
                    </div>

                    <div class="box-registry">
                        <i class="fas fa-building"></i>
                        <input type="text" placeholder="Program Studi" name="prodi" id="prodi" autocomplete="off" required>
                    </div>

                    <div class="box-registry">
                        <i class="fab fa-whatsapp"></i>
                        <input type="text" placeholder="No Whatsapp" name="wa" id="wa" autocomplete="off" required>
                    </div>

                    <div class="button-class">
                        <button type="submit" name="add" class="button btn btn-primary">
                            <i class="fas fa-check"></i>&nbsp;&nbsp;Daftar Komunitas
                        </button>

                        <a href="<?= base_url('menu/pendaftaran') ?>" type="button" name="cancel" class="button btn btn-danger">
                            <i class="fas fa-times"></i>&nbsp;&nbsp;Batal
                        </a>
                    </div>
                </div><br>
            </form>

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
        border: 3px white solid;
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
        border: 3px white solid;
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