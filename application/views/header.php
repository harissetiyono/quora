<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
	<script src="<?= base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
	<script src="<?= base_url('assets/js/popper.js')?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<title>#</title>
</head>
<body>

<style type="text/css">
	hr {
		margin: 0;
	}
</style>
<nav class="navbar navbar-expand-lg navbar-light box-shadow">
	<div class="container d-flex justify-content-between">
	  <a class="navbar-brand" href="#">
	  	<img src="<?= base_url('assets/images/quora-logo.png')?>">
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="<?=site_url('beranda') ?>"><i class="fa fa-file-o"></i> Beranda</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=site_url('beranda/jawab')?>"><i class="fa fa-pencil-square-o"></i> Jawab</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=site_url('pertanyaan')?>"><i class="fa fa-bell"></i> Notifikasi</a>
	      </li>
	      <li class="nav-item">
	      	<form action="<?php echo site_url('beranda/cari') ?>" method="GET">
	      		<input type="text" name="search" class="form-control" style="width: 410px">
	      	</form>
	      </li>
	      <?php if ($this->session->userdata('id_member') != null): ?>
	      	<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <?php if (file_exists('assets/images/profil/'.$this->session->userdata('id_member').'.png')) {
		          	$src = base_url('assets/images/profil/'.$this->session->userdata('id_member').'.png');
		          }elseif(file_exists('assets/images/profil/'.$this->session->userdata('id_member').'.jpg')){
		          	$src = base_url('assets/images/profil/'.$this->session->userdata('id_member').'.jpg');
		          }elseif (file_exists('assets/images/profil/'.$this->session->userdata('id_member').'.jpeg')) {
		          	$src = base_url('assets/images/profil/'.$this->session->userdata('id_member').'.jpeg');
		          }else{
		          	$src = base_url('assets/images/profil/default.png');
		          } ?>

		          <img src="<?php echo $src; ?>" class="rounded-circle" style="width:30px">
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #D3D3D3">
		            <a class="dropdown-item" href="<?php echo site_url('profil') ?>" style="color:#4169E1">Profil</a>
		            <a class="dropdown-item" href="<?php echo site_url('bisnis')?>" style="color:#4169E1">Ads Manager</a>
		            <a class="dropdown-item" href="<?php echo site_url('login/logout') ?>" style="color:#4169E1">Logout</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <button type="button" class="btn btn-link" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Pertanyaan</button>
		      </li>
	      <?php else: ?>
	      	<li class="nav-item">
	        	<a class="btn btn-danger" href="<?php echo site_url('login') ?>">Login</a>
	      	</li>
	      <?php endif ?>
	    </ul>
	  </div>
	</div>
</nav>
<hr>
	
<main role="main" class="container">
