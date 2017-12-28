<?php
class MUpload extends CI_Model{
  var $gallerypath;
  var $gallery_path_url;

  function __construct(){
    parent::__construct();

    $this->gallerypath=realpath(APPATH . '../assets/image_upload');
    $this->gallery_path_url=base_url().'assets/image_upload';
  }

  function simpan_gambar(){
    $konfigurasi=array('allowed_types' => 'jpg|jpeg|gif|png|bmp', 'upload_path'=>$this->gallerypath);
    $this->load->library('upload', $konfigurasi);
    $this->upload->do_upload();
    $data_file=$this->upload->data();

    $konfigurasi=array('source_image'=>$datafile['full_path'],
      'new_image'=>$this->gallerypath, 'thumbnails',
      'maintain_rotation'=>true,
      'width'=>130,
      'height'=>100
      );

    $this->load->library('image_lib', $konfigurasi);
    $this->image_lib->resize();

    $gambar=$_FILES['userfile']['name'];

    $data=array('foto_menu' =>$gambar);
    $this->db->insert('r', $data);
  }

?>
