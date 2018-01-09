<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topup extends CI_Controller {
  public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','file'));
        $this->load->model('MTopup');
    }
	public function userTopup(){
		if ($this->session->userdata('login_admin') == true) {
            $contents['admin'] = $this->session->userdata('admin');
            $contents['userTopup']=$this->MTopup->data_topup();
           $this->load->view('Admin/v_topupUser',$contents);
        }
        else {
            redirect('Admin/login');
        }
	}
	public function updateSaldo($id, $jml, $tgl){
    $tanggal=urldecode($tgl);//menghilangkan spasi
    $this->MTopup->updateSaldo_topup($id,$tanggal);//update status di topup
    $saldo_awal=$this->MTopup->ambilSaldo($id);
    //print_r($saldo_awal[0]->saldo);die();
    $this->MTopup->updateSaldo_konsumen($id,$jml, $saldo_awal[0]->saldo);
		redirect('Topup/userTopup');
	}
	public function hapusTopup($username, $tgl){
    $tanggal=urldecode($tgl);
		$this->MTopup->hapusTopup($username,$tanggal);
    redirect('Topup/userTopup');
	}

}
