		<div class="middle-content">
			<div class="login-content">
				<center>
				<div class="login-form">
			<?php echo form_open('login/valid_login'); ?>
				<table align="center" width="400" cellspacing="1" cellpadding="2" border="0" class="login-table">
					<tbody>
					
						<tr>
							<td height="30" bgcolor="#444" style="color: rgb(255, 255, 255); font-weight: bold;padding-left:5px" colspan="3">Login</td>
						</tr>
						
						<?php
							if($this->session->userdata('err'))
							{
							?>
								<tr>
									<td colspan="3" bgcolor="#f8f8f8" align="center" height="25px">
										<span class="login_err">
										<?php
										echo $this->session->userdata('err');
										$this->session->unset_userdata('err');
										?>
										</span>
									</td>
								</tr>
								<?php
							} 
						?>
						
						<?php
							if($this->session->userdata('send'))
							{
							?>
								<tr>
									<td colspan="3" bgcolor="#f8f8f8" align="center" height="25px">
										<span class="send-client">
										<?php
										echo $this->session->userdata('send');
										$this->session->unset_userdata('send');
										?>
										</span>
									</td>
								</tr>
								<?php
							} 
						?>
						
						<tr>
							<td align="right" width="108" bgcolor="#f8f8f8" style="height:160px" rowspan="6">
							<img alt="" src="<?php echo base_url();?>image/login.jpg">
							</td>
						</tr>
						
						<tr bgcolor="#f8f8f8">
							<td align="center" width="143" style="padding-right: 2px;">
								<b>Username</b>
							</td>
							<td width="243">
								<?php echo form_input('username','','placeholder="Username" class="login-input" required');?>
							</td>
						</tr>
						
						<tr bgcolor="#f8f8f8">
							<td align="center" style="padding-right: 2px;">
							<b>Password</b>
							</td>
							<td>
							<?php echo form_password('password','','placeholder="Password" class="login-input" required');?>
							</td>
						</tr>
						
						<tr bgcolor="#f8f8f8">
							<td colspan="2" align="right">
							<?php echo anchor('login/forgot','Forgot Password ?','class="ki-forgot"'); ?>
							<?php echo form_submit('loginbtn','Login','class="login-btn"');?></td>
						</tr>
					</tbody>
				</table>
				
			<?php echo form_close(); ?>
				</div>
				</center>
			</div>
		</div>