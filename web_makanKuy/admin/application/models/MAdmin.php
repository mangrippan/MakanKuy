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

}
