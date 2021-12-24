<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();}?>
<!DOCTYPE html>
<html>
<style>
body {
  background-image: url('https://www.arts.chula.ac.th/~sandbox/wp-content/uploads/photo-gallery/Pasuree/11665656_10153361421961434_2121123744_o.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  text-align: center;}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>หน้าหลัก</title>
<style>
body {margin:0;}

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
  height: 1500px;
}
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; 
  margin: 0; 
}

.dropdown:hover .dropbtn {
  background: #ddd;
  color: black;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>


<div class="navbar">
	<li class="left-side">
		<a href="_Newsetsurvey.php">สร้างหน้าแบบประเมิน</a>
		<a href="_Editsurvey.php">แก้ไขหน้าแบบประเมิน</a>
		<a href="/survey_crude">เปลี่ยนสถานะ/ลบข้อมูลแบบประเมิน</a>
		<a href="report.php">ดูผลการประเมินกิจกรรม</a>
		<div class="dropdown">
			<button class="dropbtn">ดู/แก้ไขข้อมูลอื่นๆ
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<a href="/admin_crude">ข้อมูล admin</a>
				<a href="/activity_crude">ข้อมูลกิจกรรม</a>
				<a href="/question_crude">ข้อมูลคำถาม</a>
				<a href="/complain_crude">ข้อมูลข้อร้องเรียน</a>
			</div>
		</div>
	</li>
    <li class="right-side">
		<label><span style="color:white">ขณะนี้คุณลงชื่อเข้าใช้ในชื่อ<?php echo $_SESSION['admin_username'] ?></span></label>
		<a href='admin_login.php?logout=1' class='Log-out'>Log out</a>
    </li>
</div><br><br><br>
  <h2 style="color: black;">ประชาสัมพันธ์กิจกรรมคณะ</h2>
  <p style="background-color: pink;"> ในช่วงที่ 19 เราประสบรอติดตามกับโปรดในมนุษยศาสตร์ความรู้ทางมนุษยศาสตร์มุมมองทุกคนย่อมให้ความความรู้สนใจทางสถิติ คณะอักษรศาสตร์ วิทยาศาสตร์กับข้อมูลและ และการแพทย์เป็นธรรมดาเสนอปัจจุบันเหมือนกัน แต่ภาควิชาเกี่ยวกับเหตุการณ์ ที่จะเผยแพร่บทความอยากจะขอเชิญชวนในรูปของให้ทุกคนหันมามองโรคระบาดผ่านมุมมองทางมนุษยศาสตร์กัน ออนไลน์ในหัวข้อ นิทรรศการแล้วจะค้นพบว่า “Pandemic ระบาดโควิดของโรคใหม่อย่างวิกฤติการ” ก็มีความเกี่ยวข้องเปรียบเทียและมีแง่มุมที่น่าสนใจจะ วิดีโอบนเพจและคลิปวรรณคดี ภาควิชาเฟซบุ๊กของ CompLitChula/www.facebook.com/https:/
　
สนใจติดต่อสอบถามเพิ่มเติมได้ที่ inbox ของเพจแง้มประตูดูอักษรฯ http://facebook.com/onedayatarts</p>
<html>
