<div class="row">
    <div class="col-lg-12 col-xl-8 col-sm-12 col-md-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admin as $adm): ?>
                    <tr>
                        <td><?=$adm->id_account?></td>
                        <td><?=$adm->username?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header bg-gradient-primary">
                <h6 class="m-0 font-weight-bold text-white text-center">Tambah Admin</h6>
            </div>
            <form class="user" method="post" action="<?=base_url('settings/tambahAdmin');?>">
            <div class="card-body">
                <?=$this->session->flashdata('message');?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" value="<?=set_value('username')?>" placeholder="Username">
                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('username'); ?></small></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('password'); ?></small></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
                        <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('password2'); ?></small></div>
                    </div>
                </div>
                <div class="card-footer text-right bg-gradient-light">
                    <button type="submit" class="btn  btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>