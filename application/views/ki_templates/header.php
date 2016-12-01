<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="<?php echo base_url();?>css/helpdesk.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/helpdesk1.css" type="text/css" />
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
	
<title>ki-Helpdesk</title>
</head>

<body>
<div class="page-element">
 	<div class="body-content">
		<div class="header">
			<div class="header-top">
				<div class="header-content">
					<img src="<?php echo base_url();?>image/ki-helpdesk-1.png" alt="Ki Helpdesk" />
				</div>
					<?php
					$loggedin = $this->session->userdata('pms-client');
					if(isset($loggedin) && $loggedin == "client")
					{
					?> 
						<div class="header-right">
							<p class="super">
								Welcome <a href="<?php echo base_url(); ?>index.php/ki_dashboard" style="color:#FFFFFF;text-decoration:none"><?php echo $this->session->userdata('client');?></a><span class="separator">|</span><?php $base = base_url(); echo anchor("$base",'Visit Website');?><span class="separator">|</span><?php echo anchor('profile','My Account');?><span class="separator">|</span><?php echo anchor('ki_dashboard/logout','Sign Out','class="link-logout"');?>
							</p>
						</div>
					<?php
					}
					?>
					
					<?php
					$logged = $this->session->userdata('pms-emp');
					if(isset($logged) && $logged == TRUE)
					{
					?> 
						<div class="header-right">
							<div class="super">
								<div>
								<?php
								$base = base_url();
								$uname = $this->session->userdata('emp');
								$image = get_image($uname);?>
								<a href="<?php echo $base; ?>index.php/ki_dash" style="color:#FFFFFF;text-decoration:none"><img src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" alt="Profile image" width="25" style="margin-top:3px">
								<div class="super-emp"><?php echo $this->session->userdata('emp');?></a><span class="separator">|</span><?php $base = base_url(); echo anchor("$base",'Visit Website');?><span class="separator">|</span><?php echo anchor('myprofile','My Account');?><span class="separator">|</span><?php echo anchor('ki_dash/logout','Sign Out','class="link-logout"');?></div>
								</div> 
							</div>
						</div>
					<?php
					}
					?>
 				</div>
			</div>
			<?php
			$cl_menu = $this->session->userdata('pms-client');
			if(isset($cl_menu) && $cl_menu == "client")
			{
			?> 
		<div class="menu">
		<ul>
			<li><?php echo anchor('project','Projects');?></li>
			<li><?php echo anchor('ticket','Ticket');?></li>
				<?php /*?><?php
					$loggedin = $this->session->userdata('pms-client');
					if(isset($loggedin) && $loggedin == TRUE)
					{
					?> 
				<ul>
					<li id="ticket"><?php echo anchor('config/types','Ticket');?>
						<ul>
							<li><?php echo anchor('config/types','Types');?></li>
							<li><?php echo anchor('config/status','Status');?></li>
						</ul>
					</li>
				</ul>
				<?php
					}
					?><?php */?>
			</li>
		</ul>
	</div>
	<?php
	}
	?>
	
	
	<?php
			$emp_menu = $this->session->userdata('pms-emp');
			if(isset($emp_menu) && $emp_menu == TRUE)
			{
			?> 
		<div class="menu">
		<ul>
			<li><?php echo anchor('projects','Projects');?></li>
			<li><?php echo anchor('task','Tasks');?></li>
			<li><?php echo anchor('reports','Reports');?></li>
		</ul>
	</div>
	<?php
	}
	?>