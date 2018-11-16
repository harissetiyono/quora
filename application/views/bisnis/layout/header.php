<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="<?= base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
	
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script> -->
  <!-- <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script> -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

	<title>#</title>
</head>
<body>

<style type="text/css">
	.navbar {
		background-color: #a72822;
	}
	.navbar-light .navbar-brand {
		color: #FFFFFF;
	}

	.navbar-nav a {
		color: #FFFFFF;
	}
</style>

<nav class="navbar navbar-expand-lg navbar-light box-shadow p-1">
	<!-- <div class="container d-flex justify-content-between"> -->
	  <a class="navbar-brand" href="#">
	  	<img src="<?= base_url('assets/images/quora-logo-white.png')?>">
	  	<small style="color: #FFFFFF">ads manager</small>
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <ul class="navbar-nav mr-auto">
      </ul>

	  <ul class="navbar-nav">
	  	<li class="nav-item">
        <a class="nav-link" href="#" style="color: white;">
        	<i class="fa fa-bell"></i> Notifications
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
          <?php echo $this->session->userdata('nama') ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #D3D3D3">
            <a class="dropdown-item" href="<?php echo site_url('bisnis/account_setting/'.$this->session->userdata('id')) ?>" style="color:#4169E1">Account Setting</a>
            <a class="dropdown-item" href="<?php echo site_url('bisnis/billing/')?>" style="color:#4169E1">Billing & Payment</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('bisnis/logout') ?>" style="color: white;">
          Logout
        </a>
      </li>
    </ul>
	<!-- </div> -->
</nav>
	
<main role="main" class="container-fluid">

<nav class="navbar navbar-expand-lg navbar-light box-shadow p-0" style="background-color: white; margin: 0">

<ul class="nav mr-auto">
  <li class="nav-item">
    <a class="nav-link active" href="<?php echo site_url('bisnis/manage') ?>" style="color: #333">Manage Ads</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" style="color: #333">Quora Pixel</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('bisnis/audience') ?>" style="color: #333">Audience</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="<?php  echo site_url('bisnis/report') ?>" style="color: #333">Email Report</a>
  </li>
</ul>

<ul class="nav p-0">
  <li class="nav-item pt-1">
      <select class="form-control btn btn-sm" id="exampleFormControlSelect1">
        <option>Account : <?php echo $this->session->userdata('nama') ?></option>
      </select>
  </li>
  <li class="nav-item">
    <pre>  </pre>
  </li>
  <li class="nav-item pt-1">
    <a href="<?php echo site_url('bisnis/add_campaign'); ?>" class="btn btn-primary btn-sm">
      <i class="fa fa-plus"></i> Create Campaign</a>
  </li>
</ul>

</nav>
<hr>

<style type="text/css">
.nav >ul>li> a {
  color: #000000;
}

hr {
	margin: 0;
}
</style>