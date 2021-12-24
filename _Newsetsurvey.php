<?PHP
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$admin_username = $_SESSION['admin_username'];
$newfile = "";
require_once "database.php";
?>

<!DOCTYPE html>
<html>
<div class="form-style-5">
<head>

<title>Set and Create Survey</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
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
	width: 50%;
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

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: FF99CC;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" />

</head>
<body>

<div class="sidenav">
	<a href="admin_home.php">กลับสู่หน้าหลัก</a>
	<a href="_Editsurvey.php">แก้ไขหน้าแบบประเมิน</a>
	<a href="/survey_crude">เปลี่ยนสถานะ/ลบข้อมูลแบบประเมิน</a>
	<a href="report.php">ดูผลการประเมินกิจกรรม</a>
  <button class="dropdown-btn">ดู/แก้ไขข้อมูลอื่นๆ
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/admin_crude">ข้อมูล admin</a>
	<a href="/activity_crude">ข้อมูลกิจกรรม</a>
	<a href="/question_crude">ข้อมูลคำถาม</a>
	<a href="/complain_crude">ข้อมูลข้อร้องเรียน</a>
  </div>
  <label><span style="color:gray">ขณะนี้คุณลงชื่อเข้าใช้ในชื่อ<?php echo $_SESSION['admin_username'] ?></span></label>
	<a href='admin_login.php?logout=1' class='Log-out'>Log out</a>
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

<!--ระบุปีการศึกษา ชื่อกิจกรรม ตัวแปรสร้างไฟล์//-->

<FORM NAME ="form1" METHOD ="POST" ACTION ="_Newsetsurvey.php">
<p>
<br>พิมพ์ชื่อกิจกรรม: <INPUT TYPE = 'TEXT' Name ='activity_name' placeholder="รับน้องก้าวใหม่" value ="<?php echo $_POST['activity_name'];?>" maxlength="300" required></br>
<br>พิมพ์ปีการศึกษา: <INPUT TYPE = 'TEXT' Name ='year'  value="<?php echo $_POST['year'];?>" maxlength="4" required></br>
<br>พิมพ์รหัสที่ต้องการ: <INPUT TYPE = 'password' Name ='password'  value="<?php echo $_POST['password'];?>" maxlength = '5' id='pass' required></br>
<input type="checkbox" onclick="pass_view()">แสดงรหัสผ่าน
</p>

  <div class="form-group">
    <br><label for="select" class="col-4 col-form-label">เลือกคำถามในการสร้างแบบประเมิน (เลือกได้มากกว่า 1 คำถาม)</label></br>  
    <div class="col-8">
    <br><select NAME=ques_select[] multiple="multiple"></br>

<?PHP
$ques_array = array();
$stmt = $db_found->prepare("SELECT qID,question FROM question");
$stmt->execute();
$res = $stmt->get_result();
while($row = $res->fetch_assoc()) {
    $qID = $row['qID'];
	$question = $row['question'];
    $ques_array[$qID] = $question;
?>
        <option value=<?php echo $qID ?>><?php echo $question ?></option>
<?php
    } ?>
    </select>
     </div>
  </div> 
  <div class="form-group">
    <div class="offset-4 col-8">
      <button name="submit_q" type="submit" class="btn btn-primary">ยืนยันการเลือกคำถามและสร้างแบบประเมิน</button>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>
<script>$('select[multiple]').multiselect()</script>
</FORM>


