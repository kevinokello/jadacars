<?php
include('./clientPartials/header.php');
ob_start();
?>

    <!-- header Starts -->
    <?php
      include('./clientPartials/navbar.php')
    ?>
    <!-- header Ends -->

    <!-- login Page Starts -->
    <div class="loginPage section">
        <div class="secContainer container">
            <div class="secTitleDiv">
                <h2 class="secTitle">Reset Password</h2>
                <P>
                    Reset your password
                </P>
<?php

if (isset($_POST['submit'])) :
  extract($_POST);
  if ($old_password != "" && $password != "" && $confirm_pwd != "") :
    if (isset($_GET['username']) && $_GET['username'] != "") {
      $user_id  = $_GET['username'];
    } else {
      $user_id  = $_POST['old_password'];
    }
    // $user_id = '1';
    $old_pwd = $_POST['old_password'];
    $pwd = $_POST['password'];
    $c_pwd = $_POST['confirm_pwd'];
    if ($pwd == $c_pwd) :
      if ($pwd != $old_pwd) :
        $sql = "SELECT * FROM `clients` WHERE `username`='$user_id'";
        $db_check = $conn->query($sql);
        $count = mysqli_num_rows($db_check);
        if ($count == 1) :
          $fetch = $conn->query("UPDATE `clients` SET `password` = '$pwd' WHERE `username`='$user_id'");
          $old_password = '';
          $password = '';
          $confirm_pwd = '';
          $msg_sucess = "Your new password has been updated successfully, you can now log in.";
        else :
          $error = "Could not find a user registered with that username.";
        endif;
      else :
        $error = "Old password new password same Please try again.";
      endif;
    else :
      $error = "New password and confirm password did not match";
    endif;
  else :
    $error = "Please fill all the fields";
  endif;
endif;
?>


<style type="text/css">
  .error {
    margin-top: 6px;
    margin-bottom: 0;
    color: #fff;
    background-color: #D65C4F;
    display: table;
    padding: 5px 8px;
    font-size: 11px;
    font-weight: 600;
    line-height: 14px;
  }

  .green {
    margin-top: 6px;
    margin-bottom: 0;
    color: #fff;
    background-color: green;
    display: table;
    padding: 5px 8px;
    font-size: 11px;
    font-weight: 600;
    line-height: 14px;
  }
</style>

<body class="sb-nav-fixed">

  </div>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">

        <div class="row">

          <div class="card mb-4">

            <div class="card-body">
              <div class="container">

                <div class="<?= (@$msg_sucess == "") ? 'error' : 'green'; ?>" id="logerror">
                  <?php echo @$error; ?><?php echo @$msg_sucess; ?>
                </div><br>
                <form method="post" autocomplete="off" id="password_form">
                <div class="singleField">

                  <p>Username<br />
                    <input type="text" name="old_password" />
                  </p></div>
                  <div class="singleField">

                  <p>New password<br />
                    <input type="password" name="password" id="password" class="ser" />
                  </p></div>
                  <div class="singleField">

                  <p>Confirm password<br />
                    <input type="password" name="confirm_pwd" id="confirm_pwd" class="ser" />
                  </p>
                  </div>
                  <p>
                    <input name="submit" type="submit" value="Save Password" class="btn flex primaryBtn" />
                  </p>
                </form>
              </div>
            </div>
          </div>
    </main>

  </div>
  </div>


  </div>
  </div>

  </div>
  </div>

