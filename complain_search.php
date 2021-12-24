<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ดูสถานะการร้องเรียน</title>
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
	.glow {
  font-size: 35px;
  color: #000;
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 5px #fff, 0 0 15px #fff, 0 0 25px #FFD700, 0 0 31px #FFD700, 0 0 33px #e60073, 0 0 35px #FFD700, 0 0 37px #FFD700;
  }
  
  to {
    text-shadow: 0 0 10px #fff, 0 0 20px #FFFCAC, 0 0 30px #FFFCAC, 0 0 32px #FFFCAC, 0 0 34px #FFFCAC, 0 0 36px #FFFCAC, 0 0 38px #FFFCAC;
  }
}
.navbar {
  background-color: #FFDCF0;
  position: fixed;
  top: 0;
  width: 100%;
  display: flex;
  justify-content: space-between;
}

.navbar a {
  float: left;
  display: block;
  color: #000000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}
</style>

<div class="navbar">
	<li class="left-side">
		<a href="user_home.php">กลับสู่หน้าหลัก</a>
		<a href="activity_show.php">ประเมินกิจกรรม</a>
		<a href="complain_insert.php">ร้องเรียนปัญหาที่พบ</a>
	</li>
     <li class="right-side">
		<label><span style="color:white">ขณะนี้คุณลงชื่อเข้าใช้ในชื่อ<?php echo $_SESSION['username'] ?></span></label>
		<a href='user_login.php?logout=1' class='Log-out'>Log out</a>
    </li>
</div><br><br>

</head>
<body>
<center>
	<h1 class="glow">ยินดีต้อนรับสู่หน้าปัญหาการร้องเรียน</h1>
	<h2 class="glow">ของเว็ปไซต์ประเมินกิจกรรม คณะอักษรศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</h2>
	<div class="container">
		<form action="" method="POST">
			<input type="text" name="id" placeholder="Enter student ID" class="btn" required>
			<input type="submit" name="search" value="SEARCH" class="btn" ><br><br>
		</form>
			<table>
			 <tr>
				<th>DATE</th>
				<th>TIME(H:M:S)</th>
				<th>COMPLAINT</th>
				<th>STATUS</th>
			</tr><br>
		<?php
		require_once "database.php";
			
		if(isset($_POST['search']))
		{
			$id = $_POST['id'];
				
			$query = "SELECT * FROM `complain` WHERE perId='$id'";
			$query_run = mysqli_query($db_found, $query);
				
			while($row = mysqli_fetch_array($query_run))
			{
				?>
				<tr>
					<td> <?php echo $row['date'];?> </td>
					<td> <?php echo $row['time'];?> </td>
					<td> <?php echo $row['complain'];?> </td>
					<td> <?php echo $row['status'];?> </td>
				</tr>
					<?php
				}
			}
			?>
			
		</table>
	</div>
	</center>
</body>
</html>
		