<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_blog extends CI_Model{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

public function create()
  {
    $link = url_title($this->input->post('judul'), 'dash', TRUE);
    $data = array(
        'judul' => $this->input->post('judul'),
        'link' => $link,
        'konten' => $this->input->post('konten'),
        'picture'=> $this->input->post('gambar')
    );

    return $this->db->insert('post', $data);
  }

  public function read($link = FALSE)
  {
    if ($link === FALSE) {
      $query = $this->db->get('post');
      return $query->result_array();
    } else {
      $query = $this->db->get_where('post', array('link' => $link));
      return $query->row();
    }
  }

  public function delete($link)
  {
    $this->db->where('link', $link);
    return $this->db->delete('post');
  }

  public function update($linkLama)
  {
    $linkBaru = url_title($this->input->post('judul'), 'dash', TRUE);

    $data = array(
        'judul' => $this->input->post('judul'),
        'link' => $linkBaru,
        'konten' => $this->input->post('konten'),
        'picture'=> $this->input->post('gambar')
    );

    $this->db->where('link', $linkLama);
    return $this->db->update('post', $data);
  }

  function tambahUser()
  {
    $data = array(
      'username' => 'admin',
      'password' => password_hash("admin", PASSWORD_DEFAULT)
    );
    return $this->db->insert('user', $data);
  }
}
