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
                    All Clients
                </h1>

                    <?php 
                        if(isset($_SESSION['deleteClient'])){
                            echo $_SESSION['deleteClient'];
                            unset($_SESSION['deleteClient']);
                        }
            
                    ?> 
                <p>Hi Isra, did you say Goodmorning to any of them today <i class="uil uil-grin icon"></i>?</p>


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
                        <th>Tenant ID</th>
                        <th>summary</th>
                        <th>Car Type</th>
               
                        <th>Action</th>
                    </tr>

                    <?php 
                        $sql = 'SELECT * FROM clients';
                        $res = mysqli_query($conn, $sql);
                        if($res == TRUE){
                            $count =  mysqli_num_rows($res);
                            $tableID = 1;

                            if($count > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $carID = $row['carID'];
                                $agentID = $row['agentID'];
                                $firstname = $row['firstname'];
                                $secondname = $row['secondname'];
                                $image = $row['image'];
                                $email = $row['email'];
                         
                                $username = $row['username'];

                                ?>
                                    <tr>
                                        <td class="id"><?php echo $tableID++;?></td>
                                        <td class="clientInfo flex">
                                            <?php 
                                                if($image!=""){   
                                                    ?>
                                                    <div class="imgDiv">
                                                     <img src="<?php echo SITEURL;?>Assets/<?php echo $image;?>" alt="Car Image">
                                                    </div>
                                                    <?php
                                                }
                                                else{
                                                    echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image</span>';
                                                }
                                            ?>
                                    
                                          
                                            <div class="info">
                                                <span class="name"><?php echo $firstname;?></span>

                                                <p><?php echo $email;?></p>
                                
                                            </div>
                                        </td>


                                   
                    
                                        <td class="action">
                                            <a href="<?php echo SITEURL?>View/Backend/Admin/deleteClient.php?id=<?php echo $id?>">
                                                <i class="uil uil-trash-alt icon"></i>
                                            </a>
                                        
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