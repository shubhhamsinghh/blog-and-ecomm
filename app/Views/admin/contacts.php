<?= $this->extend('layouts/admin') ?>
<?= $this->section('title')?> Contact Us <?= $this->endSection() ?>
<?= $this->section('content') ?>

	<div class="content">
<div class="card">

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Sr No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
            
            </thead>
            <tbody>
            <?php $a=1; foreach($contacts as $contact){ ?>
            <tr>
                <td><?=$a++;?></td>
                <td><?=$contact['first_name']." ".$contact['first_name']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['subject']?></td>
                <td><?=$contact['message']?></td>
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
 
<?= $this->endSection()?>