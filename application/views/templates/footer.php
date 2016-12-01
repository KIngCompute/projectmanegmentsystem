    <script type="text/javascript" src="<?php echo base_url();?>js/jssor.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jssor.slider.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flexisel.js"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	
<div class="newsletter">
		<div class="newsletter-content">
				<?php echo form_label('<span>Sign Up for Newsletter</span>');
				 echo form_button('btn','Subscribe',' style="width:100px;height:35px;background:#444444;color:#fff;border:none;border-radius:0 2px 2px 0;cursor:pointer;" id="newsletter"'); ?>
				<div class="quote-box" id="newsletter-form" style="display:none">
				<h1 class="pagetitle">Sign Up for newsletter</h1>
				
					<!--<div id="messages">
								<ul class="messages">
									<li class="error-msg">
										<ul>
											<li>
											</li>
										</ul>
									</li>
								</ul>                    
							</div>-->
					<div id="newsletter_err">
			
						</div>
						<!--<div id="messages">
								<ul class="messages">
									<li >
										<ul>
											<li>
											</li>
										</ul>
									</li>
								</ul>                    
							</div>-->
						<div id="newsletter_ok">
						
						</div>

			<div class="quoteform" style="padding-top:10px;">
			
			<table>
				<tr>
					<td><?php echo form_input('name',set_value('name'),'style="width:200px;height:25px" placeholder="Your Name" id="name" required');?></td>
				</tr>
				
				<tr></tr>
				
				<tr>
					<td><?php echo form_input('email',set_value('email'),'style="width:200px;height:25px" placeholder="Your Email Address" id="email" required'); ?></td>
				</tr>
				
				<tr></tr>
				
				<tr>
					<td><?php echo form_submit('btn','Submit','class="signup-btn" style="margin-top:20px;" id="newsletter-send"'); ?></td>
				</tr>
			</table>
			
				</div>
				</div>
			<!--<form method="post" action="" name="newsletter">
			<span>Newsletter</span><input class="newsletter-signup" type="text" placeholder="Your Email Address"><button type="submit">Submit</button>
			</form>-->
		</div>
	</div>
	<div class="footer">
		<div class="footer-content">
			<div class="clear">
				
				<div class="footer-menu">
						<?php echo anchor('page','Home');?>
						<?php echo anchor('about','About Us');?>
						<?php echo anchor('services','Service');?>
						<?php echo anchor('contact','Contact Us');?>	
				</div>
				
				<div class="col-md-4 footer-grid wow bounceIn" data-wow-delay="0.4s">
				<div class="social">
					<a href="https://www.facebook.com/kalikundinfotech" class="fb" target="_blank" title="Visit us on facebook"></a>
					<a href="https://twitter.com/kalikundinfo" class="twitter" target="_blank" title="Visit us on twitter"></a>
					<a href="https://plus.google.com/u/0/104185110609855023256" class="gplus" target="_blank" title="Visit us on google+"></a>
				</div>
				</div>
			</div>
			<div class="copyrights">
				Copyright &copy; Project Management System.com
			</div>
		</div>
	</div>
</div>
</body>
</html>