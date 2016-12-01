<div class="middle-content">
	<div class="content-header">
			<?php echo form_open_multipart('myprofile/validate');?>
			<table cellspacing="0">
				<tbody>
					<tr>
						<td><h3 class="head-dashboard">About me</h3></td>
						
						<td width="50px"><?php echo form_submit('updatebtn','Save','class="form-button-save"');?></td>
					</tr>
				</tbody>
			</table>
	</div>
			<?php 
				if($this->session->userdata('msg'))
				{
			?>
			<div id="div-close" class="msg msg-ok">
				<p><strong><?php echo $this->session->userdata('msg');?></strong></p>
				<img src="<?php echo base_url();?>image/close-btn.png" style="width:20px;height:20px;cursor:pointer;position:absolute;right:9px;top:10px" onClick="return closediv();" />
			</div>
			<?php
					$this->session->unset_userdata('msg');
				}
			?>
			
			<?php 
				if($this->session->userdata('validation_errors'))
				{
			?>
			<div id="div-error-close" class="msg msg-error">
				<strong><?php echo $this->session->userdata('validation_errors');?></strong>
				<img src="<?php echo base_url();?>image/close-btn.png" style="width:20px;height:20px;cursor:pointer;position:absolute;right:9px;top:11px" onClick="return closeerrordiv();" />
			</div>
			<?php
					$this->session->unset_userdata('validation_errors');
				}
			?>
			
			<?php 
				if($this->session->userdata('pwderror'))
				{
			?>
			<div id="div-error-close" class="msg msg-error" style="margin-bottom:20px">
				<strong><?php echo $this->session->userdata('pwderror');?></strong>
				<img src="<?php echo base_url();?>image/close-btn.png" style="width:20px;height:20px;cursor:pointer;position:absolute;right:9px;top:11px" onClick="return closeerrordiv();" />
			</div>
			<?php
					$this->session->unset_userdata('pwderror');
				}
			?>
			
			<div id="content">
						
				<div class="box">
						<div class="form">
						
								<p>
								<?php foreach($emp as $res):?>
									<?php
										$id = $res->id;
										$fname = $res->fullname;
										$add = $res->address;
										$contact = $res->contact;
										$email = $res->email;
										$uname = $res->username;
										$pass = $res->password;
										$desg = $res->designation;
										$salary = $res->salary;
										$dob = $res->dob;
										$doj = $res->doj;
									?>
								<p>
									<img src="<?php echo base_url();?>/uploads/<?php echo $res->profile_image;?>" alt="profile_image" style="width:75px;height:75px;"/>
									<?php echo form_label('Profile Image'); ?>
									<?php echo form_upload('profile_image',$res->profile_image,'class="field size1"');?>
								</p>
								
								<p>
									<?php echo form_label('Employee Name');?>
									<?php echo form_input('fname',"$fname",'class="field size1" required');?>
									
									<?php echo form_hidden('id',"$id");?>
								</p>
								
								<p>
									<?php echo form_label('Address'); ?>
									<?php echo form_textarea('add',"$add",'class="field size1" required');?>
								</p>	
								
								<p>
									<?php echo form_label('E-mail'); ?>
									<?php echo form_input('email',"$email",'class="field size1" required');?>
									<?php echo form_hidden('email_hidden',"$email",'class="field size2"');?>
								</p>
								
								<p>
									<?php echo form_label('Username'); ?>
									<?php echo form_input('uname',"$uname",'class="field size1" required');?>
									<?php echo form_hidden('uname_hidden',"$uname",'class="field size2"');?>
								</p>
								
								<p>
									<?php echo form_label('Password'); ?>
									<?php echo form_password('pass','','class="field size1"');?>
								</p>
								
								<p>
									<?php echo form_label('Confirm Password'); ?>
									<?php echo form_password('cpass','','class="field size1"');?>
								</p>
								
								<p>
									<?php echo form_label('Date of Birth');?>
									<?php echo form_input('dob',"$dob",'class="field size1" id="datepicker" disabled="disabled"');?>
								</p>
								
								<p>
									<?php echo form_label('Designation');?>
									
									<?php echo form_input('desg',"$desg",'class="field size1" disabled="disabled"');?>
								</p>
								
								<p>
									<?php echo form_label('Salary');?>
									<?php echo form_input('salary',"$salary",'class="field size1" disabled="disabled"');?>
								</p>
								
								<p>
									<?php echo form_label('Date of Joining');?>
									<?php echo form_input('doj',"$doj", 'class="field size1" id="date" disabled="disabled"');?>
								</p>
								
								<p>
									<?php echo form_label('Contact No.');?>
									<?php echo form_input('contact',"$contact",'maxlength="10" class="field size1" required');?>
								</p>
								
								
								<?php endforeach ?>
						</div>
					
					<?php echo form_close();?>
				</div>
				
				
			</div>
</div>