<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $this->renderSection("title") ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/css/maicons.css')?>">

  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">

  <link rel="stylesheet" href="<?= base_url('assets/vendor/animate/animate.css')?>">

  <link rel="stylesheet" href="<?= base_url('assets/css/theme.css')?>">
</head>
<body>
 <?=$this->include('includes/navigation.php') ?>
 <?= $this->renderSection("content") ?>
 <?=$this->include('includes/footer.php') ?>
 <script src="<?= base_url('assets/js/jquery-3.5.1.min.js')?>"></script>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js')?>"></script>

<script src="<?= base_url('assets/js/google-maps.js')?>"></script>

<script src="<?= base_url('assets/vendor/wow/wow.min.js')?>"></script>
	
<script src="<?= base_url('assets/js/theme.js')?>"></script>

 <?= $this->renderSection("script") ?>
</body>
</html>