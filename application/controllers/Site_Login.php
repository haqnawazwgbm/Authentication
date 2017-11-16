<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_Login extends CI_Controller {

	 function __construct() {
        parent::__construct();

    }

    public function login_form() {
    	$this->load->view('login');
    }

    public function registration_form() {
    	$this->load->view('registration.php');
    }

    public function register() {
        if ($this->input->post('submitRegistration')) {
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
                $this->form_validation->set_rules('password', 'Password', 'required');
	            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
               
                $userData = array(
                    'email' => strip_tags($this->input->post('email')),
                    'password' => md5(strip_tags($this->input->post('password'))),
                    'status' => 1
                ); 
                if ($this->form_validation->run() == true) {
                    $id = $this->Common_Model->insert($userData, 'users');
                    if($id){


                            $this->session->set_flashdata('success', array('message' => 'Registration successfull.'));
                            redirect('Site_Login/login_form');
                    }else{
                         $this->session->set_flashdata('success', array('message' => 'Something went wrong. Please try again.'));
                        redirect('Site_Login/registration_form');
                        
                    }
                } else {
 
                    $this->load->view('registration');
                }

        }
    }

    public function login() {
		if($this->input->post('login')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>strip_tags($this->input->post('email')),
                    'password' => md5(strip_tags($this->input->post('password'))),
                    'status' => '1'
                );
                $checkLogin = $this->Common_Model->getRows($con, 'users');
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    $this->session->set_userdata('email', $this->input->post('email'));
                    redirect('Site_Home/index');
                }else{
                	$this->session->set_flashdata('danger', array('message' => 'Invalid login credentials. Please try again.'));
                    redirect('Site_Login/login_form');
                }
            } else {

            	$this->load->view('login');
            }
        }
	}

/*
     * User logout
     */
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('Site_Home/');
    }

}