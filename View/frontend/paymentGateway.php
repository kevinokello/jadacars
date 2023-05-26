<?php
include('./clientPartials/header.php');
ob_start();
?>

    <!-- header Starts -->
<?php
include('./clientPartials/navbar.php')
?>
    <!-- header Ends -->

    <!-- Car Details Starts -->
    <div class="carDetails section">

<?php
$selectedCasrID = $_GET['id'];
$sql = "SELECT * FROM cars where id = '$selectedCasrID'";
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
            $status = $row['status'];
            $staffID = $row['staffID'];
            $Interior1 = $row['Interior1'];
            $Interior2 = $row['Interior2'];
            $Interior3 = $row['Interior3'];
            $Interior4 = $row['Interior4'];
            $Exterior1 = $row['Exterior1'];
            $Exterior2 = $row['Exterior2'];
            $Exterior3 = $row['Exterior3'];
            $Exterior4 = $row['Exterior4'];
        }
    }
}
echo '<script>
    var price = "' . $price . '";
    // Call a JavaScript function with the price value
    handlePrice(price);
</script>';
?>
    <div class="secContainer">
        <div class="mainSection">

            <?php
            if($mainimage!=""){
                ?>
                <img class="mainImg" src="<?php echo SITEURL;?>Assets/<?php echo $mainimage;?>" alt="Main Page Image">
                <?php
            }
            else{
                echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
            }
            ?>


            <div class="secText">
               <!--BEGIN Form to pay with paypal,post here-->
                <form action="" id="paypalForm" method="post" target="_top" style="margin-top: 50px;">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="">
                    <input type="hidden" name="lc" value="US">
                    <input type="hidden" name="item_name" value="<?php echo $carname;?>">
                    <input type="hidden" name="amount" value="<?php echo $price;?>">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="button_subtype" value="services">
                    <input type="hidden" name="no_note" value="0">
                    <input type="hidden" name="tax_rate" value="0.000">
                    <input type="hidden" name="shipping" value="0.00">
                    <a href="#" id="paypal-button"></a>
                </form>

               <!--END Form to pay with paypal-->
            </div>

            <div class="carMenu flex">
                <a href="#overview">
                    Overview
                </a>
                <a href="#features">
                    Features
                </a>
                <a href="#alternatives">
                    Alternatives
                </a>
                <a href="#gallery">
                    Gallery
                </a>
            </div>

        </div>

        <!-- overviewSection Section Starts -->
        <div class="overviewSection" id="overview">
            <div class="secContainer container">
                <div class="secTitleDiv">
                    <h2 class="secTitle">Car Overview</h2>
                    <P>
                        Welcome to the most trusted car discovery show-room in USA
                    </P>
                </div>
                <div class="content grid">

                    <span class="span"> Body: <span class="ans"><?php echo $price;?></span></span>
                    <span class="span"> Model Year: <span class="ans"><?php echo $modelyear;?></span></span>
                    <span class="span"> Final Drive: <span class="ans"><?php echo $finaldrive;?></span></span>
                    <span class="span"> Model Grade: <span class="ans"><?php echo $modelgrade;?></span></span>
                    <span class="span"> Spec Region: <span class="ans"><?php echo $specregion;?></span></span>
                    <span class="span"> Fuel Type: <span class="ans"><?php echo $fuel;?></span></span>
                    <span class="span"> Engine Type: <span class="ans"><?php echo $engine;?></span></span>



                </div>
            </div>
        </div>
        <!-- overviewSection Section Ends -->


        <!-- featuresSection Section Starts -->
        <div class="featuresSection section" id="features">
            <div class="secContainer container">
                <div class="secTitleDiv">
                    <h2 class="secTitle">Car Features</h2>
                    <P>
                        Welcome to the most trusted car discovery show-room in USA
                    </P>
                </div>
                <div class="content grid">
                    <div class="singleCard">
                        <span class="title">
                            Body Style
                        </span>
                        <?php echo $bodystyle;?>
                    </div>

                    <div class="singleCard">
                        <span class="title">
                            Performace
                        </span>
                        <?php echo $performance;?>

                    </div>

                    <div class="singleCard">
                        <span class="title">
                            Safety
                        </span>
                        <?php echo $safety;?>

                    </div>
                    <div class="singleCard">
                        <span class="title">
                            Technology
                        </span>
                        <?php echo $technology;?>

                    </div>
                </div>
            </div>
        </div>
        <!-- featuresSection Section Ends -->

        <!-- Gallery Section Starts -->
        <div class="gallerSection section" id="gallery">
            <div class="secConatiner container">
                <div class="secTitleDiv">
                    <h2 class="secTitle">Car Gallery</h2>
                    <P>
                        Welcome to the most trusted car discovery show-room in USA
                    </P>
                </div>

                <div class="content grid">
                    <div class="exteriorDiv grid">
                        <span class="title">
                            Exterior Details
                        </span>
                        <div class="carImages grid">
                            <?php
                            if($Interior1!=""){
                                ?>
                                <div class="singleImage">
                                    <img  src="<?php echo SITEURL;?>Assets/<?php echo $Interior1;?>" alt="Main Page Image">
                                </div>
                                <?php
                            }
                            else{
                                echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                            }
                            ?>


                            <?php
                            if($Interior2!=""){
                                ?>
                                <div class="singleImage">
                                    <img  src="<?php echo SITEURL;?>Assets/<?php echo $Interior2;?>" alt="Main Page Image">
                                </div>
                                <?php
                            }
                            else{
                                echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                            }
                            ?>
                            <?php
                            if($Interior3!=""){
                                ?>
                                <div class="singleImage">
                                    <img  src="<?php echo SITEURL;?>Assets/<?php echo $Interior3;?>" alt="Main Page Image">
                                </div>
                                <?php
                            }
                            else{
                                echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                            }
                            ?>
                            <?php
                            if($Interior4!=""){
                                ?>
                                <div class="singleImage">
                                    <img  src="<?php echo SITEURL;?>Assets/<?php echo $Interior4;?>" alt="Main Page Image">
                                </div>
                                <?php
                            }
                            else{
                                echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                            }
                            ?>
                        </div>

                        <div class="interior grid">
                        <span class="title">
                            Interior Details
                        </span>

                            <div class="carImages grid">
                                <?php
                                if($Exterior1!=""){
                                    ?>
                                    <div class="singleImage">
                                        <img class="mainImg" src="<?php echo SITEURL;?>Assets/<?php echo $Exterior1;?>" alt="Main Page Image">
                                    </div>
                                    <?php
                                }
                                else{
                                    echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                                }
                                ?>
                                <?php
                                if($Exterior2!=""){
                                    ?>
                                    <div class="singleImage">
                                        <img class="mainImg" src="<?php echo SITEURL;?>Assets/<?php echo $Exterior2;?>" alt="Main Page Image">
                                    </div>
                                    <?php
                                }
                                else{
                                    echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                                }
                                ?>
                                <?php
                                if($Exterior3!=""){
                                    ?>
                                    <div class="singleImage">
                                        <img class="mainImg" src="<?php echo SITEURL;?>Assets/<?php echo $Exterior3;?>" alt="Main Page Image">
                                    </div>
                                    <?php
                                }
                                else{
                                    echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                                }
                                ?>
                                <?php
                                if($Exterior4!=""){
                                    ?>
                                    <div class="singleImage">
                                        <img class="mainImg" src="<?php echo SITEURL;?>Assets/<?php echo $Exterior4;?>" alt="Main Page Image">
                                    </div>
                                    <?php
                                }
                                else{
                                    echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image </span>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Gallery Section Ends -->

        </div>
    </div>
    <!-- Car Details Ends -->

<?php
include('./clientPartials/footer.php');

//on post, call create order
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key = PAYPAL_CLIENT_ID;
    $secret = PAYPAL_SECRET_KEY;
    $credentials = base64_encode("$key:$secret");
//
    $url = PAYPAL_BASE_URL.'v1/oauth2/token';
    //setting the curl parameters.
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $curl_response = curl_exec($curl);

    $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $body = substr($curl_response, $headerSize);

    curl_close($curl);

    $body = json_decode($body, true);
    //$access_token = $body['access_token'];
    $access_token= $body['access_token'];

    echo '<script> var accessToken = "'. $access_token .'";</script>';
}
//generate token
?><script src="https://www.paypal.com/sdk/js?client-id=<?php PAYPAL_CLIENT_ID ?>"></script>

