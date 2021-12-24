<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();}
?>

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
  height: 1500px; /* Used in this example to enable scrolling */
}
</style>
</head>
<body>

<div class="navbar">
	<li class="left-side">
		<a href="activity_show.php">ประเมินกิจกรรม</a>
		<a href="complain_search.php">สถานะข้อร้องเรียน</a>
		<a href="complain_insert.php">ร้องเรียนปัญหาที่พบ</a>
	</li>
     <li class="right-side">
		<label><span style="color:white">ขณะนี้คุณลงชื่อเข้าใช้ในชื่อ<?php echo $_SESSION['username'] ?></span></label>
		<a href='user_login.php?logout=1' class='Log-out'>Log out</a>
    </li>
</div><br><br><br>
  <h2 style="color: black;">ประชาสัมพันธ์กิจกรรมคณะ</h2>
  <p style="background-color: pink;"> ในช่วงที่ 19 เราประสบรอติดตามกับโปรดในมนุษยศาสตร์ความรู้ทางมนุษยศาสตร์มุมมองทุกคนย่อมให้ความความรู้สนใจทางสถิติ คณะอักษรศาสตร์ วิทยาศาสตร์กับข้อมูลและ และการแพทย์เป็นธรรมดาเสนอปัจจุบันเหมือนกัน แต่ภาควิชาเกี่ยวกับเหตุการณ์ ที่จะเผยแพร่บทความอยากจะขอเชิญชวนในรูปของให้ทุกคนหันมามองโรคระบาดผ่านมุมมองทางมนุษยศาสตร์กัน ออนไลน์ในหัวข้อ นิทรรศการแล้วจะค้นพบว่า “Pandemic ระบาดโควิดของโรคใหม่อย่างวิกฤติการ” ก็มีความเกี่ยวข้องเปรียบเทียและมีแง่มุมที่น่าสนใจจะ วิดีโอบนเพจและคลิปวรรณคดี ภาควิชาเฟซบุ๊กของ CompLitChula/www.facebook.com/https:/
　
สนใจติดต่อสอบถามเพิ่มเติมได้ที่ inbox ของเพจแง้มประตูดูอักษรฯ http://facebook.com/onedayatarts</p>
</html>
