<?php
	class Signup extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('signup_model');
		}
		
		public function index()
		{
			$data['page'] = 'signup';
			$this->load->view('templates/content',$data);
		}
		
		public function create()
		{
			if($this->input->post('company')!="")
			{
				$chk='callback_valid_com_name';
			}
			else
			{
				$chk='';
			}
			$this->form_validation->set_rules('name','Name','trim|required|max_length[50]|callback_valid_name');
			$this->form_validation->set_rules('add','Address','trim|required');
			$this->form_validation->set_rules('contact','Contact','trim|required|min_length[10]|callback_valid_contact');
			$this->form_validation->set_rules('email','Email','trim|required|callback_check_valid_email|callback_check_email_exists');
			$this->form_validation->set_rules('uname','Username','trim|required|max_length[15]|callback_valid_username|callback_check_if_url_exists');
			$this->form_validation->set_rules('pass','Password','trim|required|min_length[6]|max_length[16]callback_valid_password');
			$this->form_validation->set_rules('cpass','Confirm Password','trim|required');
			$this->form_validation->set_rules('company','Company Name',"{$chk}");
			$this->form_validation->set_rules('web','Website','trim|required|callback_valid_web');
			$this->form_validation->set_rules('country','Country','trim|required');
			$this->form_validation->set_rules('state','State','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			$this->form_validation->set_rules('code','Postal/Zip code','trim|required|min_length[4]|max_length[6]|numeric|is_natural');
			
			if($this->form_validation->run() == false)
			{
				$this->session->set_userdata('validation_errors',validation_errors());
				$data['page'] = 'signup';
				$this->load->view('templates/content',$data);
			}
			else
			{
				$name = $this->input->post('name');
				$add = $this->input->post('add');
				$contact = $this->input->post('contact');
				$email = $this->input->post('email');
				$uname = $this->input->post('uname');
				$pass = $this->input->post('pass');
				$cpass = $this->input->post('cpass');
				$company = $this->input->post('company');
				$country = $this->input->post('country');
				$state = $this->input->post('state');
				$city = $this->input->post('city');
				$code = $this->input->post('code');
				$web = $this->input->post('web');
				$ip = $this->input->ip_address();
				
				if($pass == $cpass)
				{
					$pass = md5($this->input->post('pass'));
					$this->signup_model->set_client($name,$add,$contact,$email,$uname,$pass,$company,$country,$state,$city,$code,$web,$ip);
					
					$row = $this->signup_model->get_message();
					
					$row['description'] = str_replace('{customer_name}', $name, $row['description']);
						
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
					$this->email->message(html_entity_decode($row['description']));
					
					$this->email->send();
					
					$this->session->set_userdata('msg','You are Registered Successfully , Wait for adminstrator\'s approval.');
					redirect('signup');
				}
				else
				{
					$this->session->set_userdata('pwderror','The Password and Confirm Password are mismatch');
					$data['page'] = 'signup';
					$this->load->view('templates/content',$data);
				}
			}
		}
		
		public function valid_name($str)
		{
			if(!preg_match("/^([a-zA-z ])+$/i",$str))
			{
				$this->form_validation->set_message('valid_name','The %s field contains only alphabets and spaces.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		public function valid_username($str)
		{
			if(!preg_match("/^([a-zA-z0-9_])+$/i",$str))
			{
				$this->form_validation->set_message('valid_username','The %s field contains alphabets,numeric and underscore.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		public function valid_contact($value)
		{
			if(!preg_match("/^\+?[1-9][0-9]+$/i",$value))
			{
				$this->form_validation->set_message('valid_contact','The %s field should be valid.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		public function valid_password($value)
		{
			if(!preg_match("/^([a-zA-z0-9@#$%^&*,.?+-])+$/i",$value))
			{
				$this->form_validation->set_message('valid_password','The %s field contains alphabets,numeric and special symbols.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		public function valid_web($str)
		{
			if(!preg_match("/^(www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$str))
			{
				$this->form_validation->set_message('valid_web','The %s is invalid format.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		public function valid_com_name($str)
		{
			if(!preg_match("/^([a-zA-z0-9 ])+$/i",$str))
			{
				$this->form_validation->set_message('valid_name','The %s field contains only alphabets and spaces.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		function check_if_url_exists()
		{
			$url_not_in_use = $this->signup_model->check_if_url_exists($this->input->post('uname'));
			if($url_not_in_use)
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_if_url_exists','The requested username is already in use.');
				return FALSE;
			}
		}
		
		public function check_email_exists()
		{
			$email_not_in_use = $this->signup_model->check_if_email_exists($this->input->post('email'));
			if($email_not_in_use)
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_email_exists','The requested email address is already exists.');
				return FALSE;
			}
		}
		
		public function check_valid_email($str)
		{
			if(!preg_match("/^[a-zA-Z1-9]{2}[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z.]+$/i",$str))
			{
				$this->form_validation->set_message('check_valid_email','The %s field should be valid.');
				return FALSE;
			}
			else
			{
				return true;
			}
		}
}
?>