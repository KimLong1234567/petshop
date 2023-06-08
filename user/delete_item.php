<?php
    require "../connect.php";
    session_start();
    // session_unset();
    // die();
    $id = $_GET['id'];

    if(isset($_SESSION['add_cart'][$id])){
        // foreach($_SESSION['add_cart'][$id] as $key => $value):{


            unset($_SESSION['add_cart'][$id]);
         
        // }       
        // endforeach;
        

    }

    header("location: ../view_cart.php");
?>