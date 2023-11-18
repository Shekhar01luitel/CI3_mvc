<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->is_user_loged_in();
        $this->check_user_role(2,4,8);
	}

	public function index()
	{
		echo "hi";
	}
	
}
