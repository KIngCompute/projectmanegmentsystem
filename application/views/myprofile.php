<div class="middle-content">
	<div class="content-header">
			<?php echo form_open('profile/validate');?>
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
								<?php foreach($arr as $res):?>
									<?php
										$id = $res->id;
										$name = $res->name;
										$email = $res->email;
										$uname = $res->username;
										$company = $res->company;
										$web = $res->website;
										$country = $res->country;
										$state = $res->state;
										$city = $res->city;
										$add = $res->address;
										$code = $res->zipcode;
										$contact = $res->contact;
									?>
									<?php echo form_label('Client Name');?>
									<?php echo form_input('name',"$name",'class="field size1" required');?>
									
									<?php echo form_hidden('id',"$id");?>
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
									<?php echo form_label('Company Name (if any)'); ?>
									<?php echo form_input('company',"$company",'class="field size1"');?>
								</p>
								
								<p>
									<?php echo form_label('Website'); ?>
									<?php echo form_input('web',"$web",'class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Country');?>
										<select id="country" name ="country" class="field size1">
										<option value="<?php echo $country;?>"><?php echo $country;?></option>
										</select>
									<script language="javascript">
										populateCountries("country", "state");
									</script>
								</p>	
											
								<p>
									<?php echo form_label('State');?>
										<select name ="state" id ="state" class="field size1"></select>
									<script language="javascript">
										populateCountries("country", "state");
									</script>
								</p>
								
								<p>
									<?php echo form_label('City');?>
									<?php echo form_input('city',"$city",'class="field size1"');?>
								</p>
								
								<p>
									<?php echo form_label('Address'); ?>
									<?php echo form_textarea('add',"$add",'class="field size1" required');?>
								</p>	
								
								<p>
									<?php echo form_label('Postal/Zip Code'); ?>
									<?php echo form_input('code',"$code",'class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Contact No.'); ?>
									<?php echo form_input('contact',"$contact",'class="field size1" required');?>
								</p>
								
								<?php endforeach ?>
						</div>
					
					<?php echo form_close();?>
				</div>
				
				
			</div>
</div>