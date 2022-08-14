<?php

session_start();

require_once ('scripts/CreateDb.php');
require_once ('./scripts/component.php');


// create instance of Createdb class
$database = new CreateDb("aledrogo", "products");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALEDROGO - Strona główna</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS only -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>


<?php require_once ("scripts/header.php"); ?>
<div class="container">
        <div class="row text-center py-5">

                <h3 class="slider-name">Nowości</h3>
            <?php require_once ("scripts/slider.php")?>

            <?php
            $server_name='localhost';
            $user_name='root';
            $password='';
            $database_name='aledrogo';
            $conn = new mysqli($server_name,$user_name,$password,$database_name);
            if($conn->connect_error){
                die("Error in db connection".$conn->connect_error);
            }
            ?>
                <h3 class="ous-products">Nasze produkty:</h3>
            <?php
            $sql='select * from products order by id';
            $stm=mysqli_prepare($conn, $sql);
            $a=1;
            if(mysqli_stmt_execute($stm)){
                $result=mysqli_stmt_get_result($stm);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

                        $result = $database->getData();
                        while ($row = mysqli_fetch_assoc($result)) {
                            component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_desc']);
                        }
                    }
                }
            }
            ?>
        </div>
</div>


<?php require_once ("scripts/footer.php"); ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
