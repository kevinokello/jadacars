<?php
include('./clientPartials/header.php');
//session_start();
?>
<?php
include('./clientPartials/navbar.php')
?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the item ID is provided
    if (isset($_POST['id'])) {
        $itemId = $_POST['id'];
        // Retrieve the item details based on the item ID
        $item = getItemDetails($itemId);
        // Check if the cart exists in the session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array(); // Create an empty cart array
        }

        // Add the item to the cart
        $_SESSION['cart'][] = $item;
        // Optionally, you can return a success response if needed
    }
}

// Function to retrieve item details (replace with your own implementation)
function getItemDetails($itemId) {
    // Create a connection to the database
    $conn = new mysqli(LOCALHOST, ROOT, PASSWORD, DATABASE);

// Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Retrieve item details from the database or any other source
    // Return the item details as an associative array or object
    $sql = "SELECT * FROM cars where id = $itemId";
    //
    $con= $conn->query($sql);
    return $con->fetch_assoc();
}
?>

<div class="carDetails section">
    <div class="overviewSection" id="overview">
        <div class="secContainer container">
            <table>
                <tr>
                    <th>Car</th>
                    <th>Model Year</th>
                    <th>Model Grade</th>
                    <th>Fuel Type</th>
                </tr>

                <?php
                $rows = $_SESSION['cart'];
                if (!empty($rows)) {
                    $count = sizeof($rows);
                    if ($count > 0) {
                        foreach ($rows as $item) {
                            $id = $item['id'];
                            $carname = $item['carname'];
                            $price = $item['price'];
                            $location = $item['location'];
                            $priceinclusives = $item['priceinclusives'];
                            $body = $item['body'];
                            $fuel = $item['fuel'];
                            $engine = $item['engine'];
                            $bodystyle = $item['bodystyle'];
                            $performance = $item['performance'];
                            $safety = $item['safety'];
                            $technology = $item['technology'];
                            $releasedate = $item['releasedate'];
                            $seats = $item['seats'];
                            $modelyear = $item['modelyear'];
                            $finaldrive = $item['finaldrive'];
                            $modelgrade = $item['modelgrade'];
                            $specregion = $item['specregion'];
                            $insurance = $item['insurance'];
                            $note = $item['note'];
                            $mainimage = $item['mainimage'];
                            ?>
                            <tr>
                                <td class="td flex">

                                    <?php
                                    if($mainimage!=""){
                                        ?>
                                        <div class="imgDiv">
                                            <img height="100" width="100" src="<?php echo SITEURL;?>Assets/<?php echo $mainimage;?>" alt="Car Image">
                                        </div>

                                        <?php
                                    }
                                    else{
                                        echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image 1</span>';
                                    }
                                    ?>

                                    <div class="carInfo">
                                        <span class="name"><?php echo $carname?></span>
                                        <p><?php echo $modelgrade?></p>
                                        <i class="uil uil-moneybag-alt"></i>
                                        <small>$<?php echo $price?></small>
                                    </div>
                                </td>

                                <td class="modelYear trText">

                                    <span class="year"><?php echo $releasedate?></span>

                                    </span>
                                    <p>Date Released</p>
                                </td>

                                <td class="modelGrade trText">

                                    <span class="grade"><?php echo $modelgrade?></span>
                                    <p>By Manufacturer</p>

                                </td>
                                <td class=" feul trText">

                                    <span class="grade"><?php echo $fuel?></span>
                                    <p>Fuel Used</p>

                                </td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>
            </table>
            <!--BEGIN add Totals -->
            <hr/>
            <table>
                <tr>
                    <th>Total Amount</th>
                    <th> $ <?php //get sum of amount in rows array;
                        $sum = 0;
                        foreach ($rows as $item) {
                            $sum += $item['price'];
                        }
                        echo $sum;
                        echo '<script>
                                var price = "' . $sum . '";
                                // Call a JavaScript function with the price value
                                handlePriceChange(price);
                            </script>';
                        //  ?></th>
                </tr>
            </table>
            <!--END add Totals -->
            <!--BEGIN payment button-->
            <a href="#" id="paypal-button"></a>
            <!--BEGIN payment button-->
        </div>
    </div>
</div>
<?php
include('./clientPartials/footer.php')
?>
<?php

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
    function handlePriceChange(price) {
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