<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

        public function __construct() {
		parent::__construct();
		$this->load->library('session');
        $this->load->model('AppModel');
	
	}
	public function index() 
	{   
        $_SESSION['name'] = 'John';
        $data['data'] = $this->AppModel->getTable();
        $data['color'] = $this->AppModel->getTableColor();
        $data['countTable'] = $this->AppModel->countTable();
		$this->load->view('index',$data);
    }

    public function tableDetails($id)
    {   
        $data['data'] = $this->AppModel->getTableDetails($id);
        $this->load->view('tableDetails',$data);
    }

    public function dishSearchPage()
    {
        $this->load->view('dishSearchPage');
    }

}
