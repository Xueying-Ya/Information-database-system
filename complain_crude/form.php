<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'classes/user.php';

$objUser = new User();
// GET
if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
	$date = $_GET['edit_date'];
	$time = $_GET['edit_time'];
    $stmt = $objUser->runQuery("SELECT * FROM complain WHERE perID = :id AND date = :date AND time = :time");
    $stmt->execute(array(":id" => $id,":date" => $date,":time" => $time));
    $rowUser = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
  $id = null;
  $date = null;
  $time = null;
  $rowUser = null;
}

// POST
if(isset($_POST['btn_save'])){
  $status   = strip_tags($_POST['status']);
  
  try{
     if($id != null){
       if($objUser->update($id, $date, $time,$status)){
         $objUser->redirect('index.php?updated');
       }
     }else{
         $objUser->redirect('index.php?error');
     }
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once 'includes/head.php'; ?>
    </head>
    <body>
        <!-- Header banner -->
        <?php require_once 'includes/header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar menu -->
                <?php require_once 'includes/sidebar.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  <h1 style="margin-top: 10px">Edit Complain Status</h1>
                  <p>Required fields are in (*)</p>
                  <form  method="post">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input class="form-control" type="text" name="id" id="id" value="<?php print($rowUser['perID']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Status *</label>
                        <input  class="form-control" type="text" name="status" id="status" placeholder="อยู่ในระหว่างการแก้ไข" value="<?php print($rowUser['status']); ?>" required maxlength="100">
                    </div>
                    <input class="btn btn-primary mb-2" type="submit" name="btn_save" value="Save">
                  </form>
                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'includes/footer.php'; ?>
    </body>
</html>
