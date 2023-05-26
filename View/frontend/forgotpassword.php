<?php
include('./clientPartials/header.php');
ob_start();
?>

    <!-- header Starts -->
    <?php
      include('./clientPartials/navbar.php')
    ?>
    <!-- header Ends -->
    <?php

if (isset($_POST['submit'])) :
  extract($_POST);
  if ($old_password != "" && $password != "" && $confirm_pwd != "") :
    if (isset($_GET['username']) && $_GET['username'] != "") {
      $user_id  = $_GET['username'];
    } else {
      $user_id  = $_SESSION['username'];
    }
    // $user_id = '1';
    $old_pwd = $_POST['old_password'];
    $pwd = $_POST['password'];
    $c_pwd = $_POST['confirm_pwd'];
    if ($pwd == $c_pwd) :
      if ($pwd != $old_pwd) :
        $sql = "SELECT * FROM `clients` WHERE `username`='$user_id' AND `password` ='$old_pwd'";
        $db_check = $conn->query($sql);
        $count = mysqli_num_rows($db_check);
        if ($count == 1) :
          $fetch = $conn->query("UPDATE `clients` SET `password` = '$pwd' WHERE `username`='$user_id'");
          $old_password = '';
          $password = '';
          $confirm_pwd = '';
          $msg_sucess = "Your new password update successfully.";
        else :
          $error = "The password you gave is incorrect.";
        endif;
      else :
        $error = "Old password new password same Please try again.";
      endif;
    else :
      $error = "New password and confirm password do not matched";
    endif;
  else :
    $error = "Please fill all the fields";
  endif;
endif;
?>
<?php 

if(isset($_POST['submit'])){

    //  $userName = $_POST['userName'];
     $loginEmail = $_POST['loginEmail'];
    //  $loginPassword = $_POST['password'];

    $sql = "SELECT * FROM clients WHERE  email='$loginEmail'";

    $res = mysqli_query($conn,$sql);
 
       echo $count = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
        if($count==1){
            $_SESSION['loginMessage'] = '<span class="success">Welcome ' .$firstName. '!</span>';
            $_SESSION['username'] = $userName;
            header('location:' .SITEURL. 'View/Backend/Admin/clientAllCarsPage.php');
            exit();

        }

        else{
            $_SESSION['noClient'] = '<span class="fail" style="color: red;">Incorrect Credentials!</span>';
            header('location:' .SITEURL. 'View/frontend/login.php');
            exit();
        }
    
}


?>
    <!-- SignUp Page Starts -->
    <div class="signUp section">
        <div class="secContainer container">
            <div class="secTitleDiv">
                <h2 class="secTitle">Client reset password Page</h2>
            </div>

    <h2>Recover your password</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <input type="submit" value="Reset Password">
    </form>

