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
  public function signup(){
      $this->load->view('Resto/signup.php');
      if($_POST){
        $username=$this->input->post('username');
        $nama=$this->input->post('nama');
        $password=$this->input->post('password');
        $result=$this->MResto->inputResto($username, $nama, $password);
        if($result){
          //print_r($result);die();
          echo '<script type="text/javascript" >
  			       alert("Sign Up Berhasil, Silahkan Login Kembali");
               window.location.href="'.base_url().'";
  		         </script>';
          //redirect('Resto/login');
        }
        else redirect('Resto/signup');
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
  function load_header(){
    $contents['jml_pesan'] = $this->MResto->jumlah_pesanan($this->session->userdata("resto")->id_restoran);
    $contents['data_pesan']= $this->MResto->data_pesanan($this->session->userdata("resto")->id_restoran);
    // print_r($contents);die();
    $this->load->view('Layout/Header.php',$contents);
  }
	function dashboard(){
        if ($this->session->userdata('login_resto') == true) {
            $contents['restoran'] = $this->session->userdata('resto');
            //$contents['validuser']=$this->MUser->validUser();
            $this->load_header();
            $this->load->view('Resto/dashboard');
        }
        else {
            redirect('Resto/v_Login');
       }
  }
  function pemesanan($id){
    if ($this->session->userdata('login_resto') == true) {
        $contents['restoran'] = $this->session->userdata('resto');
        $contents['pemesanan']=$this->MResto->pemesanan($id);
        $this->load_header();
        $this->load->view('Resto/daftar_pesanan', $contents);
    }
    else {
        redirect('Resto/v_Login');
   }
  }
  function booking($id){
    if ($this->session->userdata('login_resto') == true) {
        $contents['restoran'] = $this->session->userdata('resto');
        $contents['booking']=$this->MResto->booking($id);
        $this->load_header();
        $this->load->view('Resto/daftar_booking', $contents);
    }
    else {
        redirect('Resto/v_Login');
   }
  }

  function confirm_pesan($id_k,$id_r, $tgl){
     $tanggal=urldecode($tgl);
     $this->MResto->updatePemesanan($id_k,$id_r,$tanggal);
     $saldo_awal=$this->MResto->ambilSaldo($id_k);
     $deposit=$this->MResto->ambilDeposit($id_k,$id_r,$tanggal);
     //print_r($deposit);die();
     $this->MResto->updateSaldo($id_k, $saldo_awal[0]->saldo, $deposit[0]->deposit);
     redirect('Resto/pemesanan/'.$id_r);
  }
  function selesai_pesan($id_k,$id_r, $tgl){
    $tanggal=urldecode($tgl);
    $this->MResto->selesaiBooking($id_k,$id_r,$tanggal);
    redirect('Resto/booking/'.$id_r);
  }
  //PENGATURAN RESTORAN
  function setting_akun($id){
        if ($this->session->userdata('login_resto') == true) {
            $contents['restoran'] = $this->session->userdata('resto');
            $this->load_header();
            $this->load->view('Resto/setting_akun',$contents);
            //print_r($contents);
        }
        else {
            redirect('Resto/v_Login');
       }
  }
  function set_akun(){
    if ($this->session->userdata('login_resto') == true) {
      if($_POST){
        $id=$this->input->post("username");
        $nama=$this->input->post('nama');
        $password=$this->input->post('password');
        $result=$this->MResto->set_akun($id, $nama, $password);
        //print_r($nama);die();
      }
      redirect('Resto/setting_akun/'.$id, 'refresh');
    }
    else {
        redirect('Resto/v_Login');
   }
  }
  function setting_resto($id){
        if ($this->session->userdata('login_resto') == true) {
            $contents['restoran'] = $this->session->userdata('resto');
            $this->load_header();
            $this->load->view('Resto/setting_resto',$contents);
            //print_r($contents);
        }
        else {
            redirect('Resto/v_Login');
       }
  }
  function set_resto(){
    if ($this->session->userdata('login_resto') == true) {
      if($_POST){
  //      $nama=$this->input->post('nama');
    //    $password=$this->input->post('password');
        //$result=$this->MResto->inputResto($username, $nama, $password);
      //  print_r($nama);die();
      }
    }
    else {
        redirect('Resto/v_Login');
   }
  }
}
