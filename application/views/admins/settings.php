<h1 class="h3 mb-2 text-gray-800">Pengaturan</h1>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-2">
                        <div class="list-group tab">
                            <a href="#" class="list-group-item list-group-item-action tablinks" onclick="openTab(event, 'tab1')">Profil</a>
                            <a href="#" class="list-group-item list-group-item-action tablinks <?=$status?>" onclick="openTab(event, 'tab2')">Keamanan</a>
                            <a href="#" class="list-group-item list-group-item-action tablinks" onclick="openTab(event, 'tab3')">Administrator</a>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="tabcontent card" style="display: none;" id="tab1">
                            <div class="card-body">
                                <h5>Update Profil</h5>
                            </div>
                        </div>
                        <div class="tabcontent card" style="display: <?=$dp?>;" id="tab2">
                            <div class="card-body">
                                <h5>Keamanan</h5>
                                <hr>
                                <?=form_open('settings/change_password')?>
                                <div class="card-header text-center">
                                    <h5>Ganti Password</h5>
                                    <?=$this->session->flashdata('message');?>
                                </div>
                                    <div class="card align-items-center">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="oldPassword">Password Lama</label>
                                                <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Masukkan password lama">
                                                <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('oldPassword'); ?></small></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="newPassword">Password Lama</label>
                                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Masukkan password baru">
                                                <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('newPassword'); ?></small></div>                                            </div>
                                            <div class="form-group">
                                                <label for="newPasswordConfirmation">Password Lama</label>
                                                <input type="password" class="form-control" id="newPasswordConfirmation" name="newPasswordConfirmation" placeholder="Konfirmasi password baru">
                                                <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('newPasswordConfirmation'); ?></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tabcontent card" style="display: none;" id="tab3">
                            <div class="card-body">
                                <h5>Administrator</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
