<!DOCTYPE html>
<html lang="en-US">
<head>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/style.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/demo.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/style1.css">
	<link rel="shortcut icon" href="<?php echo base_url();?>image/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url();?>image/favicon.ico" type="image/x-icon">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Project Management</title>
	
	<script src="<?php echo base_url();?>js/jquery.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	
	<!---- animated-css ---->
		<link href="<?php echo base_url();?>css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="<?php echo base_url();?>js/wow.min.js"></script>
		<script>
		 new WOW().init();
		</script>
	<!---- animated-css ---->

	<script src="<?php echo base_url();?>js/jquery-1.11.0.min.js"></script>
	
	<script src="<?php echo base_url();?>js/jquery.js"></script>
    <script src="<?php echo base_url();?>js/jquery.bpopup.min.js"></script>
	<script type="text/javascript">
        ;(function($) {
        $(function() {
            $('#quote-link').bind('click', function(e) {
                e.preventDefault();
                $('#quote-form').bPopup({
					modalClose: true,
					opacity: 0.2,
            		speed: 750,
            		transition: 'slideDown',
					positionStyle: 'fixed'
				});
            });
         });
     })(jQuery);
	</script>
	
<script type="text/javascript">
$(document).ready(function(){
	$('#project_title').focus(); 
	$('#quote-link').click(function(){
		document.getElementById('project_title').value="";
		document.getElementById('type_project').value="none";
		document.getElementById('budget_project').value="none";
		document.getElementById('priority_project').value="none";
		document.getElementById('describe_pro').value="";
		document.getElementById('fullname').value="";
		document.getElementById('quote_email').value="";
		document.getElementById('phone_no').value="";
		document.getElementById('quote_err').innerHTML="";
	});
	$('#quote-send').click(function(){ 
		var ptitle = $('#project_title');
		var ptype = $('#type_project');
		var pbudget = $('#budget_project');
		var ppriority = $('#priority_project');
		var pdesc = $('#describe_pro');
		var fname = $('#fullname');
		var quote_email = $('#quote_email');
		var phone = $('#phone_no'); 
		var quote_err = $('#quote_err');
		if(ptitle.val() == ''){
			ptitle.focus(); 
			quote_err.html('<span id="error-quote">Enter the Project title</span>');
			return false;
		}
		if(ptype.val() == 'none'){ 
			ptype.focus(); 
			quote_err.html('<span id="error-quote">Select the Project type</span>');
			return false;
		}
		if(pbudget.val() == 'none'){ 
			pbudget.focus(); 
			quote_err.html('<span id="error-quote">Select the Project budget</span>');
			return false;
		}
		if(ppriority.val() == 'none'){ 
			ppriority.focus(); 
			quote_err.html('<span id="error-quote">Select the Project priority</span>');
			return false;
		}
		if(pdesc.val() == ''){ 
			pdesc.focus();
			quote_err.html('<span id="error-quote">Enter the Description</span>');
			return false;
		}
		if(fname.val() == ''){ 
			fname.focus();
			quote_err.html('<span id="error-quote">Enter the Name</span>');
			return false;
		}
		if(quote_email.val() == ''){ 
			quote_email.focus();
			quote_err.html('<span id="error-quote">Enter the Email</span>');
			return false;
		}
		if(phone.val() == ''){ 
			phone.focus();
			quote_err.html('<span id="error-quote">Enter the Phone no</span>');
			return false;
		}
		if(ptitle.val() != '' && ptype.val() != 'none' && pbudget.val() != 'none' && ppriority.val() != 'none' && pdesc.val() != '' && fname.val() != '' && quote_email.val() != '' && phone.val() != ''){
		
			var UrlToPass = 'pro_title='+ptitle.val()+'&pro_type='+ptype.val()+'&est_bud='+pbudget.val()+'&priority='+ppriority.val()+'&desc_pro='+pdesc.val()+'&fname='+fname.val()+'&email='+quote_email.val()+'&pno='+phone.val();
			$.ajax({ 
			type : 'POST',
			data : UrlToPass,
			url  : '<?php echo base_url(); ?>index.php/quote/create',
			success: function(responseText){
				if(responseText == 1){
					alert('Quote send Successfully!!!');
					location.reload();
				}
				else{
					quote_err.html('<div id="error-quote">'+responseText+'</div>');
				}
			}
			});
		}
		return false;
	});
});
</script>
	
	<script type="text/javascript">
        ;(function($) {
        $(function() {
            $('#newsletter').bind('click', function(e) {
                e.preventDefault();
                $('#newsletter-form').bPopup({
					opacity: 0.2,
					speed: 650,
            		transition: 'slideDown',
					positionStyle: 'fixed'
				});
            });
         });
     })(jQuery);
	</script>
	
	<script type="text/javascript">
