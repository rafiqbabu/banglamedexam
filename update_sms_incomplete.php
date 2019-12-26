<meta http-equiv="refresh" content="20">
<h1>
<?php
    
    date_default_timezone_set('Asia/Dhaka');
    $cd = date('Y-m-d H:i:s');
    
    $link = mysqli_connect ("localhost", "genesisedu_zzz", "Dhaka@#12044");
    mysqli_select_db ($link, "genesise_banglamedexam");
         
    $q = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE p_sts = '1' AND sms_sts = '0' AND is_free = '0' AND status != '1' ORDER BY id DESC ");
    while($d = mysqli_fetch_array($q)){
        
        $ed = $d[created_at];
        $doc_id = $d[doc_id];
        $now = time();
        $your_date = strtotime($ed);
        $datediff = $now - $your_date;
        $diff_hour = round($datediff / (60 * 60));
        echo $doc_id."-".$diff_hour."<br>";
        
        $qm = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$doc_id'"); while($dm = mysqli_fetch_array($qm)) { echo $mobn=$dm[phone]; } 
        
        $msg = "Dear Dr. Thanks for your enrollment in Package Name. Please Complete Your Exam Name. More Practice More Gain. www.banglamedexam.com";
        $msg = str_replace(' ', '%20', $msg);
                                       
        $mob = "88"."01741666987";
        
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_URL, "http://dsit.pro:5678/httpapi/sendsms?userId=genesispg&password=habib&smsText=$msg&commaSeperatedReceiverNumbers=$mob");
        curl_setopt($ch, CURLOPT_URL, "http://sms4.digitalsynapsebd.com/api/mt/SendSMS?user=rafiq&password=jamurki1999&senderid=WEBSMS&channel=Normal&DCS=0&flashsms=0&number=8801741666987&text=test_messages");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_exec($ch);
        curl_close($ch);
        
        
        
        //$sql9 = "update oe_doc_exams SET p_sts = '1' where purchase_id = '$dps[id]' AND p_sts = '0' ";
        //mysqli_query($link, $sql9);
    }

?>







































