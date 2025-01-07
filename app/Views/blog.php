<?= $this->extend('layouts/master') ?>
<?= $this->section('title')?> Services <?= $this->endSection() ?>
<?=$this->section('slider')?>
 <div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
                <li class="breadcrumb-item active">Blog</li>
              </ul>
            </nav>
            <h1 class="text-center">Blog</h1>
          </div>
        </div>
      </div>
    </div>
<?=$this->endsection() ?>
<?= $this->section('content') ?>
 
<div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-10">
          <form action="#" class="form-search-blog">
            <div class="input-group">
              <div class="input-group-prepend">
                <select id="categories" class="custom-select bg-light">
                  <option value="all">All Categories</option>
                  <?php foreach($categories as $category){?>
                  <option value="<?=$category['id']?>"><?=$category['name']?></option>
                  <?php }?>
                </select>
              </div>
              <input type="text" class="form-control" placeholder="Enter keyword.." id="filter">
            </div>
          </form>
        </div>
        <div class="col-sm-2 text-sm-right">
          <button class="btn btn-secondary">Filter <span class="mai-filter"></span></button>
        </div>
      </div>

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

         <?php  echo $pager->links(); ?>
      
  </div>

<?= $this->endSection()?>
<?=$this->section('script')?>
<script>
  $("option").click(function(){
    var dataFilter = $(this).val();
    $("#filter").val($(this).text());

    if(dataFilter == "all") {
      $(".blog").show();
    }
    else
    {
      $(".blog").hide();
      $(".blog_" + dataFilter).show();
    }
  });

</script>
<?= $this->endSection()?>
