<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Kebudayaan Sulawesi Selatan</title>
		<link rel="stylesheet" href="<?= base_url("asset/css/materialize.min.css"); ?>">
		<link rel="stylesheet" href="<?= site_url("asset/fonts/material-icons/material-icons.css"); ?>">
		<style type="text/css">
		  nav.container.transparent.z-depth-0 {
		    left: 0;
		    position: absolute;
		    top: 0;
		    right: 0;
		  }

		  .carousel-slider{
		    max-height: 450px;
		  }

		  #outer-wrapper{
		  		padding-right: 25px;
    			padding-left: 25px;
		  	    border: 1px solid #ddd;
		  }
		</style>
	</head>
	<body>
		<script src="<?= site_url("asset/js/jquery.min.js"); ?>"></script>
  	<script src="<?= site_url("asset/js/materialize.min.js"); ?>"></script>
	<header class="perapih">
	   <div class="carousel carousel-slider center" data-indicators="true">
	    <a class="carousel-item" href="#one!"><img src="<?=base_url('asset/images/1.jpg'); ?>"></a>
	    <a class="carousel-item" href="#three!"><img src="<?=base_url('asset/images/3.jpg');?>"></a>
	  </div>
	    <nav class="container transparent z-depth-0">
    <div class="nav-wrapper z-depth-0">
      <a href="<?= base_url();?>" style="padding-left:20px;" class="brand-logo">BUDAYAKU</a>
      <ul id="nav-mobile" style="padding-left:200px;" class="left hide-on-med-and-down">
      <?php if ($this->session->has_userdata('username')):?>
        <li><a href="<?= site_url('blog/index/sejarah-sulawesi-selatan');?>">Sejarah</a></li>
        <li><a class='dropdown-button' href='#' data-activates='dropdown1'>Budaya Sulawesi Selatan</a></li>
		  <ul id='dropdown1' class='dropdown-content transparent'>
		    <li><a class="white-text" href="<?= site_url('blog/index/rumah-adat');?>">Rumah Adat</a></li>
		    <li><a class="white-text" href="<?= site_url('blog/index/pakaian-adat');?>">Pakaian Adat</a></li>
		    <li><a class="white-text" href="<?= site_url('blog/index/senjata-tradisional-sulawesi-selatan');?>">Senjata Tradisional</a></li>
		  </ul>
      	</ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li><a href="<?= site_url('blog/create');?>">Post Baru</a></li>
        <li><a href="<?= site_url("logout"); ?>">Logout</a></li>
        <?php else : ?>
        <li><a href="<?= site_url('blog/index/sejarah-sulawesi-selatan');?>">Sejarah</a></li>
        <li><a class='dropdown-button' href='#' data-activates='dropdown1'>Budaya Sulawesi Selatan</a></li>
		  <ul id='dropdown1' class='dropdown-content transparent'>
		    <li><a class="white-text" href="<?= site_url('blog/index/rumah-adat');?>">Rumah Adat</a></li>
		    <li><a class="white-text" href="<?= site_url('blog/index/pakaian-adat');?>">Pakaian Adat</a></li>
		    <li><a class="white-text" href="<?= site_url('blog/index/senjata-tradisional-sulawesi-selatan');?>">Senjata Tradisional</a></li>
		  </ul>
      	</ul>
      	</ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?= site_url("login");?>">Login</a></li>
		<?php endif; ?>
      </ul>
      </div>
  </nav>
</header>
		<main class="container" id="outer-wrapper">
