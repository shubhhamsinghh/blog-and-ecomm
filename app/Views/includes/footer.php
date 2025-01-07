<?php
use App\Models\Link;
?>


<footer class="page-footer bg-image" style="background-image: url(<?=base_url('assets/img/world_pattern.svg')?>">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-3 py-3">
          <h3>SEOGram</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero amet, repellendus eius blanditiis in iusto eligendi iure.</p>
          <?php 
          $model = new Link();
          $address = $model->findall();
          ?>
          <div class="social-media-button">
          <?php foreach($address as $add){?>
            <a href="<?=$add['facebook']?>"><span class="mai-logo-facebook-f"></span></a>
            <a href="<?=$add['twitter']?>"><span class="mai-logo-twitter"></span></a>
            <a href="<?=$add['google']?>"><span class="mai-logo-google-plus-g"></span></a>
            <a href="<?=$add['instagram']?>"><span class="mai-logo-instagram"></span></a>
            <a href="<?=$add['youtube']?>"><span class="mai-logo-youtube"></span></a>
          <?php } ?>
          </div>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
              <li><a href="about">About Us</a></li>
              <li><a href="#">Career</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Help & Support</a></li>
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Contact Us</h5>
          <p>203 Fake St. Mountain View, San Francisco, California, USA</p>
          <a href="#" class="footer-link">+00 1122 3344 5566</a>
          <a href="#" class="footer-link">seogram@temporary.com</a>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Newsletter</h5>
          <p>Get updates, news or events on your mail.</p>
          <form action="<?=base_url('newslatter')?>" method="post">
            <input type="text" class="form-control" placeholder="Enter your email.." name="email">
            <?php if(session()->getFlashdata('validation')){ ?>
            <div class="alert alert-danger">
              <?=session()->getFlashdata('validation')?>
            </div>
            <?php } ?>
            <button type="submit" class="btn btn-success btn-block mt-2">Subscribe</button>
          </form>
           <?php if(session()->getFlashdata('success_footer')){ ?>
            <div class="alert alert-success">
              <?=session()->getFlashdata('success_footer')?>
            </div>
            <?php } ?>
        </div>
      </div>

      <p class="text-center" id="copyright">Copyright &copy; 2020. This template design and develop by <a href="https://macodeid.com/" target="_blank">MACode ID</a></p>
    </div>
  </footer>