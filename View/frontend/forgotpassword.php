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

    //  $userName = $_POST['userName'];
     $loginEmail = $_POST['loginEmail'];
    //  $loginPassword = $_POST['password'];

    $sql = "SELECT * FROM clients WHERE  email='$loginEmail'";

    $res = mysqli_query($conn,$sql);
 
       echo $count = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
        if($count==1){
            $_SESSION['username'] = $userName;
            header('location:' .SITEURL. 'View/frontend/reset.php');
            exit();
        }

        else{
            $_SESSION['noClient'] = '<span class="fail" style="color: red;">Incorrect Credentials!</span>';
            header('location:' .SITEURL. 'View/frontend/forgotpassword.php');
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
    <form method="post" >
        <label for="email">Email:</label>
        <input type="email" name="loginEmail" id="email" required>
        <br>
        <input type="submit" value="Reset Password">
    </form>

