<?= $this->extend('layouts/admin') ?>
<?= $this->section('title')?> Category <?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="content">
<div class="card">
<div class="card-header bg-light">
   Admin Category
   <a href="adminNewCategory" class="btn btn-primary">Add Category</a>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr><th>Sr. No</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            
            </thead>
            <tbody>
            <?php $a = 1; foreach($categories as $category){ ?>
            <tr>
                <td><?=$a++?></td>
                <td><?=$category['name']?></td>
                <td style="display: inline-flex;">
               <a href="adminEditCategory/<?=$category['id']?>" class="btn btn-warning"><i class="icon icon-pencil"></i></a>
               <form action="adminEditCategory/<?=$category['id']?>"  method="post" id="deleteproduct-<?=$category['id'] ?>" style="display: none"><?=csrf_field()?></form>
               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal-<?=$category['id']?>">X</button>
                </td>
            </tr>
          <?php } ?>

            </tbody>
        </table>
    </div>
</div>
</div>
<?php if(session()->getFlashdata('success')){ ?>
<div class="alert alert-success">
    <?=session()->getFlashdata('success')?>
</div>
<?php } ?>
</div>

<?php foreach($categories as $category){ ?>
<div class="modal fade" id="deleteProductModal-<?=$category['id'] ?>" role="dialog" tabindex="-1" aria-lablledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Are you about to delete <?=$category['name'] ?>.</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No, keep it</button>
          <form id="deleteProduct-<?=$category['id']?>" action="adminDeleteCategory/<?=$category['id']?>" method="post"><?=csrf_field()?>
          <button type="submit" class="btn btn-primary">Yes, delete it</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
<?php } ?>
 
<?= $this->endSection()?>