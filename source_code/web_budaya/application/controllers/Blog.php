<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('M_blog', 'blog');
  }

  function tambahUser()
  {
    $this->blog->tambahUser();
    echo "udah";
  }

  function index($link = FALSE)
  {
    if ($link === FALSE) {
      $data['posts'] = $this->blog->read();

      $this->load->view('header');
      $this->load->view('home', $data);
      $this->load->view('footer');
    } else {
      $data['post'] = $this->blog->read($link);

      $this->load->view('header');
      $this->load->view('post', $data);
      $this->load->view('footer');
    }
  }

  function delete($link)
  {
    if($this->session->has_userdata('username')) {
    $this->blog->delete($link);
    redirect();
    } else {
    redirect('auth/login');
    }
    
  }

function create()
  {
    if($this->session->has_userdata('username')) {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('gambar', 'Gambar');
    $this->form_validation->set_rules('konten', 'Konten', 'required');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('header');
      $this->load->view('create');
      $this->load->view('footer');
    }
    else
    {
      $this->blog->create();
      redirect("blog");
    }
    } else {
    redirect('auth/login');
    }
    
  }
  
  function update($link)
  {
    if($this->session->has_userdata('username')) {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('konten', 'Konten', 'required');

    if ($this->form_validation->run() === FALSE)
    {
      $data['post'] = $this->blog->read($link);
      $this->load->view('header');
      $this->load->view('update', $data);
      $this->load->view('footer');
    }
    else
    {
      $this->blog->update($link);
      redirect();
    }
    } else {
    redirect('auth/login');
    }  
  }
}

