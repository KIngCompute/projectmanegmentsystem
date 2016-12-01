<?php
function get_image($uname)
{
	$ci = new CI_Controller;
	$ci->load->model('profile_model');
	return $ci->profile_model->get_image($uname);
}
?>