    <!DOCTYPE HTML>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Package Details</title>
    </head>
    <body>
    <font face="Verdana">
        
        <?php 
            $package_id = $_GET['pid']; 
            $link = mysqli_connect ("localhost", "genesisedu_zzz", "Dhaka@#12044");
            mysqli_select_db ($link, "genesise_banglamedexam");
            
            $qpaid = mysqli_query($link, "SELECT * FROM oe_doc_purchases WHERE package_ids LIKE '%$package_id%' and payment_status = '1' "); while($dpaid = mysqli_fetch_array($qpaid)) { $total_paid = mysqli_affected_rows($link); }
            $qunpaid = mysqli_query($link, "SELECT * FROM oe_doc_purchases WHERE package_ids LIKE '%$package_id%' and payment_status = '0' "); while($dunpaid = mysqli_fetch_array($qunpaid)) { $total_unpaid = mysqli_affected_rows($link); }
            
            $qtd = mysqli_query($link, "SELECT * FROM oe_doc_purchases WHERE package_ids LIKE '%$package_id%' "); while($dtd = mysqli_fetch_array($qtd)) { $total_doctor = mysqli_affected_rows($link); }
            
            $qte = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE package_id = '$package_id' GROUP BY exam_id"); while($dte = mysqli_fetch_array($qte)) { $total_exam = mysqli_affected_rows($link); }
            $qtce = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE package_id = '$package_id' AND status = '1'"); while($dtce = mysqli_fetch_array($qtce)) { $total_com_exam = mysqli_affected_rows($link); }
        ?>
        
        
        <table border="0" align="center" cellpadding="2" cellspacing="0" width="1000">
            <tr align="center">
                <td width="200"><img src="upload/pic/med.png" width="100" height="100"></td>
                <td><font face="Verdana" size="6">BANGLAMED EXAM</font><br><font face="Verdana" size="4">Package Details</font></td>
                <td width="200"></td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>
        </table>
        
        
        <?php
            $qp = mysqli_query($link, "SELECT * FROM oe_package WHERE id = '$package_id' LIMIT 1");
	        while($dp = mysqli_fetch_array($qp)){
	    ?>
        <table border="0" align="center" cellpadding="2" cellspacing="0" width="1000">
            <tr>
                <td><b>Package Name :</b> <?php echo $dp[name]; ?></td>
            </tr>
            <tr>
                <td><hr></td>
            </tr>
        </table>
        
        <font size="2">
        <table border="0" align="center" cellpadding="10" cellspacing="1" width="1000">
            <tr bgcolor="#FBB917" align="center">
                <td width="33%"><b>Created :</b> <?php echo substr ($dp[created_at], 0, 10); ?></td>
                <td width="34%"><b>Duration :</b> <?php echo substr ($dp[start_date], 0, 10)." - ".substr ($dp[end_date], 0, 10); ?></td>
                <td width="33%"><b>Cost :</b> <?php echo "BDT ".$dp[amount_bdt]." | USD ".$dp[amount_usd]; ?></td>
            </tr>
            <tr bgcolor="#FBB917" align="center">
                <td><b>Total Doctor :</b> <?php echo $total_doctor; ?></td>
                <td><b>Total Paid :</b> <?php echo $total_paid; ?></td>
                <td><b>Total Unpaid :</b> <?php echo $total_unpaid; ?></td>
            </tr>
            <tr bgcolor="#FBB917" align="center">
                <td><b>Completed Exam :</b> <?php echo $total_com_exam; ?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
        </font>
        <br>
        <?php } ?>
        <center>
            <a href="https://banglamedexam.com/package_result.php?pid=<?php echo $package_id; ?>">Show Package Result</a><br><br>
        </center>
        
        
        <font size="2">
        
        <table border="0" align="center" cellpadding="2" cellspacing="1" width="1000">
            <tr align="center">
                <td colspan="4" align="left"><b>Paid List</b></td>
            </tr>
            <tr bgcolor="#b2d599" align="center">
                <td width="20"><b>#</b></td>
                <td width="250" align="left"><b>Doctor Name</b></td>
                <td width="100" align="center"><b>Mobile</b></td>
                <td align="left"><b>Medical College</b></td>
            </tr>
            <?php
                $sl=1;
                $qpaid = mysqli_query($link, "SELECT * FROM oe_doc_purchases WHERE package_ids LIKE '%$package_id%' and payment_status = '1' "); 
                while($dpaid = mysqli_fetch_array($qpaid)) {
    	    ?>
            <tr bgcolor="#b2d5ee" align="center">
                <td><?php echo $sl; ?></td>
                <td align="left"><?php $qdn = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$dpaid[doc_id]'"); while($ddn = mysqli_fetch_array($qdn)) { echo $ddn[name]; $mcid=$ddn[medical_college]; } ?></td>
                <td align="center"><?php $qdn = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$dpaid[doc_id]'"); while($ddn = mysqli_fetch_array($qdn)) { echo $ddn[phone]; } ?></td>
                <td align="left"><?php $qsn = mysqli_query($link, "SELECT * FROM oe_medical_college WHERE id = '$mcid'"); while($dsn = mysqli_fetch_array($qsn)) { echo $dsn[name]; } ?></td>
            </tr>
            <?php $sl=$sl+1; } ?>
        </table>
        
        <br><br>
        
        <table border="0" align="center" cellpadding="2" cellspacing="1" width="1000">
            <tr align="center">
                <td colspan="4" align="left"><b>Unpaid List</b></td>
            </tr>
            <tr bgcolor="#b2d599" align="center">
                <td width="20"><b>#</b></td>
                <td width="250" align="left"><b>Doctor Name</b></td>
                <td width="100" align="center"><b>Mobile</b></td>
                <td align="left"><b>Medical College</b></td>
            </tr>
            <?php
                $sl=1;
                $qpaid = mysqli_query($link, "SELECT * FROM oe_doc_purchases WHERE package_ids LIKE '%$package_id%' and payment_status = '0' "); 
                while($dpaid = mysqli_fetch_array($qpaid)) {
    	    ?>
            <tr bgcolor="#b2d5ee" align="center">
                <td><?php echo $sl; ?></td>
                <td align="left"><?php $qdn = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$dpaid[doc_id]'"); while($ddn = mysqli_fetch_array($qdn)) { echo $ddn[name]; } ?></td>
                <td align="center"><?php $qdn = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$dpaid[doc_id]'"); while($ddn = mysqli_fetch_array($qdn)) { echo $ddn[phone]; } ?></td>
                <td align="left"><?php $qsn = mysqli_query($link, "SELECT * FROM oe_medical_college WHERE id = '$dpaid[medical_college]'"); while($dsn = mysqli_fetch_array($qsn)) { echo $dsn[name]; } ?></td>
            </tr>
            <?php $sl=$sl+1; } ?>
        </table>
        
        <br><br>
        </font>
        
        
    </font>  
    </body>
</html>














































