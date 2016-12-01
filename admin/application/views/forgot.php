<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PMS-Helpdesk Admin Login</title>
	
	
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Style/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Style/boxes.css" media="all">

    <!--[if IE]> <link rel="stylesheet" href="http://www.shashwatsarees.com/skin/adminhtml/default/default/iestyles.css" type="text/css" media="all" /> <![endif]-->
    <!--[if lt IE 7]> <link rel="stylesheet" href="http://www.shashwatsarees.com/skin/adminhtml/default/default/below_ie7.css" type="text/css" media="all" /> <![endif]-->
    <!--[if IE 7]> <link rel="stylesheet" href="http://www.shashwatsarees.com/skin/adminhtml/default/default/ie7.css" type="text/css" media="all" /> <![endif]-->
</head>
<body id="page-login">
	<h1 class="admin-title">PMS-Helpdesk Admin Login</h1>
    <div class="login-container">
        <div class="login-box">
            <?php echo form_open('login/validate_forgot');?>
                <div class="login-form">
                    <h2>Login to Admin Panel</h2>
					
					<?php 
					if($this->session->userdata('err')) 
					{ 
					?>
						<div id="messages">
								<ul class="messages">
									<li class="error-msg">
										<ul>
											<li><span><?php echo $this->session->userdata('err'); ?></span></li>
										</ul>
									</li>
								</ul>                    
							</div>
					<?php
						$this->session->unset_userdata('err');	
					}
					?>
					
					<?php 
					if($this->session->userdata('tech_err')) 
					{ 
					?>
						<div id="messages">
								<ul class="messages">
									<li class="error-msg">
										<ul>
											<li><span><?php echo $this->session->userdata('tech_err'); ?></span></li>
										</ul>
									</li>
								</ul>                    
							</div>
					<?php
						$this->session->unset_userdata('tech_err');	
					}
					?>
					
					<?php 
					if($this->session->userdata('validation_errors')) 
					{ 
					?>
						<div id="messages">
								<ul class="messages">
									<li class="error-msg">
										<ul>
											<li><span><?php echo $this->session->userdata('validation_errors'); ?></span></li>
										</ul>
									</li>
								</ul>                    
							</div>
					<?php
						$this->session->unset_userdata('validation_errors');	
					}
					?>
					
                    <div class="input-box input-left"><label for="username">E-mail:</label><br>
                        <?php echo form_input('email','','id="username" class="required-entry input-forgot" required');?>
						<!--<div class="validation-advice" id="advice-required-entry-username">This is a required field.</div>-->
						</div>
						
						
                    <div class="clear"></div>
					
                    <div class="form-buttons">
                        <?php echo anchor('login','Return to Login','class="back-forgot"');?>
                        <?php echo form_submit('forgotbtn','Submit','class="form-button" title="Submit"');?></div>
                </div>
                <p class="legal">Copyright &copy; 2015 PMS </p>
            <?php echo form_close(); ?>
            <div class="bottom"></div>
			
        </div>
    </div>



</body>
</html>