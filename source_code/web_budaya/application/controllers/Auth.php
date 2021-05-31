<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('M_auth', 'auth');
  }

  function login()
  {
  	$this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|callback_cekPassword');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('header');
      $this->load->view('login');
      $this->load->view('footer');
    }
    else
    {
      $this->session->set_userdata('username',$this->input->post('username',true));
      redirect("blog");
    }
  }

  function logout()
  {

  	if($this->session->has_userdata('username')) {
  		$this->session->sess_destroy();
  		redirect();
  	} else {
  		redirect("auth/login");
  	}
  	}

  	function cekPassword()
  	{
  		$this->load->model('M_auth', 'auth');
  		$account = $this->auth->cekPassword();
  		if(!isset($account)) {$account = new \stdClass();$account->password = false;}
  		if(password_verify($this->input->post('password',true), $account->password))
  		{
  			return true;
  		} else {
  			$this->form_validation->set_message('passwordCheck','Wrong password or username');
  			return false;
  		}
  	}


  }

