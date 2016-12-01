<?php
	class Login extends CI_Controller{
	
		public function index()
		{
			$isloggedin = $this->session->userdata('pms');
			if(isset($isloggedin) && $isloggedin == TRUE)
			{
				redirect('dashboard');
			}
			else
			{
				$this->load->view('login-admin');
			}
		}
		
		public function validate_login()
		{
			$this->load->model('login_model');
		
			$query = $this->login_model->validate();
			
			if ($query)
			{	
				
				$this->session->set_userdata('admin',$this->input->post('username'));
				$this->session->set_userdata('pms',TRUE);
				$last_logged_in = $this->login_model->get_data();
				$this->session->set_userdata('last_logged',$last_logged_in);
				$this->login_model->update_last_logged();
				redirect('dashboard');
			}
			else
			{
				$this->session->set_userdata('err','Authentication Failed!');
				redirect();
			}
		}
		
		public function forgot()
		{
			$isloggedin = $this->session->userdata('pms');
			if(isset($isloggedin) && $isloggedin == TRUE)
			{
				redirect('dashboard');
			}
			else
			{
				$this->load->view('forgot');	
			}
		}
		
		public function validate_forgot()
		{
			$this->load->model('login_model');
			$this->form_validation->set_rules('email','Email','required');
			
			if($this->form_validation->run() == false)
			{
				$this->session->set_userdata('validation_errors',validation_errors());
				redirect('login/forgot');
			}
			else
			{
				$email = trim($this->input->post('email'));
				$qry = $this->login_model->validate_email($email);
				if($qry)
				{
					$name = $this->login_model->get_name($email);
					$this->load->helper('string');
					
					$new_password = random_string('alnum', 6);
					$npass = md5($new_password);
					$this->login_model->save_password($npass);
					
					$row = $this->login_model->get_message();
					
					$row['description'] = str_replace('{user_name}',$name,$row['description']);
					
					$row['description'] = str_replace('{new_pass}', $new_password, $row['description']);
						
					$row['subject'] = str_replace('{site_name}','Kalikund Infotech',$row['subject']);
					$row['description'] = str_replace('{site_name}','Kalikund Infotech',$row['description']);
					/*$config['protocol'] = 'smtp';
					$config['smtp_host'] = 'ssl://smtp.googlemail.com';
					$config['smtp_port'] = 465;
					$config['smtp_user'] = 'chirag2010gandhi@gmail.com';
					$config['smtp_pass'] = 'chirag115gandhi';
					$config['mailtype'] = 'html';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;*/

					$this->load->library('email');
					$this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");
					
					$this->email->from('support@kalikundinfotech.com','Kalikund Infotech Support Team');
					$this->email->to($email);
					$this->email->subject($row['subject']);
					$this->email->message($row['description']);
					
					$this->email->send();
					
					$this->session->set_userdata('send','Your password will be send to your email address.');
					redirect('login');
					/*}
					else
					{
						$this->session->set_userdata('tech_err','Email will not send due to technical reason.');
						redirect('login/forgot');
					}*/
				}
				else
				{
					$this->session->set_userdata('err','Invalid E-mail address');
					redirect('login/forgot');
				}
			}
		}
	}
?>