<?php 
include('./adminPartials/adminHeader.php');
ob_start();
?>
  <div class="adminDasboard flex">

        <?php 
        include('./adminPartials/sideMenu.php');

        $sql = 'SELECT * FROM cars';
        $res = mysqli_query($conn, $sql);
        if($res == TRUE){
          $count =  mysqli_num_rows($res);

          if($count > 0){
              while($row = mysqli_fetch_assoc($res)){
                  $id = $row['id'];
              }
          }
        }
      ?>

      <div class="addCarBody">
          <div class="top flex">
              <h1 class="titleText">
                  Add Car Details
              </h1>
              <p>Creating an amazing item for the world!</p>
          </div>

          <div class="newCarDiv">
              <h3 class="formTitle">Completely fill the form below!</h3>

              <form method="POST"  class="" enctype="multipart/form-data">
                  <div class="flex formContainer">
                    <div>
                        <div class="singleField">
                            <label for="carName">Car Name</label>
                            <input type="text" name="carName" id="carName" placeholder="e.g: Mercedes Benz" required>
                        </div>

                        <div class="singleField">
                            <label for="carPrice">Car Price</label>
                            <input type="text" name="carPrice" id="carPrice" placeholder="e.g: 20000" required>
                        </div>

                        <div class="singleField">
                            <label for="carLocation">Car Location</label>
                            <input type="text" name="carLocation" id="carLocation" placeholder="Williams Bridge, Bronx" required>
                            
                        </div>

                        <div class="singleField">
                            <label for="carImage">Car Image <small>(Main)</small></label>
                            <input type="file" name="carImage" id="carImage" required>
                        </div>

    
                        
                    </div>

                    <div>

                        
                    
                 
                        
                        <div class="singleField">
                            <label for="grade">Model Grade</label>
                            <input type="text" name="grade" id="grade" placeholder="e.g: GX Hybrid" required>
                        </div>

                        <div class="singleField">
                        

                            <label for="staffID">Assign Staff</label>
                            <select name="staffID"  id="staffID" required>
                                <?php 
                                    $sql = "SELECT * FROM staff where status ='verified'";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE){
                                        $count =  mysqli_num_rows($res);

                                        if($count > 0){
                                            while($row = mysqli_fetch_assoc($res)){
                                            $id = $row['id'];
                                            $firstname = $row['firstname'];

                                            ?>
                                            <option value="<?php echo $id ?>"><?php echo $id ?> <?php echo $firstname ?></option>
                                            <?php

                                            }
                                        }
                                    }
                                ?>
                                
                            </select>
                        </div>
    
                            
                    </div>

                    <div>
                    
                        <div class="singleField">
                            <label for="builtDate">Release Date</label>
                            <input type="date" name="builtDate" id="builtDate" placeholder="e.g: 2019" required>
                        </div>
    
                    

                        <div class="singleField">
                            <label for="year">Model Year</label>
                            <input type="number" name="year" id="year" placeholder=".g: 2012" required>
                        </div>
                       

                    </div>

                    <div>

                     
                    
                        <div class="singleField">
                            <label for="insurance">Accident Insurance</label>
                            <select name="insurance" id="insurance">
                                <option value="2000">2000</option>
                                <option value="4000">4000</option>  
                                <option value="6000">6000</option>  
                                <option value="80000">80000</option>  
                                <option value="100000">100000</option>  
                            </select>
                        </div>

                        <div class="singleField">
                            <label for="company">Company</label>
                            <select name="company" id="company">
                                <option value="Toyota">Toyota</option>
                                <option value="Tesla">Tesla</option>  
                                <option value="Mercedes">Mercedes</option>  
                                <option value="Wolkswagon">Wolkswagon</option>  
                            </select>
                        </div>

                 

                        <div class="singleField">
                            <label for="status">Status</label>
                            <select name="status" id="status">
                                <option value="On Market" selected>On Market</option>
                                <option value="sold">Sold</option>  

                            </select>
                        </div>

                       
                    </div>
                  </div>

                        <h3 class="formTitle">Car Gallery Images</h3>
                        <div method="POST" class="flex formContainer" enctype="multipart/form-data" id="galleryForm">
                            <div>
                                <div class="singleField">
                                    <label for="carImage">Car Image 1 (Interior)</label>
                                    <input type="file" name="Interior1" id="carImage" >
                                </div>

                                <div class="singleField">
                                    <label for="carImage">Car Image 1 (Exterior)</label>
                                    <input type="file" name="Exterior1" id="carImage" >
                                </div>
                            </div>
                            <div>
                                <div class="singleField">
                                    <label for="carImage">Car Image 2 (Interior)</label>
                                    <input type="file" name="Interior2" id="carImage" >
                                </div>

                                <div class="singleField">
                                    <label for="carImage">Car Image 2 (Exterior)</label>
                                    <input type="file" name="Exterior2" id="carImage" >
                                </div>
                            </div>
                          
                            <div>
                               

                                <a href="#galleryForm">
                                    <button  class="btn flex bg" style="width: 100%;" name='submit'>
                                        <i class="uil uil-plus icon"></i>
                                        Add Car
                                    </button>
                                </a>
                            </div>
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

    $carName = $_POST['carName'];
    $carPrice = $_POST['carPrice'];
    $carLocation = $_POST['carLocation'];
  
  
    $builtDate = $_POST['builtDate'];
    $year = $_POST['year'];
    $grade = $_POST['grade'];
    $insurance = $_POST['insurance'];
    $staffID = $_POST['staffID'];
    $status = $_POST['status'];
    $company = $_POST['company'];

    // Uploading Image 1 to the database =======================>
     
   if(isset($_FILES['carImage']['name'])){
    //To upload the image we need the image name, source and destination.
    $image = $_FILES['carImage']['name'];
    // Source ================>
    $imageSource = $_FILES['carImage']['tmp_name'];
    // Destination ================>
    $imageDestination = "../Assets/dbImages".$image; 
    // Finally upload the image ========>
    $uploadImage = move_uploaded_file($imageSource, $imageDestination);

    if($uploadImage == false){
      $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
    }
  }else{
    
    $image ="";
    }

       // Uploading Interior1 to the database =======================>
     
   if(isset($_FILES['Interior1']['name'])){
    //To upload the image we need the image name, source and destination.
    $InteriorImage1 = $_FILES['Interior1']['name'];
    // Source ================>
    $imageSource = $_FILES['Interior1']['tmp_name'];
    // Destination ================>
    $imageDestination = "../Assets/dbImages".$InteriorImage1; 
    // Finally upload the image ========>
    $uploadImage = move_uploaded_file($imageSource, $imageDestination);

    if($uploadImage == false){
      $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
    }
  }else{
    
    $InteriorImage1 ="";
    }


 // Uploading Interior2 to the database =======================>
     
   if(isset($_FILES['Interior2']['name'])){
    //To upload the image we need the image name, source and destination.
    $InteriorImage2 = $_FILES['Interior2']['name'];
    // Source ================>
    $imageSource = $_FILES['Interior2']['tmp_name'];
    // Destination ================>
    $imageDestination = "../Assets/dbImages".$InteriorImage2; 
    // Finally upload the image ========>
    $uploadImage = move_uploaded_file($imageSource, $imageDestination);

    if($uploadImage == false){
      $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
    }
  }else{
    
    $InteriorImage2 ="";
    }



    // Uploading Interior3 to the database =======================>
 




    // Uploading Exterior1 to the database =======================>
     
   if(isset($_FILES['Exterior1']['name'])){
    //To upload the image we need the image name, source and destination.
    $ExteriorImage1 = $_FILES['Exterior1']['name'];
    // Source ================>
    $imageSource = $_FILES['Exterior1']['tmp_name'];
    // Destination ================>
    $imageDestination = "../Assets/dbImages".$ExteriorImage1; 
    // Finally upload the image ========>
    $uploadImage = move_uploaded_file($imageSource, $imageDestination);

    if($uploadImage == false){
      $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
    }
  }else{
    
    $ExteriorImage1 ="";
    }



    // Uploading Exterior2 to the database =======================>
     
   if(isset($_FILES['Exterior2']['name'])){
    //To upload the image we need the image name, source and destination.
    $ExteriorImage2 = $_FILES['Exterior2']['name'];
    // Source ================>
    $imageSource = $_FILES['Exterior2']['tmp_name'];
    // Destination ================>
    $imageDestination = "../Assets/dbImages".$ExteriorImage2; 
    // Finally upload the image ========>
    $uploadImage = move_uploaded_file($imageSource, $imageDestination);

    if($uploadImage == false){
      $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
    }
  }else{
    
    $ExteriorImage2 ="";
    }



  $sql = "INSERT INTO cars SET
  carname = '$carName',
  location = '$carLocation',
  mainimage = '$image',

 

  releasedate = '$builtDate',
  modelyear = '$year',
  modelgrade = '$grade',
  insurance = '$insurance',
  company = '$company',
  staffID = '$staffID',
  status = '$status',
  Interior1 = '$InteriorImage1',
  Interior2 = '$InteriorImage2',

  Exterior1  = '$ExteriorImage1',
  Exterior2 = '$ExteriorImage2'
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['addedCar'] = '<span class="success">Car Added Successfully, add more?</span>';
      header('location:'.SITEURL. 'View/Backend/Admin/cars.php');
      exit(); 
  }
  else{
    
  die('Failed to connect to database!');
  } 

}
?>