<?php 
if (isset($_POST['submit_q'])) {
	$year = $_POST['year'];
	$activity_name = $_POST['activity_name'];
		
	//เช็คว่ากิจมีในตารางหรือยัง
	$check_activity =  "SELECT * FROM `activity` WHERE `activity_name` = '$activity_name';" ;
	$check_result = mysqli_query($db_found, $check_activity);
	if(mysqli_num_rows($check_result) == 0){
		$increase = "INSERT INTO activity (activity_name) VALUES ('$activity_name');" ;
		$increase_new = mysqli_query($db_found, $increase);
	}
		
	$time = date("H:i:s");       
	$date = date("Y-m-d");
	$status = "รอการประเมิน";
		
	$getacID = mysqli_fetch_assoc(mysqli_query($db_found, "SELECT activityID FROM `activity` WHERE `activity_name` = '$activity_name';"));
	$activityID = $getacID['activityID'];
		
	$make_sql = "INSERT INTO make (admin_username, time, date) VALUES ('$admin_username','$time','$date');";
    $make_sql_r = mysqli_query($db_found, $make_sql);
	$surveyID = mysqli_insert_id($db_found);
	$_SESSION['surveyID'.$surveyID] = $surveyID;
	$_SESSION['activity_name'.$surveyID] = $activity_name;
	$_SESSION['password'.$surveyID] = $_POST['password'];
		
	$survey_sql = "INSERT INTO survey (activityID, year, status) VALUES ('$activityID','$year','$status');";
    $survey_sql_r = mysqli_query($db_found, $survey_sql);
	$num = mysqli_affected_rows($db_found);
		
	if($num > 0){
    echo "<p><br>สร้างแบบประเมินเรียบร้อยแล้ว</br>";
	}else{
	echo "<p><br>สร้างแบบประเมินล้มเหลว</br>";
	}

//create new file with surveyID
    $file = '_Newsurvey.php';
    $newfile = '_Newsurvey'.$surveyID.'.php';
    if(!copy($file,$newfile)){
    echo "failed to create page for survey";
    }else{
    echo "succeeded to create page for survey <strong>ID $surveyID</strong>";}
		
}	?>

<FORM NAME ="form2" METHOD ="POST" target="_blank" ACTION =<?php print $newfile ?>>

<?php
if (isset($_POST['submit_q'])) {
    $create_q_id = $_POST['ques_select'];
    if(!empty($create_q_id)){
        print"<p><br>ขั้นตอนต่อไปคือเลือกลักษณะคำตอบที่ต้องการ</br></p>";?> 

<?php       
        //สร้างฟอร์มให้เลือกคำตอบ
		$n = 0;
        foreach($create_q_id as $id){
				$n++;
?>
		    <div class='questions'>
				<p><strong class='black'><?php echo $n.'.'.$ques_array[$id] ?></strong></p>
				<input name='qID[]' type='hidden' value=<?php echo $id ?>><p>
				ตัวเลือกที่ 1: <?php echo "<INPUT TYPE = 'TEXT' Name = 'A[".$id."]' value = '' placeholder='1' maxlength='300' ><p>"?>
				ตัวเลือกที่ 2: <?php echo "<INPUT TYPE = 'TEXT' Name = 'B[".$id."]' value = '' placeholder='2' maxlength='300' ><p>"?>
				ตัวเลือกที่ 3: <?php echo "<INPUT TYPE = 'TEXT' Name = 'C[".$id."]' value = '' placeholder='3' maxlength='300' ><p>"?>
				ตัวเลือกที่ 4: <?php echo "<INPUT TYPE = 'TEXT' Name = 'D[".$id."]' value = '' placeholder='4' maxlength='300' ><p>"?>
				ตัวเลือกที่ 5: <?php echo "<INPUT TYPE = 'TEXT' Name = 'E[".$id."]' value = '' placeholder='5' maxlength='300' ><p>"?>
				<?php echo "<INPUT TYPE = 'checkbox' Name ='F[".$id."]' value =6>"?> <label for='6'>ตัวเลือกที่ 6 (คำตอบแบบปลายเปิด)<p></label>
	    	</div>
<?php 
        }
        echo "<div class='form-group'>
    <div class='offset-4 col-8'>
      <button name='submit_create' type='submit' class='btn btn-primary'>ดูและเปิดให้เข้าทำแบบประเมิน</button>
    </div>";
    }else{
        print"<p><strong>กรุณาเลือกคำถามที่ต้องการ!</strong></p>";
    }
}
    ?>
	
<script>
//view password func
function pass_view() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
</script>

</FORM>
</body>
</html>

