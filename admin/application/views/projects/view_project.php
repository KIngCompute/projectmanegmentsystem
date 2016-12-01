<div id="contentContainer">
	<div class="middle" id="anchor-content">
	<div id="page:main-container">
		<div class="content-header">
			<table cellspacing="0">
				<tbody>
					<tr>
						<td><h3 class="head-dashboard">View Projects</h3></td>
						<td width="40px">
			<?php echo anchor('project','<span>Back</span>','class="form-button" style="margin-bottom:-4px"'); ?>
			</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="content">
					<div class="box">
						<div class="table_view">
						<?php 
							foreach($view_project as $view)
							{
							?>
											<label style="font-size:14px"><?php $pname = $view->name;?>
												<span style="color:#CC0000;"><h1 style="border-bottom:1px solid #ccc;"><?php echo "$pname"; ?></h1></span></label>
												
											<table width="100%" class="contentTable">
										<tbody>
												<tr>
													<td>
											<label style="font-size:14px"><b>Status: </b><?php $status = $view->status;
												echo "$status"; ?></label>
											<br/>
											<br/>
										
											<label style="font-size:14px"><b>Description : </b><br />
											<br/><textarea rows="8" cols="60" disabled="disabled" style="background:#FFFFFF"><?php echo $view->description; ?></textarea></label>
											</br>
											<br />
											
											
											
											<label style="font-size:14px;"><b>Allocated to: </b>	
												<br />
												<br />
												<table border="1" width="100%">
													<tr>
														<th style="font-size:16px;height:25px">Assigned To</th>
														<th style="font-size:16px;height:25px">Allocated Name</th>
													</tr>
												<?php
													foreach($arr as $c)
													{
														if(is_object($c))
														{
													?>
														<tr>
															<td align="center" style="height:35px">Client</td>
															<td align="center" style="height:35px">
															
													<?php
														
														echo anchor("client/view_client/$c->id",$c->name,'class="allocated"');
													?>
															</td>
														</tr>
													<?php
														}
														else
														{
														?>
															<tr>
																<td colspan="2">No Clients.</td>
															</tr>
														<?php
														}
													}
												?>
												
												<?php
												
													foreach($row as $emp_name)
													{
														if(is_object($emp_name))
														{
													?>
														<tr>
														<td align="center" style="height:35px">Project Manager</td>
														<td align="center" style="height:35px">
													<?php
														echo anchor("employees/view_emp/$emp_name->id",$emp_name->fullname,'class="allocated"');
													?>
														</td>
														</tr>
													<?php
														}
													}
												
												?>
											
												<?php
												
													foreach($des as $ename)
													{
														if(is_object($ename))
														{
													?>
														<tr>
														<td align="center" style="height:35px">Employee</td>
														<td align="center" style="height:35px">
													<?php
														echo anchor("employees/view_emp/$ename->id",$ename->fullname,'class="allocated"');
														?>
														</td>
													</tr>
													<?php
														}
													}
												?>
											
												<?php
												
													foreach($test as $e_name)
													{
														if(is_object($e_name))
														{
													?>
														<tr>
														<td align="center" style="height:35px">Tester(SEO)</td>
														<td align="center" style="height:35px">
														<?php
														echo anchor("employees/view_emp/$e_name->id",$e_name->fullname,'class="allocated"');
														?>
														</td>
														</tr>
													<?php
														}
													}
												?>
												</table>
											</td>										
											
											<td style="width:27%">
												<div id="itemDetailsBox">
												<h2>Details</h2>
												<table>
													<tbody>
													<tr>
														<th>Id : </th>
														<td><?php echo $view->id; ?></td>
													</tr>
													
													<tr>
														<th>Status : </th>
														<td><?php echo $view->status; ?></td>
													</tr>
													
												
														
													<tr>
														<th>Begining Date </th>
														<td><?php echo $view->start_date; ?></td>
													</tr>
													
													<tr>
														<th>End Date : </th>
														<td><?php echo $view->end_date; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
										</td>
									</tr>
								</tbody>
							</table>
							<?php 
							}							
							?>
							</div>
						</div>
			
			</div>
				
		</div>
	</div>
</div>