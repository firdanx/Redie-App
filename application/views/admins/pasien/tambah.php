<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Data Pasien</h1>
<p class="mb-4">Menambahkan data pasien</a>.</p>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
    </div>
    <div class="card-body">
<form action="<?=base_url('pasien/add_pasien/'. $tipe_pasien)?>" method="post">
<div class="row">
    <div class="col">
        <div class="form-group mb-2">
            <label for="no_rm">No RM</label>
            <input type="text" class="form-control" id="no_rm" name="no_rm" value="<?=set_value('no_rm')?>">
            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('no_rm'); ?></small></div>
        </div>
        <div class="form-group mb-2">
            <label for="nik_pasien">NIK</label>
            <input type="text" class="form-control" name="nik_pasien" id="nik_pasien" value="<?=set_value('nik_pasien')?>">
            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('nik_pasien'); ?></small></div>
        </div>
        <div class="form-group mb-2">
            <label for="nama_pasien">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" value="<?=set_value('nama_pasien')?>">
            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('nama_pasien'); ?></small></div>
        </div>
        <div class="form-group mb-2">
            <label for="alamat_pasien">Alamat</label>
            <input type="text" class="form-control" name="alamat_pasien" id="alamat_pasien" value="<?=set_value('alamat_pasien')?>">
            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('alamat_pasien'); ?></small></div>
        </div>
    </div>
    <div class="col">
        <div class="form-group mb-2">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?=set_value('tempat_lahir')?>">
            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('tempat_lahir'); ?></small></div>
        </div>
        <div class="form-group mb-2">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?=set_value('tgl_lahir')?>">
            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('tgl_lahir'); ?></small></div>
        </div>
        <div class="form-group mb-2">
            <label for="jk_pasien">Jenis Kelamin</label>
            <select class="form-control" id="jk_pasien" name="jk_pasien">
                <option value="L" <?php if(set_value('L')) echo "selected"?>>Laki-laki</option>
                <option value="P" <?php if(set_value('P')) echo "selected"?>>Perempuan</option>
            </select>
            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('jk_pasien'); ?></small></div>
        </div>
        <div class="form-group mb-2">
            <label for="goldar_pasien">Golongan Darah</label>
            <select class="form-control" id="goldar_pasien" name="goldar_pasien">
                <option value="A" <?php if(set_value('A')) echo "selected"?>>A</option>
                <option value="B" <?php if(set_value('B')) echo "selected"?>>B</option>
                <option value="AB" <?php if(set_value('AB')) echo "selected"?>>AB</option>
                <option value="O" <?php if(set_value('O')) echo "selected"?>>O</option>
            </select>
            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('goldar_pasien'); ?></small></div>
        </div>
    </div>
    <div class="col">
        <div class="form-group mb-2">
            <label for="pekerjaan_pasien">Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan_pasien" id="pekerjaan_pasien" value="<?=set_value('pekerjaan_pasien')?>">
            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('pekerjaan_pasien'); ?></small></div>
        </div>
        <div class="form-group mb-2">
            <label for="telp_pasien">No Telepon</label>
            <input type="text" class="form-control" name="telp_pasien" id="telp_pasien" value="<?=set_value('telp_pasien')?>">
            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('telp_pasien'); ?></small></div>
        </div>
        <div class="form-group mb-2">
            <fieldset disabled>
                <label for="tipe_pasien">Tipe Pasien</label>
                <select class="form-control" id="tipe_pasien" name="tipe_pasien">
                    <option value="Baru" <?php if($tipe_pasien=='Baru') echo "selected"?>>Baru</option>
                    <option value="Lama" <?php if($tipe_pasien=='Lama') echo "selected"?>>Lama</option>
                </select>
            </fieldset>
        </div>
    </div>
</div>
<div class="card-footer text-right">
    <a href="<?=base_url('pasien/pasien_'.lcfirst($tipe_pasien))?>" class="btn btn-danger mx-2">Batal</a>
    <button type="submit" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-save"></i>
        </span>
        <span class="text">Tambah</span>
    </button>
</div>
</form>
    </div>
</div>