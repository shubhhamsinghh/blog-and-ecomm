<?= $this->extend('layouts/admin') ?>
<?= $this->section('title')?> Social Links <?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="content">
<div class="card">
<div class="card-header bg-light">
   Admin links
   <a href="adminNewLink" class="btn btn-primary">Add Links</a>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr><th>Sr. No</th>
                <th>Facebook</th>
                <th>Twitter</th>
                <th>Google</th>
                <th>Instagram</th>
                <th>YouTube</th>
                <th>Actions</th>
            </tr>
            
            </thead>
            <tbody>
            <?php 
            $a = 1; 
            foreach($links as $link){ ?>
            <tr>
                <td><?=$a++?></td>
               <td><?=$link['facebook']?></td>
                <td><?=$link['twitter']?></td>
                <td><?=$link['google']?></td>
                <td><?=$link['instagram']?></td>
                <td><?=$link['youtube']?></td>
                <td style="display: inline-flex;">
               <a href="adminEditLink/<?=$link['id']?>" class="btn btn-warning"><i class="icon icon-pencil"></i></a>
               <form action="adminEditLink/<?=$link['id']?>"  method="post" id="deleteproduct-<?=$link['id'] ?>" style="display: none"><?=csrf_field()?></form>
               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal-<?=$link['id']?>">X</button>
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

<?php foreach($links as $link){ ?>
<div class="modal fade" id="deleteProductModal-<?=$link['id'] ?>" role="dialog" tabindex="-1" aria-lablledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Are you about to delete These Links.</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No, keep it</button>
          <form id="deleteProduct-<?=$link['id']?>" action="adminDeleteLink/<?=$link['id']?>" method="post"><?=csrf_field()?>
          <button type="submit" class="btn btn-primary">Yes, delete it</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
<?php } ?>
 
<?= $this->endSection()?>