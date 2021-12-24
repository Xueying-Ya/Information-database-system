<?PHP
$user_name = "bf6de1039f8658";
$password = "194ca57f";
$database = "heroku_7728965668d0463";
$server = "us-cdbr-east-05.cleardb.net";
$db_found = new mysqli($server, $user_name, $password, $database ) or die('DB not found');
mysqli_set_charset($db_found, "utf8");?>