<?php

class MAdmin extends CI_Model {
    var $table='admin';
    function __construct() {
        parent::__construct();
    }
    public function validasi_admin($username, $password){
        $this->db->where("id_admin",$username);
        $this->db->where("password",$password);
        return $this->db->get('admin')->row();
    }

    function getAdmin(){
        $query=$this->db->select('*')->from($this->table)->where('id_admin',$this->session->userdata('admin')['id_admin'])->get();
        return $query->result();
    }
	function userTopup(){
		$query=$this->db->select('*')->from('topup')->where('status',0)->get();
		return $query->result();
	}
	function updateSaldo_topup($username, $status){
    $this->db->set('status',1);
    $this->db->where('id_konsumen',$username);
    $this->db->update('topup');
	}
  function updateSaldo_konsumen($id, $jml){
    //$query=$this->db->update('konsumen')->set('saldo=saldo+jml')->where('id_konsumen=username');
  //  $saldo=$this->db->select('saldo')->from('konsumen')->where('id_konsumen',$username);
    $this->db->set('saldo',$jml);
    $this->db->where('id_konsumen',$username);
    $this->db->update('konsumen');
  }
	function hapusTopup($id){

	}
  //FUNGSI MANAGE RESTO
	function manageResto(){
		$query=$this->db->select('*')->from('restoran')->where('status',0)->get();
		return $query->result();
	}
  function detailResto(){//untuk yang belum di verifikasi

	}
	function dataResto(){
		$query=$this->db->select('*')->from('restoran')->where('status',1)->get();
		return $query->result();
	}
	function prosesResto($id){

	}
	function hapusResto($id){

	}
  function infoResto(){//untuk yang sudah diverifikasi

  }
/*
	function laporanBaru(){
		$query=$this->db->select('*')->from('laporan')->where('status',0)->get();
        return $query->result();
	}

	function laporanProses(){
		$query=$this->db->select('*')->from('laporan')->where('status',1)->get();
        return $query->result();
	}

	function laporanSelesai(){
		$query=$this->db->select('*')->from('laporan')->where('status',2)->get();
        return $query->result();
	}

	function hapuslaporan($id){
        $this->db->where('id_laporan',$id);
        $this->db->delete(array('laporan'));
    }
    function makelaporanproses($id){
        $data=array(
            'status'=> 1
        );
        $this->db->where('id_laporan',$id);
        $this->db->update('laporan',$data);
    }

	function makelaporanselesai($id){
        $data=array(
            'status'=> 2
        );
        $this->db->where('id_laporan',$id);
        $this->db->update('laporan',$data);
    }

*/

}
