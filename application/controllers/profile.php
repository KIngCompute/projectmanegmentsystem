<?php
	class Profile extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
            $this->load->model('profile_model');
			$this->load->model('signup_model');
			$this->checkSession();
		}
		
		public function checkSession()
		{
			$isloggedin = $this->session->userdata('pms-client');
			if(!isset($isloggedin) || $isloggedin != TRUE)
			{
				redirect('login');
			}
		}

		public function index()
		{
			$data['arr']=$this->profile_model->get_data($this->session->userdata('id'));
			$data['page'] = 'myprofile';
			$this->load->view('ki_templates/content',$data);
		}
		
		public function validate()
		{
			$id = $this->input->post('id');
			if($this->input->post('uname_hidden')!=$this->input->post('uname'))
			{
				$change="|callback_check_if_url_exists";
			}
			else
			{
				$change="";
			}
			
			if($this->input->post('email_hidden')!=$this->input->post('email'))
			{
				$em="|callback_check_email_exists";
			}
			else
			{
				$em="";
			}
			
			if($this->input->post('company')!="")
			{
				$chk='callback_valid_com_name';
			}
			else
			{
				$chk='';
			}
			if($this->input->post('pass')!="")
			{
				$pas='callback_valid_password';
			}
			else
			{
				$pas='';
			}
			$this->form_validation->set_rules('name','Name','trim|required|max_length[50]|callback_valid_name');
			$this->form_validation->set_rules('add','Address','trim|required');
			$this->form_validation->set_rules('contact','Contact','trim|required|min_length[10]|callback_valid_contact');
			$this->form_validation->set_rules('email','Email',"trim|required|callback_check_valid_email{$em}");
			$this->form_validation->set_rules('uname','Username',"trim|required|max_length[20]{$change}");
			$this->form_validation->set_rules('pass','Password',"{$pas}");
			$this->form_validation->set_rules('company','Company Name',"{$chk}");
			$this->form_validation->set_rules('web','Website','trim|required|callback_valid_web');
			$this->form_validation->set_rules('country','Country','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			$this->form_validation->set_rules('code','Postal/Zip code','trim|required|min_length[4]|max_length[6]|numeric|is_natural');
			
			if($this->form_validation->run() == TRUE)
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
				
				if($pass == "")
				{
					$this->profile_model->update($id,$name,$add,$contact,$email,$uname,$company,$country,$state,$city,$code,$web);
					$this->session->set_userdata('msg','Your profile has been Updated.');
					redirect('profile');
				}
				else
				{
					if($pass == $cpass)
					{
						$pass = md5($this->input->post('pass'));
						$this->profile_model->update_pwd($id,$name,$add,$contact,$email,$uname,$pass,$company,$country,$state,$city,$code,$web);
						$this->session->set_userdata('msg','Your profile has been Updated.');
						redirect('profile');
					}
					else
					{
						$this->session->set_userdata('pwderror','The Password and Confirm Password are mismatch');
						redirect("profile/index/$id");
					}
				}
			}
			else
			{
				$this->session->set_userdata('validation_errors',validation_errors());
				redirect("profile/index/$id");
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
			$this->load->model('profile_model');
			$url_not_in_use = $this->profile_model->check_if_url_exists($this->input->post('uname'));
			if($url_not_in_use)
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_if_url_exists','Username must be unique');
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