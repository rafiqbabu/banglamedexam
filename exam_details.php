<!DOCTYPE HTML>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Exam Details</title>
    </head>
    <body>
    <font face="Verdana">
        
        <?php 
            $exam_id = $_GET['eid']; 
            $link = mysqli_connect ("localhost", "genesisedu_zzz", "Dhaka@#12044");
            mysqli_select_db ($link, "genesise_banglamedexam");
            
            $qmcq = mysqli_query($link, "SELECT * FROM oe_exam_question WHERE exam_ref_id = '$exam_id' AND question_type_id = '2' "); while($dmcq = mysqli_fetch_array($qmcq)) { $total_mcq = mysqli_affected_rows($link); }
            $qsba = mysqli_query($link, "SELECT * FROM oe_exam_question WHERE exam_ref_id = '$exam_id' AND question_type_id = '1' "); while($dsba = mysqli_fetch_array($qsba)) { $total_sba = mysqli_affected_rows($link); }
            
            $qec = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE exam_id = '$exam_id' AND status = '1' "); while($dec = mysqli_fetch_array($qec)) { $total_ec = mysqli_affected_rows($link); }
        ?>
        
        
        <table border="0" align="center" cellpadding="2" cellspacing="0" width="1000">
            <tr align="center">
                <td width="200"><img src="upload/pic/med.png" width="100" height="100"></td>
                <td><font face="Verdana" size="6">BANGLAMED EXAM</font><br><font face="Verdana" size="4">Exam Details</font></td>
                <td width="200"></td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>
        </table>
        
        
        <?php
            $qen = mysqli_query($link, "SELECT * FROM oe_exam WHERE id = '$exam_id' LIMIT 1");
	        while($den = mysqli_fetch_array($qen)){
	    ?>
        <table border="0" align="center" cellpadding="2" cellspacing="0" width="1000">
            <tr>
                <td><b>Exam Name :</b> <?php echo $den[exam_name]; ?></td>
            </tr>
            <tr>
                <td><hr></td>
            </tr>
        </table>
        
        <font size="2">
        <table border="0" align="center" cellpadding="10" cellspacing="1" width="1000">
            
            <tr bgcolor="#FBB917" align="center">
                <td width="50%"><b>Course : </b> <?php $qcourse = mysqli_query($link, "SELECT * FROM sif_course WHERE id = '$den[course_id]' "); while($dcourse = mysqli_fetch_array($qcourse)) { echo $dcourse[course_name]; } ?></td>
                <td width="50%">
                    <b>Subject : </b> 
                    <?php 
                        if ($den[subject_id]!=0){
                            $qsub = mysqli_query($link, "SELECT * FROM sif_subject WHERE id = '$den[subject_id]' "); while($dsub = mysqli_fetch_array($qsub)) { echo $dsub[subject]; } 
                        }
                        else {
                            echo "This Exam for All Subjects";
                        }
                    ?>
                </td>
            </tr>
            
            <tr bgcolor="#FBB917" align="center">
                <td><b>Total MCQ :</b> <?php echo $total_mcq; ?></td>
                <td><b>Total SBA :</b> <?php echo $total_sba; ?></td>
            </tr>
            
            <tr bgcolor="#FBB917" align="center">
                <td><b>Exam Completed :</b> <?php echo $total_ec; ?></td>
                <td>&nbsp;</td>
            </tr>
            
            <tr bgcolor="#FBB917" align="center">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            
        </table>
        </font>
        <br><br>
        <?php } ?>
        
        <center><div style="background-color:#FDD7E4; width:200px; padding:15px; border-radius:10px 0px 10px 0px;">Exam Result</div></center>
        <br>
        
        <font size="2">
        <table border="0" align="center" cellpadding="2" cellspacing="1" width="1000">
            
            <tr bgcolor="#b2d599" align="center">
                <td width="20"><b>#</b></td>
                <td width="200" align="left"><b>Doctor Name</b></td>
                <td width="100" align="left"><b>Mobile</b></td>
                <td width="70" align="left"><b>Reg. No.</b></td>
                <td><b>Subject</b></td>
                <td width="80"><b>Date</b></td>
                <td width="50">Correct Mark</td>
                <td width="50">Wrong Mark</td>
                <td width="50">Obtained Mark</td>
                <td width="50">Highest Mark</td>
                <td width="50">Exam Position</td>
                <!--
                <td width="50">Overall Position</td>
                <td width="50"> Candidate Position</td>
                -->
            </tr>
            
            
            <?php
                $sl=1;
                $qe = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE exam_id = '$exam_id' AND status = '1' ORDER BY final_mark DESC");
    	        while($de = mysqli_fetch_array($qe)){
    	            $doc_id = $de[doc_id];
    	    ?>
            <tr bgcolor="#b2d5ee" align="center">
                <td><?php echo $sl; ?></td>
                <td align="left"><?php $qdn = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$de[doc_id]'"); while($ddn = mysqli_fetch_array($qdn)) { echo $ddn[name]; } ?></td>
                <td align="left"><?php $qde = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$de[doc_id]'"); while($dde = mysqli_fetch_array($qde)) { echo $dde[phone]; } ?></td>
                <td align="left"><?php $qde = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$de[doc_id]'"); while($dde = mysqli_fetch_array($qde)) { echo $dde[reg_no]; } ?></td>
                <td><?php $qsn = mysqli_query($link, "SELECT * FROM sif_subject WHERE id = '$de[subject_id]'"); while($dsn = mysqli_fetch_array($qsn)) { echo $dsn[subject]; } ?></td>
                
                <td><?php echo $de[attend_date]; ?></td>
                <td><?php echo $de[correct_mark]; ?></td>
                <td><?php echo $de[wrong_mark]; ?></td>
                <td><?php echo $de[final_mark]; ?></td>
                <td>
                    <?php 
                        //Highest Mark
                        $qhm = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE exam_id = '$exam_id' AND status = '1' ORDER BY final_mark DESC LIMIT 1"); 
                        while($dhm = mysqli_fetch_array($qhm)) { 
                            echo $dhm[final_mark]; 
                        } 
                    ?>
                </td>
                <td>
                    <?php 
                        //exam position
                        $sp=1;
                        $qhm = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE exam_id = '$exam_id' AND status = '1' ORDER BY final_mark DESC"); 
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
                <!--
                <td width="50"> Overall Position</td>
                <td width="50"> Candidate Position</td>
                -->
            </tr>
            <?php $sl=$sl+1; } ?>
            
        </table>
        <br><br><br><br>
        </font>
        
        
    </font>  
    </body>
</html>

