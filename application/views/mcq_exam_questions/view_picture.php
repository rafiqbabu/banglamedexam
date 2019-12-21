<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'm/d/Y' );
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        
                        <?php echo $title; //from controllers/Exam_question.php (function Name : question_pic) ?> <br>
                        
                        <?php
                            if (isset($_POST['upload'])){
                                if (($_FILES['pic']['type'] == 'image/jpeg') || ($_FILES['pic']['type'] == 'image/gif') || ($_FILES['pic']['type'] == 'image/png')) {
                                    $url = base_url();
                                    $f_name = $_FILES['pic']['name'];
                                    $f_name = stripslashes($f_name);
                                    $f_name = strtolower($f_name);
                                    if(strlen($f_name) > 8) {
                                        $f_name = substr($f_name, -8);  
                                    }
                                    $f_name = date("Y_m_d") . "_" . time() . "_" . rand(1000, 9999) ."_". $f_name;
                                    move_uploaded_file($_FILES["pic"]["tmp_name"],"./upload/pic/".$f_name);
                                    $pic_file = "upload/pic/".$f_name;
                                    $pdate = date("Y-m-d");
                                    $sql = "INSERT INTO bme_pic (pic_file, sts, pdate, uid) VALUES ('$pic_file', '1', '$pdate', '0');";
                                    $query=$this->db->query($sql);
                                    if ($query){
                                        echo "<font color='green'>Picture Uploaded Success!</font>";            
                                    }
                                    else {
                                        echo "<font color='red'>NOT Success!</font>" . mysql_error();
                                    }
                                }
                            } 
                        ?>

                        <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal " id="commentForm" role="form" method="post" enctype="multipart/form-data" action="">  
                                
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Select Picture</label>
                                    <div class="col-lg-2">
                                        <input type="file" name="pic" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-2">
                                        <button class="btn btn-primary" type="submit" name="upload">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        Uploaded Pictures
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:"></a>
                            <a class="fa fa-cog" href="javascript:"></a>
                            <a class="fa fa-times" href="javascript:"></a>
                         </span>
                        
                    </header>
                    <div class="panel-body">
                        <?php
                            $sql="SELECT * FROM bme_pic WHERE sts = '1' ORDER BY pic_id DESC";
                            $query = $this->db->query($sql);
                                foreach ($query->result() as $row) { 
                        ?>
                        <img src="<?php echo base_url().$row->pic_file; ?>" width="100" height="60">
                        <?php } ?>
                        
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
$this->load->view( 'footer/view_footer' );
?>    
