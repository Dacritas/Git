<?php 
session_start();
include('inc/header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Inventory.php';
	$inventory = new Inventory();
	$login = $inventory->login($_POST['email'], $_POST['pwd']); 
	if(!empty($login)) {
		$_SESSION['userid'] = $login[0]['userid'];
		$_SESSION['name'] = $login[0]['name'];			
		header("Location:index.php");
	} else {
		$loginError = "Invalid email or password!";
	}
}
?>
<title>ERP Universidad el bosque</title>
<center>
	<link href="css/style.css" rel="stylesheet">

<div class="container">		
	<img src="images/UEBlogo.png" style="width: 150px; margin-top: 50px">
	<h2 class ="tlogin">Bienvenido al ERP de la universidad El Bosque</h2>

	<div class="login-form">		
		
		<h4>Ingreso:</h4>		
		<form method="post" action="">
			<div class="form-group">
			<?php if ($loginError ) { ?>
				<div class="alert alert-warning"><?php echo $loginError; ?></div>
			<?php } ?>
			</div>
			<div class="form-group">
				<input name="email" id="email" type="email" class="form-control" placeholder="Correo Electrónico" autofocus="" required>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="pwd" placeholder="Contraseña" required>
			</div>  
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-info">Ingresar</button>
			</div>
		</form>
		<br>
				
	</div>		
</div>	
</center>
<?php include('inc/footer.php');?>