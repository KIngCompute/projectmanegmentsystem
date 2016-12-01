<div id="contentContainer">
	<div class="middle" id="anchor-content">
	<div id="page:main-container">
		<div class="content-header">
			<?php echo form_open('profile/validate');?>
			<table cellspacing="0">
				<tbody>
					<tr>
						<td><h3 class="head-dashboard">Settings</h3></td>
						<td width="55px"><?php if($this->session->userdata('admin-detail'))
							{ 
								echo anchor('profile/changepassword','<span>Change Password</span>','class="form-button" style="margin-right:10px"'); 
							}
							else
							{
								echo anchor('profile','<span>Change Personal Details</span>','class="form-button" style="margin-right:10px"'); 
							}	
							?></td>
						<td width="50px"><?php echo form_submit('updatebtn','Update','class="form-button"');?></td>
						
					</tr>
				</tbody>
			</table>
			</div>
			<?php 
				if($this->session->userdata('msg'))
				{
			?>
			<div id="div-close" class="msg msg-ok" style="margin-bottom:20px">
				<p><strong><?php echo $this->session->userdata('msg');?></strong></p>
				<img src="<?php echo base_url();?>images/close.gif" style="width:35px;height:35px;cursor:pointer;position:absolute;right:0px;top:0px" onClick="return closediv();" />
			</div>
			<?php
					$this->session->unset_userdata('msg');
				}
			?>
			
			<?php 
				if($this->session->userdata('validation_errors'))
				{
			?>
				<div id="div-error-close" class="msg msg-error" style="margin-bottom:20px">
				<strong><?php echo $this->session->userdata('validation_errors');?></strong>
				<img src="<?php echo base_url();?>images/close.gif" style="width:35px;height:35px;cursor:pointer;position:absolute;right:0px;top:0px" onClick="return closeerrordiv();" />
				</div>
			<?php
					$this->session->unset_userdata('validation_errors');
				}
			?>
			
			<div id="content">
						
				<div class="box">
						
						<div class="form">
								<p>
								<?php foreach($arr as $res):?>
									<?php
										$fname = $res['firstname'];
										$lname = $res['lastname'];
										$uname = $res['username'];
										$email = $res['email']; 
									?>
									<span class="req">max 50 letters</span>
									<?php echo form_label('First Name');?>
									<?php echo form_input('firstname',"$fname",'class="field size1" required');?>
								</p>	
								
								<p>
									<span class="req">max 50 letters</span>
									<?php echo form_label('Last Name'); ?>
									<?php echo form_input('lastname',"$lname",'class="field size1" required');?>
								</p>
								
								<p>
									<span class="req">max 15 letters</span>
									<?php echo form_label('Username'); ?>
									<?php echo form_input('username',"$uname",'class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('E-mail'); ?>
									<?php echo form_input('email',"$email",'class="field size1" required');?>
								</p>
								<?php endforeach ?>
						</div>
					
					<?php echo form_close();?>
				</div>
				
				
			</div>
					
			</div>
		</div>
</div>