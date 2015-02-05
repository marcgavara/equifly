<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>Equifly</title>
	<link rel="stylesheet" href="<?= site_url('assets/css/menu.css') ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= site_url('assets/css/main_content.css') ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= site_url('assets/css/view.css') ?>" type="text/css" media="screen" />
</head>
<body>
<div class="container_menu">
	  <div class="content">
		    <div id="admin" style="cursor:pointer;">Caballos</div>
		    <div id="menu">
			    <div id="arrow"></div>
			      <a href="#">Edit Users <i id="firstIcon" class="fa fa-user"></i></a>
			      <a href="#">Web Statistics <i id="secondIcon" class="fa fa-bar-chart-o"></i></a>
			      <a href="#">Upload Settings <i id="thirdIcon" class="fa fa-cloud-upload"></i></a>
			      <a href="#">Edit Slider <i id="fourthIcon" class="fa fa-pencil"></i></a>
  		  </div>
  		  <div id="admon" style="cursor:pointer;">Caballos</div>
		    <div id="menu_admon">
			    <div id="arrow"></div>
			      <a href="#">2222 <i id="firstIcon" class="fa fa-user"></i></a>
			      <a href="#">sss <i id="secondIcon" class="fa fa-bar-chart-o"></i></a>
			      <a href="#">333 <i id="thirdIcon" class="fa fa-cloud-upload"></i></a>
			      <a href="#">fff <i id="fourthIcon" class="fa fa-pencil"></i></a>
  		  </div>
	  </div>
<div class="user">
		Hola <b><?php echo $this->user->username; ?></b> - <img src="<?= site_url('assets/img/profile.png')?>"  width="10%" /> <a href="<?php echo site_url('welcome/logout'); ?>"><img src="<?= site_url('assets/img/logout.png')?>" width="10%" /></a>
	</div>
</div>