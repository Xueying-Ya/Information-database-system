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
    $stmt = $objUser->runQuery("SELECT * FROM survey WHERE surveyID =:id");
    $stmt->execute(array(":id" => $id));
    $rowUser = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
  $id = null;
  $rowUser = null;
}

// POST
if(isset($_POST['btn_save'])){
  $surveyID = strip_tags($_POST['surveyID']);
  $status  = strip_tags($_POST['status']);

  try{
     if($id != null){
       if($objUser->update($surveyID,$status)){
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
                  <h1 style="margin-top: 10px">Edit survey status</h1>
                  <p>Required fields are in (*)</p>
                  <form  method="post">
                    <div class="form-group">
                        <label for="id">surveyID</label>
                        <input class="form-control" type="text" name="surveyID" id="id" value="<?php print($rowUser['surveyID']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Status *</label>
						 <select name="status" class="form-control">
							<option value="" disabled selected><?php print($rowUser['status']); ?></option>
							<option value="ปิดการประเมิน">ปิดการประเมิน</option>
						</select>
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
