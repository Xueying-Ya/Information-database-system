<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$perID = $_SESSION['username'];
require_once "database.php";
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
body {margin:0;background-image: url('https://waiiwaiiquick.files.wordpress.com/2015/02/faculty-of-arts-chulalongkorn-university.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;}

.navbar {
  background-color: #000000;
  position: fixed;
  top: 0;
  width: 100%;
  display: flex;
  justify-content: space-between;
}

.navbar a {
  float: left;
  display: block;
  color: #FFFFFF;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}
</style>
</head>
<body>

<div class="navbar">
	<li class="left-side">
		<a href="user_home.php">กลับสู่หน้าหลัก</a>
		<a href="activity_show.php">ประเมินกิจกรรม</a>
		<a href="complain_search.php">สถานะข้อร้องเรียน</a>
	</li>
     <li class="right-side">
		<label><span style="color:white">ขณะนี้คุณลงชื่อเข้าใช้ในชื่อ<?php echo $_SESSION['username'] ?></span></label>
		<a href='user_login.php?logout=1' class='Log-out'>Log out</a>
    </li>
</div><br><br><br>
  <h1 style="color:#FFFFFF;">ร้องเรียนปัญหาที่พบ</h1>
  
  <form action="complain_insert.php" method="POST" id="usrform" style="color:#FFFFFF">
  <textarea rows="10" cols="80" name="comment" form="usrform" placeholder = "ร้องเรียนปัญหาที่พบ..."required></textarea>
	<input type="submit" name ="submit" value = "ส่งข้อร้องเรียน">
  </form><br><br>
  
<p style="Background-color:#FFFFFF;">ติดต่อเจ้าหน้าที่หน่วยงาน:<br>-ข้อมูลติดต่อกยศ. (ที่อยู่/ห้อง/ตึก/เบอร์)<br>-ข้อมูลติดต่อกิจการนิสิต (ที่อยู่/ห้อง/ตึก/เบอร์)</p>

</body>
</html>

<?php
$id = $perID;
$comment = $_POST['comment'];

if (isset($_POST['submit'])){
	
	$INSERT = "INSERT Into complain(perID, date, time, complain, status) values(?,CURDATE(),CURTIME(),?,'รับเรื่องแล้ว')";
		
	//prepare statement
	$stmt = $db_found->prepare($INSERT);
	$stmt->bind_param("is", $id, $comment);
	$stmt->execute();
	echo "<mark>ส่งข้อร้องเรียนสำเร็จ</mark>";
	$stmt->close();
}
?>