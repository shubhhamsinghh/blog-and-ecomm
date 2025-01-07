<?= $this->extend('layouts/admin') ?>
<?= $this->section('title')?> About Us <?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="content">
<div class="card">
<div class="card-header bg-light">
   Admin About Us
   <a href="adminNewAbout" class="btn btn-primary">Add About Us</a>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>About Us</th>
                <th>Actions</th>
            </tr>
            
            </thead>
            <tbody>
            <?php foreach($abouts as $about){ ?>
            <tr>
                <td><img src="<?=base_url('upload/'.$about['thumbnail'])?>" height="200px"></td>
                <td><?=$about['about_us']?></td>
                <td style="display: inline-flex;">
               <a href="adminEditAbout/<?=$about['id']?>" class="btn btn-warning"><i class="icon icon-pencil"></i></a>
               <form action="adminDeleteAbout/<?=$about['id']?>"  method="post" id="deleteproduct-<?=$about['id'] ?>" style="display: none"><?=csrf_field()?></form>
               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal-<?=$about['id']?>">X</button>
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

<?php foreach($abouts as $about){ ?>
<div class="modal fade" id="deleteProductModal-<?=$about['id'] ?>" role="dialog" tabindex="-1" aria-lablledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Are you about to delete <?=$about['about_us'] ?>.</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No, keep it</button>
          <form id="deleteProduct-<?=$about['id']?>" action="adminDeleteAbout/<?=$about['id']?>" method="post"><?=csrf_field()?>
          <button type="submit" class="btn btn-primary">Yes, delete it</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
<?php } ?>
 
<?= $this->endSection()?>