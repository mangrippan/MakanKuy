<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resto extends CI_Controller {
  public $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','file','form'));
        $this->load->model('MResto');
        $this->load->model('MPemesanan');
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
    $contents['jml_pesan'] = $this->MPemesanan->jumlah_pesanan($this->session->userdata("resto")->id_restoran);
    $contents['data_pesan']= $this->MPemesanan->data_pesanan($this->session->userdata("resto")->id_restoran);
    //print_r($contents);die();
    $this->load->view('Layout/Header.php',$contents);
  }
	function dashboard(){
        if ($this->session->userdata('login_resto') == true) {
            $contents['restoran'] = $this->MResto->getResto($this->session->userdata("resto")->id_restoran);
            $contents['pemesanan'] = $this->MPemesanan->jumlah_booking($this->session->userdata("resto")->id_restoran);
            $this->load_header();
            $this->load->view('Resto/dashboard', $contents);
            //var_dump($contents);
        }
        else {
            redirect('Resto/v_Login');
       }
  }

  //PENGATURAN RESTORAN
  function setting_akun($id){
        if ($this->session->userdata('login_resto') == true) {
            $id=$this->session->userdata('resto')->id_restoran;
            $contents['restoran']=$this->MResto->getResto($id);
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
            $id=$this->session->userdata('resto')->id_restoran;
            $contents['restoran']=$this->MResto->getResto($id);
            $this->load_header();
            $this->load->view('Resto/setting_resto',$contents);
            //print_r($contents[]);
        }
        else {
            redirect('Resto/v_Login');
       }
  }
  function set_resto(){
    if ($this->session->userdata('login_resto') == true) {
      $id=$this->input->post("id");
      $data=$_POST;
      $this->MResto->set_resto($data);

      redirect('Resto/setting_resto/'.$id, 'refresh');
    }
    else {
        redirect('Resto/v_Login');
   }
  }
//-----------------------MENU---------------------------------------
  function menu($id){
    if ($this->session->userdata('login_resto') == true) {
        $this->load_header();
        $contents['restoran'] = $this->session->userdata('resto');
        $contents['foto_menu']= $this->MResto->ambilMenu($id);
        $this->load->view('Resto/menu',$contents);
        //echo "<br>";
        //var_dump($contents['foto_menu']);die();
    }
    else {
        redirect('Resto/v_Login');
    }
   }

   public function do_upload() {
      $config['upload_path']          = './assets/image_upload';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('tambah_menu'))
      {
              $error = array('error' => $this->upload->display_errors());
              print_r($error);die();
            //  $this->load->view('menu', $error);
      }
      else
      {
              $data = array('upload_data' => $this->upload->data());
              $id=$this->input->post('id_resto');
              $this->MResto->inputMenu($id, $data['upload_data']['file_name']);
              redirect('Resto/menu/'.$id);
      }
   }

}
