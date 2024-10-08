<div class="d-flex w-100 align-items-center" style="height: 91vh;">
        <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><span class="h4 btn-danger rounded-left px-2 shadow-lg" style="font-weight: bold;"> R E D I</span><span class="h4 btn-primary rounded-right px-2">E</span></h1>
                                        <h4 class="h2 text-gray-900 font-weight-bold">Daftar</h4>
                                        <p class="small text-gray-600 mb-4">Silahkan melakukan pendaftaran untuk mendapatkan kemudahan</p>
                                    </div>
                                    <form class="user" method="post" action="<?=base_url('auth/register');?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" value="<?=set_value('username')?>" placeholder="Username">
                                            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('username'); ?></small></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('password'); ?></small></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Confirm Password">
                                            <div class="ml-4 mt-2"><small class="text-danger"><?php echo form_error('password2'); ?></small></div>
                                        </div>
                                        <button type="submit" class="btn  btn-primary  btn-user btn-block">
                                            Daftar
                                        </button>
                                        <hr>
                                        <div class="text-center">
                                            <p>Sudah punya akun?<a href="<?=base_url('auth')?>" > Silahkan Login!</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>