<?= $this->extend('layouts/admin') ?>
<?= $this->section('title')?> Blogs <?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="content">
<div class="card">
<div class="card-header bg-light">
   Admin Blogs
   <a href="adminNewBlog" class="btn btn-primary">Add Blog</a>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr><th>Sr. No</th>
                <th>Category</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            
            </thead>
            <tbody>
            <?php 
            $a = 1; 
            foreach($blogs as $blog){ ?>
            <tr>
                <td><?=$a++?></td>
               <td><?=$blog['name']?></td>
                <td><?=$blog['title']?></td>
                <td><?=$blog['description']?></td>
                <td><img src="<?=base_url('blogs/'.$blog['thumbnail'])?>" height="100px"></td>
                <td style="display: inline-flex;">
               <a href="adminEditBlog/<?=$blog['id']?>" class="btn btn-warning"><i class="icon icon-pencil"></i></a>
               <form action="adminEditBlog/<?=$blog['id']?>"  method="post" id="deleteproduct-<?=$blog['id'] ?>" style="display: none"><?=csrf_field()?></form>
               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal-<?=$blog['id']?>">X</button>
                </td>
            </tr>
          <?php } ?>

            </tbody>
        </table>
        <?= $pager->links('default') ?>
    </div>
</div>
</div>
<?php if(session()->getFlashdata('success')){ ?>
<div class="alert alert-success">
    <?=session()->getFlashdata('success')?>
</div>
<?php } ?>
</div>

<?php foreach($blogs as $blog){ ?>
<div class="modal fade" id="deleteProductModal-<?=$blog['id'] ?>" role="dialog" tabindex="-1" aria-lablledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Are you about to delete <?=$blog['title'] ?>.</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No, keep it</button>
          <form id="deleteProduct-<?=$blog['id']?>" action="adminDeleteBlog/<?=$blog['id']?>" method="post"><?=csrf_field()?>
          <button type="submit" class="btn btn-primary">Yes, delete it</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
<?php } ?>
 
<?= $this->endSection()?>