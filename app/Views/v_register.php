<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-warning">
        <div class="card-header text-center">
            <a href="<?= base_url() ?>" class="h3"><b><?= $judul ?></b></a>
            <p>Silahkan register terlebih dahulu</p>
        </div>
        <div class="card-body">

            <?php
            // Notifikasi Error
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Entry Form</h4>
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <?php 
            
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            
            ?>

            <?php echo form_open('Auth/Daftar') ?>
            <div class="form-group">
                <input class="form-control" name="nim" value="<?= old('nim') ?>" placeholder="NIM">
            </div>
            <div class="form-group">
                <input class="form-control" name="nama" value="<?= old('nama') ?>" placeholder="Nama">
            </div>
            <div class="form-group">
                <select class="form-control" name="jenis_kelamin">
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="Laki-Laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" value="<?= old('password') ?>" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="ulangi_password" value="<?= old('ulangi_password') ?>" placeholder="Ulangi Password">
            </div>
            <div class="row">
                <div class="col-8">
                    <a class="btn btn-success" href="<?= base_url('Auth/LoginAnggota') ?>">Kembali</a>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.card-body -->
    </div>
</div>