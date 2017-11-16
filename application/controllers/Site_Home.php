<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_Home extends Check_User_Logged {

	 function __construct() {
        parent::__construct();

    }

    public function index() {
        $con['conditions'] = array(
                    "status" => 1
                );
        $data['users'] = $this->Common_Model->getRows($con, 'users');
    	$this->load->view('home', $data);
    }

}