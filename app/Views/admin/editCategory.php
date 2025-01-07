<?= $this->extend('layouts/admin')?>
<?= $this->section('title')?> Edit Category <?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
               Edit Category
            </div>
            <form action='<?=base_url("adminEditPostCategory/".$category['id'])?>' method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
            <div class="card-body">

                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="placeholder-input" class="form-control-label">Category</label>
                           <input type="text" class="form-control" name="category" placeholder="Category" value="<?=$category['name']?>">
                            <div class="text-danger"><?=isset($validation) ? display_error($validation, 'category') : ''?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
               
                <button type="submit" class="btn btn-success"> Edit Category</button>
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