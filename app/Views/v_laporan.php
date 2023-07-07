<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><b> Data <?= $judul ?> </b></h3>
        </div>

        <div class="card-body">


            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">NO</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kerusakan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php $no = 1;
                    foreach ($laporan as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value['nim'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['jenis_kerusakan'] ?></td>
                            <td>
                                <?php if($value['status']) : ?>
                                    <?= $value['status']?>
                                <?php else : ?>
                                    <a href="<?= base_url('Laporan/View/'.$value['id_laporan']) ?>" class="btn btn-primary">Lihat</a>
                                    <a href="<?= base_url('Laporan/Delete/'.$value['id_laporan']) ?>" class="btn btn-danger">Hapus</a>   
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>

    </div>
</div>