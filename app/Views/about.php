<?= $this->extend('layouts/master') ?>
<?= $this->section('title')?> About <?= $this->endSection() ?>
<?=$this->section('slider')?>
 <div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">About</li>
              </ul>
            </nav>
            <h1 class="text-center">About Us</h1>
          </div>
        </div>
      </div>
    </div>
<?=$this->endsection() ?>
<?= $this->section('content') ?>
 
 <div class="page-section">
    <div class="container">
      <?php foreach($abouts as $about){ ?>
      <div class="row align-items-center">
        <div class="col-lg-6 py-3">
          <h2 class="title-section">The number #1 SEO Service Company</h2>
          <div class="divider"></div>

          <?=$about['about_us']?>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="<?=base_url('upload/'.$about['thumbnail'])?>" alt="">
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>

  <div class="page-section">
    <div class="container">
      <div class="text-center">
        <div class="subhead">Pricing Plan</div>
        <h2 class="title-section">Choose plan the right for you</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row mt-5">
        <?php $a=0; foreach($plans as $plan){?>
        <div class="col-lg-4 py-3">
          <div class="card-pricing <?=($a == '1')?'marked':''?>">
           <?=$plan['plan']?>
          </div>
        </div>
      <?php $a++; } ?>

      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

<?= $this->endSection()?>