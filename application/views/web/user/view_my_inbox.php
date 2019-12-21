<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php $this->load->view( 'web/header/header_top' ); ?>
<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey team-single">
		<!-- Container -->
		<div class="container" height="auto">
			<div class="row">
				<!-- Sidebar -->
				<?php $this->load->view( 'web/elements/view_sidebar' ); ?>
				<?php $email = $this->session->user->username; ?>
				<!-- Page Content -->
				
				<div class="col-md-9" id="i">
					<div class="widget profile-widget">
						<br><br>
						<?php echo $msg; ?>
						<h4 class="widget-title"><?php echo $page_title; ?><span></span></h4>
							
							<?php 
							    if (isset($_GET['complain_id'])){
							        //echo $complain_id; 
							        
							        $sql = "update oe_feedbacks SET status='0' where id='$complain_id'";
                                    $query=$this->db->query($sql);
                                    
                                    if($query){
                                        echo "<font color='green'>Deleted Success!</font> <br><br>";
                                    }
                                    else{
                                        echo "<font color='red'>NOT Success!, Try Again.</font>";
                                    }
							        
							    }
							?>
							
							<?php 
							  	$sql="SELECT * FROM oe_feedbacks WHERE email = '$email' AND status != '0' ORDER BY id DESC";
							    $query = $this->db->query($sql);
							    if ($query->num_rows() > 0) {
  									
  									foreach ($query->result() as $row) {
  									echo "<div style='background-color:#EBF4FA; padding:10px;'>";
  										    $dt = $row->created_at;
  										    $dt = str_replace(' ', ' Time : ', $dt);
  										    
  										    echo "<font color='Red'>My Complain : </font><span class='btn btn-xs bg-green'>Date : {$dt}</span> <span class='btn btn-xs bg-red'><a alert('Are You Comfirm! Delete This Complain.'); href='".site_url( "user/{$user->id}/my-inbox" )."?complain_id={$row->id}' style='color:#ffffff;'>Delete this Complain</a></span><br>";
  										    echo base64_decode( $row->message );
  										    if($row->filee!=""){
									            echo "<br>[<a href='".base_url().$row->filee."' target='_blank' style='color:red;'>View Attached File</a>] ";
									        }
  									
  										$sql="SELECT * FROM reply WHERE complain_id = '$row->id' AND sts != '0' ORDER BY id ASC";
        							    $query = $this->db->query($sql);
        							    if ($query->num_rows() > 0) {
          									$sl=1;
          									echo "<br><br><font color='Orange'>Replied to me :</font>";
          									foreach ($query->result() as $row2) {
          										    echo "<br>".$sl.". ".$row2->details;
          										    if($row2->filee!=""){
    										            echo " [<a href='".base_url().$row2->filee."' target='_blank' style='color:red;'>View Attached File</a>] ";
    										        }
          										    echo " <span class='btn btn-xs bg-blue'>Date : {$row2->pdate} Time : {$row2->ptime}</span><br>";
          										$sl=$sl+1;
          									}
          								}
          								
  									echo "</div><br>";	
  									}
  									
  								}
							?>
		
					</div>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
