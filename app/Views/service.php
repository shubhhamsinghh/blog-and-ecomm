<?= $this->extend('layouts/master') ?>
<?= $this->section('title')?> Services <?= $this->endSection() ?>
<?=$this->section('slider')?>
 <div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Services</li>
              </ul>
            </nav>
            <h1 class="text-center">Our Services</h1>
          </div>
        </div>
      </div>
    </div>
<?=$this->endsection() ?>
<?= $this->section('content') ?>
 
<div class="page-section">
    <div class="container">
      <div class="row">
        <?php foreach($services as $service){?>
        <div class="col-lg-4">
          <div class="card-service">
            <div class="header">
              <img src="<?=base_url('services/'.$service['thumbnail'])?>" alt="">
            </div>
            <div class="body">
              <h5 class="text-secondary"><?=$service['title']?></h5>
              <p><?=$service['description']?></p>
              <a href="service" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="text-center">
        <div class="subhead">Our services</div>
        <h2 class="title-section">How SEO Team Can Help</h2>
        <div class="divider mx-auto"></div>

        <div class="row">
          <?php foreach($seo_services as $seo_service){?>
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
            <div class="features">
              <div class="header mb-3">
                <img src="<?=('seo-services/'.$seo_service['thumbnail'])?>" style="height: 50px;border-radius: 50px;">
              </div>
              <h5><?=$seo_service['title']?></h5>
              <p><?=$seo_service['description']?></p>
            </div>
          </div>
        <?php }?>
        </div>

      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

<?= $this->endSection()?>