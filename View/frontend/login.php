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
                <h2 class="secTitle">Client Login Page</h2>
                <P>
                    Welcome back, please login to proceed!
                </P>

                    <?php 
                        if(isset($_SESSION['noClient'])){
                            echo $_SESSION['noClient'];
                            unset($_SESSION['noClient']);
                        }

                        if(isset($_SESSION['notLoggedIn'])){
                            echo $_SESSION['notLoggedIn'];
                            unset ($_SESSION['notLoggedIn']);
                        }
            
                        if(isset($_SESSION['settings'])){
                        echo $_SESSION['settings'];
                        unset($_SESSION['settings']);
                        }

                        if(isset($_SESSION['credentialsChanged'])){
                        echo $_SESSION['credentialsChanged'];
                        unset($_SESSION['credentialsChanged']);
                        }
                    ?> 
            </div>
      
            <div class="formSection">

                <form method="POST" class="loginForm grid">
                    <div class="singleField">
                        <label for="userName">User Name</label>
                        <input type="text" id="userName" name="userName" placeholder="Enter Your User Name"  required>
                    </div>

                    <div class="singleField">
                        <label for="email">User Email</label>
                        <input type="email" id="email" name="loginEmail" placeholder="Enter Your Email"  required>
                    </div>

                    <div class="singleField">
                        <label for="password">User Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your password"   required>
                    </div>

                
                    <button class="btn flex primaryBtn" name="submit">Login <i class='bx bx-right-arrow-alt icon'></i></button>

                    <!-- <a href="../Backend/Admin/admin.php">
                    <button class="btn flex primaryBtn">Login <i class='bx bx-right-arrow-alt icon'></i></button>
                    </a> -->
                
                </form>

                <span class="registerLink">
                    <p>Don't have an account? <a href="signUp.php">Register</a></p>
                </span>
                <span class="forgotpasswordLink">
                    <p><a href="forgotpassword.php">Forgot your Password?</a></p>
                </span>
            </div>
        </div>
    </div>
    <!-- login Page Ends -->

<?php
include('./clientPartials/footer.php')
?>


<?php 

if(isset($_POST['submit'])){

     $userName = $_POST['userName'];
     $loginEmail = $_POST['loginEmail'];
     $loginPassword = $_POST['password'];

    $sql = "SELECT * FROM clients WHERE username='$userName' AND email='$loginEmail' AND password= '$loginPassword'";

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
    