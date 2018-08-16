<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header('location:index.php'); }
   require_once("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>	
	<!-- ICON Website -->
	<link rel="shortcut icon" href="assets/images/gallery/icon-ut.png" type="image/png">
	<link rel="shortcut icon" href="assets/images/gallery/icon-ut.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>			
	<div class="login">
	<center><img src="assets/images/avatars/openuniv.jpg" class="img-responsive" height="67" width="280"></center>
	<div class="panel-heading">                    
        <h3 class="panel-title"><center>Silahkan Masukan <br/> Username dan Password</h3>
    </div>			
		<form action="proses_login.php" method="post" onSubmit="return validasi()">
		<fieldset>
			<div>
				<label>Username:</label>
				<input type="text" name="username" id="username" />
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" id="password" />
			</div>	
			<div class="checkbox">
            	 <label>
	             <input name="remember" type="checkbox" value="Remember Me">Remember Me
	             </label>
            </div>		
			<div>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				<input type="submit" value="Login" class="tombol"/>
				&nbsp; &nbsp;
				<input type="button" value="Daftar" class="tombol" onclick="window.location='daftar.php';"/>				
			</div>
				<img src="assets/images/avatars/footer.jpg" class="img-responsive" height="50" width="289" />
				
			</fieldset>
			<br/>
				<?php
				include("footer.php")
				?>						
			</form>
		</div>
				
</body> 
<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');
			return false;
		}
	}
 
</script>

</html>