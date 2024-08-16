<?php

const mcons=0.68;
const fcons=0.55;
    $Weight = $_POST['weight'];
    $WeightUnit = $_POST['unit'];
    $Gender = $_POST['gender'];
    $Drinks= $_POST['drinks'];
    $AlcoholContent = $_POST['alcohol_content'];
    $TimeElapsed = $_POST['time_elapsed'];
    

    $bac=calc_bac( $AlcoholContent * $Drinks,$Weight,$Gender == "male"? mcons:fcons,$TimeElapsed,$WeightUnit);


    $safeIndex = ($bac < 0.08)? "Safe to Drive" : "Dangerous to Drive";
   header("Location: index.php?bac=" .number_format($bac,2) . "&safe_index=". urlencode($safeIndex));
 die();


     function calc_bac($alcoholConsumed,$weight,$const,$time,$unit)

     {
        if ($unit == "kg"){
            $weight = $weight * 2.20462; // kg to lbs
        }
    
        return (($alcoholConsumed * 5.14) / ($weight * $const))-(0.015 * $time);

     }
?>
