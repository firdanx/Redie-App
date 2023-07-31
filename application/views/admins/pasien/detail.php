<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Pasien</h1>
<p class="mb-4">Informasi detail dari pasien</a>.</p>
<?=$this->session->flashdata('message');?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Pasien</h6>
    </div>
    <div class="card-body">
        <div class="row mx-5 my-3">
            <div class="col">
                <p>No RM</p>
                <p>NIK</p>
                <p>Nama Lengkap</p>
                <p>Alamat Lengkap</p>
                <p>Tempat Lahir</p>
                <p>Tanggal Lahir</p>
                <p>Jenis Kelamin</p>
                <p>Golongan Darah</p>
                <p>Pekerjaan</p>
                <p>No Telepon</p>
            </div>
            <div class="col">
                <p>: RM-<?=implode("-", str_split(str_pad($pasien->no_rm, 6, '0', STR_PAD_LEFT), 2))?></p>
                <p>: <?=$pasien->nik_pasien?></p>
                <p>: <?=$pasien->nama_pasien?></p>
                <p>: <?=$pasien->alamat_pasien?></p>
                <p>: <?=$pasien->tempat_lahir?></p>
                <p>: <?=$pasien->tgl_lahir?></p>
                <p>: <?=$result = $pasien->jk_pasien=='L'? "Laki-laki" : "Perempuan" ?></p>
                <p>: <?=$pasien->goldar_pasien?></p>
                <p>: <?=$pasien->pekerjaan_pasien?></p>
                <p>: <?=$pasien->telp_pasien?></p>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?=base_url('pasien/pasien_'.lcfirst($pasien->tipe_pasien))?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>