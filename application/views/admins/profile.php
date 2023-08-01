<h1 class="h3 mb-2 text-gray-800">Profil</h1>
<div class="accordion" id="profilMenu">
    <div class="card">
        <div class="card-header">
            <div class="list-group list-group-horizontal-sm">
                <button type="button" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#lihatProfil" aria-expanded="true" aria-controls="lihatProfil">Lihat Profil</button>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#editProfil" aria-expanded="true" aria-controls="editProfil">Edit Profil</button>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#gantiPass" aria-expanded="true" aria-controls="gantiPass">Ganti Password</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div id="lihatProfil" <?=($tab === 1)?'class="collapse show"' : 'class="collapse"'?> aria-labelledby="headingOne" data-parent="#profilMenu">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Profil Saya</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 text-center">
                                        <img src="<?=base_url('assets/profile/').$profile_pic?>" style="width: 200px;" class="img-thumbnail mb-2">
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                                            <div class="col">
                                            <input type="text" readonly class="form-control form-control-sm border-0" id="colFormLabelSm" value="<?=$username?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="editProfil" <?=($tab === 2)?'class="collapse show"' : 'class="collapse"'?> aria-labelledby="headingThree" data-parent="#profilMenu">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Profil</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 text-center">
                                        <img src="<?=base_url('assets/profile/').$profile_pic?>" style="width: 200px;" class="img-thumbnail mb-2">
                                        <div class="input-group">
                                            <div class="custom-file text-left">
                                                <input type="file" class="custom-file-input" id="uploadProflie" aria-describedby="uploadProfile">
                                                <label class="custom-file-label" for="uploadProflie">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                                            <div class="col">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="<?=$username?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text">Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="gantiPass" <?=($tab === 3)?'class="collapse show"' : 'class="collapse"'?> aria-labelledby="headingFour" data-parent="#profilMenu">
                        <?=form_open('profile/change_password')?>
                        <div class="card-header text-center">
                            <h5>Ganti Password</h5>
                        </div>
                            <div class="card align-items-center">
                                <?=$this->session->flashdata('message');?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="oldPassword">Password Lama</label>
                                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Masukkan password lama">
                                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('oldPassword'); ?></small></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="newPassword">Password Lama</label>
                                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Masukkan password baru">
                                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('newPassword'); ?></small></div>                                            
                                    </div>
                                    <div class="form-group">
                                        <label for="newPasswordConfirmation">Password Lama</label>
                                        <input type="password" class="form-control" id="newPasswordConfirmation" name="newPasswordConfirmation" placeholder="Konfirmasi password baru">
                                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('newPasswordConfirmation'); ?></small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text">Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>