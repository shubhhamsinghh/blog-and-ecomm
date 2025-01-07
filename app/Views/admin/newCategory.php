<?= $this->extend('layouts/admin')?>
<?= $this->section('title')?> New Category <?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
               New Category
            </div>
            <form action='<?=base_url("adminNewPostCategory")?>' method="post" enctype="multipart/form-data">
                <?=csrf_field()?>
            <div class="card-body">

                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="placeholder-input" class="form-control-label">Category</label>
                           <input type="text" class="form-control" name="category" cols="30" placeholder="Category" >
                            <div class="text-danger"><?=isset($validation) ? display_error($validation, 'category') : ''?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
               
                <button type="submit" class="btn btn-success"> Add Category</button>
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