<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
  	<title>Bienvenido a EquiFly</title>
    <link rel="stylesheet" href="<?= site_url('assets/css/style_login.css')?>" media="screen" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>
<body>

  
<div id="logmsk" style="display: block;">
    <div id='close'>X</div>
    <div id="userbox">
    	<form action="<?= site_url('/welcome/login') ?>" method="POST">
        <h1 id="signup">Bienvenido a EquiFly</h1>
        <div id="sumsk" style="display: none;">Sending</div>
        <input name="username" id="name" placeholder="ID" style="opacity: 1; background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
        <input name="password" id="pass" type="password" placeholder="Password" style="opacity: 1; background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
        <p id="nameal" style="display: none; opacity: 1;">ID:</p>
        <p id="passal" style="display: none; opacity: 1;">Password:</p>
        <input type="submit" id="signupb" style="opacity: 0.2; cursor: default;" name="login" value="Entra! " />
        </form>
    </div>
</div>


</body>
    <script src="<?= site_url('assets/js/login.js')?>"></script>

</html>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>Equifly</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		/*font-family: Consolas, Monaco, Courier New, Courier, monospace;*/
		/*font-size: 12px;*/
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
		width: 500px;
		top: 50%;
		margin: auto;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Benvingut a EquiFly!</h1>

	<div id="body">
		<p>Per a accedir a l'aplicació, introdueixi el seu usuari i contrassenya</p>
		<code>
		<?php if (isset($message)) : ?>
			<span style="color:red;"><b><?= print($message) ?></b></span>
		<?php endif; ?>
		<form action="http://localhost/welcome/login" method="POST">
			<table>
				<tr>
					<td>
						<label>Usuari: </label>
					</td>
					<td>
						<input type="text" id="username" name="username"/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Contrassenya: </label>
					</td>
					<td>
						<input type="password" id="password" name="password"/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" id="login" name="login" value="Entra! " />
					</td>
				</tr>

			</table>
		</form>
		</code>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>-->