<h1 class="h3 mb-2 text-gray-800">Pengaturan</h1>
<div class="row">
    <div class="col col-xl-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <div class="list-group">
                            <a href="<?=base_url('settings/administrator')?>" class="list-group-item list-group-item-action <?=($title == 'Administrator') ?'active': ''?>">Administrator</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center"><?=$title?></h6>
            </div>
            <div class="card-body"> 