<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-warning">
        <div class="card-header text-center">
            <a href="<?= base_url() ?>" class="h3"><b><?= $judul ?></b></a>
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

            <?php echo form_open_multipart('Laporan/InsertLaporan') ?>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input class="form-control" name="nim" value="<?= session('nim') ?>" placeholder="NIM" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input class="form-control" name="nama" value="<?= session('nama') ?>" placeholder="Nama" readonly>
            </div>
            <div class="form-group">
                <label for="foto">Jenis Kerusakan:</label>
                <input class="form-control" name="jenis_kerusakan" value="<?= old('jenis_kerusakan') ?>" placeholder="Jenis Kerusakan">
            </div>
            <div class="form-group">
                <label for="foto">Foto Bukti:</label>
                <input type="file" name="foto" id="foto">
            </div>
            <div class="form-group">
                <label for="foto">Keterangan:</label>
                <input class="form-control" name="keterangan" value="<?= old('keterangan') ?>" placeholder="Keterangan">
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Kirim Laporan</button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.card-body -->
    </div>
</div>