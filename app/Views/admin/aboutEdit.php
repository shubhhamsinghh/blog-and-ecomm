<?= $this->extend('layouts/admin')?>
<?= $this->section('title')?> Edit About Us <?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
               Edit About Us
            </div>
            <form action='<?=base_url("adminEditPostAbout/".$about['id'])?>' method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
            <div class="card-body">
                 <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="normal-input" class="form-control-label">Thumbnail</label>
                            <input type="file" name="thumbnail" id="normal-input" class="form-control" placeholder="About us Thumbnail">
                            <input type="hidden" name="old_thumbnail" id="normal-input" class="form-control" value="<?=$about['thumbnail']?>">
                            <img src="<?=base_url('upload/'.$about['thumbnail'])?>" height="200px">
                             <div class="text-danger"><?=isset($validation) ? display_error($validation, 'thumbnail') : ''?></div>
                          
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="placeholder-input" class="form-control-label">Description </label>
                           <textarea class="form-control" name="description" cols="30" rows="10" id="" placeholder="About us Description" ><?=$about['about_us']?></textarea>
                            <div class="text-danger"><?=isset($validation) ? display_error($validation, 'description') : ''?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
               
                <button type="submit" class="btn btn-success"> Edit About Us</button>
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