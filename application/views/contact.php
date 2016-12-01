<div class="portfolio page">
		<div class="portfolio-content clear">
			<div class="portfolio-title">
				Contact Us
			</div>
			<div class="contact-title">
				Nice To
				<span class="text-default">Meet You</span>
			</div>
			<?php
				foreach($content as $map)
				{
					echo $map->content;
				}
			?>
				<div class="col-md-6 contact-right footer-grid wow bounceIn" data-wow-delay="0.4s" id="contact-form">
						<?php 
							if($this->session->userdata('msg'))
							{
						?>
								<div class="signup-msg">
						<?php 
								echo $this->session->userdata('msg');
								$this->session->unset_userdata('msg');
						?>
								</div>
						<?php
							}
						?>
						
						<?php 
							if($this->session->userdata('validation_errors'))
							{
						?>
								<div class="signup-error">
						<?php 
								echo $this->session->userdata('validation_errors');
								$this->session->unset_userdata('validation_errors');
						?>
								</div>
						<?php
							}
						?>
					<br />
					<div class="cu-form">
						<?php echo form_open('contact/create'); ?>
							<table>
								<tr>
									<td>Your Name:</td><td>Phone number:</td>
								</tr>
								
								<tr>
									<td><?php echo form_input('name',set_value('name'),'placeholder="Enter your name" class="contact-input" required');?></td>
									<td><?php echo form_input('phone',set_value('phone'),'placeholder="Enter your phone number" class="contact-input" required');?></td>
								</tr>
								
								<tr>
									<td>Your E-mail:</td>
								</tr>
								
								<tr>
									<td colspan="2"><?php echo form_input('email',set_value('email'),'placeholder="Enter your email" class="contact-input" style="width:795px;" required');?></td>
								</tr>
								
								<tr>
									<td>Your Messege:</td>
								</tr>
								
								<tr>
									<td colspan="2"><?php echo form_textarea('msg',set_value('msg'),'placeholder="Enter your messege/problem" class="contact-input" style="width:795px;" required');?></td>
								</tr>
								
								<tr>
									<td><?php echo form_submit('contactbtn','SEND','class="contact-btn"');?></td>
								</tr>
							</table>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>