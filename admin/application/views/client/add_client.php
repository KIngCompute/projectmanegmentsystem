<div id="contentContainer">
	<div class="middle" id="anchor-content">
	<div id="page:main-container">
		<div class="content-header">
			<?php echo form_open('client/create');?>	
			<table cellspacing="0">
				<tbody>
					<tr>
						<td><h3 class="head-dashboard">Add Clients</h3></td>
						<td width="55px">
			<?php echo anchor('client','<span>Back</span>','class="form-button" style="margin-bottom:-5px"'); ?>
			</td>
						<td width="50px"><?php echo form_submit('addbtn','Save','class="form-button-save"');?></td>
					</tr>
				</tbody>
			</table>
			</div>
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
				if($this->session->userdata('pwderror'))
				{
			?>
			<div id="div-error-close" class="msg msg-error" style="margin-bottom:20px">
				<strong><p><?php echo $this->session->userdata('pwderror');?></p></strong>
				<img src="<?php echo base_url();?>images/close.gif" style="width:35px;height:35px;cursor:pointer;position:absolute;right:0px;top:0px" onClick="return closeerrordiv();" />
			</div>
			<?php
					$this->session->unset_userdata('pwderror');
				}
			?>
			
			<div id="content">
						
				<div class="box">
						<div class="form">
								<p>
									<?php echo form_label('Client Name <span>(Required Field)</span>');?>
									<?php echo form_input('name',set_value('name'),'placeholder="Client Name" class="field size1" required');?>
								</p>	
								
								<p>
									<?php echo form_label('E-mail <span>(Required Field)</span>');?>
									<?php echo form_input('email',set_value('email'),'placeholder="Email" class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Username <span>(Required Field)</span>');?>
									<?php echo form_input('uname',set_value('uname'),'placeholder="Username" class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Password <span>(Required Field)</span>');?>
									<?php echo form_password('pass','','placeholder="Password" class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Confirm Password <span>(Required Field)</span>');?>
									<?php echo form_password('cpass','','placeholder="Confirm Password" class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Company Name (if any)'); ?>
									<?php echo form_input('company',set_value('company'),'placeholder="Company Name" class="field size1"');?>
								</p>
								<p>
									<?php echo form_label('Website'); ?>
									<?php echo form_input('web',set_value('web'),'placeholder="Website" class="field size1"');?>					
								</p>
					
								<p>
									<?php echo form_label('Country <span>(Required Field)</span>');?>
										<select id="country" name ="country" class="field size1" required></select>
									<script language="javascript">
										populateCountries("country", "state");
									</script>
								</p>	
											
								<p>
									<?php echo form_label('State <span>(Required Field)</span>');?>
										<select name ="state" id ="state" class="field size1"></select>
									<script language="javascript">
										populateCountries("country", "state");
									</script>
								</p>
								
								<p>
									<?php echo form_label('City <span>(Required Field)</span>');?>
									<?php echo form_input('city',set_value('city'),'class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Address <span>(Required Field)</span>'); ?>
									<?php echo form_textarea('add',set_value('add'),'placeholder="Address" class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Postal/Zip Code <span>(Required Field)</span>'); ?>
									<?php echo form_input('code',set_value('code'),'placeholder="Postal/Zip Code" class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Contact No. <span>(Required Field)</span>');?>
									<?php echo form_input('contact',set_value('contact'),'placeholder="Contact No." class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Status');?>
									<?php $arr = array('0'=>'Disable',
														'1' => 'Enable'); ?>
									<?php echo form_dropdown('status',$arr,set_value('status'),'class="field size1" style="width:100px"');?>
								</p>	
							
						</div>
					
					<?php echo form_close();?>
				</div>
				
				
			</div>
		</div>
</div>
</div>