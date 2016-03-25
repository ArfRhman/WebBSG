<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {

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
	
	function home()
	{
		$this->load->view('info/index');
	}
}