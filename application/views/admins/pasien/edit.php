<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Data Pasien</h1>
<p class="mb-4">Perubahan data dari pasien</a>.</p>
<?=$this->session->flashdata('message');?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
    </div>
    <div class="card-body">
<?= form_open('pasien/edit/'. $pasien->id_pasien)?>
<div class="row">
    <div class="col">
        <div class="form-group mb-2">
            <label>No RM</label>
            <input type="hidden" readonly class="form-control" name="no_rm" value="<?=$pasien->no_rm?>">
            <input type="text" readonly class="form-control" value="RM-<?=implode("-", str_split(str_pad($pasien->no_rm, 6, '0', STR_PAD_LEFT), 2))?>">
        </div>
        <div class="form-group mb-2">
            <label for="nik_pasien">NIK</label>
            <input type="text" class="form-control" name="nik_pasien" id="nik_pasien" value="<?=$pasien->nik_pasien?>">
        </div>
        <div class="form-group mb-2">
            <label for="nama_pasien">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" value="<?=$pasien->nama_pasien?>">
        </div>
        <div class="form-group mb-2">
            <label for="alamat_pasien">Alamat</label>
            <input type="text" class="form-control" name="alamat_pasien" id="alamat_pasien" value="<?=$pasien->alamat_pasien?>">
        </div>
    </div>
    <div class="col">
        <div class="form-group mb-2">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?=$pasien->tempat_lahir?>">
        </div>
        <div class="form-group mb-2">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?=$pasien->tgl_lahir?>">
        </div>
        <div class="form-group mb-2">
            <label for="jk_pasien">Jenis Kelamin</label>
            <select class="form-control" id="jk_pasien" name="jk_pasien">
                <option value="L" <?php if($pasien->jk_pasien == 'L') echo "selected"?>>Laki-laki</option>
                <option value="P" <?php if($pasien->jk_pasien == 'P') echo "selected"?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="goldar_pasien">Golongan Darah</label>
            <select class="form-control" id="goldar_pasien" name="goldar_pasien">
                <option value="A" <?php if($pasien->goldar_pasien == 'A') echo "selected"?>>A</option>
                <option value="B" <?php if($pasien->goldar_pasien == 'B') echo "selected"?>>B</option>
                <option value="AB" <?php if($pasien->goldar_pasien == 'AB') echo "selected"?>>AB</option>
                <option value="O" <?php if($pasien->goldar_pasien == 'O') echo "selected"?>>O</option>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group mb-2">
            <label for="pekerjaan_pasien">Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan_pasien" id="pekerjaan_pasien" value="<?=$pasien->pekerjaan_pasien?>">
        </div>
        <div class="form-group mb-2">
            <label for="telp_pasien">No Telepon</label>
            <input type="text" class="form-control" name="telp_pasien" id="telp_pasien" value="<?=$pasien->telp_pasien?>">
        </div>
    </div>
</div>
<div class="card-footer text-right">
    <a href="<?=base_url('pasien/pasien_'.lcfirst($pasien->tipe_pasien))?>" class="btn btn-danger mx-2">Batal</a>
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