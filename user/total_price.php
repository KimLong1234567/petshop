<?php 
    function total_price($cart){
        $total = 0;
        foreach($cart as $key => $value){
            $total += $value['pet_prod_price'];
        }
        return $total;
    }
?>