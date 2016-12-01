<?php
	class Dashboard_model extends CI_Model
	{
		public function set_logged_out_time()
		{
			$date = date('Y-m-d h:i:s');
			$this->db->where('id',1);
			$data = array('last_logged_out'=>"$date");
			$this->db->update('admin',$data);
		}
		
		public function new_client()
		{
			$this->db->select('last_logged_out');
			$this->db->where('id',1);
			$qry = $this->db->get('admin');
			$date = $qry->row()->last_logged_out;
			$this->db->where('created >',$date);
			$query = $this->db->get('client');
			return $query->num_rows();
		}
		
		public function new_ticket()
		{
			$this->db->select('last_logged_out');
			$this->db->where('id',1);
			$qry = $this->db->get('admin');
			$date = $qry->row()->last_logged_out;
			$this->db->where('created >',$date);
			$query = $this->db->get('ticket');
			return $query->num_rows();
		}
	}
?>