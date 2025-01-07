<?= $this->extend('layouts/master') ?>
<?= $this->section('title')?> Blog Category <?= $this->endSection() ?>
<?=$this->section('slider')?>
 <div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('blog')?>">Blog</a></li>
                <li class="breadcrumb-item active">Category</li>
              </ul>
            </nav>
            <h1 class="text-center"><?=$category['name']?></h1>
          </div>
        </div>
      </div>
    </div>
<?=$this->endsection() ?>
<?= $this->section('content') ?>
 
<div class="page-section">
    <div class="container">

      <div class="row my-5">
        <?php foreach($blogs as $blog){?>
        <div class="blog col-lg-4 py-3 blog_<?=$blog['category_id']?>" >
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="<?=base_url('blogs/'.$blog['thumbnail'])?>" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details/<?=$blog['id']?>"><?=$blog['title']?></a></h5>
              <div class="post-date">Posted on <a href="blog-details<?=$blog['id']?>"><?=date('Y-m-d',strtotime($blog['created_at']))?></a></div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>

        
      
  </div>

<?= $this->endSection()?>

