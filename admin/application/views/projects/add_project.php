 <script src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
   <script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
   
  <script>
  $(function() {
    $( "#bdate" ).datepicker({
     changeMonth:true,
     changeYear:true,
     yearRange:"-100:+0",
     dateFormat:"yy-mm-dd"
  });
  });
  </script>
  
  <script>
  $(function() {
    $("#edate").datepicker({
     changeMonth:true,
     changeYear:true,
     yearRange:"-100:+0",
     dateFormat:"yy-mm-dd"
  });
  });
  </script>

<div id="contentContainer">
	<div class="middle" id="anchor-content">
	<div id="page:main-container">
		<div class="content-header">
			<?php echo form_open_multipart('project/add_project');?>
			<table cellspacing="0">
				<tbody>
					<tr>
						<td><h3 class="head-dashboard">Add Project</h3></td>
						<td width="55px">
			<?php echo anchor('project','<span>Back</span>','class="form-button" style="margin-bottom:-5px"'); ?>
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
			
				<div id="sidebar" style="float:left">
			
					<div class="box" style="height:773px">
	
						<div class="page-content">
								<div id="i1" class="page">
									<span id="i1-span" style="width:200px">General</span>
								</div>
								
								<div id="i2" class="page">
									<span id="i2-span">Allocated to</span>
								</div>
								
								<div id="i3" class="page">
									<span id="i3-span">Attachment</span>
								</div>
					</div>
				</div>
			
			</div>
			
			<div id="content">
				<div class="box" style="float:left;margin-left:2%;width:760px">
						
						<div class="form">
							<div class="f1">
								
								
								<p>
									<?php echo form_label('Project Name');?>
									
									<?php echo form_input('name',set_value('name'),'placeholder="Project Name" class="field size1" required');?>
								</p>
								<p>
									<?php echo form_label('Status'); ?>
									<?php echo form_dropdown('status',$status_data,set_value('status'),' class="field size2"');?>
								</p>
																
								<p>
									<?php echo form_label('Description');?>
									<?php echo form_textarea('desc',set_value('desc'),'placeholder="Description" class="field size1" required');?>
								</p>
								
								<p>
									<?php echo form_label('Starting Date');?>
									<?php echo form_input('start_date',set_value('bdate'),'placeholder="Date of Starting" class="field size1" id="bdate" required');?>
								</p>
								
								<p>
									<?php echo form_label('Ending Date');?>
									<?php echo form_input('end_date',set_value('edate'),'placeholder="Date of Ending" class="field size1" id="edate" required');?>
								</p>
								<br /><br />
								
								<div class="buttons" id="i5">
									<span class="button">Next</span>
								</div>
								
							</div>
							
							<div class="f2">
								<p>
									<?php echo form_label('Client');?>
									<table border=1 bordercolor="#ccc" width="760px">
									<?php foreach($clients as $client):?>
										<tr>
											<td width="20px" align="center"><?php echo form_checkbox('client[]',$client->id,FALSE,'class="checkbox"');?></td>
											<td style="padding-left:2px"><?php echo $client->name;?></td>
										</tr>
									<?php endforeach ?>
									</table>
								</p>
								<p>
									<?php echo form_label('Project Manager');?>
									<table border=1 bordercolor="#ccc" width="760px">
									<?php foreach($developer as $dev):?>
									<tr>
										<td width="20px" align="center">
										<?php echo form_checkbox('emp[]',$dev->id,FALSE,'class="checkbox"');?>
										</td>
										<td style="padding-left:2px"><?php echo $dev->fullname;?></td>
									</tr>
									<?php endforeach ?>
									</table>
								</p>
								<p>
									<?php echo form_label('Employee');?>
									<table border=1 bordercolor="#ccc" width="760px">
									<?php foreach($designer as $des):?>
									<tr>
										<td width="20px" align="center">
										<?php echo form_checkbox('emp[]',$des->id,FALSE,'class="checkbox"');?>
										</td>
										<td style="padding-left:2px"><?php echo $des->fullname;?></td>
									</tr>
									<?php endforeach ?>
									</table>
								</p>
								<p>
									<?php echo form_label('Tester(SEO)');?>
									<table border=1 bordercolor="#ccc" width="760px">
									<?php foreach($tester as $test):?>
									<tr>
										<td width="20px" align="center">
										<?php echo form_checkbox('emp[]',$test->id,FALSE,'class="checkbox"');?>
										</td>
										<td style="padding-left:2px"><?php echo $test->fullname;?></td>
									</tr>
									<?php endforeach ?>
									</table>
								</p>
								
								<div class="buttons" id="i6">
									<span class="button">Next</span>
								</div>
									
							</div>
							
							<div class="f3">
							
								<p>
									<?php echo form_upload('file',set_value('file'),'class="field size2"');?>
								</p>
																															
								<?php echo form_close();?>	
							</div>									
							
						</div>
				</div>
				
				
			</div>			
			</div>
		</div>
</div>