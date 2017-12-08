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
	function updateSaldo_topup($username, $tgl){
    //$data= array('id_konsumen' =>$username ,'tanggal_topup'=>$tgl );
    $this->db->set('status',1);
    $this->db->where('id_konsumen',$username);
    $this->db->where('tanggal_topup',$tgl);
    //$this->db->where($data);
    $this->db->update('topup');
	}
  function ambilSaldo($username){
    $query=$this->db->select('saldo')->from('konsumen')->where('id_konsumen',$username)->get();
    return $query->result();
  }
  function updateSaldo_konsumen($username, $jml, $saldo_awal){
    $jumlah=(int)$jml; $saldo=(int)$saldo_awal;
    $saldo_update=$jumlah+$saldo;
    //print_r($saldo_update);die();
    $this->db->set('saldo',$saldo_update);
    $this->db->where('id_konsumen',$username);
    $this->db->update('konsumen');
  }
	function hapusTopup($username, $tgl){
    $this->db->where('id_konsumen', $username);
    $this->db->where('tanggal_topup', $tgl);
    $this->db->delete('topup');
	}
  //FUNGSI MANAGE RESTO
	function manageResto(){
		$query=$this->db->select('*')->from('restoran')->where('status',0)->get();
		return $query->result();
	}
  function detailResto($id){
    $query=$this->db->select('*')->from('restoran')->where('id_restoran',$id)->get();
    //print_r($query);
    return $query->result();
	}
	function dataResto(){
		$query=$this->db->select('*')->from('restoran')->where('status',1)->get();
		return $query->result();
	}
	function prosesResto($id){
    $this->db->set('status',1);
    $this->db->where('id_restoran', $id);
    $this->db->update('restoran');
	}
	function hapusResto($id){
    $this->db->where('id_restoran', $id);
    $this->db->delete('restoran');
	}
}