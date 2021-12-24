<?php 
require_once "database.php";
if (session_status() == PHP_SESSION_NONE) {
session_start();}
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>รายงานผลแบบประเมินกิจกรรม</title>
<style>
body{
	background-image: url('https://waiiwaiiquick.files.wordpress.com/2015/02/faculty-of-arts-chulalongkorn-university.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;    
}
table,th,td{
	border: 1px solid black;
	width:1100px;
	background-color: pink;
}
.btn{
	width: 20%;
	height: 5%;
	font-weight: bold;
}

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
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</head>
</style>
<body>

<div class="navbar">
	<li class="left-side">
		<a href="admin_home.php">กลับสู่หน้าหลัก</a>
		<a href="_Newsetsurvey.php">สร้างหน้าแบบประเมิน</a>
		<a href="_Editsurvey.php">แก้ไขหน้าแบบประเมิน</a>
		<a href="/survey_crude">เปลี่ยนสถานะ/ลบข้อมูลแบบประเมิน</a>
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
<center>
    <p style="font-size:20px;"><strong>ผลการประเมินกิจกรรม</strong></p>
	<button class="accordion">ดูผลด้วยไอดีแบบประเมิน</button>
    <div class="panel">
		<form action="report.php" class="table-form" method="POST">
		<input type="number" name="id" placeholder="ระบุไอดีแบบประเมินที่ต้องการดูผล " min ="1" class="btn" required>
			<input type="submit" name="search1" value="View result" class="btn" >
		</form>
		
		<caption><mark>ผลแบบประเมินทั้งหมด</mark></caption>
		<table id = "table1">
			 <tr>
				<th>ผลการประเมิน</th>
				<th>จำนวน</th>
			</tr>

<?php
if(isset($_POST['search1'])){
	$surveyID = $_POST['id'];
	if(!empty($surveyID)){
		$sql_all = "SELECT ans,COUNT(*) from answer WHERE surveyID = '$surveyID' AND qID <> '5' GROUP BY ans ORDER BY COUNT(*) DESC";
		if(!$sql_all){
			echo "ไม่พบ surveyID ในฐานข้อมูล";
		}else{
			
		$result = mysqli_query($db_found,$sql_all);

		while($row = mysqli_fetch_array($result)){
		
?>			<tr>
				<td> <?php echo $row['ans'];?> </td>
				<td> <?php echo $row['COUNT(*)'];?> </td>
			</tr>
<?php	   }
		}
	}else{echo "กรุณาระบุไอดีแบบประเมิน!";}
}
?>		</table>

	<br><caption><mark>ผลแบบประเมินแยกตามข้อ</mark></caption><br>
		<table id = "table2">
			<tr>
				<th>คำถาม</th>
                <th>ผลการประเมิน</th>
				<th>จำนวน</th>
			</tr>
<?php
if(isset($_POST['search1'])){
	$surveyID = $_POST['id'];
	if(!empty($surveyID)){
		$sql_seperate = "SELECT q.question, a.ans, COUNT(a.ans) FROM answer a,question q WHERE a.surveyID='$surveyID' AND a.qID = q.qID GROUP BY q.question, a.ans ORDER BY COUNT(a.ans) DESC";
		if(!$sql_seperate){
			echo "ไม่พบ surveyID ในฐานข้อมูล";
		}else{
			
		$result = mysqli_query($db_found,$sql_seperate);

		while($row = mysqli_fetch_array($result)){
		
?>			<tr>
				<td> <?php echo $row['question'];?> </td>
				<td> <?php echo $row['ans'];?> </td>
				<td> <?php echo $row['COUNT(a.ans)'];?> </td>
			</tr>
<?php	   }
		}
	}else{echo "กรุณาระบุไอดีแบบประเมิน!";}
}
?>		</table>

	<br><caption><mark>ผลแบบประเมินข้อเสนอแนะ</mark></caption><br>
		<table id = "table3">
			<tr>
				<th>ข้อเสนอแนะ</th>
			</tr>
<?php
if(isset($_POST['search1'])){
	$surveyID = $_POST['id'];
	if(!empty($surveyID)){
		$sql_text = "SELECT ans FROM answer WHERE surveyID = '$surveyID' AND qID = 5 ";
		if(!$sql_text){
			echo "ไม่พบ surveyID ในฐานข้อมูล";
		}else{
			
		$result = mysqli_query($db_found,$sql_text);

		while($row = mysqli_fetch_array($result)){
		
?>			<tr>
				<td> <?php echo $row['ans'];?> </td>
			</tr>
<?php	   }
		}
	}else{echo "กรุณาระบุไอดีแบบประเมิน!";}
}
?>		</table>
	</div>
	

	<button class="accordion">ดูผลด้วยไอดีแบบประเมินและไอดีคำถาม</button>
    <div class="panel">
		<form action="report.php" class="table-form" method="POST">
            <p><br><input type="number" name="surveyID" placeholder="ระบุไอดีแบบประเมินที่ต้องการดูผล " min ="1" class="btn" required>
			<input type="number" name="qID" placeholder="ระบุไอดีคำถามที่ต้องการดูผล " min ="1" class="btn" required>
			<input type="submit" name="search2" value="View result" class="btn"><br><br>
		</form>
		
		<caption><mark>ผลแบบประเมินแบบระบุข้อ</mark></caption>
		<table id = "table4">
			 <tr>
				<th>ผลการประเมิน</th>
				<th>จำนวน</th>
			</tr>
<?php
if(isset($_POST['search2'])){
	$surveyID = $_POST['surveyID'];
	$qID = $_POST['qID'];
	if(!empty($surveyID) and (!empty($qID))){
		$sql_q = "SELECT answer.ans, COUNT(answer.ans) FROM question,answer WHERE answer.surveyID = '$surveyID' AND answer.qID = question.qID AND answer.qID = '$qID' GROUP BY answer.ans";
		if(!$sql_q){
			echo "ไม่พบ surveyID หรือ qID ในฐานข้อมูล";
		}else{
			
		$result = mysqli_query($db_found,$sql_q);

		while($row = mysqli_fetch_array($result)){
		
?>			<tr>
				<td> <?php echo $row['ans'];?> </td>
				<td> <?php echo $row['COUNT(answer.ans)'];?> </td>
			</tr>
<?php	   }
		}
	}else{echo "กรุณาระบุไอดีแบบประเมินหรือไอดีคำถาม!";}
}
?>		</table>
	</div>
	
</center>
</body>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
</html>