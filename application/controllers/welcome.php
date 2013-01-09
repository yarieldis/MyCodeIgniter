<?php

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->library('login_manager');
	}
	
	function index()
	{
		//$user = $this->login_manager->get_user();
		
		//$this->output->enable_profiler(TRUE);
		
		$this->twig->view('show.html.twig');
	}

	public function sqlite() {
		try {
			$dbh = new PDO("sqlite:H:\\etecsa.sqlite");
			
			$res = $dbh->query("SELECT COUNT(*) FROM guia WHERE type='Prepago' AND address LIKE '%VEDADO%'");
			$row = $res->fetch(PDO::FETCH_NUM);
			print_r($row);
			exit;
			
			foreach ($result as $row) {
				$phone->name = $row['name'];
				$phone->phone = $row['telephone'];
				$phone->ci = $row['ci'];
				$phone->address = $row['address'];
				$phone->province = $row['province'];
			}
			echo $result_count == $page_count ? ($page+$result_count) : 'end';
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */