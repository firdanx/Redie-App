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
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pasien_lama as $pl) :?>
                        <tr>
                            <td class="text-center"><?= $pl['no_rm'];?></td>
                            <td><?= $pl['nama_pasien'];?></td>
                            <td class="text-center"><?= $pl['jk_pasien'];?></td>
                            <td class="text-center">
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Menu
                                    </button>
                                    <div class="dropdown-menu">
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