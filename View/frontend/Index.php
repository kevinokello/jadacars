<?php
include('./clientPartials/header.php');
$date = date('Y-m-d');
?>

    <!-- header Starts -->
    <?php
      include('./clientPartials/navbar.php');
    ?>
    <!-- header Ends -->

    <!-- Home Section Start -->
    <div class="homeSection" id="Home">
        <div class="homeContainer grid">
           <div class="homeText">
              <span class="text">
                100% Trust Second Hand Car Selling Platform
              </span>

              <h1 class="title">
                We sell <span>Brand New</span> And <span>Used</span> Cars
              </h1>
              <P>
                Welcome to the most trusted car discovery portal in Australia and is visited by millions of verified car buyers every month.
              </P>
           </div>
           <div class="homeImage flex">
               <img src="../../Assets/car (3).png" alt="carDetails.php">
           </div>
        </div>
    </div>
    <!-- Home Section Ends -->


    <!-- Popular Cars Starts -->
     <div class="popularCars section" id="popular">
        <div class="secContainer container">
            <div class="secTitleDiv">
                <h2 class="secTitle">Popular Cars On Sale</h2>
                <P>
                    Welcome to the most trusted car discovery portal in Australia and is visited by millions of verified car buyers every month.
                </P>
            </div>

            <div class="contentDiv">
              <div class="filterBtns grid">
                    <div class="singleFilter flex" data-filter="Toyota">
                      <img src="../../Assets/logo (1).png" alt="Company Logo" class="img">
                      <span class="companyName">
                          Toyota
                      </span>
                    </div>
                    <div class="singleFilter flex active" data-filter="Wolkswagon">
                      <img src="../../Assets/logo (3).png" alt="Company Logo" class="img">
                      <span class="companyName">
                          Wolkswagon
                      </span>
                    </div>
                    <div class="singleFilter flex" data-filter="Tesla">
                      <img src="../../Assets/logo (7).png" alt="Company Logo" class="img">
                      <span class="companyName">
                          Tesla
                      </span>
                    </div>
                    <div class="singleFilter flex" data-filter="Mercedes">
                      <img src="../../Assets/logo (6).png" alt="Company Logo" class="img">
                      <span class="companyName">
                          Mercedes
                      </span>
                    </div>
              </div>

              <div class="carsContainer">
                <div class="singleCompany grid hide" data-target="Toyota">

                    <?php 
                        $sql = "SELECT * FROM cars where status = 'On Market' AND company = 'Toyota' order by rand() limit 0,3";
                        $res = mysqli_query($conn, $sql);
                        if($res == TRUE){
                            $count =  mysqli_num_rows($res);

                            if($count > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $carname = $row['carname'];
                                $price = $row['price'];
                                $location = $row['location'];
                                // $priceinclusives = $row['priceinclusives'];
                                // $body = $row['body'];
                                // $fuel = $row['fuel'];
                                $engine = $row['engine'];
                                // $bodystyle = $row['bodystyle'];
                                // $performance = $row['performance'];
                                // $safety = $row['safety'];
                                // $technology = $row['technology'];
                                $releasedate = $row['releasedate'];
                                $seats = $row['seats'];
                                $modelyear = $row['modelyear'];
                                $finaldrive = $row['finaldrive'];
                                $modelgrade = $row['modelgrade'];
                                $specregion = $row['specregion'];
                                $insurance = $row['insurance'];
                                // $note = $row['note'];  
                                $mainimage = $row['mainimage'];
                                $status = $row['status'];
                                

                                ?>
                                    <!-- Single car card -->
                                    <div class="singleCar">
                                        <?php 
                                            if($mainimage!=""){   
                                                ?>
                                                <div class="imgDiv">
                                                <img src="<?php echo SITEURL;?>Assets/<?php echo $mainimage;?>" alt="Car Image">
                                                </div>
                                                <?php
                                            }
                                            else{
                                                echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                                            }
                                        ?>
                                        
                                        <h5 class="carTitle">
                                        <?php echo $carname;?>
                                        </h5>

                                        <div class="properties grid">
                                            <div class="singleProperty flex">
                                                <i class='bx bxs-group icon'></i>
                                                <span class="text">
                                                <?php echo $seats;?> Persons
                                                </span>
                                            </div>
                                            <div class="singleProperty flex">
                                                <i class="uis uis-anchor icon"></i>
                                                <span class="text">
                                                    Autopilot
                                                </span>
                                            </div>
                                            <div class="singleProperty flex">
                                                <i class='bx bxs-calendar-event icon' ></i>
                                                <span class="text">
                                                <?php echo $modelyear;?>
                                                </span>
                                            </div>
                                            <div class="singleProperty flex">
                                                <i class='bx bxs-gas-pump icon' ></i>
                                                <span class="text">
                                                <?php echo $fuel;?>
                                                </span>
                                            </div>
                                        </div>

                            
                                        <div class="price_seller flex">
                                        <span class="price">
                                            $<?php echo $price;?>
                                        </span>
                                        <a href="<?php echo SITEURL?>View/Frontend/carDetails.php?id=<?php echo $id?>">
                                            <span class="btn primaryBtn">
                                            Details
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                <?php

                                }
                            }

                            else{

                                ?>
                                <span>No Cars to show!</span>
                                <?php
                              
                            }
                        }
                    ?>
                </div>

                <div class="singleCompany grid hide" data-target="Mercedes">

                    <?php 
                        $sql = "SELECT * FROM cars where status = 'On Market' AND company = 'Mercedes' order by rand() limit 0,3";
                        $res = mysqli_query($conn, $sql);
                        if($res == TRUE){
                            $count =  mysqli_num_rows($res);

                            if($count > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $carname = $row['carname'];
                                $price = $row['price'];
                                $location = $row['location'];
                                // $priceinclusives = $row['priceinclusives'];
                                // $body = $row['body'];
                                // $fuel = $row['fuel'];
                                $engine = $row['engine'];
                                // $bodystyle = $row['bodystyle'];
                                // $performance = $row['performance'];
                                // $safety = $row['safety'];
                                // $technology = $row['technology'];
                                $releasedate = $row['releasedate'];
                                $seats = $row['seats'];
                                $modelyear = $row['modelyear'];
                                $finaldrive = $row['finaldrive'];
                                $modelgrade = $row['modelgrade'];
                                $specregion = $row['specregion'];
                                $insurance = $row['insurance'];
                                // $note = $row['note'];  
                                $mainimage = $row['mainimage'];
                                $status = $row['status'];
                                

                                ?>
                                <!-- Single car card -->
                                <div class="singleCar">
                                <?php 
                                        if($mainimage!=""){   
                                            ?>
                                            <div class="imgDiv">
                                             <img src="<?php echo SITEURL;?>Assets/<?php echo $mainimage;?>" alt="Car Image">
                                            </div>
                                            <?php
                                        }
                                        else{
                                            echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                                        }
                                    ?>
                                    
                                    <h5 class="carTitle">
                                    <?php echo $carname;?>
                                    </h5>

                                    <div class="properties grid">
                                        <div class="singleProperty flex">
                                            <i class='bx bxs-group icon'></i>
                                            <span class="text">
                                            <?php echo $seats;?> Persons
                                            </span>
                                        </div>
                                        <div class="singleProperty flex">
                                            <i class="uis uis-anchor icon"></i>
                                            <span class="text">
                                                Autopilot
                                            </span>
                                        </div>
                                        <div class="singleProperty flex">
                                            <i class='bx bxs-calendar-event icon' ></i>
                                            <span class="text">
                                            <?php echo $modelyear;?>
                                            </span>
                                        </div>
                                        <div class="singleProperty flex">
                                            <i class='bx bxs-gas-pump icon' ></i>
                                            <span class="text">
                                            <?php echo $fuel;?>
                                            </span>
                                        </div>
                                    </div>

                        
                                    <div class="price_seller flex">
                                    <span class="price">
                                        $<?php echo $price;?>
                                    </span>
                                    <a href="<?php echo SITEURL?>View/Frontend/carDetails.php?id=<?php echo $id?>">
                                        <span class="btn primaryBtn">
                                        Details
                                        </span>
                                    </a>
                                    </div>
                                </div>
                                <?php

                                }
                            }

                            else{

                                ?>
                                <span>No Cars to show!</span>
                                <?php
                              
                            }
                        }
                    ?>
                </div>

                <div class="singleCompany grid live" data-target="Wolkswagon">
                    <?php 
                        $sql = "SELECT * FROM cars where status = 'On Market' AND company = 'wolkswagon' order by rand() limit 0,3";
                        $res = mysqli_query($conn, $sql);
                        if($res == TRUE){
                            $count =  mysqli_num_rows($res);

                            if($count > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $carname = $row['carname'];
                                    $price = $row['price'];
                                    $location = $row['location'];
                                    // $priceinclusives = $row['priceinclusives'];
                                    // $body = $row['body'];
                                    // $fuel = $row['fuel'];
                                    $engine = $row['engine'];
                                    // $bodystyle = $row['bodystyle'];
                                    // $performance = $row['performance'];
                                    // $safety = $row['safety'];
                                    // $technology = $row['technology'];
                                    $releasedate = $row['releasedate'];
                                    $seats = $row['seats'];
                                    $modelyear = $row['modelyear'];
                                    $finaldrive = $row['finaldrive'];
                                    $modelgrade = $row['modelgrade'];
                                    $specregion = $row['specregion'];
                                    $insurance = $row['insurance'];
                                    // $note = $row['note'];  
                                    $mainimage = $row['mainimage'];
                                    $status = $row['status'];
                                

                                ?>
                                <!-- Single car card -->
                                <div class="singleCar">
                                <?php 
                                        if($mainimage!=""){   
                                            ?>
                                            <div class="imgDiv">
                                             <img src="<?php echo SITEURL;?>Assets/<?php echo $mainimage;?>" alt="Car Image">
                                            </div>
                                            <?php
                                        }
                                        else{
                                            echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                                        }
                                    ?>
                                    
                                    <h5 class="carTitle">
                                    <?php echo $carname;?>
                                    </h5>

                                    <div class="properties grid">
                                        <div class="singleProperty flex">
                                            <i class='bx bxs-group icon'></i>
                                            <span class="text">
                                            <?php echo $seats;?> Persons
                                            </span>
                                        </div>
                                        <div class="singleProperty flex">
                                            <i class="uis uis-anchor icon"></i>
                                            <span class="text">
                                                Autopilot
                                            </span>
                                        </div>
                                        <div class="singleProperty flex">
                                            <i class='bx bxs-calendar-event icon' ></i>
                                            <span class="text">
                                            <?php echo $modelyear;?>
                                            </span>
                                        </div>
                                        <div class="singleProperty flex">
                                            <i class='bx bxs-gas-pump icon' ></i>
                                            <span class="text">
                                            <?php echo $fuel;?>
                                            </span>
                                        </div>
                                    </div>

                        
                                    <div class="price_seller flex">
                                    <span class="price">
                                        $<?php echo $price;?>
                                    </span>
                                    <a href="<?php echo SITEURL?>View/Frontend/carDetails.php?id=<?php echo $id?>">
                                        <span class="btn primaryBtn">
                                        Details
                                        </span>
                                    </a>
                                    </div>
                                </div>
                                <?php

                                }
                            }

                            else{

                                ?>
                                <span>No Cars to show!</span>
                                <?php
                              
                            }
                        }
                    ?>
                </div>

                <div class="singleCompany grid hide" data-target="Tesla">
                    <?php 
                        $sql = "SELECT * FROM cars where status = 'On Market' AND company = 'Tesla' order by rand() limit 0,3";
                        $res = mysqli_query($conn, $sql);
                        if($res == TRUE){
                            $count =  mysqli_num_rows($res);

                            if($count > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $carname = $row['carname'];
                                    $price = $row['price'];
                                    $location = $row['location'];
                                    // $priceinclusives = $row['priceinclusives'];
                                    // $body = $row['body'];
                                    // $fuel = $row['fuel'];
                                    $engine = $row['engine'];
                                    // $bodystyle = $row['bodystyle'];
                                    // $performance = $row['performance'];
                                    // $safety = $row['safety'];
                                    // $technology = $row['technology'];
                                    $releasedate = $row['releasedate'];
                                    $seats = $row['seats'];
                                    $modelyear = $row['modelyear'];
                                    $finaldrive = $row['finaldrive'];
                                    $modelgrade = $row['modelgrade'];
                                    $specregion = $row['specregion'];
                                    $insurance = $row['insurance'];
                                    // $note = $row['note'];  
                                    $mainimage = $row['mainimage'];
                                    $status = $row['status'];
                                

                                ?>
                                <!-- Single car card -->
                                <div class="singleCar">
                                <?php 
                                        if($mainimage!=""){   
                                            ?>
                                            <div class="imgDiv">
                                             <img src="<?php echo SITEURL;?>Assets/<?php echo $mainimage;?>" alt="Car Image">
                                            </div>
                                            <?php
                                        }
                                        else{
                                            echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                                        }
                                    ?>
                                    
                                    <h5 class="carTitle">
                                    <?php echo $carname;?>
                                    </h5>

                                    <div class="properties grid">
                                        <div class="singleProperty flex">
                                            <i class='bx bxs-group icon'></i>
                                            <span class="text">
                                            <?php echo $seats;?> Persons
                                            </span>
                                        </div>
                                        <div class="singleProperty flex">
                                            <i class="uis uis-anchor icon"></i>
                                            <span class="text">
                                                Autopilot
                                            </span>
                                        </div>
                                        <div class="singleProperty flex">
                                            <i class='bx bxs-calendar-event icon' ></i>
                                            <span class="text">
                                            <?php echo $modelyear;?>
                                            </span>
                                        </div>
                                        <div class="singleProperty flex">
                                            <i class='bx bxs-gas-pump icon' ></i>
                                            <span class="text">
                                            <?php echo $fuel;?>
                                            </span>
                                        </div>
                                    </div>

                        
                                    <div class="price_seller flex">
                                    <span class="price">
                                        $<?php echo $price;?>
                                    </span>
                                    <a href="<?php echo SITEURL?>View/Frontend/carDetails.php?id=<?php echo $id?>">
                                        <span class="btn primaryBtn">
                                        Details
                                        </span>
                                    </a>
                                    </div>
                                </div>
                                <?php

                                }
                            }

                            else{

                                ?>
                                <span>No Cars to show!</span>
                                <?php
                              
                            }
                        }
                    ?>
                </div>
              </div>
            </div>
           

            
        </div>
     </div>
    <!-- Popular Cars Ends -->

    <!-- Why Choose Us Starts -->
    <div class="services section" id="services">
        <div class="secContainer container">
            <div class="content">


                <div class="secText">
                    <div class="headerDiv">
                        <h1 class="bigText">
                            Why Choose Us
                        </h1>
                        <P>
                            Find our top quality services we have offered to our dear client over time.
                        </P>
                    </div>

                    <div class="servicesGrid grid">
                        <div class="singleService flex">
                            <div class="iconDiv">
                                <i class='bx bx-phone-call icon' ></i>
                            </div>

                            <div class="serviceDesc">
                                <span class="serviceTitle">
                                    Customer Support
                                </span>
                                <p>
                                Find our top quality services we have offered to our dear client over time.
                                </p>
                            </div>
                        </div>

                        <div class="singleService flex">
                            <div class="iconDiv">
                                <i class='bx bx-wallet-alt icon' ></i>
                            </div>

                            <div class="serviceDesc">
                                <span class="serviceTitle">
                                    Best Prices
                                </span>
                                <p>
                                Find our top quality services we have offered to our dear client over time.
                                </p>
                            </div>
                        </div>

                        <div class="singleService flex">
                            <div class="iconDiv">
                                <i class='bx bx-check-shield icon' ></i>
                            </div>

                            <div class="serviceDesc">
                                <span class="serviceTitle">
                                    Verified Car Brand
                                </span>
                                <p>
                                Find our top quality services we have offered to our dear client over time.
                                </p>
                            </div>
                        </div>

                        <div class="singleService flex">
                            <div class="iconDiv">
                                <i class='bx bx-current-location icon'  ></i>
                            </div>

                            <div class="serviceDesc">
                                <span class="serviceTitle">
                                   Many Locations
                                </span>
                                <p>
                                Find our top quality services we have offered to our dear client over time.
                                </p>
                            </div>
                        </div>
                        <div class="singleService flex">
                            <div class="iconDiv">
                                <i class='bx bx-id-card icon'></i>
                            </div>

                            <div class="serviceDesc">
                                <span class="serviceTitle">
                                    Drivers License
                                </span>
                                <p>
                                Find our top quality services we have offered to our dear client over time.
                                </p>
                            </div>
                        </div>

                        <div class="singleService flex">
                            <div class="iconDiv">
                                <i class='bx bxs-car-mechanic icon'></i>
                            </div>

                            <div class="serviceDesc">
                                <span class="serviceTitle">
                                    Road Test
                                </span>
                                <p>
                                Find our top quality services we have offered to our dear client over time.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us Ends -->    
    <!--Review Section Section Starts-->
    <div class='review section container' id="reviews">
        <div class="secContainer">
            <div class="secTitleDiv">
                <h2 class="secTitle">Top Customer Reviews</h2>
                <P>
                    Welcome to the most trusted car discovery portal in Australia and is visited by millions of verified car buyers every month.
                </P>
            </div>

            <div class="reviewContainer grid">
                

                <?php 
                    $sql = "SELECT * FROM reviews where status = 'Published' order by rand() limit 0,3";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE){
                        $count =  mysqli_num_rows($res);

                        if($count > 0){
                            
                            while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                             $carID = $row['carID'];
                            $reviewerName = $row['reviewerName'];
                            $reviewerImage = $row['reviewerImage'];
                            $nationality     = $row['nationality'];
                            $review  = $row['review'];
                            $status  = $row['status'];

                            ?>
                                <div class="singleReview grid">

                                    <?php 
                                        $sql2 = "SELECT * FROM cars where id = $carID";
                                        $res2 = mysqli_query($conn, $sql2);
                                        if($res == TRUE){
                                            $count =  mysqli_num_rows($res2);

                                            if($count > 0){
                                                while($row = mysqli_fetch_assoc($res2)){
                                                $id = $row['id'];
                                                $carname = $row['carname'];
                                                $mainimage = $row['mainimage'];
                                                }
                                            }
                                        }
                                    ?>

                                    <?php 
                                        if($mainimage!=""){   
                                            ?>
                                            <div class="ImgDiv">
                                                <img src="<?php echo SITEURL;?>Assets/<?php echo $mainimage;?>" alt="Car Image">
                                            </div>
                                            <?php
                                        }
                                        else{
                                            echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image</span>';
                                        }
                                    ?>

                                    <div class="reviewDetails">
                                        <h5 class="reviewTitle">
                                        <?php echo $carname;?>
                                        </h5>
                                        <span class="desc">
                                        <?php echo $review;?>
                                        </span>
                            
                                        <div class="reviewerDiv flex">
                                        <div class="leftDiv flex">

                                            <?php 
                                                if($reviewerImage!=""){   
                                                    ?>
                                                        <div class="reviewerImg">
                                                            <img src="<?php echo SITEURL;?>Assets/<?php echo $reviewerImage;?>" alt="">
                                                        </div>
                                                        
                                                    <?php
                                                }
                                                else{
                                                    echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image</span>';
                                                }
                                            ?>
                                            <div class="aboutReviewer">
                                            <span class="name">
                                            <?php echo $reviewerName;?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="rightDiv flex">
                                            <i class="uis uis-star icon"></i>
                                            <blockquote>4.84</blockquote>
                                        </div>
                                        </div>
                                    </div>
                
                                </div>
                            <?php

                            }
                        }
                    }
                ?>
            </div>
        </div>
       </div>
    <!--Review Section Section Ends-->                                 
<?php
include('./clientPartials/footer.php')
?>

<?php 
if(isset($_POST['submit'])){

  $email = $_POST['email'];
  
  $sql = "INSERT INTO subscribers SET
    email = '$email',
    date = '$date'
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['addedSub'] = '<span class="success">Subscriber Added Successfuly!</span>';
      header('location:'.SITEURL. 'View/Frontend/Index.php');
      exit();
  }
  else{
    
  die('Failed to connect to database!');
  } 
  exit();

}
?>