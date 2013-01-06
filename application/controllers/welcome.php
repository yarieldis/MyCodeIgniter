<?php

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager');
	}
	
	function index()
	{
		$user = $this->login_manager->get_user();
		
		$this->output->enable_profiler(TRUE);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */