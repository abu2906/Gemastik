<?php
    require "config.php";
	if(!empty($_SESSION["id"])){
		header("location: tampilan_utama.php");
	}
    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
        $row = mysqli_fetch_assoc($result);
        
        if(mysqli_num_rows($result) > 0){
            if($password == $row["password"]){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("location: tampilan_utama.php");
                exit();
            } else {
                echo "<script>alert('Password salah!');</script>";
            }
        } else {
            echo "<script>alert('Email tidak terdaftar!');</script>";
        }
    }

    if(isset($_POST["signup"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
		$address = $_POST["address"];
        $telephone = $_POST["telephone"];
        $password = $_POST["password"];
        $duplicateEmail = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
        $duplicateTelephone = mysqli_query($conn, "SELECT * FROM tb_user WHERE telephone = '$telephone'");
        
        if(mysqli_num_rows($duplicateEmail) > 0){
            echo "<script>alert('Email telah terdaftar sebelumnya, gunakan email lain!');</script>";
        } elseif(mysqli_num_rows($duplicateTelephone) > 0){
            echo "<script>alert('Nomor telepon telah terdaftar sebelumnya, gunakan nomor telepon lain!');</script>";
        } else {
			$query = "INSERT INTO tb_user VALUES('','$name','$email','$password','$address','$telephone')";
			mysqli_query($conn,$query);
            echo "<script>alert('Pendaftaran berhasil!');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="fontawesome/css/all.css" rel="stylesheet" />
    <link href="fontawesome/css/solid.css" rel="stylesheet" />
	<link rel="stylesheet" href="style2.css">
	<title>Document</title>

</head>
<body>
	<div class="container">
		<div class="signin-signup">
			<form method="POST" action="" class="signin">
				<h2 class="title">Sign in</h2>
				<div class="input-field">
					<i class="fa-solid fa-user"></i>
					<input type="text" name="email" id = "email" placeholder="Email">
				</div>
				<div class="input-field">
					<i class="fa-solid fa-lock"></i>
					<input type="password" name="password" id="password" placeholder="Password">
				</div>
				<div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
				<input type="submit" name="login" value="Login" class="btn">
				<p class="choice">Or Sign in with</p>
				<div class="social-media">
					<a href="" class="icon">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="" class="icon">
						<i class="fa-brands fa-google"></i>
					</a>
				</div>
			</form>
			<form action="" method="POST" class="signup">
				<h2 class="title">Sign up</h2>
				<div class="input-field">
					<i class="fa-solid fa-user"></i>
					<input type="text" name="name" placeholder="Name">
				</div>
				<div class="input-field">
					<i class="fa-solid fa-envelope"></i>
					<input type="text" name="email" placeholder="Email">
				</div>
				<div class="input-field">
					<i class="fa-solid fa-address-card"></i>
					<input type="text" name="address" placeholder="Address">
				</div>
				<div class="input-field">
					<i class="fa-solid fa-phone"></i>
					<input type="text" name="telephone" placeholder="Telephone">
				</div>
				<div class="input-field">
					<i class="fa-solid fa-lock"></i>
					 <input type="type" name="password" placeholder="Password">
				</div>
	
				<input type="submit" name="signup" value="Sign up" class="btn">
			</form>
		</div>
		<div class="panel-container">
			<div class="panel left">
				<div class="content">
					<h3>STARTiT</h3>
					<img src="./img/STARTiT.png" alt="" class="image">
					<button class="btn" id="sign-in">Sign in</button>
				</div>
			</div>
			<div class="panel right">
				<div class="content">
					<h3>STARTiT</h3>
					<img src="./img/STARTiT.png" alt="" class="image">
					<button class="btn" id="sign-up">Sign up</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		const sign_in = document.querySelector("#sign-in");
		const sign_up = document.querySelector("#sign-up");
		const container = document.querySelector(".container");

		sign_up.addEventListener("click", () => {
			container.classList.add("sign-up-mode");
		})
		sign_in.addEventListener("click", () => {
			container.classList.remove("sign-up-mode");
		})
	</script>
</body>
</html>
