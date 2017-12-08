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
	public function updateSaldo($id, $jml, $tgl){
    //print_r($tgl);die();
    //print_r(urldecode($tgl));die();
    $tanggal=urldecode($tgl);//menghilangkan spasi
    $this->MAdmin->updateSaldo_topup($id,$tanggal);//update status di topup
    $saldo_awal=$this->MAdmin->ambilSaldo($id);
    //print_r($saldo_awal[0]->saldo);die();
    $this->MAdmin->updateSaldo_konsumen($id,$jml, $saldo_awal[0]->saldo);
		redirect('Admin/userTopup');
	}
	public function hapusTopup($username, $tgl){
    $tanggal=urldecode($tgl);
		$this->MAdmin->hapusTopup($username,$tanggal);
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
	public function prosesResto($id_resto){
		$this->MAdmin->prosesResto($id_resto);
    redirect('Admin/verifikasiResto');
	}
	public function detailResto($id){//belum diverikasi
    if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['detailResto']=$this->MAdmin->dataResto();
            $this->load->view('Admin/v_detailResto',$contents);
    }
    else {
            redirect('Admin/verifikasiResto');
    }
	}
	public function hapusResto($id){ //belum diverifikasi
		$this->MAdmin->hapusResto($id);
        redirect('Admin/verifikasiResto');
	}
	public function dataResto(){ //Lihat daftar resto yang sudah diveirifikasi
    if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['dataResto']=$this->MAdmin->dataResto();
            $this->load->view('Admin/v_dataResto',$contents);
    }
    else {
            redirect('Admin/dataResto');
    }
  }
  public function infoResto($id_resto){ //sudah diverikasi
    if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['detailResto']=$this->MAdmin->detailResto($id_resto);
            //printr($contents['detailResto']);
            $this->load->view('Admin/v_detailResto',$contents);
    }
    else {
            redirect('Admin/dataResto');
    }
  }

  public function deleteResto($id){//sudah diverifikasi
    $this->MAdmin->hapusResto($id);
    redirect('Admin/dataResto');
  }
}
