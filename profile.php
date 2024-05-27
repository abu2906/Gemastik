<?php
    require "config.php";
    if(!empty($_SESSION['id'])){
        $id = $_SESSION['id'];
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);
    }
    else{
        header('Location: index.php');
    }
?>
<div class="head-title">
    <div class="left">
        <h1>Home</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li><i class='bx bx-chevron-right' ></i></li>
            <li>
                <a class="active" href="#">Profile</a>
            </li>
        </ul>
    </div>
</div>
<div class="table">
    <div class="profile">
        <div class="img">
            <img src="img/profile.png" alt="">
            <h2><?php echo $row['name']; ?></h2>
        </div>
        <div class="edit">
            <ul>
                <li>
                    <i class="fa-solid fa-pencil"></i>
                    <span class="text">Edit Profile</span>
                </li>
                <li>
                    <i class="fa-solid fa-trash"></i>
                    <span class="text">Hapus Akun</span>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="text">Log-out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="detail-profile">
        <div class="box">
            <h3>Nama Lengkap</h3>
            <p><?php echo $row['name']; ?></p>
        </div>
        <div class="box">
            <h3>Alamat</h3>
            <p><?php echo $row['address']; ?></p>
        </div>
        <div class="box">
            <h3>No. Telpon</h3>
            <p><?php echo $row['telephone']; ?></p>
        </div>
        <div class="box">
            <h3>Email</h3>
            <p><?php echo $row['email']; ?></p>
        </div>
    </div>
</div>		
	
	