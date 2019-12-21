<meta http-equiv="refresh" content="600">
<h1>
<?php
    
    date_default_timezone_set('Asia/Dhaka');
    $cd = date('Y-m-d H:i:s');
    
    $link = mysqli_connect ("localhost", "genesisedu_zzz", "Dhaka@#12044");
    mysqli_select_db ($link, "genesise_banglamedexam");
         
    $q = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE p_sts = '1' AND sms_sts = '0' AND is_free = '0' AND status != '1' AND doc_id = '20' ORDER BY id DESC LIMIT 1 ");
    //$q = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE id = '24173' ");
    while($d = mysqli_fetch_array($q)){
        
        $ed = $d[created_at];
        $doc_id = $d[doc_id];
        $now = time();
        $your_date = strtotime($ed);
        $datediff = $now - $your_date;
        $diff_hour = round($datediff / (60 * 60));
        echo $diff_hour;
        
        $qm = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$doc_id'"); while($dm = mysqli_fetch_array($qm)) { $mob=$dm[phone]; } 
        
        //$sql9 = "update oe_doc_exams SET p_sts = '1' where purchase_id = '$dps[id]' AND p_sts = '0' ";
        //mysqli_query($link, $sql9);
    }

?>


