<?php
//start session
session_start();

 require_once('./backend/database.php');   
 require_once('./backend/component.php');

 //Create instance of CreateDatabase
$database=new createDatabase(dbname:"FemiShopDatabase",tablename:"ProductTable");

if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
     $item_id=array_column($_SESSION['cart'],column_key:'id');

     //print_r(($_SESSION['cart']));
     if(in_array($_POST['id'],$item_id)){
         echo "<script>alert('Product already in Cart')</script>";
         echo "<script>window.location='index.php'</script>";
     } else{
         $count=count($_SESSION['cart']);
         $item=array('id' => $_POST['id']);
         $_SESSION['cart'][$count]=$item;
     }
}else{
    $item=array('id' => $_POST['id']);
    $_SESSION['cart'][0]=$item;
    //print_r(($_SESSION['cart']));
}

}

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./index.css"/>
        <title>E-Commerce Shop</title>  
        <link rel='icon' href='./upload/icon.png'/>
    </head>

    <body>    
        <?php require_once('./backend/header.php'); ?>
        <div class="container">
            <center><h1>E-Commerce Shop by Ishola Obafemi</h1></center>
            <div class="row text-center py-5">
              <?php
                $res=$database->getData();
                while($row=mysqli_fetch_assoc($res)) echo component($row['name'],$row['price'],$row['image'],$row['id'])
                
              ?>
            </div>
        </div>
        <script src='./jquery-3.6.0.min.js'></script>
        <script src="./popper.min.js"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>