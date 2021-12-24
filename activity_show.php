<?PHP
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "database.php";

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
body {
  background-image: url('https://waiiwaiiquick.files.wordpress.com/2015/02/faculty-of-arts-chulalongkorn-university.jpg');
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

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
  background-color: #555;
  color: white;
}

//button
a:link, a:visited {
  background-color: white;
  color: black;
  padding: 20px 90px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  background-color: #F3EDF3;
}

a:hover, a:active {
  background-color: #FFCEFB;
}
.a {
  display: block;
  width: 29%;
  padding: 110px 100px;
  font-size: 20px;
}

</style>

<div class="navbar">
	<li class="left-side">
		<a href="user_home.php">กลับสู่หน้าหลัก</a>
		<a href="complain_search.php">สถานะข้อร้องเรียน</a>
		<a href="complain_insert.php">ร้องเรียนปัญหาที่พบ</a>
	</li>
     <li class="right-side">
		<label><span style="color:white">ขณะนี้คุณลงชื่อเข้าใช้ในชื่อ<?php echo $_SESSION['username'] ?></span></label>
		<a href='user_login.php?logout=1' class='Log-out'>Log out</a>
    </li>
</div>

<body>
<center>
<div class="a">
<?php 
$status1 = "อยู่ในระหว่างการประเมิน";
$status2 = "รอการประเมิน";
$stmt = $db_found->prepare("SELECT surveyID,activityID FROM `survey` WHERE `status` = '$status1' OR `status` = '$status2' ;");
$stmt->execute();
$res = $stmt->get_result();
while($row = $res->fetch_assoc()) {
	$surveyID = $row['surveyID'];
	$activityID = $row['activityID'];
	$get_ac_name = mysqli_fetch_assoc(mysqli_query($db_found, "SELECT activity_name FROM `activity` WHERE `activityID` = '$activityID';"));
	$activity_name = $get_ac_name['activity_name'];
	$path = '_Newsurvey'.$surveyID.'.php?pass_id='.$surveyID;
?>
  <div style="background: #FFFFFF">
    <p><a href=<?php echo $path?>><?php echo $activity_name?></a></p>
  </div>
<?php }?>
</div>
</center>
</body>
</html>        
    

    

