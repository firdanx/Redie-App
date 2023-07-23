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
                                        <h4 class="h2 text-gray-900 font-weight-bold">Login</h4>
                                        <p class="h5 text-gray-600 mb-4">Selamat Datang!</p>
                                    </div>
                                    <form class="user" method="post" action="<?=base_url('auth');?>">
                                        <?=$this->session->flashdata('success');?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn  btn-primary  btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <div class="text-center">
                                            <p>Belum punya akun?<a href="<?=base_url('auth/register')?>" > Buat akun!</a></p>
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