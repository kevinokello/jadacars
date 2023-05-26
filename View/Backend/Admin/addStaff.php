<?php 
include('./adminPartials/adminHeader.php');
ob_start();
?>

    <div class="adminDasboard flex">

        <?php 
         include('./adminPartials/sideMenu.php');
        ?>

        <div class="addStaffBody">
            <div class="top flex">
                <h1 class="titleText">
                    Add New Agent
                </h1>
                <p>Creating an amazing property for the world!</p>
            </div>

            <div class="newAgentDiv">
                <h3 class="formTitle">Completely fill the form below!</h3>

                <form method="POST" class="flex" enctype="multipart/form-data">
                    <div>
                      <div class="singleField">
                          <label for="FirstName">First Name</label>
                          <input type="text" id="FirstName" name="firstName" placeholder="e.g: CHarmaine" required>
                      </div>

                      <div class="singleField">
                          <label for="secName">Second Name</label>
                          <input type="text" id="secName" name="secondName" placeholder="e.g: Tan" required>
                      </div>

                  

                      <div class="singleField">
                          <label for="phone">Phone Number</label>
                          <input type="number" id="phone" name="phone" placeholder="e.g: +444 789 688 909" required>
                      </div>

                      <div class="singleField">
                          <label for="profilePicture">Profile Picture </label>
                          <input type="file" name="profilePicture" id="profilePicture" required>
                      </div>

                      
                      <div class="singleField">
                              <label for="coverPic">Cover Picture </label>
                              <input type="file" name="coverPic" id="coverPic" required>
                        </div>


                    </div>

                      <div>
                          <div class="singleField">
                              <label for="email">Email Address</label>
                              <input type="email" id="email" name="email" placeholder="e.g: example@outlook.com" required>
                          </div>


                          <div class="singleField">
                              <label for="gender">Gender</label>
                              <input type="text" id="gender" name="gender" placeholder="e.g: male" required>
                          </div>
                          <div class="singleField">
                          <label for="userName">User Name</label>
                          <input type="text" id="userName" name="userName" placeholder="e.g: charmtan123" required>
                      </div>
                    

                      </div>

                      <div class="socialLinks">
                          
                       

                          <div class="singleField">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Create Password" required>
                          </div>
                      </div>

                     <div>
                     
                       
                          <div class="singleField">
                            <label for="role">Role</label>
                            <select name="role" id="role">
                                <option value="admin">Administrator</option>
                                <option value="staff" selected>Staff/Agent</option>
                            </select>
                           </div>

                          <div class="singleField">
                            <label for="status">Status</label>
                            <select name="status" id="status">
                                <option value="verified" >Verified</option>
                                <option value="not verified" selected>Not verified</option>
                            </select>
                           </div>

                          <button class="btn flex bg" name="submit" style="width:
                          100%; margin-top:2rem"><i class="uil uil-fidget-spinner icon"></i>Add Staff</button>
                     </div>

                     
                 </form>
            </div>
        </div>

    </div>   

<?php 
include('./adminPartials/adminFooter.php');
?>  



<?php 
if(isset($_POST['submit'])){

  $firstName = $_POST['firstName'];
  $secondName = $_POST['secondName'];
  $userName = $_POST['userName'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $status = $_POST['status'];


   //  Uploading Profile Picture to the database =======================>
     
   if(isset($_FILES['profilePicture']['name'])){
    //To upload the image we need the image name, source and destination.
    $profilePicture = $_FILES['profilePicture']['name'];
    // Source ================>
    $imageSource = $_FILES['profilePicture']['tmp_name'];
    // Destination ================>
    $imageDestination = "../Assets/dbImages".$profilePicture; 
    // Finally upload the image ========>
    $uploadImage = move_uploaded_file($imageSource, $imageDestination);

    if($uploadImage == false){
      $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
            // header('location:' .SITEURL. '.php');
   
    }
  }else{
    
    $profilePicture ="";
    }


   //  Uploading Cover Picture to the database =======================>

   if(isset($_FILES['coverPic']['name'])){
    //To upload the image we need the image name, source and destination.
    $coverPic = $_FILES['coverPic']['name'];
    // Source ================>
    $imageSource = $_FILES['coverPic']['tmp_name'];
    // Destination ================>
    $imageDestination = "../Assets/dbImages".$coverPic; 
    // Finally upload the image ========>
    $uploadImage = move_uploaded_file($imageSource, $imageDestination);

    if($uploadImage == false){
      $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
            // header('location:' .SITEURL. '.php');
   
    }
  }else{
    
    $coverPic ="";
    }

  $sql = "INSERT INTO staff SET
  firstname = '$firstName',
  secondname = '$secondName',
  username = '$userName',
  phone = '$phone',
  profilepic = '$profilePicture',
  coverpic = '$coverPic',
  email = '$email',

  gender = '$gender',
  description = '$description',
  password = '$password',
  status = '$status',
  role = '$role'
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['addedStaff'] = '<span class="success">Administrator Added Successfully!</span>';
      header('location:'.SITEURL. 'View/Backend/Admin/staff.php');
      exit();
  }
  else{
    
  die('Failed to connect to database!');
  } 

}
?>