<!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Poliklinik</h1>
                    <p class="mb-4">Data poliklinik berisi Kode, Ruang, dan Nama Poliklinik</a>.</p>
                    <?=$this->session->flashdata('message');?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Poliklinik</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Ruang</th>
                                            <th>Nama Poliklinik</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Ruang</th>
                                            <th>Nama Poliklinik</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($poliklinik as $p) :?>
                                            <tr>
                                                <td><?= $p['kode_poliklinik'];?></td>
                                                <td><?= $p['ruang_poliklinik'];?></td>
                                                <td><?= $p['nama_poliklinik'];?></td>
                                                <td>
                                                    <a href="<?= base_url('poliklinik/edit/'. $p['id_poliklinik']);?>" class="badge badge-success">Edit</a>
                                                    <a class="badge badge-danger tombol-hapus" href="#" data-toggle="modal" data-target="#hapusModal<?= $p['kode_poliklinik'];?>">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    <!-- Logout Modal-->
<?php foreach ($poliklinik as $p) :?>
    <div class="modal fade" id="hapusModal<?= $p['kode_poliklinik'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin untuk menghapus <?= $p['kode_poliklinik'];?> - <?= $p['nama_poliklinik'];?>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('poliklinik/delete/'. $p['id_poliklinik']);?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>