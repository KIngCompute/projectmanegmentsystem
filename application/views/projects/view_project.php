<div class="middle-content">	
		<div class="content-header">
			<table cellspacing="0">
				<tbody>
					<tr>
						<td><h3 class="head-dashboard">View Project</h3></td>
						<td width="40px">
						<?php echo anchor('project','<span>Back</span>','class="form-button-a"'); ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
			<div id="content">			
						<div class="table">
								<?php
									if(is_array($view_project))
									{
										foreach($view_project as $pro_data)
										{
										?>
									<?php
											$id = $pro_data->id;
											?>
											<label style="font-size:10px"><?php $pname = $pro_data->name;?>
												<span style="color:#1172d2;"><h1 style="border-bottom:1px solid #ccc;"><?php echo "$pname"; ?></h1></span></label>
												<br>
											
											<label style="font-size:14px"><b>Status: </b><?php $status = $pro_data->status;
												echo "$status"; ?></label>
													<br>
													<br>
													
											<label style="font-size:14px"><b>Type: </b><?php $type = $pro_data->status;
												echo "$type"; ?></label>
												<br>
													<br>
														
											<label style="font-size:14px"><b>Description : </b><br />
											<textarea rows="8" cols="60" disabled="disabled" style="background:#FFFFFF"><?php echo $pro_data->description; ?></textarea></label>
												<br>
													<br>
							
											<label style="font-size:14px"><b>Live Url: </b><?php echo /*$pro_data->live_url;*/ "Not Available"; ?></label>
												<br>
													<br>
											
											<label style="font-size:14px"><b>Test Url: </b><a href="#" style="color:#0099CC;text-decoration:underline;"><?php echo $pro_data->test_url; ?></a></label>
												<br>
													<br>
											
											<label style="font-size:14px"><b>Begining Date: </b><?php echo $pro_data->start_date; ?></label>
												<br>
													<br>
													
											<label style="font-size:14px"><b>End Date: </b><?php echo $pro_data->end_date; ?></label>
												<br>
													<br>

								<?php
									}
								}
								else
								{
								?>
									<tr>
										<td colspan="5">
											No projects Available.
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
							</table>
						
							</div>
					
						</div>
</div>