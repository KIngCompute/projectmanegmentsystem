<div id="contentContainer">
	<div class="middle" id="anchor-content">
	<div id="page:main-container">
		<div class="content-header">
			<?php echo form_open('profile/pwd_validate');?>
			<table cellspacing="0">
				<tbody>
					<tr>
						<td><h3 class="head-dashboard">Settings</h3></td>
						<td width="55px"><?php if($this->session->userdata('changepwd'))
							{ 
								echo anchor('profile','<span>Change Personal Details</span>','class="form-button" style="margin-right:10px"'); 
							}
							else
							{
								echo anchor('profile/changepassword','<span>Change Password</span>','class="form-button" style="margin-right:10px"'); 
							}	
							?>
</td>
						<td width="50px"><?php echo form_submit('changepwdbtn','Update','class="form-button"');?></td>
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
			
			<?php 
				if($this->session->userdata('err'))
				{
			?>
			<div id="div-error-close" class="msg msg-error" style="margin-bottom:20px">
				<p><strong><?php echo $this->session->userdata('err');?></strong></p>
				<?php echo anchor('profile/changepassword','close','class="close" onclick="return closeerrordiv()"');?>
			</div>
			<?php
					$this->session->unset_userdata('err');
				}
			?>
			
			<?php 
				if($this->session->userdata('err_cur'))
				{
			?>
			<div id="div-error-close" class="msg msg-error" style="margin-bottom:20px">
				<p><strong><?php echo $this->session->userdata('err_cur');?></strong></p>
				<?php echo anchor('profile/changepassword','close','class="close" onclick="return closeerrordiv()"');?>
			</div>
			<?php
					$this->session->unset_userdata('err_cur');
				}
			?>
			<div id="content">
						
				<div class="box">
						
						<div class="form">
								<p>
									<span class="req">max 32 characters</span>
									<?php echo form_label('Current Password');?>
									<?php echo form_password('curpass','','class="field size1" required');?>
								</p>	
								
								<p>
									<span class="req">max 32 characters</span>
									<?php echo form_label('New Password'); ?>
									<?php echo form_password('npass','','class="field size1" required');?>
								</p>
								
								<p>
									<span class="req">max 32 characters</span>
									<?php echo form_label('Confirm Password'); ?>
									<?php echo form_password('cpass','','class="field size1" required');?>
								</p>
						</div>
					
						<?php echo form_close();?>
				</div>
				
				
			</div>
			
			<div class="cl">&nbsp;</div>			
			</div>
		</div>
</div>