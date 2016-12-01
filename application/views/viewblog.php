<div class="portfolio">
<div class="portfolio-content clear">
<div class="portfolio-title">View Blog</div>

<?php 
foreach($viewblog as $view):?>

<div class="projects-inform wow bounceInLeft" data-wow-delay="0.4s">
<div class="wrapper_top">
<div class="grid_news alpha">
<div class="blog-date-news"><span><?php echo $view->created; ?></span></div>
</div>
<div class="cont span_news_of_single">
<h4 class="blog_title" style="color:#00AEFF;"><?php echo $view->title; ?></h4>
<img src="<?php echo base_url();?>./uploads/<?php echo $view->image;?>" alt="news_image" width="790px" height="270px" class="m_img"/>
<h5 class="m_head">Description :</h5>
<p class="m_para"><?php echo $view->description; ?></p>
<?php echo anchor('blog','Back','class="arrow_btn"');?>
</div>
<div class="clear">&nbsp;</div>
</div>
</div>
<?php endforeach ?>
</div>
</div>