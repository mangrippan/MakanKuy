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

}
