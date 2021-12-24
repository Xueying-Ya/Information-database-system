<?PHP
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//อย่าลืมแก้ให้ session กับ user ตอน login
$perID = $_SESSION['username'];
$filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
$surveyID = str_replace('_Newsurvey', '', $filename);
$pass = $_SESSION['password'.$surveyID];
$surveyID = $_SESSION['surveyID'.$surveyID];
$activity_name = $_SESSION['activity_name'.$surveyID];
require_once "database.php";?>

<!DOCTYPE html>
<html>
<div class="form-style-5">
<head>
<style>
body {
  background-image: url('https://static.trueplookpanya.com/tppy/member/m_525000_527500/525016/cms/images/%E0%B8%AD%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%A3%20%E0%B8%88%E0%B8%B8%E0%B8%AC%E0%B8%B2%20%E0%B8%99%E0%B8%B2%E0%B8%99%E0%B8%B2%E0%B8%8A%E0%B8%B2%E0%B8%95%E0%B8%B4%20(12).jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  text-align: center;
}

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
.form-style-5 input[type="TEXT"]
{
	max-width: 500px;
	padding: 10px 20px;
	background: #000000;
	margin: 10px auto;
	padding: 20px;
	background: #FFFFFF;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 input[type="Submit"],
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
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
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
/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #FFC0CB;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 17px;
  color: #787878;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 17px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>
<title>Survey</title>
<?PHP 
echo"<h1>ยินดีต้อนรับเข้าสู่แบบประเมินกิจกรรม".$activity_name."</h1>";
if(empty($activity_name)){die("ยังไม่เปิดให้เข้าทำแบบประเมิน กรุณาติดต่อผู้ดูแลระบบ");}?>
</head>

<?php 
if(isset($_GET['pass_id'])){?>
<div class="sidenav">
	<a href="user_home.php">กลับสู่หน้าหลัก</a>
	<a href="complain_search.php">สถานะข้อร้องเรียน</a>
	<a href="complain_insert.php">ร้องเรียนปัญหาที่พบ</a>
    <label><span style="color:gray">ขณะนี้คุณลงชื่อเข้าใช้ในชื่อ<?php echo $_SESSION['username'] ?></span></label>
	<a href='user_login.php?logout=1' class='Log-out'>Log out</a>
</div>
<?php } ?>

<body>
<?php 
    if(isset($_POST['submit_create'])){
        $_SESSION['all_array'.$surveyID] = $_POST;
        $q_id_array = '';
    }

    if(!empty($_SESSION['all_array'.$surveyID])) {  
        $POST =  $_SESSION['all_array'.$surveyID];
        $q_id_array = $POST['qID'];
        $file = '_Newsurvey.php';
        $newfile = '_Newsurvey'.$surveyID.'.php';
    ?>
<FORM NAME ="form1" METHOD ="POST" ACTION =<?php print $newfile ?>>
<?php
//ทำ input แบบประเมินออกมา
    $n = 0;
    foreach($q_id_array as $qID){
        $A = $POST['A']["$qID"];
        $B = $POST['B']["$qID"];
        $C = $POST['C']["$qID"];
        $D = $POST['D']["$qID"];
        $E = $POST['E']["$qID"];
        $F = $POST['F']["$qID"];
        $stmt = $db_found->prepare("SELECT qID, question FROM question WHERE qID = ?");
        $stmt->bind_param('i', $qID);
		$stmt->execute();
		$res = $stmt->get_result();
        while($row = $res->fetch_assoc()) {
             $question = $row['question'];
             $n++;
?>
		<div class='questions'>
			<P><?php echo $n.".".$question?><P>
			<P><?php if(!empty($A)){echo "<INPUT TYPE = 'Radio' Name ='q[".$qID."]' value = '".$A."'>".$A;}?><P>
			<P><?php if(!empty($B)){echo "<INPUT TYPE = 'Radio' Name = 'q[".$qID."]' value = '".$B."'>".$B;}?><P>
			<P><?php if(!empty($C)){echo "<INPUT TYPE = 'Radio' Name = 'q[".$qID."]' value = '".$C."'>".$C;}?><P>
			<P><?php if(!empty($D)){echo "<INPUT TYPE = 'Radio' Name = 'q[".$qID."]' value = '".$D."'>".$D;}?><P>
			<P><?php if(!empty($E)){echo "<INPUT TYPE = 'Radio' Name = 'q[".$qID."]' value = '".$E."'>".$E;}?><P>
			<P><?php if(!empty($F)){echo "<textarea rows='20' cols='50' name ='q[".$qID."]'></textarea>";}?><P>
		</div>
<?php
        }
    }
  echo "<INPUT TYPE = 'Submit' Name = 'Submit1'  VALUE = 'ส่งแบบประเมิน'>";  
}
?>
</FORM>
</body>
</html>

<?php
//process แบบประเมิน
if(isset($_POST['Submit1'])){
        $q_id_array = $POST['qID'];
		$status = "อยู่ในระหว่างการประเมิน";
		foreach($q_id_array as $qID){
			$ans = $_POST['q']["$qID"];
			$ans_sql = "INSERT INTO answer (perID, surveyID, qID, ans) VALUES ('$perID','$surveyID','$qID','$ans');";
			$result_ans = mysqli_query($db_found,$ans_sql);}
        $num = mysqli_affected_rows($db_found);
		$update_sta_sql = "UPDATE survey SET status = '$status' WHERE surveyID = '$surveyID';";		
		$result_sta = mysqli_query($db_found,$update_sta_sql);
		if($num > 0){
			echo "<script>
				alert('ส่งแบบบประเมินเรียบร้อยแล้ว ขอบคุณที่สละเวลาอันมีค่าของท่าน');
				window.location.href='user_home.php';
				</script>";
		}else{
			echo "<script>
				alert('ส่งแบบประเมินกิจกรรมล้มเหลว! ท่านได้ทำแบบประเมินนี้ไปแล้ว');
				window.location.href='user_home.php';
			</script>";
		}	
	}
?>

<?php
//ถ้าผู้ทำแบบประเมินคลิก ค่อยขึ้นรหัส + เมนู
if(isset($_GET['pass_id'])){
	if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $surveyID = $_GET['pass_id'];
    $pass = $_SESSION['password'.$surveyID];
	echo "<script language='javascript'>";
	echo "var wrong='http://cuarts6622.epizy.com/activity_show.php';";
	echo "var password="."'".$pass."'".";";
	echo "var name = prompt('กรอกรหัสผ่านแบบประเมิน') ; ";
	echo "if (name == password) {(confirm('รหัสผ่านถูกต้อง'));}";
	echo "else{alert('รหัสผ่านไม่ถูกต้อง');";
	echo "location.href=wrong;}";
	echo "</script>";
}
?>