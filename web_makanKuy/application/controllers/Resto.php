<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resto extends CI_Controller {
  //$this->load->library('session');
  public $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','file'));
        $this->load->model('MResto');
    }

    public function login(){
        if ($this->session->userdata('login_resto') == true) {
            redirect('Resto/dashboard');
        }
        else {
            $this->load->view('Resto/v_Login');
            if($_POST){
				        $username = $this->input->post('username');
				        $password = $this->input->post('password');
                $result=$this->MResto->validasi_resto($username, $password);
                if(!empty($result)){
                    $this->session->set_userdata('login_resto',true);
                    $this->session->set_userdata('resto',$result);
                    //redirect('Resto');
                }
            }
        }
    }

	function logout()
    {
        $this->session->sess_destroy();
        redirect('Resto');
    }

	public function index()
	{
     $this->load->library('session');
		 if ($this->session->userdata('login_resto') == true) {
            redirect('Resto/dashboard');
            //echo "login berhasil";
      }
      else {
            //$this->load->view('Resto/v_Login');
            redirect('Resto/login');
      }
	}
	function dashboard(){
        if ($this->session->userdata('login_resto') == true) {
            $contents['restoran'] = $this->session->userdata('resto');
            //$contents['validuser']=$this->MUser->validUser();
            $this->load->view('Resto/dashboard');
        }
        else {
            redirect('Resto/v_Login');
       }

  }

}
