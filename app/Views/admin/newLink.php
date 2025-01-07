<?= $this->extend('layouts/admin')?>
<?= $this->section('title')?> New Links <?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
               New Links
            </div>
            <form action='<?=base_url("adminNewPostLink")?>' method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
            <div class="card-body">

                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="placeholder-input" class="form-control-label">Facebook</label>
                           <input type="text" class="form-control" name="facebook" placeholder="facebook link" >
                            <div class="text-danger"><?=isset($validation) ? display_error($validation, 'facebook') : ''?></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="placeholder-input" class="form-control-label">Twitter</label>
                           <input type="text" class="form-control" name="twitter" placeholder="twitter link" >
                            <div class="text-danger"><?=isset($validation) ? display_error($validation, 'twitter') : ''?></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="placeholder-input" class="form-control-label">Google</label>
                           <input type="text" class="form-control" name="google" placeholder="google link" >
                            <div class="text-danger"><?=isset($validation) ? display_error($validation, 'google') : ''?></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="placeholder-input" class="form-control-label">Instagram</label>
                           <input type="text" class="form-control" name="instagram"  placeholder="Instagram link" >
                            <div class="text-danger"><?=isset($validation) ? display_error($validation, 'instagram') : ''?></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="placeholder-input" class="form-control-label">Youtube</label>
                           <input type="text" class="form-control" name="youtube" placeholder="youtube link" >
                            <div class="text-danger"><?=isset($validation) ? display_error($validation, 'youtube') : ''?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
               
                <button type="submit" class="btn btn-success"> Add Links</button>
            </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>
</div>
<?php if(session()->getFlashdata('success')){ ?>
<div class="alert alert-success">
    <?=session()->getFlashdata('success')?>
</div>
<?php } ?>
</div>


 
<?= $this->endSection()?>