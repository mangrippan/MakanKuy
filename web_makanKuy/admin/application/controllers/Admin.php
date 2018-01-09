<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','file'));
        $this->load->model('MAdmin');
        $this->load->model('MTopup');
    }
    public function login(){
        if ($this->session->userdata('login_admin') == true) {
            redirect('Admin');
        }
        else {
            $this->load->view('Admin/Login');
            if($_POST){
				        $username = $this->input->post('username');
				        $password = $this->input->post('password');
                $result=$this->MAdmin->validasi_admin($username, $password);
                if(!empty($result)){
                    $this->session->set_userdata('login_admin',true);
                    $this->session->set_userdata('admin',$result);
                    redirect('Admin');
                }

            }
        }
    }

	function logout()
    {
        $this->session->sess_destroy();
        redirect('Admin');
    }

	public function index()
	{
		 if ($this->session->userdata('login_admin') == true) {
            redirect('Admin/dashboard');
        }
        else {
            redirect('Admin/login');
        }
	}
	function dashboard(){
        if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            //$contents['validuser']=$this->MUser->validUser();
            $this->load->view('Admin/Dashboard');
        }
        else {
            redirect('Admin/login');
       }

    }
	// public function userTopup(){
	// 	if ($this->session->userdata('login_admin') == true) {
  //           $contents['admin'] = $this->session->userdata('admin');
  //           $contents['userTopup']=$this->MTopup->data_topup();
  //          $this->load->view('Admin/v_topupUser',$contents);
  //       }
  //       else {
  //           redirect('Admin/login');
  //       }
	// }
	// public function updateSaldo($id, $jml, $tgl){
  //   $tanggal=urldecode($tgl);//menghilangkan spasi
  //   $this->MTopup->updateSaldo_topup($id,$tanggal);//update status di topup
  //   $saldo_awal=$this->MTopup->ambilSaldo($id);
  //   //print_r($saldo_awal[0]->saldo);die();
  //   $this->MTopup->updateSaldo_konsumen($id,$jml, $saldo_awal[0]->saldo);
	// 	redirect('Admin/userTopup');
	// }
	// public function hapusTopup($username, $tgl){
  //   $tanggal=urldecode($tgl);
	// 	$this->MTopup->hapusTopup($username,$tanggal);
  //   redirect('Admin/userTopup');
	// }

}
