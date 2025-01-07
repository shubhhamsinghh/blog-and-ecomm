<?= $this->extend('layouts/admin') ?>
<?= $this->section('title')?> Pricing Plan <?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="content">
<div class="card">
<div class="card-header bg-light">
   Admin Pricing Plan
   <a href="adminNewPlan" class="btn btn-primary">Add Plan</a>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Sr. No</th>
                <th>Plan</th>
                <th>Actions</th>
            </tr>
            
            </thead>
            <tbody>
            <?php $a = 1; foreach($plans as $plan){ ?>
            <tr>
                <td><?=$a++?></td>
                <td><?=$plan['plan']?></td>
                <td style="display: inline-flex;">
               <a href="adminEditPlan/<?=$plan['id']?>" class="btn btn-warning"><i class="icon icon-pencil"></i></a>
               <form action="adminEditPlan/<?=$plan['id']?>"  method="post" id="deleteproduct-<?=$plan['id'] ?>" style="display: none"><?=csrf_field()?></form>
               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal-<?=$plan['id']?>">X</button>
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

<?php foreach($plans as $plan){ ?>
<div class="modal fade" id="deleteProductModal-<?=$plan['id'] ?>" role="dialog" tabindex="-1" aria-lablledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Are you about to delete <?=$plan['plan'] ?>.</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No, keep it</button>
          <form id="deleteProduct-<?=$plan['id']?>" action="adminDeletePlan/<?=$plan['id']?>" method="post"><?=csrf_field()?>
          <button type="submit" class="btn btn-primary">Yes, delete it</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
<?php } ?>
 
<?= $this->endSection()?>