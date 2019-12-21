    <!DOCTYPE HTML>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Package Result</title>
    </head>
    <body>
        
    <font face="Verdana">
        
        <?php 
            $package_id = $_GET['pid']; 
            $link = mysqli_connect ("localhost", "genesisedu_zzz", "Dhaka@#12044");
            mysqli_select_db ($link, "genesise_banglamedexam");
            
            $qtd = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE package_id = '$package_id' AND p_sts = '1' GROUP BY doc_id"); while($dtd = mysqli_fetch_array($qtd)) { $total_doctor = mysqli_affected_rows($link); }
            $qte = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE package_id = '$package_id' GROUP BY exam_id"); while($dte = mysqli_fetch_array($qte)) { $total_exam = mysqli_affected_rows($link); }
            $qtce = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE package_id = '$package_id' AND status = '1'"); while($dtce = mysqli_fetch_array($qtce)) { $total_com_exam = mysqli_affected_rows($link); }
        ?>
        
        
        <table border="0" align="center" cellpadding="2" cellspacing="0" width="1000">
            <tr align="center">
                <td width="200"><img src="upload/pic/med.png" width="100" height="100"></td>
                <td><font face="Verdana" size="6">BANGLAMED EXAM</font><br><font face="Verdana" size="4">Package Result</font></td>
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
                <td><b>Complete Exam :</b> <?php echo $total_com_exam; ?></td>
                <td><!--<b>Total Exam :</b> <?php echo $total_exam; ?>-->&nbsp;</td>
            </tr>
        </table>
        </font>
        <br>
        <?php } ?>
        
        
        <font size="2">
          
          
          
          
          
            
        <table border="0" align="center" cellpadding="2" cellspacing="1" width="1000">
            <tr align="left">
                <td colspan="10"><b>Complete Exams</b></td>
            </tr>
            <tr bgcolor="#b2d599" align="center">
                <td width="20"><b>#</b></td>
                <td width="200" align="left"><b>Doctor Name</b></td>
                <td align="left"><b>Exam Name</b></td>
                <td width="100"><b>Subject</b></td>
                <td width="80"><b>Date</b></td>
                <td width="50">Correct Mark</td>
                <td width="50">Wrong Mark</td>
                <td width="50">Obtained Mark</td>
                <td width="50">Highest Mark</td>
                <td width="50">Exam Position</td>
            </tr>
            <?php
                $sl=1;
                $qe = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE package_id = '$package_id' AND status = '1' ORDER BY exam_id DESC");
    	        while($de = mysqli_fetch_array($qe)){
    	            $doc_id = $de[doc_id];
    	    ?>
            <tr bgcolor="#b2d5ee" align="center">
                <td width="20"><?php echo $sl; ?></td>
                <td width="200" align="left"><?php $qdn = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$de[doc_id]'"); while($ddn = mysqli_fetch_array($qdn)) { echo $ddn[name]; } ?></td>
                <td align="left"><?php $qen = mysqli_query($link, "SELECT * FROM oe_exam WHERE id = '$de[exam_id]'"); while($den = mysqli_fetch_array($qen)) { echo $den[exam_name]; } ?></td>
                <td width="100"><?php $qsn = mysqli_query($link, "SELECT * FROM sif_subject WHERE id = '$de[subject_id]'"); while($dsn = mysqli_fetch_array($qsn)) { echo $dsn[subject]; } ?></td>
                <td width="80"><?php echo $de[attend_date]; ?></td>
                <td width="50"><?php echo $de[correct_mark]; ?></td>
                <td width="50"><?php echo $de[wrong_mark]; ?></td>
                <td width="50"><?php echo $de[final_mark]; ?></td>
                <td width="50"><?php $qhm = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE package_id = '$package_id' AND exam_id = '$de[exam_id]' AND status = '1' ORDER BY final_mark DESC LIMIT 1"); while($dhm = mysqli_fetch_array($qhm)) { echo $dhm[final_mark]; } ?></td>
                <td width="50">
                    <?php 
                        //exam position
                        $sp=1;
                        $qhm = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE package_id = '$package_id' AND exam_id = '$de[exam_id]' AND status = '1' ORDER BY final_mark DESC"); 
                        while($dhm = mysqli_fetch_array($qhm)) { 
                            //echo $dhm[final_mark];
                            if ($dhm[doc_id]==$doc_id){
        	                    $spp = $sp;
        	                }
        	                $sp=$sp+1;
                        }
                        echo $spp;
                    ?>
                </td>
            </tr>
            <?php $sl=$sl+1; } ?>
        </table>
        
        
        
        
        
        
        <br><br>
        
        <table border="0" align="center" cellpadding="2" cellspacing="1" width="1000">
            <tr align="left">
                <td colspan="10"><b>Incomplete Exams</b></td>
            </tr>
            <tr bgcolor="#b2d599" align="center">
                <td width="20"><b>sl</b></td>
                <td width="20"><b>#</b></td>
                <td width="300" align="left"><b>Doctor Name</b></td>
                <td width="100" align="left"><b>Mobile</b></td>
                <td align="left"><b>Exam Name</b></td>
                <td width="100"><b>Subject</b></td>
                <td width="80"><b>Date</b></td>
               
            </tr>
            <?php
                $sl=1;
                
                $qe = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE package_id = '$package_id' AND status != '1' AND p_sts = '1' ORDER BY exam_id DESC");
    	        while($de = mysqli_fetch_array($qe)){
    	            $doc_id = $de[doc_id];
    	    ?>
            <tr bgcolor="#b2d5ee" align="center">
                <td><?php echo $sl; ?></td>
                <td><?php echo $de[id]; ?></td>
                <td align="left"><?php $qdn = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$de[doc_id]'"); while($ddn = mysqli_fetch_array($qdn)) { echo $ddn[name]." (".$ddn[id].")"; } ?></td>
                <td align="left"><?php $qdn = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$de[doc_id]'"); while($ddn = mysqli_fetch_array($qdn)) { echo $ddn[phone]; } ?></td>
                <td align="left"><?php $qen = mysqli_query($link, "SELECT * FROM oe_exam WHERE id = '$de[exam_id]'"); while($den = mysqli_fetch_array($qen)) { echo $den[exam_name]; } ?></td>
                <td><?php $qsn = mysqli_query($link, "SELECT * FROM sif_subject WHERE id = '$de[subject_id]'"); while($dsn = mysqli_fetch_array($qsn)) { echo $dsn[subject]; } ?></td>
                <td><?php echo $de[attend_date]; ?></td>
                
            </tr>
            <?php $sl=$sl+1; } ?>
        </table>
        
        
        
        <br><br><br><br>
        </font>
        
    </font>  
    </body>
</html>














































