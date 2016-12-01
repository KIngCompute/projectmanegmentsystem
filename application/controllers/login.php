<?php
	class Login extends CI_Controller
	{
		public function index()
		{
			$loggedin = $this->session->userdata('pms-client');
			$logged = $this->session->userdata('pms-emp');
			if(isset($loggedin) && $loggedin == TRUE)
			{
				redirect('ki_dashboard');
			}
			elseif(isset($logged) && $logged == TRUE)
			{
				redirect('ki_dash');
			}
			else
			{
				$data['page'] = 'ki-helpdesk-login';
				$this->load->view('ki_templates/content',$data);
			}
		}
		
		public function valid_login()
		{
			$this->load->model('login_model');
		
			$query = $this->login_model->validate_login();
			
			if($query=="client")
			{	
				$this->session->set_userdata('client',$this->input->post('username'));
				$id = $this->login_model->get_id($this->session->userdata('client'));
				$this->session->set_userdata('pms-client',TRUE);
				$this->session->set_userdata('id',$id);
				redirect("ki_dashboard");
			}
			elseif($query=="employee")
			{
				$this->session->set_userdata('emp',$this->input->post('username'));
				$id = $this->login_model->get_eid($this->session->userdata('emp'));
				$this->session->set_userdata('pms-emp',TRUE);
				$this->session->set_userdata('eid',$id);
				$img = $this->login_model->get_image($this->session->userdata('emp'));
				$this->session->set_userdata('img',$img);
				redirect("ki_dash");
			}
			elseif($query=="client-err")
			{
				$this->session->set_userdata('err','You are not still approved for login.');
				redirect('login');
			}
			else
			{
				$this->session->set_userdata('err','Invalid Username or Password.');
				redirect('login');
			}
		}
		
		public function forgot()
		{
			$isloggedin = $this->session->userdata('pms-client');
			if(isset($isloggedin) && $isloggedin == TRUE)
			{
				redirect('ki_dashboard');
			}
			else
			{
				$data['page'] = 'forgot';
				$this->load->view('ki_templates/content',$data);	
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
				$cname = $this->login_model->get_cname($email);
				$qry = $this->login_model->validate_email($email);
				if($qry)
				{
					$this->load->helper('string');
					
					$new_password = random_string('alnum', 6);
					$npass = md5($new_password);
					$this->login_model->save_password($email,$npass);
					
					$row = $this->login_model->get_message();
					
					$row['description'] = str_replace('{user_name}',$cname,$row['description']);
					
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