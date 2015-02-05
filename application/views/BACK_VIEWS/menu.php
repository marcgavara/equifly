<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>Equifly</title>
	<link rel="stylesheet" href="<?= site_url('assets/css/menu.css') ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= site_url('assets/css/main_content.css') ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= site_url('assets/css/view.css') ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= site_url('assets/css/table.css') ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="<?=site_url('/assets/css/jquery.fancybox-2.1.5.css')?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?=site_url('/assets/js/select2.css')?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?=site_url('/assets/css/bootstrap.css')?>" type="text/css" />
	<link rel="stylesheet" href="<?=site_url('/assets/css/ionicons.min.css')?>" type="text/css" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	


	<script src="<?=site_url('assets/js/bootstrap.js')?>"></script>
	<script src="<?=site_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	<script type="text/javascript" src="<?=site_url('/assets/js/jquery.fancybox-2.1.5.pack.js')?>"></script>
	<script src="<?=site_url('assets/js/app.js')?>"></script>
	<script>
	$(document).ready(function(){
		$('#caballos').click(function(){
			$('#menu').toggle('blind');
		});	
		$('#salidas_caballos').click(function(){
			$('#menu_salidas').toggle('blind');
		});
		$('#aislamiento').click(function(){
			$('#menu_aislamiento').toggle('blind');
		});
		$('#administracion').click(function(){
			$('#menu_administracion').toggle('blind');
		});
		$('#transporte').click(function(){
			$('#menu_transporte').toggle('blind');
		});
		$('#ganadero').click(function(){
			$('#menu_ganadero').toggle('blind');
		});
		$('#veterinario').click(function(){
			$('#menu_veterinario').toggle('blind');
		});

	    
	
	    

	});
	</script>