$(document).ready(function(){
	$('#name').focus(); 
	$('#newsletter').click(function(){
		document.getElementById('name').value="";
		document.getElementById('email').value="";
		document.getElementById('newsletter_err').innerHTML="";
		document.getElementById('newsletter_ok').innerHTML="";
	});
	$('#newsletter-send').click(function(){ 
		var name = $('#name'); 
		var email = $('#email'); 
		var newsletter_err = $('#newsletter_err');
		var newsletter_ok = $('#newsletter_ok'); 
		if(name.val() == ''){ 
			name.focus(); 
			newsletter_err.html('<span id="error-newsletter">Enter the Name</span>');
			return false;
		}
		if(email.val() == ''){ 
			email.focus();
			newsletter_err.html('<span id="error-newsletter">Enter the Email</span>');
			return false;
		}
		if(name.val() != '' && email.val() != ''){
			var UrlToPass = 'name='+name.val()+'&email='+email.val();
			$.ajax({ 
			type : 'POST',
			data : UrlToPass,
			url  : '<?php echo base_url(); ?>index.php/newsletter/news',
			success: function(responseText){
				if(responseText == 0){
					newsletter_err.html('<span id="error-newsletter">Name or Email Incorrect!</span>');
				}
				else if(responseText == 1){
					newsletter_err.html('');
					alert('Subscribe Successfully!!!');
					location.reload();
				}
				else{
					alert('Problem with sql query'+responseText);
				}
			}
			});
		}
		return false;
	});
});
</script>

	<script>
        jQuery(document).ready(function ($) {

            var _CaptionTransitions = [];
            _CaptionTransitions["L"] = { $Duration: 900, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["R"] = { $Duration: 900, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["T"] = { $Duration: 900, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["B"] = { $Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["ZMF|10"] = { $Duration: 900, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 };
            _CaptionTransitions["RTT|10"] = { $Duration: 900, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} };
            _CaptionTransitions["RTT|2"] = { $Duration: 900, $Zoom: 3, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 0.5} };
            _CaptionTransitions["RTTL|BR"] = { $Duration: 900, x: -0.6, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.8} };
            _CaptionTransitions["CLIP|LR"] = { $Duration: 900, $Clip: 15, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
            _CaptionTransitions["MCLIP|L"] = { $Duration: 900, $Clip: 1, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic} };
            _CaptionTransitions["MCLIP|R"] = { $Duration: 900, $Clip: 2, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic} };

            var options = {
                $FillMode: 2,                                       
                $AutoPlay: true,                                    
                $AutoPlayInterval: 4000,                            
                $PauseOnHover: 1,                                   

                $ArrowKeyNavigation: true,   			            
                $SlideEasing: $JssorEasing$.$EaseOutQuint,          
                $SlideDuration: 800,                               
                $MinDragOffsetToSlide: 20,                         
    	        $SlideSpacing: 0, 					                
                $DisplayPieces: 1,                                  
                $ParkingPosition: 0,                                
                $UISearchMode: 1,                                   
                $PlayOrientation: 1,                                
                $DragOrientation: 1,                                

                $CaptionSliderOptions: {                            
                    $Class: $JssorCaptionSlider$,                   
                    $CaptionTransitions: _CaptionTransitions,       
                    $PlayInMode: 1,                                 
                    $PlayOutMode: 3                                 
                },

                $BulletNavigatorOptions: {                          
                    $Class: $JssorBulletNavigator$,                 
                    $ChanceToShow: 2,                               
                    $AutoCenter: 1,                                 
                    $Steps: 1,                                      
                    $Lanes: 1,                                      
                    $SpacingX: 8,                                   
                    $SpacingY: 8,                                   
                    $Orientation: 1,                                
                    $Scale: false                                   
                },

                $ArrowNavigatorOptions: {                           
                    $Class: $JssorArrowNavigator$,                  
                    $ChanceToShow: 1,                               
                    $AutoCenter: 2,                                 
                    $Steps: 1                                       
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
			
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
 
        });
    </script>
	
	    <!-- start country and state -->
	
		<script type= "text/javascript" src = "<?php echo base_url('js/countries.js'); ?>"></script>
		<script type="text/javascript">
		function closediv()
		{
			document.getElementById('div-close').style.display = "none";
		}
		
		function closeerrordiv()
		{
			document.getElementById('div-error-close').style.display = "none";
		}
	</script>
    <!--  country and state -->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.1.min.js"></script>
	
<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.fancybox.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	$(".fancybox-effects-d").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});
});
</script>
</head>

