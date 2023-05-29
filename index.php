<?php
	include "includes/config.php";
	include "includes/funciones.php";
    
    session_start();

    if($_POST){
        $user=$_POST['user'];
        $password=$_POST['password'];
        $pass_c = sha1($password);

        $mysqli = conectar();

        $sql = "SELECT idUser, password, fullName, type FROM users WHERE user='$user'";
        $res=$mysqli->query($sql);
        $num=$res->num_rows;

        if($num>0){
            $row=$res->fetch_assoc();
            $pass_bd=$row['password'];
            if($pass_bd==$pass_c){
                $_SESSION['idUser']=$row['idUser'];
                $_SESSION['userName']=$user;
                $_SESSION['fullName']=$row['fullName'];
                $_SESSION['type']=$row['type'];
                redir("/EndoTrainer/main.php");
            }else{
                alert("Contraseña incorrecta");
            }


        }else{
            alert("No existe usuario");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<h1 style="text-align: center;">LOGIN</h1>
				<form class="login100-form validate-form flex-sb flex-w"
				method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Username
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="user" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

					<!--<a href="#" class="txt2 bo1 m-l-5">Forgot?</a>-->
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Sign In
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="js/main.js"></script>
	<script src="assets\demo\bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>