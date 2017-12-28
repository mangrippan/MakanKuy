<?php

class MResto extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function validasi_resto($username, $password){
        $this->db->where("id_restoran",$username);
        $this->db->where("password",$password);
        return $this->db->get('restoran')->row();
    }

    function getResto(){
        $query=$this->db->select('*')->from('restoran')->where('id_restoran',$this->session->userdata('resto')['id_restoran'])->get();
        return $query->result();
    }

    function inputResto($username, $nama, $password){
        $query="INSERT INTO restoran (id_restoran, nama, password) VALUES (".$this->db->escape($username).",". $this->db->escape($nama).",". $this->db->escape($password).")";
        if($this->db->query($query)) return true; else false;
    }

    function set_akun($id, $nama, $pw){
      $this->db->set("nama", $nama);
      $this->db->set("password", $pw);
      $this->db->where("id_restoran",$id);
      $this->db->update("restoran");
    }

//---------------------------------PEMESANAN------------------------------------------------------------------
    function pemesanan($id){
      $query=$this->db->select('*')->from('pemesanan')->where('status',0)->where('id_restoran',$id)->get();
		  return $query->result();
    }
    function booking($id){
      $query=$this->db->select('*')->from('pemesanan')->where('status',1)->where('id_restoran',$id)->get();
      return $query->result();
    }
    function jumlah_pesanan($id) {
      # code...
      $query=$this->db->select('*')->from('pemesanan')->where('status',0)->where('id_restoran',$id)->get();
      $jml_pesan=$query->num_rows();
      return $jml_pesan;
    }
    function data_pesanan($id){
      $query=$this->db->select('*')->from('pemesanan')->where('status',1)->where('id_restoran',$id)->get();
      $data_pesan=$query->num_rows();//baru
      return $data_pesan;

    }
    //update pemesanan konsumen
    function updatePemesanan($idK, $idR, $tgl){
        $this->db->set('status',1);
        $this->db->where('id_konsumen', $idK);
        $this->db->where('id_restoran', $idR);
        $this->db->where('tanggal_pesan', $tgl);
        $this->db->update('pemesanan');
    }
    function ambilSaldo($idK){
      $query=$this->db->select('saldo')->from('konsumen')->where('id_konsumen',$idK)->get();
      return $query->result();
    }
    function ambilDeposit($idK, $idR, $tgl){
      $query=$this->db->select('deposit')->from('pemesanan')->where('id_konsumen',$idK)->where('id_restoran',$idR)->where('tanggal_pesan',$tgl)->get();
      return $query->result();
    }
    function updateSaldo($idK, $saldo_awal, $jml){
      $jumlah=(int)$jml; $saldo=(int)$saldo_awal;
      $saldo_update=$saldo-$jumlah;
      $this->db->set('saldo',$saldo_update);
      $this->db->where('id_konsumen',$idK);
      $this->db->update('konsumen');
    }
    //selesai di resto
    function selesaiBooking($idK, $idR, $tgl){
        $this->db->set('status',2);
        $this->db->where('id_konsumen', $idK);
        $this->db->where('id_restoran', $idR);
        $this->db->where('tanggal_pesan', $tgl);
        $this->db->update('pemesanan');
    }
}
