<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html>
<html>

<div class="form-style-5">
<style>
body {
  background-image: url('https://waiiwaiiquick.files.wordpress.com/2015/02/faculty-of-arts-chulalongkorn-university.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
<form name ="form1" method ="POST" action ="user_login.php">
<fieldset>
<center><legend> ผู้ทำประเมิน</center></legend>
ชื่อผู้ใช้<input type="text" name="username" placeholder="Username" class="form-control" required> 
รหัสผ่าน<input type="password" name="password" class="form-control" required>   
</fieldset>

<input type="submit" name = "submit" value="Log in">
</form>

<?php 
require_once "database.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['submit'])){
	$username = trim($_POST['username']);
	$check_user = "SELECT perID FROM `student` WHERE `perID` = '$username' ";
	$check_user = mysqli_query($db_found, $check_user);
	if(mysqli_num_rows($check_user) == 0){
		echo "ไม่พบ username ดังกล่าวในระบบ กรุณาตรวจสอบอีกครั้ง";
	}
	else{$_SESSION['username'] = $username;
		header("location:user_home.php");}
}
?>

<?php 
if(isset($_GET['logout'])){unset($_SESSION['username']);}
?>

<style type="text/css">
.form-style-5{
	max-width: 500px;
	padding: 10px 20px;
	background: #000000;
	margin: 10px auto;
	padding: 20px;
	background: #FFF1FC;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
	border: none;
}
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
}
.form-style-5 label {
	display: block;
	margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 select {
	font-family: Georgia, "Times New Roman", Times, serif;
	background: 000000;
	border: none;
	border-radius: 4px;
	font-size: 15px;
	margin: 0;
	outline: 0;
	padding: 10px;
	width: 100%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #FCFCFC;
	color:#050202;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 30px;
}
.form-style-5 input[type="text"]:focus,
.form-style-5 select:focus{
	background: #d2d9dd;
}
.form-style-5 .number {
	background: #1abc9c;
	color: #fff;
	height: 30px;
	width: 30px;
	display: inline-block;
	font-size: 0.8em;
	margin-right: 4px;
	line-height: 30px;
	text-align: center;
	text-shadow: 0 1px 0 rgba(255,255,255,0.2);
	border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
	position: relative;
	display: block;
	padding: 19px 39px 18px 39px;
	color: #000000;
	margin: 0 auto;
	background: #FFC2C2;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	width: 100%;
	border: 1px solid #16a085;
	border-width: 1px 1px 3px;
	margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
	background: #4C957E;
}
</style>
</html>