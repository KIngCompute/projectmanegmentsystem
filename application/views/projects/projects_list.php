<div class="middle-content">	
		<div class="content-header">
			<table cellspacing="0">
				<tbody>
					<tr>
						<td><h3 class="head-dashboard">Projects</h3></td>
					</tr>
				</tbody>
			</table>
		</div>
			<div id="content">			
						<div class="table">
							<table class="tableListing" style="display:table">
								<thead>
								<tr>
									<th width="30px">Id</th>
									<th width="60px">Status</th>
									<th>Name</th>
									<th width="50px" class="tab_th">Type</th>
									<th width="80px" class="tab_th">Begining Date</th>
								</tr>
								</thead>
								<tbody>
								<?php
									if(is_array($project_list))
									{
										foreach($project_list as $pro_data)
										{
										?>
									<?php
											$base = base_url();
											$id = $pro_data->id;
											?>
										<tr>
											
											<td><?php echo $id; ?></td>
											
											<td><?php echo $pro_data->status;?> </td>
													
											<td><div class="link"><?php $name = $pro_data->name;
												echo anchor("{$base}index.php/project/view_project/$id","$name");?></div></td>
												
											<td><?php echo $pro_data->types;?></td>
												
											<td><?php $bdate = $pro_data->start_date;
												echo $bdate;?></td>
											
										</tr>
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