<body>
<div class="page-element">
	<div class="header">
		<div class="header-content">
			<div class="header-top clear">
				<div class="logo">
					<?php /*?><a href="<?php echo base_url();?>index.php/page"><img src="<?php echo base_url();?>image/logo.png" ></a><?php */?>
				</div>
				<div class="header-top-right">
					<?php
					$loggedin = $this->session->userdata('pms-client');
					$logged = $this->session->userdata('pms-emp');
					if((isset($loggedin) && $loggedin == TRUE) || (isset($logged) && $logged == TRUE))
					{
					?> 
						<div class="header-right">
							<p class="super">
								Welcome <?php if(isset($loggedin) && $loggedin == TRUE){echo $this->session->userdata('client');}else{echo $this->session->userdata('emp');}?><span class="separator">|</span><?php echo anchor('login','ki-Helpdesk');?><span class="separator">|</span><?php 
								if(isset($loggedin) && $loggedin == TRUE)
								{
									echo anchor('ki_dashboard/logout','Sign Out','class="link-logout"');
								}
								elseif(isset($logged) && $logged == TRUE)
								{
									echo anchor('ki_dash/logout','Sign Out','class="link-logout"');
								}?>
							</p>
						</div>
					<?php
					}
					else
					{
					?>
						<div class="buttons-links clear">
							<?php echo anchor('login','Login','id="login"');?>
							<?php echo anchor('signup','Sign Up','id="register"');?>
						</div>
					<?php
					}
					?>
					<div class="contact-no">
						0261-6063344
					</div>
				</div>
			</div>
			
			<div id="feedback">
				<a href="#" id="quote-link">
					<img alt="contact details" src="<?php echo base_url();?>image/quick_quote.png">
				</a>
			</div>
			
			<div class="header-bottom">
				<div class="header-bottom-content">
					<div class="menu clear">
						<?php echo anchor('page','Home',activate_menu('page'));?>
						<?php echo anchor('about','About Us',activate_menu('about'));?>
						<?php echo anchor('services','Service',activate_menu('services'));?>
						<?php echo anchor('contact','Contact Us',activate_menu('contact'));?>						
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
      <div class="quote-box" id="quote-form">
        <h1 class="pagetitle">Quick Quote</h1>
		<br>
			<div id="quote_err">
			
			</div>
		<div class="quoteform">
			<h3 class="pro_title">Project Detail</h3>
				<table>
					<tr>
						<td><span class="label-text"><?php echo form_label('Project title:');?></span></td>
						<td><?php echo form_input('pro_title',set_value('pro_title'),'class="quote_input" id="project_title" required');?></td>
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr>
						<td><span class="label-text"><?php echo form_label('Type of project:','','class="label-text"');?></span></td>
						<td><?php $arr = array(
											'none' => 'Select project type',
											'I need Internet marketing' => 'I need Internet marketing',
											'I need Website maintenance' => 'I need Website maintenance',
											'I need Web hosting services' => 'I need Web hosting services',
											'I need Content development' => 'I need Content development',
											'I need Website designing' => 'I need Website designing',
											'I need CMS website development' => 'I need CMS website development',
											'Others' => 'Others',
											); ?>
							<?php echo form_dropdown('pro_type',$arr,set_value('pro_type'),'class="quote_input" id="type_project" required');?>
						</td>
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr>
						<td><span class="label-text"><?php echo form_label('Estimated budget:');?></span></td>
						<td><?php $arr = array(
											'none' => 'Select budget',
											'$50-$100' => '$50-$100',
											'$101-$300' => '$101-$300',
											'$301-$500' => '$301-$500',
											'$501-$1,500' => '$501-$1,500',
											'$3,000-$5,000' => '$3,000-$5,000',
											'$5,001-$10000' => '$5,001-$10000',
											'$10,000+' => '$10,000+',
											); ?>
							<?php echo form_dropdown('est_bud',$arr,set_value('est_bud'),'class="quote_input" id="budget_project" required');?>
						</td>
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr>
						<td><span class="label-text"><?php echo form_label('Priority:');?></span></td>
						<td><?php $arr = array(
											'none' => 'Select priority',
											'Low' => 'Low',
											'Medium' => 'Medium',
											'High' => 'High',
											'Critical' => 'Critical',
											); ?>
							<?php echo form_dropdown('priority',$arr,set_value('priority'),'class="quote_input" id="priority_project" required');?>
						</td>
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr>
						<td><span class="label-text"><?php echo form_label('Describe project:');?></span></td>
						<td><?php echo form_textarea('desc_pro','','class="quote_input" id="describe_pro" style="height:80px !important" required');?></td>
					</tr>
				</table>
				<h3 class="pro_title">Personal Information</h3>
					<table>
						<tr>
							<td><span class="label-text"><?php echo form_label('Full Name:');?></span></td>
							<td><?php echo form_input('fname',set_value('fname'),'class="quote_input" id="fullname" required');?></td>
						</tr>
						
						<tr>
							<td><span class="label-text"><?php echo form_label('E-mail:');?></span></td>
							<td><?php echo form_input('email',set_value('email'),'class="quote_input" id="quote_email" required');?></td>
						</tr>
						
						<tr>
							<td><span class="label-text"><?php echo form_label('Phone no:');?></span></td>
							<td><?php echo form_input('pno',set_value('pno'),'class="quote_input" id="phone_no" required');?></td>
						</tr>
						
						<tr>
							<td></td>
							<td><?php echo form_submit('sbtn','Submit','class="signup-btn" style="margin-top:20px;" id="quote-send"');?></td>
						</tr>
					</table>
		</div>
      </div>