<body>
<script>
    var price
    function handlePrice(price) {
        console.log('Price:', price);
        //assign price to global variable
        price = price;
    }

    // Use the price variable
    console.log('Price:', price);
    console.log(price)
    // This function is called when the PayPal SDK is loaded
    function initializePayPalSDK() {
        paypal.Buttons({
            createOrder: function(data, actions) {
                // Set up the transaction details and return the order ID
                return actions.order.create({
                    purchase_units: [
                        {
                            amount: {
                                value: price // Set the payment amount here
                            }
                        }
                    ]
                });
            },
            onApprove: function(data, actions) {
                // Capture the funds from the transaction
                return actions.order.capture().then(function(details) {
                    // Handle the successful payment
                    console.log(details)
                    window.alert('Payment successful! Transaction ID: ' + details.id);
                    // Call your server to save the transaction
                    fetch('/View/frontend/paypal-transaction-complete.php', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            transaction: details
                        })
                    });
                });
            },
            onCancel: function(data) {
                console.log(data)
                // Handle the cancellation
                window.alert('Payment cancelled!');
            },
            onError: function(err) {
                // Handle errors
                console.error(err);
                alert('An error occurred. Please try again.');
            }
        }).render('#paypal-button'); // Render the PayPal button in the specified container
    }

    // Load the PayPal SDK asynchronously
    function loadPayPalSDK() {
        var script = document.createElement('script');
        script.src = 'https://www.paypal.com/sdk/js?client-id=ARCD3SlLT5y7VSpWLe2SyW2_xAAmotrDUezTRDAXjvZCUfqcff8DJDT2hJNZWA5Ad0gndWOHCUje1eqQ';
        script.addEventListener('load', initializePayPalSDK);
        document.body.appendChild(script);
    }

    // Call the function to load the PayPal SDK
    loadPayPalSDK();
</script>
</body>