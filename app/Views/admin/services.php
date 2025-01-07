<?= $this->extend('layouts/admin') ?>
<?= $this->section('title')?> Services <?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="content">
<div class="card">
<div class="card-header bg-light">
   Admin Services
   <a href="adminNewService" class="btn btn-primary">Add Services</a>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            
            </thead>
            <tbody>
            <?php foreach($services as $service){ ?>
            <tr>
                <td><?=$service['title']?></td>
                <td><?=$service['description']?></td>
                <td><img src="<?=base_url('services/'.$service['thumbnail'])?>" height="100px"></td>
                <td style="display: inline-flex;">
               <a href="adminEditService/<?=$service['id']?>" class="btn btn-warning"><i class="icon icon-pencil"></i></a>
               <form action="adminDeleteService/<?=$service['id']?>"  method="post" id="deleteproduct-<?=$service['id'] ?>" style="display: none"><?=csrf_field()?></form>
               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal-<?=$service['id']?>">X</button>
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

<?php foreach($services as $service){ ?>
<div class="modal fade" id="deleteProductModal-<?=$service['id'] ?>" role="dialog" tabindex="-1" aria-lablledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Are you about to delete <?=$service['title'] ?>.</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No, keep it</button>
          <form id="deleteProduct-<?=$service['id']?>" action="adminDeleteService/<?=$service['id']?>" method="post"><?=csrf_field()?>
          <button type="submit" class="btn btn-primary">Yes, delete it</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
<?php } ?>
 
<?= $this->endSection()?>