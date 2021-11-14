<?php

    session_start();
    
    require_once('./database.php');
    require_once('./component.php');

    $db=new createDatabase(dbname:"FemiShopDatabase",tablename:"ProductTable");

    if(isset($_POST['remove'])){
        if($_GET['action']=='remove'){
            foreach($_SESSION['cart'] as $key=>$value){
                if($value['id']==$_GET['id']){
                    unset($_SESSION['cart'][$key]);
                    echo "<script>alert('Product has been removed')</script>";
                    echo "<script>window.location='cart.php'</script>";
                    echo "<h3>Nothing in Cart</h3>";
                }
            }
        }
    }

    if(isset($_POST['save'])){
        echo "<script>alert('Not Available in this version')</script>";
    }
?>
<!DOCTYPE html>
<html>
   <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css"/>
        <link rel="stylesheet" href="../index.css"/>
        <title>Cart</title>   
   </head>    
   <body class="bg-light">
       <?php
        require_once('./header.php');

       ?>
       <div class="container-fluid">
           <div class="row px-5">
               <div class="col-md-7">
                   <div class="shopping-cart">
                       <br/>
                       <h1>My Cart</h1>
                       <hr/>

                       <br/>

                       <?php
                       $total=0;
                       if(!isset($_SESSION['cart'])){
                           echo '<h3>Nothing in Cart</h3>';
                       } else{
                           $id=array_column($_SESSION['cart'],column_key:'id');
                            $result=$db->getData();
                            while($row=mysqli_fetch_assoc($result)){
                                foreach($id as $productId){
                                    if($row['id']==$productId){
                                        cartElement($row['image'],$row['name'],$row['price'],$row['id']); 
                                        $total=$total+(int)$row['price'];
                                    }                                
                                }
                            }          
                                                     
                       }   

                       ?>
                       
                   </div>
               </div>
               <div class="col-md-4 offset-md-1 border rounded mt-5 bg-light h-25">
                   <div class="pt-4">
                       <h6>INVENTORY</h6>
                       <hr>
                       <div class="row price-details">
                           <div class="col-md-6">
                               <?php
                               
                                if(isset($_SESSION['cart'])){
                                    $count=count($_SESSION['cart']);
                                    echo "<h6>Price ($count items)</h6>";
                                } else{
                                    echo "<h6>Price (0 items)</h6>";
                                }
                               ?>
                               <h6>Delivery Charges</h6>
                               <hr>
                               <h6>Amount:</h6>
                           </div>
                           <div class="col-md-6">
                               <h6>
                                   <?php echo $total; ?>
                                   <h6 class="text-success">FREE</h6>
                                   <hr>
                                   <h6>$<?php echo $total; ?></h6>
                               </h6>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <style>
           .price-details h6{
               padding: 3% 2%;
           }
       </style>
       <script src='../jquery-3.6.0.min.js'></script>
        <script src="../popper.min.js"></script>
        <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
   </body>
</html>