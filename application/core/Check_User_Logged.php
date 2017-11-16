<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_User_Logged extends CI_Controller {


	public function __construct()
    {      
        parent::__construct();
        if( ! $this->session->userdata('isUserLoggedIn')) {
            redirect('Site_Login/login_form');
        }        
    }

 

}

