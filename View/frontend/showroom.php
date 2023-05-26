<?php
include('./clientPartials/header.php');
//session_start();
?>

    <!-- header Starts -->
<?php
include('./clientPartials/navbar.php')
?>
    <!-- header Ends -->


    <!--Catalogue Section Starts  -->
    <div class="carCatalogue section">
        <div class="secContainer container">
            <div class="secHeader">
                <div class="secTitleDiv">
                    <h2 class="secTitle">Car Catalogue</h2>
                    <P>
                        Explore car that you might like!
                    </P>
                </div>


                <div class="carsContainer">
                    <div class="singleCompany grid">
                        <?php
                        $sql = "SELECT * FROM cars where status = 'On Market'";
                        $res = mysqli_query($conn, $sql);
                        if($res == TRUE){
                            $count =  mysqli_num_rows($res);

                            if($count > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $carname = $row['carname'];
                                    $price = $row['price'];
                                    $location = $row['location'];
                                    $priceinclusives = $row['priceinclusives'];
                                    $body = $row['body'];
                                    $fuel = $row['fuel'];
                                    $engine = $row['engine'];
                                    $bodystyle = $row['bodystyle'];
                                    $performance = $row['performance'];
                                    $safety = $row['safety'];
                                    $technology = $row['technology'];
                                    $releasedate = $row['releasedate'];
                                    $seats = $row['seats'];
                                    $modelyear = $row['modelyear'];
                                    $finaldrive = $row['finaldrive'];
                                    $modelgrade = $row['modelgrade'];
                                    $specregion = $row['specregion'];
                                    $insurance = $row['insurance'];
                                    $note = $row['note'];
                                    $mainimage = $row['mainimage'];
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
                                            <a href="<?php echo SITEURL?>View/frontend/carDetails.php?id=<?php echo $id?>">
                                                <span class="btn success">
                                                Details
                                                </span>
                                            </a>
                                            <a href="<?php echo SITEURL?>View/frontend/checkout.php?id=<?php echo $id?>" class="addToCartBtn" data-id="<?php echo $id ?>">
                                                <span class="btn primaryBtn">
                                                    Add To Cart
                                                </span>
                                                <span class="btn addedBtn" style="display:none;" onclick="openCheckout()">
                                                    Checkout
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
    <!--Catalogue Section Ends  -->

<?php
include('./clientPartials/footer.php')
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.addToCartBtn').click(function(e) {
            e.preventDefault();

            const payload = $(this).data('id');
            const addToCartBtn = $(this).find('.primaryBtn');
            const addedToCartBtn = $(this).find('.addedBtn');

            $.ajax({
                type: 'POST',
                url: 'checkout.php', // Replace with the path to your server-side script
                data: { id: payload },
                success: function(response) {
                    addToCartBtn.hide();
                    addedToCartBtn.show();
                },
                error: function(xhr, status, error) {
                    // Handle the error response, e.g., show an error message
                    alert('Error adding item to cart:' + xhr.responseText);
                }
            });

        });
    });
</script>
<script>
    openCheckout = () => {
        window.location.href = "<?php echo SITEURL?>View/frontend/checkout.php";
    }
</script>