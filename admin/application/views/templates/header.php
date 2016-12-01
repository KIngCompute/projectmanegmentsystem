<?php
	date_default_timezone_set('Asia/Calcutta');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Dashboard PMS Admin</title>
<!--<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
--><link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Style/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Style/boxes.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Style/menu.css" media="screen, projection">

<link rel="stylesheet" href="<?php echo base_url(); ?>Style/jquery-ui.css">

<script type="text/javascript" src="<?php echo base_url(); ?>tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		//skin : "o2k7",
		//skin_variant : "silver",
		editor_selector : "myTextEditor",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){ 
		//alert("jquery applying");
		$("#i1").css("background-color","#c94b4b");
		$("#i1-span").css("color","#fff");
		$(".f2").hide();
		$(".f3").hide();
		$(".f4").hide();
		$("#i1").click(function(){
			$("#i1").css("background-color","#c94b4b");
			$("#i1-span").css("color","#fff");
			$("#i2").css("background-color","");
			$("#i2-span").css("color","#000");
			$("#i3").css("background-color","");
			$("#i3-span").css("color","#000");
			$("#i4").css("background-color","");
			$("#i4-span").css("color","#000");
			$(".f2").hide();
			$(".f3").hide();
			$(".f4").hide();
			$(".f1").fadeIn();
		});
		$("#i2").click(function(){
			$("#i1").css("background-color","");
			$("#i1-span").css("color","#000");
			$("#i2").css("background-color","#c94b4b");
			$("#i2-span").css("color","#fff");
			$("#i3").css("background-color","");
			$("#i3-span").css("color","#000");
			$("#i4").css("background-color","");
			$("#i4-span").css("color","#000");
			$(".f1").hide();
			$(".f3").hide();
			$(".f4").hide();
			$(".f2").fadeIn();
		});
		$("#i3").click(function(){
			$("#i1").css("background-color","");
			$("#i1-span").css("color","#000");
			$("#i2").css("background-color","");
			$("#i2-span").css("color","#000");
			$("#i3").css("background-color","#c94b4b");
			$("#i3-span").css("color","#fff");
			$("#i4").css("background-color","");
			$("#i4-span").css("color","#000");
			$(".f1").hide();
			$(".f2").hide();
			$(".f4").hide();
			$(".f3").fadeIn();
		});
		$("#i4").click(function(){
			$("#i1").css("background-color","");
			$("#i1-span").css("color","#000");
			$("#i2").css("background-color","");
			$("#i2-span").css("color","#000");
			$("#i3").css("background-color","");
			$("#i3-span").css("color","#000");
			$("#i4").css("background-color","#c94b4b");
			$("#i4-span").css("color","#fff");
			$(".f2").hide();
			$(".f3").hide();
			$(".f1").hide();
			$(".f4").fadeIn();
		});
		$("#i5").click(function(){
			$("#i1").css("background-color","");
			$("#i1-span").css("color","#000");
			$("#i2").css("background-color","#c94b4b");
			$("#i2-span").css("color","#fff");
			$("#i3").css("background-color","");
			$("#i3-span").css("color","#000");
			$("#i4").css("background-color","");
			$("#i4-span").css("color","#000");
			$(".f1").hide();
			$(".f3").hide();
			$(".f4").hide();
			$(".f2").fadeIn();
		});
		$("#i6").click(function(){
			$("#i1").css("background-color","");
			$("#i1-span").css("color","#000");
			$("#i2").css("background-color","");
			$("#i2-span").css("color","#000");
			$("#i3").css("background-color","#c94b4b");
			$("#i3-span").css("color","#fff");
			$("#i4").css("background-color","");
			$("#i4-span").css("color","#000");
			$(".f2").hide();
			$(".f1").hide();
			$(".f4").hide();
			$(".f3").fadeIn();
		});
		$("#i7").click(function(){
			$("#i1").css("background-color","");
			$("#i1-span").css("color","#000");
			$("#i2").css("background-color","");
			$("#i2-span").css("color","#000");
			$("#i3").css("background-color","");
			$("#i3-span").css("color","#000");
			$("#i4").css("background-color","#c94b4b");
			$("#i4-span").css("color","#fff");
			$(".f2").hide();
			$(".f1").hide();
			$(".f3").hide();
			$(".f4").fadeIn();
		});
		
	});
  </script>

	 <script type= "text/javascript" src = "<?php echo base_url('js/countries.js'); ?>"></script>
    <script>
	function closediv()
	{
		document.getElementById('div-close').style.display="none";
	}
	function closeerrordiv()
	{
		document.getElementById('div-error-close').style.display="none";
	}
	</script>
	
	<script src="<?php echo base_url();?>js/jquery-1.11.0.min.js"></script>
	
	<script src="<?php echo base_url();?>js/jquery.js"></script>
    <script src="<?php echo base_url();?>js/jquery.bpopup.min.js"></script>
	<script type="text/javascript">
        ;(function($) {
        $(function() {
            $('.calendar-days').bind('click', function(e) {
                e.preventDefault();
                $('.field_set').bPopup({
					modalClose: true,
					opacity: 0.1,
            		speed: 750,
            		transition: 'slide',
					positionStyle: 'fixed'
				});
				
				$('.calendar-days').removeClass('selected');
				$(this).addClass('selected');
				var day_event = $('.selected .event-calendar').text();
				$('#day_event').val(day_event);
            });
         });
     })(jQuery);
	</script>
	<script type="text/javascript">
        ;(function($) {
        $(function() {
            $('.calendar-days-today').bind('click', function(e) {
                e.preventDefault();
                $('.field_set').bPopup({
					modalClose: true,
					opacity: 0.1,
            		speed: 750,
            		transition: 'slide',
					positionStyle: 'fixed'
				});
				
				$('.calendar-days').removeClass('selected');
				$(this).addClass('selected');
				var day_event = $('.selected .event-calendar').text();
				$('#day_event').val(day_event);
            });
         });
     })(jQuery);
	</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#addEvent').click(function() {
			var selected_day = $('.selected .schedulerDayHeading').text();
			var month_year = $('.calendar-title').text();
			var event_name =   $('#day_event').val();
			if( (selected_day == '') || (event_name == '') ){
				if(selected_day == ''){
					alert('select a valid day')
				}
				if(event_name == ''){
					alert('Enter an event name')
					
				}
			}else {
				$.ajax({
				url:window.location,
				type:'POST',
				data:{
					day		:selected_day,
					ename	:event_name
				},
				success : function (msg){
					location.reload();
				}
				});
			}
		});
		
		$('#delEvent').click(function() {
			var selected_day = $('.selected .schedulerDayHeading').text();
			var month = $('.calendar-title').text();
			var ename =   $('.selected .event-calendar').text();
			if(ename != '')
			{
				$.ajax({
					url:window.location,
					type:'POST',
					data:{
						day_to_delete :selected_day,
					},
					success : function (msg){
						location.reload();
					}
				});
			}else {
				alert('No events to delete');
			}
		});
	});
</script>
</head>

<body id="html-body" class=" adminhtml-dashboard-index">
	<div class="wrapper">
				<div class="header">
					<div class="header-top">
							<a href="dashboard"><P style="float:left;font-size:36px;margin-top:30px;color:#FFF;margin-left:10px;font-family:'Arial Black', Gadget, sans-serif;">Project Management System<P></a>
						<div class="header-right">
							<p class="super">
								Welcome <?php echo $this->session->userdata('admin');?><span class="separator">|</span><?php echo anchor('profile','Setting');?><span class="separator">|</span><?php echo anchor('dashboard/logout','Log Out','class="link-logout"');?>
							<br />
							<span style="float:right">Last Logged In : <?php echo $this->session->userdata('last_logged');?></span>
							</p>
						</div>
					</div>
        
					<div class="clear"></div>
				
					<?php include_once('menu.php'); ?>
      			</div>