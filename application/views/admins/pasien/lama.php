<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pasien Lama</h1>
<p class="mb-4">Data pasien lama berisi data pasien yang telah datang lebih dari satu kali</a>.</p>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pasien Lama</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No RM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pasien_lama as $pl) :?>
                        <tr>
                            <td class="text-center">RM-<?=implode("-", str_split(str_pad($pl['no_rm'], 6, '0', STR_PAD_LEFT), 2))?></td>
                            <td class="text-center"><?= $pl['nama_pasien'];?></td>
                            <td class="text-center"><?= $pl['alamat_pasien'];?></td>
                            <td class="text-center"><?= $pl['telp_pasien'];?></td>
                            <td class="text-center">
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Menu
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?=base_url('pasien/detail/'.$pl['id_pasien']);?>">Detail</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal<?= $pl['id_pasien'];?>">Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapusModal<?= $pl['id_pasien'];?>">Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php foreach ($pasien_lama as $pl) :?>
    <div class="modal fade" id="hapusModal<?= $pl['id_pasien'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin untuk menghapus Pasien <?= $pl['nama_pasien'];?>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('pasien/delete_pasien_baru/'. $pl['id_pasien']);?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>