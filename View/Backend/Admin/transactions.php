<?php
include('./adminPartials/adminHeader.php');
?>

    <div class="adminDasboard flex">
        <?php
        include('./adminPartials/sideMenu.php');
        ?>

        <div class="clientsBody">
            <div class="top flex">
                <h1 class="titleText">
                    All Transactions
                </h1>

                <?php
                if(isset($_SESSION['deleteClient'])){
                    echo $_SESSION['deleteClient'];
                    unset($_SESSION['deleteClient']);
                }

                ?>
                <div class="headerBtns flex">

                    <a href="subscribers.php">
                        <button  class="flex btn bg">
                            <i class='bx bxs-envelope icon' ></i>Subscribers
                        </button>
                    </a>
                </div>

            </div>

            <div class="clientsDiv">
                <table>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Payer Name</th>
                        <th>Payer Email</th>
                        <th>Payer Address</th>
                        <th>Merchant Email</th>
                        <th>Status</th>
                        <th>Paid On</th>
                    </tr>

                    <?php
                    $sql = 'SELECT * FROM transactions';
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE){
                        $count =  mysqli_num_rows($res);
                        $tableID = 1;

                        if($count > 0){
                            while($row = mysqli_fetch_assoc($res)){
                                $transaction_id= $row['transaction_id'];
                                $currency = $row['currency'];
                                $amount = $row['amount'];
                                $payer_id = $row['payer_id'];
                                $payer_name = $row['payer_name'];
                                $payer_email = $row['payer_email'];
                                $payer_address = $row['payer_address'];
                                $merchant_email = $row['merchant_email'];
                                $payment_status = $row['payment_status'];
                                $created_at = $row['created_at'];

                                ?>
                                <tr>
                                    <td class="id">#<?php echo $transaction_id;?></td>
                                    <td class="carFees">
                                        <span class="fees flex"><?php echo $currency .''.$amount;?></span>
                                    </td>
                                    <td class="debt">
                                        <span class="fees flex"><i class="uil uil-user icon"></i><?php echo $payer_name;?></span>
                                        <p><span>Client</span></p>
                                    </td>
                                    <td class="debt">
                                        <span class="fees flex"><?php echo $payer_email;?></span>
                                    </td>
                                    <td class="debt">
                                        <span class="fees flex"><?php echo $payer_address?></span>
                                    </td>
                                    <td class="debt">
                                        <span class="fees flex"><?php echo $merchant_email?></span>
                                    </td>
                                    <td class="debt">
                                        <span class="fees flex"><?php echo $payment_status?></span>
                                    </td>
                                    <td class="debt">
                                        <span class="fees flex"><?php echo $created_at?></span>
                                    </td>

                                </tr>
                                <?php

                            }
                        }

                        else{
                            ?>
                            <span>No clients so far!</span>
                            <?php
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>

<?php
include('./adminPartials/adminFooter.php');
?>