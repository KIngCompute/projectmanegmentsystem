<?php
	function get_cname($id)
	{
		$ci = new CI_Controller;
		$ci->load->model('ticket_model');
		return $ci->ticket_model->get_cname($id);
	} 
?>