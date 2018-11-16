<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
	<script src="<?= base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
	<script src="<?= base_url('assets/js/popper.js')?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
	

	<title>#</title>
</head>
<body>
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
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=base_url('admin/spam')?>">Spam</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=base_url('admin/konfirmasi')?>">Konfirmasi</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=base_url('admin/topik')?>">Topik</a>
	      </li>
	    </ul>
	    <<!-- span class="navbar-text">
	      Login
	    </span> -->
	  </div>
	</div>
</nav>
	
<main role="main" class="container">
