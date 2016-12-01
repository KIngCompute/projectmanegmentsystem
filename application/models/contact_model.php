<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model
{
	public function set_contact($name,$phone,$email,$msg)
	{
		$data=array('name'=>"$name",'phone'=>"$phone",'email'=>"$email",'message'=>"$msg");
		$this->db->insert('contact',$data);
	}	
} 
?>