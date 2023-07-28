<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Poliklinik</h1>
<p class="mb-4">Data poliklinik berisi Kode, Ruang, dan Nama Poliklinik</a>.</p>
<?=$this->session->flashdata('message');?>
<div class="row">
    <div class="col">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Poliklinik</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>NIP</th>
                                <th>Nama Dokter</th>
                                <th>Telepon</th>
                                <th>Spesialis</th>
                                <th>Poliklinik</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dokter as $d) :?>
                                <tr>
                                    <td class="text-center"><?= $d['nip_dokter'];?></td>
                                    <td class="text-center"><?= $d['nama_dokter'];?></td>
                                    <td><?= $d['telp_dokter'];?></td>
                                    <td><?= $d['spesialis_dokter'];?></td>
                                    <td><?= $d['nama_poliklinik'];?></td>
                                    <td class="text-center">
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Menu
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal<?= $d['id_dokter'];?>">Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapusModal<?= $d['id_dokter'];?>">Hapus</a>
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
    </div>
    <div class="col-4">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
            </div>
            <div class="card-body">
                <?=form_open('dokter/tambahDokter')?>
                    <div class="form-group">
                        <label for="nip_dokter">NIP</label>
                        <input type="text" class="form-control" id="nip_dokter" name="nip_dokter" value="<?=set_value('nip_dokter')?>" placeholder="NIP Dokter">
                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('nip_dokter'); ?></small></div>
                    </div>
                    <div class="form-group">
                        <label for="nama_dokter">Nama</label>
                        <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?=set_value('nama_dokter')?>" placeholder="Nama">
                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('nama_dokter'); ?></small></div>
                    </div>
                    <div class="form-group">
                        <label for="telp_dokter">Telepon</label>
                        <input type="text" class="form-control" id="telp_dokter" name="telp_dokter" value="<?=set_value('telp_dokter')?>" placeholder="Telepon">
                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('telp_dokter'); ?></small></div>
                    </div>
                    <div class="form-group">
                        <label for="spesialis_dokter">Spesialis</label>
                        <input type="text" class="form-control" id="spesialis_dokter" name="spesialis_dokter" value="<?=set_value('spesialis_dokter')?>" placeholder="Spesialis">
                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('spesialis_dokter'); ?></small></div>
                    </div>
                    <div class="form-group">
                        <label for="spesialis_dokter">Poliklinik</label>
                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('checkPoli'); ?></small></div>
                        <?php foreach ($poliklinik as $p) :?>
                        <div class="form-check form-check">
                            <input class="form-check-input" type="checkbox" name="checkPoli[]" value="<?=$p['id_poliklinik']?>">
                            <label class="form-check-label" for="inlineCheckbox1"><?=$p['nama_poliklinik'];?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Edit Modal-->
<!-- <?php foreach ($dokter as $d) :?>
    <div class="modal fade" id="editModal<?= $p['kode_poliklinik'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit <?=$p['nama_poliklinik'];?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?=form_open('poliklinik/editPoliklinik/'. $p['id_poliklinik'])?>
                        <div class="form-group">
                            <label for="kodePoliklinik">Kode</label>
                            <input type="text" class="form-control" id="kodePoliklinik" name="kodePoliklinik" value="<?=$p['kode_poliklinik'];?>" placeholder="Kode">
                            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('kodePoliklinik'); ?></small></div>
                        </div>
                        <div class="form-group">
                            <label for="ruangPoliklinik">Ruang Poliklinik</label>
                            <input type="text" class="form-control" id="ruangPoliklinik" name="ruangPoliklinik" value="<?=$p['ruang_poliklinik'];?>" placeholder="Ruang Poliklinik">
                            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('ruangPoliklinik'); ?></small></div>
                        </div>
                        <div class="form-group">
                            <label for="namaPoliklinik">Nama Poliklinik</label>
                            <input type="text" class="form-control" id="namaPoliklinik" name="namaPoliklinik" value="<?=$p['nama_poliklinik'];?>" placeholder="Nama Poliklinik">
                            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('namaPoliklinik'); ?></small></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-save"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach;?> -->
    <!-- Hapus Modal-->
<?php foreach ($dokter as $d) :?>
    <div class="modal fade" id="hapusModal<?= $d['id_dokter'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin untuk menghapus Dokter <?= $d['nama_dokter'];?>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('dokter/delete/'. $d['id_dokter']);?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>
