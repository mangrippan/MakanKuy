<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','file','form'));
        $this->load->model('MMenu');
        $this->load->model('MPemesanan');
        $this->load->model('MResto');
    }

    function load_header(){
      $contents['jml_pesan'] = $this->MPemesanan->jumlah_pesanan($this->session->userdata("resto")->id_restoran);
      $contents['data_pesan']= $this->MPemesanan->data_pesanan($this->session->userdata("resto")->id_restoran);
      $contents['resto']= $this->MResto->getResto($this->session->userdata("resto")->id_restoran);
      //print_r($contents);
      $this->load->view('Layout/Header.php',$contents);
    }
    public function data_menu($id){
    if ($this->session->userdata('login_resto') == true) {
        $this->load_header();
        $contents['restoran'] = $this->session->userdata('resto');
        $contents['foto_menu']= $this->MMenu->ambilMenu($id);
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
      $config['max_size']             = 500;
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
              $this->MMenu->inputMenu($id, $data['upload_data']['file_name']);
              redirect('Menu/data_menu/'.$id);
      }
   }

}
