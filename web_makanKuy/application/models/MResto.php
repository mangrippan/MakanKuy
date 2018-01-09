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

    function getResto($id){
        $query=$this->db->select('*')->from('restoran')->where('id_restoran',$id)->get();
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

    function set_resto($data){
      //print_r($data);die();
      $id=$data['id'];
      $jalan=$data['jalan'];
      $kec=$data['kec'];
      $dt=$data['d_tmpt'];
      $telp=$data['telp'];
      $kap=$data['kap'];
      $jb=$data['jam_buka'];
      $jt=$data['jam_tutup'];

      $this->db->set("jalan",$jalan);
      $this->db->set("kecamatan", $kec);
      $this->db->set("detail_tempat", $dt);
      $this->db->set("no_telp", $telp);
      $this->db->set("jam_buka", $jb);
      $this->db->set("jam_tutup", $jt);
      $this->db->set("kapasitas", $kap);

      $this->db->where("id_restoran",$id);
      $this->db->update("restoran");
    }
    // //Menu
    // function ambilMenu($id){
    //   $query=$this->db->select('foto_menu')->from('menu')->where('id_restoran',$id)->get();
    //   return $query->result();
    // }
    // function inputMenu($id, $menu){
    //   //  $query="INSERT INTO menu (id_restoran, foto_menu) VALUES (".$this->db->escape($id).",".$this->db->escape($menu).")";
    //   $data=array(
    //       'id_restoran'=> $id,
    //       'foto_menu'=> $menu
    //
    //   );
    //   $this->db->insert('menu', $data);
    // }
}
