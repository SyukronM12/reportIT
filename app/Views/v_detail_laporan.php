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

            <?php foreach ($detail as $item) {
                # code...
            } ?>

            <div class="form-group">
                <label for="nim">NIM:</label>
                <input class="form-control" name="nim" value="<?= $item['nim'] ?>" placeholder="NIM" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input class="form-control" name="nama" value="<?= $item['nama'] ?>" placeholder="Nama" readonly>
            </div>
            <div class="form-group">
                <label for="foto">Jenis Kerusakan:</label>
                <input class="form-control" name="jenis_kerusakan" value="<?= $item['jenis_kerusakan'] ?>" placeholder="Jenis Kerusakan" readonly>
            </div>
            <div class="form-group">
                <label for="foto">Foto Bukti:</label>
                <img src="<?= base_url('laporan/'.$item['foto']); ?>" alt="Deskripsi Gambar">

            </div>
            <div class="form-group">
                <label for="foto">Keterangan:</label>
                <input class="form-control" name="keterangan" value="<?= $item['keterangan'] ?>" placeholder="Keterangan" readonly>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>