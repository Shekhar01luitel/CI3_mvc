<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shekhar extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$head = array();
		$navbar = array();
        $head['title'] = 'Shekhar-Luitel';
		$navbar['data'] = ['services', 'portfolio', 'about', 'team', 'contact'];
		$this->load->view('parts/header', $head);
		$this->load->view('parts/navbar', $navbar);
		$this->load->view('shekhar-luitel');
		$this->load->view('parts/footer');
	}
}
