<?= $this->extend('layouts/master') ?>
<?= $this->section('title')?> Home <?= $this->endSection() ?>
<?=$this->section('slider')?>
<div class="container">
      <div class="page-banner home-banner">
        <div class="row align-items-center flex-wrap-reverse h-100">
          <div class="col-md-6 py-5 wow fadeInLeft">
            <h1 class="mb-4">Let's Check and Optimize your website!</h1>
            <p class="text-lg text-grey mb-5">Ignite the most powerfull growth engine you have ever built for your company</p>
            <a href="#" class="btn btn-primary btn-split">Watch Video <div class="fab"><span class="mai-play"></span></div></a>
          </div>
          <div class="col-md-6 py-5 wow zoomIn">
            <div class="img-fluid text-center">
              <img src="<?=base_url()?>/assets/img/banner_image_1.svg" alt="">
            </div>
          </div>
        </div>
        <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
      </div>
    </div>
<?=$this->endsection() ?>
<?= $this->section('content') ?>
  <div class="page-section">
    <div class="container">
      <div class="row">
        <?php foreach($services as $service){?>
        <div class="col-lg-4">
          <div class="card-service wow fadeInUp">
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

  <div class="page-section" id="about">
    <div class="container">
      <div class="row align-items-center">
        <?php foreach($abouts as $about){?>
        <div class="col-lg-6 py-3 wow fadeInUp">
          <span class="subhead">About us</span>
          <h2 class="title-section">The number #1 SEO Service Company</h2>
          <div class="divider"></div>
          <?=substr($about['about_us'],0, 250)?>
        <br>
          <a href="about" class="btn btn-primary mt-3">Read More</a>
        </div>
        <div class="col-lg-6 py-3 wow fadeInRight">
          <div class="img-fluid py-3 text-center">
            <img src="<?=base_url('upload/'.$about['thumbnail'])?>" alt="">
          </div>
        </div>
      <?php } ?>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Our services</div>
        <h2 class="title-section">How SEO Team Can Help</h2>
        <div class="divider mx-auto"></div>
      </div>

        <div class="row">
          <?php foreach($seo_services as $seo_service){?>
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
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

    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url(<?=base_url()?>/assets/img/bg_pattern.svg);">
      <div class="container text-center">
        <div class="row justify-content-center wow fadeInUp">
          <div class="col-lg-8">
            <h2 class="mb-4">Check your Website SEO</h2>
            <form action="#">
              <input type="text" class="form-control" placeholder="E.g google.com">
              <button type="submit" class="btn btn-success">Check Now</button>
            </form>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .wrap -->
  </div> <!-- .page-section -->

  <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Pricing Plan</div>
        <h2 class="title-section">Choose plan the right for you</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row mt-5">
        <?php $a=0; foreach($plans as $plan){?>
        <div class="col-lg-4 py-3 wow zoomIn">
          <div class="card-pricing <?=($a =='1')?'marked':''?>">
            <?=$plan['plan']?>
          </div>
        </div>
      <?php $a++;} ?>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <!-- Banner info -->
  <div class="page-section banner-info">
    <div class="wrap bg-image" style="background-image: url(<?=base_url()?>/assets/img/bg_pattern.svg);">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 pr-lg-5 wow fadeInUp">
            <h2 class="title-section">SEO to Improve Brand <br> Visibility</h2>
            <div class="divider"></div>
            <p>We're an experienced and talented team of passionate consultants who breathe with search engine marketing.</p>
            
            <ul class="theme-list theme-list-light text-white">
              <li>
                <div class="h5">SEO Content Strategy</div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
              </li>
              <li>
                <div class="h5">B2B SEO</div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
            <div class="img-fluid text-center">
              <img src="<?=base_url()?>/assets/img/banner_image_2.svg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .wrap -->
  </div> <!-- .page-section -->

  <!-- Blog -->
  <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Our Blog</div>
        <h2 class="title-section">Read Latest News</h2>
        <div class="divider mx-auto"></div>
      </div>

      <div class="row mt-5">
        <?php foreach($blogs as $blog){?>
        <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="<?=base_url('blogs/'.$blog['thumbnail'])?>" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details/<?=$blog['id']?>"><?=$blog['title']?></a></h5>
              <div class="post-date">Posted on <a href="blog-details/<?=$blog['id']?>"><?= date("d M-Y",strtotime($blog['created_at']))?></a></div>
            </div>
          </div>
        </div>
        <?php } ?>
        <!-- <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="<?=base_url()?>/assets/img/blog/blog-2.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="<?=base_url()?>/assets/img/blog/blog-3.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div> -->

        <div class="col-12 mt-4 text-center wow fadeInUp">
          <a href="blog" class="btn btn-primary">View More</a>
        </div>
      </div>
    </div>
  </div>

<?= $this->endSection()?>