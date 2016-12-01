<?php
	class client extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			date_default_timezone_set('Asia/Kolkata');
            $this->load->model('client_model');
			$this->checkSession();
		}
		
		public function checkSession()
		{
			$isloggedin = $this->session->userdata('pms');
			if(!isset($isloggedin) || $isloggedin != TRUE)
			{
				redirect('login');
			}
		}
		
		public function index()
		{	
			$data['client_list'] = $this->client_model->get_client();
			
			$data['page'] = 'client/client_list';
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
			$this->form_validation->set_rules('uname','Username','trim|required|max_length[20]|callback_valid_username|callback_check_if_url_exists');
			$this->form_validation->set_rules('pass','Password','required|min_length[6]|max_length[16]|callback_valid_password');
			$this->form_validation->set_rules('cpass','Confirm Password','required');
			$this->form_validation->set_rules('company','Company Name',"{$chk}");
			$this->form_validation->set_rules('web','Website','trim|required|callback_valid_web');
			$this->form_validation->set_rules('country','Country','trim|required');
			$this->form_validation->set_rules('state','State','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			$this->form_validation->set_rules('code','Postal/Zip code','trim|required|min_length[4]|max_length[6]|numeric|is_natural');
			$this->form_validation->set_rules('status','Status','trim|required');
			
			if($this->form_validation->run() == false)
			{
				$data['page'] = 'client/add_client';
				$this->session->set_userdata('validation_errors',validation_errors());
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
				$status = $this->input->post('status');
				$date = $this->input->post('created');
				
				if($pass == $cpass)
				{
					$pass = md5($this->input->post('pass'));
					$this->client_model->set_client($name,$add,$contact,$email,$uname,$pass,$company,$country,$state,$city,$code,$web,$status);
					$this->session->set_userdata('msg','Added Successfully!!!');
					redirect('client');
				}
				else
				{
					$this->session->set_userdata('pwderror','The Password and Confirm Password are mismatch');
					$data['page'] = 'client/add_client';
					$this->load->view('templates/content',$data);
				}
			}
		}
		
		public function client_form($id)
		{
			$this->session->set_flashdata('id',$id);
			$data['arr']=$this->client_model->view_client($id);
			if(empty($data['arr']))
			{
				redirect('client');
			}
			$data['page'] = 'client/client_form';
			$this->load->view('templates/content',$data);
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
			$this->form_validation->set_rules('status','Status','trim|required');
			
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
				$status = $this->input->post('status');
				
				if($pass == "")
				{
					$this->client_model->update($id,$name,$add,$contact,$email,$uname,$company,$country,$state,$city,$code,$web,$status);
					$this->session->set_userdata('msg','Updated Successfully!!!');
					redirect('client');
				}
				else
				{
					if($pass == $cpass)
					{
						$pass = md5($this->input->post('pass'));
						$this->client_model->update_pwd($id,$name,$add,$contact,$email,$uname,$pass,$company,$country,$state,$city,$code,$web,$status);
						$this->session->set_userdata('msg','Updated Successfully!!!');
						redirect('client');
					}
					else
					{
						$this->session->set_userdata('pwderror','The Password and Confirm Password are mismatch');
						redirect("client/client_form/$id");
					}
				}
			}
			else
			{
				$this->session->set_userdata('validation_errors',validation_errors());
				redirect("client/client_form/$id");
			}			
		}
		
		public function deleteclient($id=NULL)
		{
			if($id == NULL)
			{
				redirect('client');
			}
			else
			{
				$this->client_model->deleteclient($id);
				$this->session->set_userdata('msg','Deleted Successfully!!!');
				redirect('client');
			}
		}
		
		public function view_client($id)
		{
			$data['view_client'] = $this->client_model->view_client($id);
			$data['page'] = 'client/view_client';
			$this->load->view('templates/content',$data);
		}
		
		public function delete_multiple()
		{
			if($this->input->post('delete'))
			{
				$box = $this->input->post('selector');
				if($box == "")
				{
					$this->session->set_userdata('err_del','Please select record');
					redirect('client');
				}
				else
				{
					foreach($box as $key => $value)
					{
						$res = $this->client_model->del_multiple($value);	
						$this->session->set_userdata('msg','Selected Client Deleted Successfully');
					}
				}
				redirect('client');
			}
			elseif($this->input->post('enable'))
			{
				$box = $this->input->post('selector');
				if($box == "")
				{
					$this->session->set_userdata('err_del','Please select record');
					redirect('client');
				}
				else
				{
					foreach($box as $key => $value)
					{
						$this->client_model->enable_multiple($value);	
						$this->session->set_userdata('msg','Selected Client has been Enabled');
					}
				}
				redirect('client');
			}
			elseif($this->input->post('disable'))
			{
				$box = $this->input->post('selector');
				if($box == "")
				{
					$this->session->set_userdata('err_del','Please select record');
					redirect('client');
				}
				else
				{
					foreach($box as $key => $value)
					{
						$this->client_model->disable_multiple($value);	
						$this->session->set_userdata('msg','Selected Client has been Disabled');
					}
				}
				redirect('client');
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
		
		function check_if_url_exists()
		{
			$this->load->model('client_model');
			$url_not_in_use = $this->client_model->check_if_url_exists($this->input->post('uname'));
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
		
		public function check_email_exists()
		{
			$email_not_in_use = $this->client_model->check_if_email_exists($this->input->post('email'));
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
	}
?>