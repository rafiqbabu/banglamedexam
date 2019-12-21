<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php $this->load->view( 'web/header/header_top' ); ?>
<!-- Page Main -->
<div role="main" class="main">
	<!-- Section -->
	<section class="bg-grey typo-dark">
		<div class="container">
			<div class="row">
				<!-- Column -->
				<div class="col-sm-8 col-md-offset-2">
					<div class="contact-info">
						<div class="info-icon bg-dark">
							<i class="uni-fountain-pen"></i>
						</div>
						<?php 
							//echo $this->session->userdata( 'user' )->id."<br>";  
							if ( empty( $this->session->userdata( 'user' )->id ) ) {
								echo "Please <a href='".site_url( 'user-login' )."'>Login</a> First !";
								echo "<br><br>";
								echo "If Not Registered! Please <a href='".site_url( 'registration' )."'>Register</a> Your Self.";
							}
							else {
								echo "Welcome : ".$this->session->userdata( 'user' )->name."<br><font color='red' size='4'>Disclaimer:</font><br>";
								
								echo "1. You must have a valid BMDC registration number to get the reply in your inbox.<br>";
								echo "2. Submit your query specifically.<br>";
								echo "3. You can attach screenshots, PDF or Word File associate your problems.<br>";
								echo "4. We may need saveral ours to solve your problem of complain.<br>";
								echo "5. For critical problem: 24-48 ours may required.<br>";
								echo "6. You can delete your complain after having the solutions (optional).<br>";
						?>
                        <br>
                        
                        <?php
                            if(!empty($bmdc_no)){
                               
                                //Update BMDC No at oe_doc_master table
                                $sql = "update oe_doc_master SET bmdc_no='$bmdc_no' where id='$uid'";
                                $query=$this->db->query($sql);
                                
                			    //if (($_FILES['filee']['type'] == 'image/jpeg') || ($_FILES['filee']['type'] == 'image/gif') || ($_FILES['filee']['type'] == 'image/png')) {
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
                			    
                                $sql = "INSERT INTO oe_feedbacks (name, email, message, status, created_at, updated_at, filee) 
                                        VALUES ('$name', '$email', '$message', '$status', '$created_at', '$created_at', '$filee');";
                                $query=$this->db->query($sql);
                                if ($query){
                                    echo "<font color='green' size='4'>Success!</font>";
                                }
                                else {
                                    echo "<font color='red'>NOT Success!</font>" . mysql_error();
                                }
                            }
                            
                                $sql="SELECT * FROM oe_doc_master WHERE id = '$user_id'";
    						    $query = $this->db->query($sql);
    						    if ($query->num_rows() > 0) {
    						        foreach ($query->result() as $row) {
      									$b_no = $row->bmdc_no;
    						        }
    						    }
                        ?>
                        
                        
						<form method="post" action="<?= current_url(); ?>" enctype="multipart/form-data">
							
							<input type="hidden" name="uid" value="<?php echo $this->session->userdata( 'user' )->id; ?>" size="10" required>
							
							<input type="text" name="bmdc_no" value="<?php echo $b_no; ?>" size="10" required>
							
							<div class="input-text form-group">
								<input type="hidden" name="name" class="input-name form-control" value="<?php echo $this->session->userdata( 'user' )->name; ?>" readonly>
							</div>
							
							<div class="input-email form-group">
								<input type="hidden" name="email" class="input-email form-control" value="<?php echo $this->session->userdata( 'user' )->email; ?>" readonly>
							</div>
							
							<div class="textarea-message form-group">
								<textarea name="message" class="textarea-message form-control" placeholder="Write Your Complain Here" rows="5"></textarea>
							</div>
							
							
							<div class="input-email form-group">
								Attach a file, If needed : <input type="file" name="filee" class="input-email form-control">
							</div>
							
							
							<input class="btn btn-lg bg-green" type="submit" name="submit" value="Send Now">
							<!--<button class="btn btn-lg bg-green" type="submit" onclick="submit_form(this, event)">Send Now</button>-->
						</form>
					
						<?php } ?>
					</div>
				</div><!-- Column -->
			
			</div><!-- Row -->
		</div><!-- Container -->
	</section><!-- Section -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
<script type="text/javascript">
	window.onload = MapLoadScript;
</script>













































