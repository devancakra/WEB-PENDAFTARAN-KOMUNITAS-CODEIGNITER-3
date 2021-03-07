<div class="container">
    <div class="row">
        <div class="col">
            <div class="info">
                <center>
                    <h2><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login Robotics Community</h2>
                </center>
                <hr style="border: 1px grey solid;">
            </div><br><br>

            <div class="login">
                <div class="avatar">
                    <i class="ico fa fa-user"></i>
                </div>

                <div class="card-body">
                    <?= $this->session->flashdata('msg'); ?>
                    <?= $this->session->sess_destroy('msg'); ?>

                    <form action="<?= base_url('menu/login') ?>" method="post">
                        <div class="main form-group">
                            <i class="fas fa-envelope-open-text"></i>
                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" autocomplete="off">
                        </div>

                        <div class="secondary form-group">
                            <?= form_error('email', '<small class="text-warning pl-3" style="font-weight: bold;">Message : ', '</small><br>'); ?>
                        </div>

                        <div class="main form-group">
                            <i class="fas fa-unlock-alt"></i>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" autocomplete="off">
                        </div>

                        <div class=" secondary form-group">
                            <?= form_error('password', '<small class="text-warning pl-3" style="font-weight: bold;">Message : ', '</small><br>'); ?>
                        </div><br>

                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login</button>
                    </form>
                    <br><br>
                    <hr>
                    <td class="kotak" width="25%" valign="top">
                        <div class="link-text text-center">
                            <a class="small" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=roboticsKW@gmail.com&subject?&su=PESAN%20KHUSUS%20ROBOTICS%20COMMUNITY&body=Isi%20Pesan:%0A%0A[Tuliskan%20pesan%20anda%20disini%2E%2E%2E%2E%2E]%0A%0A%0ADengan%20ini%2C%20saya%20menyatakan%20bahwa%20saya%20mengajukan%20ini%20tanpa%20paksaan%20siapapun%20serta%20dalam%20keadaan%20sadar%2E%20Sekian%20dari%20saya%2C%20terima%20kasih%2E%0A%0AHormat%20Saya%2C%0A%0A%0ANama%20Anda" target="_blank" http-equiv="refresh" content="2">
                                <h7>Ada Kendala? Hubungi pihak kami!</h7>
                            </a>
                        </div>

                        <div class="link-text text-center">
                            <a class="small" href="<?= base_url('menu/registration') ?>">
                                <h7>Belum Punya Akun? Silahkan Registrasi!</h7>
                            </a>
                        </div>
                    </td>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<style>
    .link-text a {
        color: white;
        text-decoration: none;
    }

    .link-text a:hover {
        color: blue;
        font-weight: bold;
    }

    .login {
        margin: 0 auto;
        margin-top: 4%;
        top: 50%;
        left: 50%;
        background: -webkit-linear-gradient(right, #1a6093, #2b8fd9, #1e6ea9);
        opacity: 0.8;
        padding: 10px;
        max-width: 700px;
        width: 100%;
        box-shadow: 0px 0px 25px 10px black;
        border-radius: 15px;
        border: 3px white solid;
    }

    .avatar {
        margin: 0 auto;
        margin-top: -60px;
        left: 50%;
        font-size: 30px;
        background: #17a2b8;
        width: 100px;
        height: 100px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        border: 3px white solid;
    }

    .ico {
        margin-top: 35px;
    }

    .main {
        display: flex;
        justify-content: space-between;
        margin: 10px;
        border-bottom: 2px solid white;
        padding: 4px 0;
    }

    .secondary {
        margin-top: -10px;
    }

    .form-group i {
        font-size: 18px;
        color: white;
        padding: 5px 0;
    }

    .form-group input {
        width: 92%;
        padding: 5px 0;
        background: none;
        border: none;
        outline: none;
        color: white;
        font-size: 15px;
    }

    .form-group input::placeholder {
        color: white;
    }

    .form-group input:hover {
        background: rgba(10, 10, 10, s 0.5);
    }

    .btn {
        margin-bottom: -40px;
        border: 3px white solid;
        border-style: dotted;
    }

    button:hover {
        border: 3px white solid;
        border-style: double;
    }
</style>