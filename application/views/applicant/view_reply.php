<?php
$this->load->view( 'header/view_header' );
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel panel-info">
                        <header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                            Complain Reply 
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h4 class="widget-title">
                                    <h4 class="widget-title">Reply to <span></span></h4>
                                    <?php
                                        if(isset($_POST['reply']))
                                        {
                                            if ( ($_POST['complain_id'] != "" ) && ( $_POST['email'] != "" ) && ( $_POST['details'] != "" ) )
                                            {
                                               
                                                $pdate          = date("Y-m-d");
                                                $ptime          = date("H:i:s");
                                                $idd = $this->session->userdata( 'user_id' );
                                                
                                                if(!empty($_FILES['filee']['name'])){
                                                    $url = base_url();
                                                    $f_name = $_FILES['filee']['name'];
                                                    $f_name = stripslashes($f_name);
                                                    $f_name = strtolower($f_name);
                                                    if(strlen($f_name) > 8) {
                                                        $f_name = substr($f_name, -8);  
                                                    }
                                                    $f_name = date("Y_m_d") . "_" . time() . "_" . rand(1000, 9999) ."_". $f_name;
                                                    move_uploaded_file($_FILES["filee"]["tmp_name"],"./upload/pic/".$f_name);
                                                    $filee = "upload/pic/".$f_name;
                                                    //$this->data['filee'] = $filee; 
                                			    }
                                			    else {
                                			        $filee = "";
                                			    }
                                                
                                                $sql = "INSERT INTO reply (complain_id, email, details, byy, pdate, ptime, sts, filee) VALUES ('$_POST[complain_id]', '$_POST[email]', '$_POST[details]', '$idd', '$pdate', '$ptime', '1', '$filee');";
                                                
                                                $query=$this->db->query($sql);
                                                if($query){
                                                    echo "<font color='green'>Success!</font> <a href='".base_url( 'applicant/complain' )."'>Back Now</a><br><br>";
                                                    
                                                    $sql = "update oe_feedbacks SET status='2' where id = '$_POST[complain_id]'";
                                                    $query=$this->db->query($sql);
                                                }
                                                else{
                                                    echo "<font color='red'>NOT Success!, Try Again.</font>";
                                                }
                                            }
                                            else 
                                            {
                                                echo "<font color='red'>Please Fill The Form Correctly.</font>";
                                            }
                                        }
                                    ?>
                                    
                                <span></span></h4>
                                
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="100"><strong>Email</strong></td>
                                            <td width="300"> <?= $complain_id->email; ?></td>
                                            <td width="150"><strong>Complain ID</strong></td>
                                            <td><?= $complain_id->id; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- Column -->
                            
                            <?php //$id = $this->session->user->id; ?>
                            
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    
                                    <table class="table default table-bordered">
                                        <tbody>
                                        
                                        <tr>
                                            <td width="100"><strong>Complain <span class="jnn-important">*</span></strong></td>
                                            <td>
                                                <?= base64_decode ( $complain_id->message ); ?>
                                                <br>
                                                <?php 
                                                    if($complain_id->filee!=""){
    										            echo "<a href='".base_url().$complain_id->filee."' target='_blank' style='color:red;'>View Attached File</a>";
    										        }
    										    ?>
                                                
                                                <?php 
    											  	$sql="SELECT * FROM reply WHERE sts = '1' AND complain_id = '$complain_id->id' ORDER BY id ASC";
    											    $query = $this->db->query($sql);
    											    if ($query->num_rows() > 0) {
    											        echo "<br><br><font color='Orange' size='3'>Replied : </font><br>";
      													$sl=1;
      													foreach ($query->result() as $row) {
      														echo $sl.". ".$row->details."<br>";
      													
                                                            if($row->filee!=""){
            										            echo "<a href='".base_url().$row->filee."' target='_blank' style='color:red;'>View Attached File</a>";
            										        }
    										                echo "<br>";
      													$sl=$sl+1;
      													}
      												}
    											?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Reply Now</strong></td>
                                            <td>
                                                <input type="hidden" name="complain_id" value="<?php echo $complain_id->id; ?>">
                                                <input type="hidden" name="email" value="<?php echo $complain_id->email; ?>">
                                                <textarea name="details" class="input-name form-control" required></textarea><br>
                                                Attach a file, if needed.
                                                <input type="file" name="filee">
                                                
                                            </td>
                                        </tr>
                                                                                
                                        </tbody>
                                    </table>
                                </div><!-- Column -->

                                <div class="col-md-2 pull-left">
                                    <button class="btn bg-green btn-lg btn-block" type="submit" name="reply" onclick="submit_form(this, event)">
                                        Send Reply
                                    </button>
                                </div>
                            </form>

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