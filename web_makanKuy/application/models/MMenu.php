<?php

class MMenu extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    //Menu
    function ambilMenu($id){
      $query=$this->db->select('foto_menu')->from('menu')->where('id_restoran',$id)->get();
      return $query->result();
    }
    function inputMenu($id, $menu){
      $data=array(
          'id_restoran'=> $id,
          'foto_menu'=> $menu
      );
      $this->db->insert('menu', $data);
    }
}
