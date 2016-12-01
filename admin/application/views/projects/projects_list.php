<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>    

<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
		
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/shCore.js"></script>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
			"aaSorting": [[0, "desc"]],
			"aoColumns": [
				{ "asSorting": [] },
				null,
				null,
				null,
				null,
				null,
				null]
		});
	} );
</script>
<div id="contentContainer">
	<div class="middle" id="anchor-content">
	<div id="page:main-container">
		<div class="content-header">
			<table cellspacing="0">
				<tbody>
					<tr>
						<td><h3 class="head-dashboard">Projects</h3></td>
						<td width="50px">
							<?php echo anchor('project/add_project','<span style="margin-left:15px">Add Project</span>','class="form-button-a"'); ?>
						</td>
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
				if($this->session->userdata('err_del'))
				{
			?>
			<div id="div-error-close" class="msg msg-error" style="margin-bottom:20px">
				<strong><p><?php echo $this->session->userdata('err_del');?></p></strong>
				<img src="<?php echo base_url();?>images/close.gif" style="width:35px;height:35px;cursor:pointer;position:absolute;right:0px;top:0px" onClick="return closeerrordiv();" />
			</div>
			<?php
					$this->session->unset_userdata('err_del');
				}
			?>
			
			
			<?php echo form_open_multipart('project/delete_multiple'); ?>
			
				<?php echo form_submit('delete','Delete Selected','class="form-button" onclick="return window.confirm(\'Are you sure delete selected project ?\');"'); ?>
				
			<div id="content">			
						<div class="table">
							<table id="example" class="tableListing" style="display:table">
								<thead>
								<tr>
									<th width="20px" class="tab_th"><input type="checkbox"  id="selectall" class="checkbox" /></th>
									<th width="30px">Id</th>
									<th width="60px">Status</th>
									<th>Name</th>
									<th width="110px">Begining Date</th>
                                    <th width="110px">Ending Date</th>
									<th style="width:50px" class="tab_th">Action</th>
								</tr>
								</thead>
								<tbody>
								<?php 
										foreach($project_list as $pro_data): ?>
									<?php
											$base = base_url();
											$id = $pro_data->id;
											?>
										<tr>
											<td><input type="checkbox"  name="selector[]" class="checkbox" value="<?php echo $id;?>"/></td>
											
											<td><?php echo $id; ?></td>
											
											<td><?php echo $pro_data->status;?> </td>
													
											<td><div class="link"><?php $name = $pro_data->name;
												echo anchor("{$base}index.php/project/view_project/$id","$name");?></div></td>
												
												
											<td><?php $bdate = $pro_data->start_date;
												echo $bdate;?></td>
											<td><?php $edate = $pro_data->end_date;
												echo $edate;?></td>
											
                                            <td><a href="<?php echo $base; ?>index.php/project/delete_project/<?php echo $id; ?>" onclick="return window.confirm('Are you Sure ?');"><img src="<?php echo base_url();?>images/delete.png" title="Delete" /></a>&nbsp;&nbsp;<a href="<?php echo $base; ?>index.php/project/edit_project/<?php echo $id;?>"><img src="<?php echo base_url(); ?>images/edit.png" title="Edit"/></a></td>
											
										</tr>
								<?php
									endforeach;
								?>
							</tbody>
							</table>
						
							</div>
					
						</div>
				<?php echo form_close(); ?>	
			</div>
	</div>
	
	<script>
            $(document).ready(function() {
                resetcheckbox();
                $('#selectall').click(function(event) {  //on click
                    if (this.checked) { // check select status
                        $('.checkbox').each(function() { //loop through each checkbox
                            this.checked = true;  //select all checkboxes with class "checkbox1"              
                        });
                    } else {
                        $('.checkbox').each(function() { //loop through each checkbox
                            this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                        });
                    }
                });
                $("#del_all").on('click', function(e) {
                    e.preventDefault();
                    var checkValues = $('.checkbox:checked').map(function()
                    {
                        return $(this).val();
                    }).get();
                    console.log(checkValues);
                    
                    $.each( checkValues, function( i, val ) {
                        $("#"+val).remove();
                        });
//                    return  false;
                    $.ajax({
                        url: '<?php echo base_url();?>news/delete_multiple',
                        type: 'post',
                        data: 'ids=' + checkValues
                    }).done(function(data) {
                        $("#respose").html(data);
                        $('#selectall').attr('checked', false);
                    });
                });

              
                
                function  resetcheckbox(){
                $('input:checkbox').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                   });
                }
            });
        </script>
		
	<div class="pagging">
					
			<div class="right">
				<?php 
				echo $this->pagination->create_links();
				?>
			</div>
	</div>
</div>