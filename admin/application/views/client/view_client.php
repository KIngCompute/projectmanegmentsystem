<div id="contentContainer">
	<div class="middle" id="anchor-content">
	<div id="page:main-container">
		<div class="content-header">
			<table cellspacing="0">
				<tbody>
					<tr>
						<td><h3 class="head-dashboard">View Clients</h3></td>
						<td width="40px">
			<?php echo anchor('client','<span>Back</span>','class="form-button" style="margin-bottom:-4px"'); ?>
			</td>
					</tr>
				</tbody>
			</table>
			</div>
			
			<div id="content">
					<div class="box">
						<div class="table_view">
						<?php 
							foreach($view_client as $view):?>
											<label  style="font-size:14px"><b>Name : </b><?php $name = $view->name;
												echo "$name"; ?></label>
										<br />
										<br />
												<label  style="font-size:14px"><b>Email : </b><?php $email = $view->email;
												echo "$email"; ?></label>
										<br />
										<br />	
												<label  style="font-size:14px"><b>Username : </b><?php $username = $view->username;
												echo "$username"; ?></label>
										<br />
										<br />	
												<label  style="font-size:14px"><b>Company Name (if any) : </b><?php $company = $view->company;
												echo "$company"; ?></label>
										<br />
										<br />
												<label  style="font-size:14px"><b>Website : </b><?php $web = $view->website;
												echo "$web"; ?></label>
										<br />
										<br />
												<label  style="font-size:14px"><b>Country : </b><?php $country = $view->country;
												echo "$country"; ?></label>
										<br />
										<br />
												<label  style="font-size:14px"><b>State : </b><?php $state = $view->state;
												echo "$state"; ?></label>
										<br />
										<br />
												<label  style="font-size:14px"><b>City : </b><?php $city = $view->city;
												echo "$city"; ?></label>
										<br />
										<br />
												<h3 style="font-size:14px"><b>Address : </b></h3>
												<p style="font-size:12px"><?php echo $view->address; ?></p>
										<br />
										<br />
												<label  style="font-size:14px"><b>Postal/Zip Code : </b><?php $code = $view->zipcode;
												echo "$code"; ?></label>
										<br />
										<br />
												<label  style="font-size:14px"><b>Contact : </b><?php $contact = $view->contact;
												echo "$contact"; ?></label>
										<br />
										<br />
											<label style="font-size:14px"><b>Status : </b><?php if($view->status == 1) 
													{
														echo "Enabled";
													}
													else
													{
														echo "Disabled";
													}?> </label>
											<br />
											<br />
											<label style="font-size:14px"><b>Created : </b><?php $date = $view->created;
												echo "$date";?></label>
							<?php endforeach ?>
							</div>
					
						</div>
			
			</div>
			
			</div>
</div>
</div>