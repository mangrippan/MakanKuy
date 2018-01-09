<?php

class MTopup extends CI_Model {
    var $table='admin';
    function __construct() {
        parent::__construct();
    }
	function data_topup(){
		$query=$this->db->select('*')->from('topup')->where('status',0)->get();
		return $query->result();
	}
	function updateSaldo_topup($username, $tgl){
    //$data= array('id_konsumen' =>$username ,'tanggal_topup'=>$tgl );
    $this->db->set('status',1);
    $this->db->where('id_konsumen',$username);
    $this->db->where('tanggal_topup',$tgl);
    $this->db->update('topup');
	}
  function ambilSaldo($username){
    $query=$this->db->select('saldo')->from('konsumen')->where('id_konsumen',$username)->get();
    return $query->result();
  }
  function updateSaldo_konsumen($username, $jml, $saldo_awal){
    $jumlah=(int)$jml; $saldo=(int)$saldo_awal;
    $saldo_update=$jumlah+$saldo;
    $this->db->set('saldo',$saldo_update);
    $this->db->where('id_konsumen',$username);
    $this->db->update('konsumen');
  }
	function hapusTopup($username, $tgl){
    $this->db->where('id_konsumen', $username);
    $this->db->where('tanggal_topup', $tgl);
    $this->db->delete('topup');
	}

}
