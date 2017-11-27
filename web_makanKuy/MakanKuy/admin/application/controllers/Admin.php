<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','file'));
        $this->load->model('MAdmin');
    }
    public function pesan($tulisan){
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">$tulisan</div></div>");
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
                  // print_r($result);die();
                    // $data_admin=["username" =>$result->username,
                    //     "password"=>$result->password,
                    // ];
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
       // echo "coba"
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
	public function userTopup(){
		if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['userTopup']=$this->MAdmin->userTopup();
           $this->load->view('Admin/v_topupUser',$contents);
        }
        else {
            redirect('Admin/login');
        }
	}
	public function updateSaldo($id, $saldo, $status){
		$result1=$this->MAdmin->updateSaldo_topup($id,$status);
    $result2=$this->Madmin->updateSaldo_konsumen($id,$saldo);
		redirect('Admin/userTop');
	}
	public function hapusTopup(){
		$this->MAdmin->hapusTopup($id);
        redirect('Admin/userTopup');
	}
	public function verifikasiResto(){
		if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['mResto']=$this->MAdmin->manageResto();
           $this->load->view('Admin/v_verifikasiResto',$contents);
        }
        else {
            redirect('Admin/login');
        }
	}
	public function prosesResto(){
		$this->MAdmin->prosesResto($id);
        redirect('Admin/verifikasiResto');
	}
	public function detailResto(){//belum diverikasi
		$this->MAdmin->detailResto($id);
        redirect('Admin/verifikasiResto');
	}
	public function hapusResto(){
		$this->MAdmin->hapusResto($id);
        redirect('Admin/verifikasiResto');
	}
	public function dataResto(){
    if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['dataResto']=$this->MAdmin->dataResto();
            $this->load->view('Admin/v_dataResto',$contents);
    }
    else {
            redirect('Admin/dataResto');
    }
  }
  public function infoResto(){ //sudah diverikasi

  }
	/*
	public function laporanBaru()
	{
		if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['laporanbaru']=$this->MAdmin->laporanBaru();
            $this->load->view('Admin/v_LaporanBaru',$contents);
        }
        else {
            redirect('Admin/login');
        }
	}

	 function makelaporanproses($id){
        $this->MAdmin->makelaporanproses($id);
        redirect('Admin/laporanBaru');
    }

	function hapuslaporan($id){
        $this->MAdmin->hapuslaporan($id);
        redirect('Admin/laporanBaru');
    }


		public function laporanProses()
	{
		if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['laporanproses']=$this->MAdmin->laporanProses();
           $this->load->view('Admin/v_LaporanProses',$contents);
        }
        else {
            redirect('Admin/login');
        }
	}

	function makelaporanselesai($id){
			$this->MAdmin->makelaporanselesai($id);
			redirect('Admin/laporanProses');
		}


		public function laporanSelesai()
	{
		if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['laporanselesai']=$this->MAdmin->laporanSelesai();
           $this->load->view('Admin/v_LaporanSelesai',$contents);
        }
        else {
            redirect('Admin/login');
        }
	}


	public function berita()
	{
		$this->load->view('Admin/v_Berita');
	}

	public function adminmanagement()
	{
		$contents['adm']=$this->MAdmin->adminlist();
		$this->load->view('Admin/v_AdminManagement', $contents);
	}

	*/




}
