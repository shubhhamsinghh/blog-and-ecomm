<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
      <div class="container">
        <a href="#" class="navbar-brand">Seo<span class="text-primary">Gram.</span></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?=(uri_string() == 'home')?'active':''?>">
              <a class="nav-link" href="<?=base_url('home')?>">Home</a>
            </li>
            <li class="nav-item <?=(uri_string() == 'about')?'active':''?>">
              <a class="nav-link" href="<?=base_url('about')?>">About</a>
            </li>
            <li class="nav-item <?=(uri_string() == 'service')?'active':''?>">
              <a class="nav-link" href="<?=base_url('service')?>">Services</a>
            </li>
            <li class="nav-item <?=(uri_string() == 'blog')?'active':''?>">
              <a class="nav-link" href="<?=base_url('blog')?>">Blog</a>
            </li>
            <li class="nav-item <?=(uri_string() == 'contact')?'active':''?>">
              <a class="nav-link" href="<?=base_url('contact')?>">Contact</a>
            </li>
            <?php if(!session()->has('loggedUser')){?>
            <li class="nav-item <?=(uri_string() == 'login')?'active':''?>">
              <a class="nav-link" href="<?=base_url('login')?>">Login</a>
            </li>
          <?php }else{ ?>
               <li class="nav-item">
              <a class="nav-link" href="<?=base_url('logout')?>">Logout</a>
            </li>
          <?php } ?>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-2" href="#">Free Analytics</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <?= $this->renderSection("slider") ?>
  </header>