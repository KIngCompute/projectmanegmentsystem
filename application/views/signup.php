<div class="portfolio page">
		<div class="portfolio-content clear">
			<div class="portfolio-title">
				Create an account
			</div>
				<div class="signup">
					<?php if($this->session->userdata('validation_errors'))
					{
					?>
						<div class="signup-error">
					<?php
							echo $this->session->userdata('validation_errors');
							$this->session->unset_userdata('validation_errors');
					?>
						</div>
						<br />
					<?php
					}
					?>
					
					<?php if($this->session->userdata('msg'))
					{
					?>
						<div class="signup-msg">
					<?php
							echo $this->session->userdata('msg');
							$this->session->unset_userdata('msg');
					?>
						</div>
						<br />
					<?php
					}
					?>
					
					<?php
					if($this->session->userdata('pwderror'))
					{
					?>
						<div class="signup-error">
					<?php
						echo $this->session->userdata('pwderror');
						$this->session->unset_userdata('pwderror');
					?>
						</div>
						<br />
					<?php
					}
					?>

					<?php echo form_open('signup/create'); ?>
						<section>
							<p><?php echo form_label('Name'); ?></p>
							<?php echo form_input('name',set_value('name'),'placeholder="Name" required');?>
						</section>
						<section>
							<p><?php echo form_label('Email'); ?></p>
							<?php echo form_input('email',set_value('email'),'placeholder="Email Address" required');?>
						</section>
						<section>
							<p><?php echo form_label('Username'); ?></p>
							<?php echo form_input('uname',set_value('uname'),'placeholder="Username" required');?>
						</section>
						<section>
							<p><?php echo form_label('Password');?></p>
							<?php echo form_password('pass','','placeholder="Password" required');?>
						</section>
						<section>
							<p><?php echo form_label('Confirm Password');?></p>
							<?php echo form_password('cpass','','placeholder="Confirm Password" required');?>
						</section>
						<section>
							<p><?php echo form_label('Company Name (if any)'); ?></p>
							<?php echo form_input('company',set_value('company'),'placeholder="Company Name" required');?>
						</section>
						<section>
							<p><?php echo form_label('Website'); ?></p>
							<?php echo form_input('web',set_value('web'),'placeholder="Website" required');?>
						</section>
						<section>
							<p><?php echo form_label('Country');?></p>
								<select id="country" name ="country"></select>
							<script language="javascript">
								populateCountries("country", "state");
							</script>
						</section>
						<section>
							<p><?php echo form_label('State');?></p>
								<select name ="state" id ="state"></select>
							<script language="javascript">
								populateCountries("country", "state");
							</script>
						</section>
						<section>
							<p><?php echo form_label('City');?></p>
							
							<?php echo form_input('city',set_value('city'),'placeholder="Enter your city"');?>
						</section>
						<section>
							<p><?php echo form_label('Street Address'); ?></p>
							<?php echo form_textarea('add',set_value('add'),'placeholder="Address" required');?>
						</section>
						<section>
							<p><?php echo form_label('Postal/Zip Code'); ?></p>
							<?php echo form_input('code',set_value('code'),'placeholder="Postal/Zip Code" required');?>
						</section>
						<section>
							<p><?php echo form_label('Mobile No.'); ?></p>
							<?php echo form_input('contact',set_value('contact'),'placeholder="Mobile No." required');?>
						</section>
						<section>
							<?php echo form_submit('submitbtn','Submit','class="signup-btn"');?>
						</section>
					<?php echo form_close(); ?>
				</div>
		</div>
</div>