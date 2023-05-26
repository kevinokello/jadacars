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


if(isset($_POST['submit'])){
    $email = $_POST['loginEmail'];
    $new_password = $_POST['new_password'];
    $changeQuery = "UPDATE `clients` SET `password` = '$new_password' WHERE `email`='$email'";
    if($changeQuery) {
        header("Location: login.php");
    }
}
else {
header("Location: forgotpassword.php");
}



?>
    <!-- SignUp Page Starts -->
    <div class="signUp section">
        <div class="secContainer container">
            <div class="secTitleDiv">
                <h2 class="secTitle">Client reset password Page</h2>
            </div>

    <h2>Recover your password</h2>
    <form method="post" >
        <label for="email">Email:</label>
        <input type="email" name="loginEmail" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="new_password" id="password" required>
        <br>
        <input type="submit" value="Reset Password">
    </form>

