<div class="banner">
		<div id="slider1_container" style="position: relative; margin: 0 auto;
        top: 0px; left: 0px; width:1200px; height:400px; overflow: hidden;">
        
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
            <div style="position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
        </div>
        
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:1200px;
            height:400px; overflow: hidden;">
			<?php
				foreach($banner_list as $banner)
				{
			?>
				<div>
					 <img u="image" src="<?php echo base_url();?>uploads/<?php echo $banner->image;?>" alt="Banner Image"/>
				</div>
			<?php
				}
			?>
        </div>
		
		<div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
            <div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
        	</div>
		
			<span u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
        	</span>
        
        	<span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 123px; right: 8px">
        	</span>
    	</div>
	</div>
	<!--<div class="shadow">
    	<img src="image/shadow.png" alt="">
    </div>-->
	<div class="info-grid wow bounce" data-wow-delay="0.1s">
	<div class="categories clear">
		<div class="col-md-4 info-grids-cr wow bounceIn" data-wow-delay="0.4s" id="category">
			<div class="category-icon">
				<div class="round">	
					<div class="cat-image-training"></div>
				</div>
			</div>
			<div class="category-details">
				<div class="cat-title">
					Our Training
				</div>
				<div class="cat-txt">
					<p>Prior to attending this web development 
					training course, participants should be familiar 
					with using personal computers with a mouse and 
					keyboard and possess basic typing skills. 
					You should be comfortable and have basic experience 
					with the underlying operating system (Windows or Macintosh). 
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 info-grids-cr wow bounceIn" data-wow-delay="0.4s" id="category">
			<div class="category-icon">
				<div class="round">
					<div class="cat-image-speciality"></div>
				</div>
			</div>
			<div class="category-details">
				<div class="cat-title">
					Our Speciality
				</div>
				<div class="cat-txt">
					<p>Tailored solutions for our customers, 
					delivering service, quality, speed and value.
					Unique ability to manage complexity through 
					our project management expertise.
					Foundation of strong compliance (cGMP, Safety, Environmental).
					Infusing proprietary technology to bring 
					value to our customers.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 info-grids-cr wow bounceIn" data-wow-delay="0.4s" id="category">
			<div class="category-icon">
				<div class="round">
					<div class="cat-image-services"></div>
				</div>
			</div>
			<div class="category-details">
				<div class="cat-title">
					Our Services
				</div>
				<div class="cat-txt">
					<p>We services,Understanding where you are - and where you need to be,
					Expect the Unexpected Protect your bussiness,
					Minimize your risk,
					maintain your job and bussiness,
					Save time,save money and simplify IT deployment,
					We provide services to simplify.
					</p>
				</div>
			</div>
		</div>
		
	</div>
	</div>
<div class="info-grid wow bounce" data-wow-delay="0.1s">
<div class="portfolio">
<div class="portfolio-content clear">

<div class="portfolio-list">
<?php /*?><?php
	foreach($portfolio_list as $portfolio)
	{
?>	
		<div class="col-md-4 info-grids-cr wow bounceIn" data-wow-delay="0.4s" id="project">
			 <a class="fancybox-effects-d" rel="gallery1" href="<?php echo base_url();?>uploads/portfolio/<?php echo $portfolio->image;?>" title="<?php echo $portfolio->url; ?>">
			 <img u="image" src="<?php echo base_url();?>uploads/portfolio/small/<?php echo $portfolio->image1;?>" />
			</a>
		</div>
<?php
	}
?>
<div class="project-viewall"><a href="<?php echo base_url();?>index.php/portfolio"> View All </a></div><?php */?>
</div>
</div>
</div>
</div>

<div class="clients clear">
		<div class="clients-title">Our Clients</div>
		<div class="clients-content clear">
		<div class="wrap">
			<ul id="flexiselDemo3">
			<li><img src="<?php echo base_url();?>image/c1.png" /></li>
			<li><img src="<?php echo base_url();?>image/c2.png" /></li>
			<li><img src="<?php echo base_url();?>image/c3.png" /></li>
			<li><img src="<?php echo base_url();?>image/c4.png" /></li>
		 </ul>
			</div>
		</div>
	</div>

