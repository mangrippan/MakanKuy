<?php

class MResto extends CI_Model {
    var $table='admin';
    function __construct() {
        parent::__construct();
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
