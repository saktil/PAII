<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function cekPassword()
  {
  	$this->db->select('password');
  	$this->db->where('username',$this->input->post('username',true));
  	$query = $this->db->get('user');
  	return $query->row();
  }
}