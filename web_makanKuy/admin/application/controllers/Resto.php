<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resto extends CI_Controller {

  public $data = array();

  public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','file'));
        $this->load->model('MResto');
  }
	public function verifikasiResto(){
		if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['mResto']=$this->MResto->manageResto();
            //print_r($contents);die();
            $this->load->view('Admin/v_verifikasiResto',$contents);
        }
        else {
            redirect('Admin/login');
        }
	}
	public function prosesResto($id_resto){
		$this->MResto->prosesResto($id_resto);
    redirect('Resto/verifikasiResto');
	}
	public function detailResto($id){//belum diverikasi
    if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['detailResto']=$this->MResto->detailResto($id);
            $this->load->view('Admin/detailResto',$contents);
    }
    else {
            redirect('Resto/verifikasiResto');
    }
	}
	public function hapusResto($id){ //belum diverifikasi
		$this->MResto->hapusResto($id);
        redirect('Resto/verifikasiResto');
	}
	public function dataResto(){ //Lihat daftar resto yang sudah diveirifikasi
    if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['dataResto']=$this->MResto->dataResto();
            $this->load->view('Admin/v_dataResto',$contents);
    }
    else {
            redirect('Resto/dataResto');
    }
  }
  public function infoResto($id_resto){ //sudah diverikasi
    if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['detailResto']=$this->MResto->detailResto($id_resto);
            //printr($contents['detailResto']);
            $this->load->view('Admin/v_detailResto',$contents);
    }
    else {
            redirect('Resto/dataResto');
    }
  }

  public function deleteResto($id){//sudah diverifikasi
    $this->MResto->hapusResto($id);
    redirect('Resto/dataResto');
  }
}
