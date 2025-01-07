<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->renderSection('title')?></title>
     <link href="<?= base_url('assets/vendor/fontawesome-free/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('admin/assets/vendor/simple-line-icons/css/simple-line-icons.css')?>">
    <link rel="stylesheet" href="<?= base_url('admin/assets/vendor/font-awesome/css/fontawesome-all.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('admin/assets/css/styles.css')?>">
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    <?=$this->include('includes/admin/headerNavigation.php')?>

    <div class="main-container">
       <?=$this->include('includes/admin/sidebarNavigation.php')?>
      <?=$this->include('includes/admin/editor.php')?>
        <?= $this->renderSection('content')?>
    </div>
</div>
<script src="<?=base_url('admin/assets/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?=base_url('admin/assets/vendor/popper.js/popper.min.js')?>"></script>
<script src="<?=base_url('admin/assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('admin/assets/vendor/chart.js/chart.min.js')?>"></script>
<script src="<?=base_url('admin/assets/js/carbon.js')?>"></script>
<script src="<?=base_url('admin/assets/js/demo.js')?>"></script>
<?= $this->renderSection('script')?>
</body>
</html>
