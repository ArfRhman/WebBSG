<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database();
		
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('encrypt');
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->helper('security');
		$this->load->helper('form');
		$this->load->model('model_data', 'mddata');
        $data = array();
    }

	function index()
	{
		$this->load->view('login');
	}
	
	function login()
	{
		$username = $this->input->post('username');
		$password = $this->mddata->generatePassword($this->input->post('password'));
		$login = $this->mddata->doLogin($username, $password);
		if($login['active'] == 0)
		{
			$this->session->set_flashdata('data', 'username/password is wrong!');
			redirect('site/index');
		} else {
			redirect('site/home');
		}
	}
	
	function home()
	{
		$data['ac'] = "home";
		$this->load->view('top', $data);
		$this->load->view('index', $data);
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('site/index');
	}
}