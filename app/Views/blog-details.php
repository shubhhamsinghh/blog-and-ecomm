<?= $this->extend('layouts/master') ?>
<?= $this->section('title')?> Blog Details <?= $this->endSection() ?>
<?= $this->section('content') ?>
 
<div class="page-section pt-5">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <ul class="breadcrumb p-0 mb-0 bg-transparent">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item"><a href="blog">Blog</a></li>
          <li class="breadcrumb-item active">Second divided from form fish beastr</li>
        </ul>
      </nav>
      
      <div class="row">
        <div class="col-lg-8">
          <div class="blog-single-wrap">
            <div class="header">
              <div class="post-thumb">
                <img src="<?=base_url('blogs/'.$blog['thumbnail'])?>" alt="">
              </div>
              <div class="meta-header">
                <div class="post-author">
                  <div class="avatar">
                    <img src="<?=base_url()?>/assets/img/person/person_1.jpg" alt="">
                  </div>
                  by <a href="#"><?=$blog['name']?></a>
                </div>
              </div>
            </div>
            <h1 class="post-title">Second divided from form fish beastr</h1>
            <div class="post-meta">
              <div class="post-date">
                <span class="icon">
                  <span class="mai-time-outline"></span>
                </span> <a href="#"><?= date("d-M-Y",strtotime($blog['created_at']))?></a>
              </div>
              <div class="post-comment-count ml-2">
                <span class="icon">
                  <span class="mai-chatbubbles-outline"></span>
                </span> <a href="#"><?=$comment?> Comments</a>
              </div>
            </div>
            <div class="post-content">
              <?=$blog['description']?>
            </div>
          </div>

          <div class="comment-form-wrap pt-5">
            <h2 class="mb-5">Leave a comment</h2>
            <form action="<?=base_url('postComment')?>" method="post">
              <div class="form-row form-group">
                <div class="col-md-6">
                  <label for="name">Name *</label>
                  <input type="hidden" class="form-control" id="blog_id" name="blog_id" value="<?=$blog['id']?>">
                  <input type="text" class="form-control" id="name" name="commentName">
                   <div class="text-danger"><?=isset($validation) ? display_error($validation, 'commentName') : ''?></div>
                </div>
                <div class="col-md-6">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email" name="commentEmail">
                   <div class="text-danger"><?=isset($validation) ? display_error($validation, 'commentEmail') : ''?></div>
                </div>
              </div>
  
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="commentMessage" id="message" cols="30" rows="8" class="form-control"></textarea>
                 <div class="text-danger"><?=isset($validation) ? display_error($validation, 'commentMessage') : ''?></div>
              </div>
              <div class="form-group">
                <input type="submit" value="Post Comment" class="btn btn-primary">
              </div>
  
            </form>
            <?php if(session()->getFlashdata('success')){ ?>
            <div class="alert alert-success">
                <?=session()->getFlashdata('success')?>
            </div>
            <?php } ?>
          </div>

        </div>
        <div class="col-lg-4">
          <div class="widget">
            <!-- Widget search -->
            <!-- <div class="widget-box">
              <form action="#" class="search-widget">
                <input type="text" class="form-control" placeholder="Enter keyword..">
                <button type="submit" class="btn btn-primary btn-block">Search</button>
              </form>
            </div> -->

            <!-- Widget Categories -->
            <div class="widget-box">
              <h4 class="widget-title">Category</h4>
              <div class="divider"></div>

              <ul class="categories">
                <?php foreach($categories as $category){?>
                <li><a href="<?=base_url('category/'.$category['id'])?>"><?=$category['name']?></a></li>
              <?php } ?>
              </ul>
            </div>

            <!-- Widget recent post -->
            <div class="widget-box">
              <h4 class="widget-title">Recent Post</h4>
              <div class="divider"></div>
<?php foreach($blogs as $Rblog){?>
              <div class="blog-item">
                  <a class="post-thumb" href="">
                    <img src="<?=base_url('blogs/'.$Rblog['thumbnail'])?>" alt="">
                  </a>
                  <div class="content">
                    <h6 class="post-title"><a href="<?=base_url('blog-details/'.$Rblog['id'])?>"><?=$Rblog['title']?></a></h6>
                    <div class="meta">
                      <a href="#"><span class="mai-calendar"></span> <?= date("d-m-Y",strtotime($Rblog['created_at']))?></a>
                      <a href="#"><span class="mai-person"></span> <?=$blog['name']?></a>
                    </div>
                  </div>
              </div>
<?php } ?>
            </div>

            <!-- Widget Tag Cloud -->
            <div class="widget-box">
              <h4 class="widget-title">Tag Cloud</h4>
              <div class="divider"></div>

              <div class="tag-clouds">
                <a href="#" class="tag-cloud-link">Projects</a>
                <a href="#" class="tag-cloud-link">Design</a>
                <a href="#" class="tag-cloud-link">Travel</a>
                <a href="#" class="tag-cloud-link">Brand</a>
                <a href="#" class="tag-cloud-link">Trending</a>
                <a href="#" class="tag-cloud-link">Knowledge</a>
                <a href="#" class="tag-cloud-link">Food</a>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

<?= $this->endSection()?>