</head>
<body>
<div class="container_menu">
	<div class="user-panel">
        <div class="pull-left info">
            <p>Hola, <?= $this->user->username ?></p>
            <p><?= date("d/m/Y") ?> - <a href="<?php echo site_url('welcome/logout'); ?>">Salir</a></p>
        </div>
    </div>
	<!--<div class="content">
		<a href="<?=site_url('/home')?>" style="text-decoration:none;"><div id="inicio" style="cursor:pointer;<?= $menu == 'inicio' ? 'color:#ffaa56;'  : '' ?>">Inicio</div></a>
	    <div id="caballos" style="cursor:pointer;<?= $menu == 'caballos' ? 'color:#ffaa56;'  : '' ?>">Gestión entradas</div>
		    <div id="menu">
			    <div id="arrow"></div>
			    <a href="<?=site_url('/caballos')?>" style="color:<?= $submenu == 'listado' ? 'red;' : '' ?>">Caballos</a>
			    <a href="<?=site_url('/caballos/nuevo_caballo')?>" style="color:<?= $submenu == 'nuevo_caballo' ? 'red;' : '' ?>">Nuevo caballo</a>
  		    </div>
  		<div id="salidas_caballos" style="cursor:pointer;<?= $menu == 'salidas_caballos' ? 'color:#ffaa56;'  : '' ?>">Gestión salidas</div>
		    <div id="menu_salidas">
			    <div id="arrow"></div>
			    <a href="<?=site_url('/caballos/salidas')?>" style="color:<?= $submenu == 'salidas' ? 'red;' : '' ?>">Salidas</a>
			    <a href="<?=site_url('/caballos/contenedores')?>" style="color:<?= $submenu == 'contenedores' ? 'red;' : '' ?>">Contenedores</a>
  		    </div>    
	    <div id="aislamiento" style="cursor:pointer;<?= $menu == 'aislamiento' ? 'color:#ffaa56;'  : '' ?>">Aislamiento</div>
	        <div id="menu_aislamiento">
		       	<div id="arrow_aislamiento"></div>
		        <a href="<?=site_url('/aislamiento/centros')?>" style="color:<?= $submenu == 'centros' ? 'red;' : '' ?>">Centros</a>
		        <a href="<?=site_url('/aislamiento/anadir_caballo')?>" style="color:<?= $submenu == 'caballo_centro' ? 'red;' : '' ?>">Añadir caballo</a>
	  		</div>
  		<div id="transporte" style="cursor:pointer;<?= $menu == 'transporte' ? 'color:#ffaa56;'  : '' ?>">Transporte</div>
	        <div id="menu_transporte">
		       	<div id="arrow_transporte"></div>
		        <a href="<?=site_url('/transporte/transportistas')?>" style="color:<?= $submenu == 'transportistas' ? 'red;' : '' ?>">Transportistas</a>
	  		</div>
  		<div id="ganadero" style="cursor:pointer;<?= $menu == 'ganaderia' ? 'color:#ffaa56;'  : '' ?>">Ganadería</div>
	        <div id="menu_ganadero">
		       	<div id="arrow_ganadero"></div>
		        <a href="<?= site_url('/ganaderia/')?>" style="color:<?= $submenu == 'ganaderos' ? 'red;' : '' ?>">Ganaderos</a>
	  		</div>
	  	<div id="veterinario" style="cursor:pointer;<?= $menu == 'veterinario' ? 'color:#ffaa56;'  : '' ?>">Veterinario</div>
	        <div id="menu_veterinario">
		       	<div id="arrow_veterinario"></div>
		        <a href="<?= site_url('/administracion/perfil/'.$this->user->id) ?>">Cartas</a>
		        <a href="<?= site_url('/administracion/perfil/'.$this->user->id) ?>">Avisos mensajero</a>
	  		</div>	
	  	<div id="administracion" style="cursor:pointer;<?= $menu == 'administracion' ? 'color:#ffaa56;'  : '' ?>">Administracion</div>
	        <div id="menu_administracion">
		       	<div id="arrow_administracion"></div>
		       	<a href="<?= site_url('/administracion/paises/'.$this->user->id) ?>" style="color:<?= $submenu == 'paises' ? 'red;' : '' ?>">Paises</a>
		        <a href="<?= site_url('/administracion/perfil/'.$this->user->id) ?>" style="color:<?= $submenu == 'perfil' ? 'red;' : '' ?>">Perfil</a>
		        <a href="<?= site_url('/administracion/razas_capas/') ?>" style="color:<?= $submenu == 'razas_capas' ? 'red;' : '' ?>">Razas y capas</a>
	  		</div>
  	</div>-->
  	<section class="sidebar">
	  	<ul class="sidebar-menu">
	        <li <?= $menu == 'home' ? 'class="active"' : ''?>>
	            <a href="<?=site_url('/home')?>">
	                <i class="fa fa-dashboard"></i> <span>Inicio</span>
	            </a>
	        </li>
	        <!--<li>
	            <a href="pages/widgets.html">
	                <i class="fa fa-th"></i> <span>Gestión entradas</span> <!--<small class="badge pull-right bg-green">new</small>
	            </a>
	        </li>-->

	        <li class="treeview <?= $menu == 'caballos' ? 'active' : ''?>">
	            <a href="#">
	                <i class="fa fa-star"></i>
	                <span>Caballos</span>
	                <i class="fa fa-angle-left pull-right"></i>
	            </a>
	            <ul class="treeview-menu">
	                <li <?= $submenu == 'listado' ? 'class="active"' : '' ?>><a href="<?=site_url('/caballos')?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Todos</a></li>
	                <li><a href="<?=site_url('/caballos/nuevo_caballo')?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Añadir caballo</a></li>
	            </ul>
	        </li>
	        <li class="treeview">
	            <a href="#">
	                <i class="fa fa-laptop"></i>
	                <span>UI Elements</span>
	                <i class="fa fa-angle-left pull-right"></i>
	            </a>
	            <ul class="treeview-menu">
	                <li><a href="pages/UI/general.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> General</a></li>
	                <li><a href="pages/UI/icons.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Icons</a></li>
	                <li><a href="pages/UI/buttons.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
	                <li><a href="pages/UI/sliders.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
	                <li><a href="pages/UI/timeline.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
	            </ul>
	        </li>
	        <li class="treeview">
	            <a href="#">
	                <i class="fa fa-edit"></i> <span>Forms</span>
	                <i class="fa fa-angle-left pull-right"></i>
	            </a>
	            <ul class="treeview-menu">
	                <li><a href="pages/forms/general.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
	                <li><a href="pages/forms/advanced.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
	                <li><a href="pages/forms/editors.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Editors</a></li>
	            </ul>
	        </li>
	        <li class="treeview">
	            <a href="#">
	                <i class="fa fa-table"></i> <span>Tables</span>
	                <i class="fa fa-angle-left pull-right"></i>
	            </a>
	            <ul class="treeview-menu">
	                <li><a href="pages/tables/simple.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
	                <li><a href="pages/tables/data.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="pages/calendar.html">
	                <i class="fa fa-calendar"></i> <span>Calendar</span>
	                <small class="badge pull-right bg-red">3</small>
	            </a>
	        </li>
	        <li>
	            <a href="pages/mailbox.html">
	                <i class="fa fa-envelope"></i> <span>Mailbox</span>
	                <small class="badge pull-right bg-yellow">12</small>
	            </a>
	        </li>
	        <li class="treeview">
	            <a href="#">
	                <i class="fa fa-folder"></i> <span>Examples</span>
	                <i class="fa fa-angle-left pull-right"></i>
	            </a>
	            <ul class="treeview-menu">
	                <li><a href="pages/examples/invoice.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
	                <li><a href="pages/examples/login.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Login</a></li>
	                <li><a href="pages/examples/register.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Register</a></li>
	                <li><a href="pages/examples/lockscreen.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
	                <li><a href="pages/examples/404.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
	                <li><a href="pages/examples/500.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
	                <li><a href="pages/examples/blank.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
	            </ul>
	        </li>
	    </ul>
	</section>
</div>