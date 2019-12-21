

<?php
    
    $link = mysqli_connect ("localhost", "genesisedu_zzz", "Dhaka@#12044");
    mysqli_select_db ($link, "genesise_banglamedexam");
         
    $qps = mysqli_query($link, "SELECT * FROM oe_doc_purchases WHERE payment_status = '1' ");
    while($dps = mysqli_fetch_array($qps)){
        $sql9 = "update oe_doc_exams SET p_sts = '1' where purchase_id = '$dps[id]' AND p_sts = '0' ";
        mysqli_query($link, $sql9);
    }

?>



