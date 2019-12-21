
<!doctype html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Exam History</title>
    </head>
    <body>

<?php 
    
    $link = mysqli_connect ("localhost", "genesisedu_zzz", "Dhaka@#12044");
    mysqli_select_db ($link, "genesise_banglamedexam");
    $id = $_GET['id']; 
    
    ?>

<table border="0" align="center" cellpadding="2" cellspacing="0" width="1000">
    <tr align="center">
        <td width="200"><img src="upload/pic/med.png" width="100" height="100"></td>
        <td><font face="Verdana" size="6">BANGLAMED EXAM</font><br><font face="Verdana" size="4">Exam History</font></td>
        <td width="200"></td>
    </tr>
    <tr>
        <td colspan="3"><hr></td>
    </tr>
</table>

<?php 
    $qn = mysqli_query($link, "SELECT * FROM oe_doc_master WHERE id = '$id'");
	while($dn = mysqli_fetch_array($qn)){
?>

<font face="Verdana" size="3">
<table border="0" align="center" cellpadding="2" cellspacing="0" width="1000">
    <tr>
        <td width="500">Name : <?php echo $dn[name]; ?></td>
        <td align="right">Email : <?php echo $dn[username]; ?></td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
</table>
</font>

<?php } ?>

<font size="2" face="Verdana">
<table border="1" align="center" cellpadding="2" cellspacing="0" width="1000">
    <tr bgcolor="#b2d5ee" align="center">
        <td width="20"> #</td>
        <td> Exam Name</td>
        <td width="100"> Exam Type</td>
        <td width="100"> Subject</td>
        <td width="80"> Date</td>
        <!--td width="50"> Duration</td-->
        <td width="50"> Correct Mark</td>
        <td width="50"> Wrong Mark</td>
        <td width="50"> Obtained Mark</td>
        <td width="50"> Highest Mark</td>
        <td width="50"> Overall Position</td>
        <td width="50"> Subject Position</td>
        <!--<td width="50"> Candidate Position</td>-->
    </tr>
<?php
	
	$id = $_GET['id'];
	$sl=1;
	$sql="SELECT * FROM oe_doc_exams WHERE status = '1' AND doc_id = '$id' ORDER BY attend_date DESC";
	$query = mysqli_query($link, $sql);
	while($d = mysqli_fetch_array($query)){
	    $exam_id = $d[exam_id];
	    $subject_id = $d[subject_id];
	    $candidate = $d[candidate];
?>
    <tr align="center" bgcolor="#ececec">
        <td><?php echo $sl; ?></td>
        <td align="left">
            <?php
                //exam name
                $q2 = mysqli_query($link, "SELECT * FROM oe_exam WHERE id = '$exam_id'");
	            while($d2 = mysqli_fetch_array($q2)){
	                echo $d2[exam_name];
	                //echo $d2[exam_name]."/".$exam_id;
	                $t_id = $d2[exam_id];
	            }
            ?>
        </td>
        <td>
            <?php
                //exam Type
                $q3 = mysqli_query($link, "SELECT * FROM sif_exam_category WHERE id = '$t_id'");
	            while($d3 = mysqli_fetch_array($q3)){
	                echo $d3[exam_category_name];
	            }
            ?>
        </td>
        <td>
            <?php
                //subject name
                $q4 = mysqli_query($link, "SELECT * FROM sif_subject WHERE id = '$subject_id'");
	            while($d4 = mysqli_fetch_array($q4)){
	                echo $d4[subject];
	                //echo $d4[subject]."/".$subject_id;
	            }
            ?>
        </td>
        <td><?php echo $d[attend_date]; ?></td>
        <!--td><?php echo $d[duration]; ?></td-->
        <td><?php echo $d[correct_mark]; ?></td>
        <td><?php echo $d[wrong_mark]; ?></td>
        <td><?php echo $d[final_mark]; ?></td>
        <td>
            <?php
                //Highest Mark
                $q5 = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE exam_id = '$exam_id' ORDER BY final_mark DESC LIMIT 1");
	            while($d5 = mysqli_fetch_array($q5)){
	                echo $d5[final_mark];
	            }
            ?>
        </td>
        <td>
            <?php 
                
                //Overall Position
                $op=1;
                $q7 = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE status = '1' AND subject_id = '$subject_id' ORDER BY final_mark DESC");
	            while($d7 = mysqli_fetch_array($q7)){
	                
	                if ($d7[doc_id]==$id){
	                    $opp = $op;
	                }
	                $op=$op+1;
	            }
	            echo $opp;
	            
                //echo $d[subject_pos]; 
            ?>
        </td>
        <td>
            <?php
                //Subject Position
                $sp=1;
                $q6 = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE status = '1' AND exam_id = '$exam_id' AND subject_id = '$subject_id' ORDER BY final_mark DESC");
	            while($d6 = mysqli_fetch_array($q6)){
	                
	                if ($d6[doc_id]==$id){
	                    $spp = $sp;
	                }
	                $sp=$sp+1;
	            }
	            echo $spp;
            ?>
        </td>
        <!--
        <td>
            <?php
                //Candidate Position
                $sp7=1;
                $q7 = mysqli_query($link, "SELECT * FROM oe_doc_exams WHERE status = '1' AND candidate = '$candidate' AND exam_id = '$exam_id' ORDER BY final_mark DESC");
	            while($d7 = mysqli_fetch_array($q7)){
	                $tc = mysqli_affected_rows($link);
	            }
	            if ($candidate == 1) {echo $t="G-"; }
	            if ($candidate == 2) {echo $t="P-"; }
	            if ($candidate == 3) {echo $t="B-"; }
	            
	            if ($t!="") {
	                echo $tc;
	            }
            ?>
        </td>
        -->
        
    </tr>
<?php $sl=$sl+1; } ?>

</table>
</font>

<br>

    </body>
</html>



























