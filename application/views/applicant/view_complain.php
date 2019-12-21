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
						Complain List
						<span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:"></a>
                            <a class="fa fa-cog" href="javascript:"></a>
                            <a class="fa fa-times" href="javascript:"></a>
                        </span>
					</header>
					<div class="panel-body">
						
						<div class="clearfix"></div>
						
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th width="100">Date & Time</th>
								<th width="200">Name</th>
								<th>Email</th>
								<th>Complain</th>
								<th width="70">Status</th>
								<th width="70">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if ( !empty( $all_complain ) ) {
								foreach ( $all_complain as $key => $value ) {
									
									if ( $value->status==1 || $value->status==2 ) {
										$key++;
										?>
										<tr>
											<td><?= $key; ?></td>
											<td><?php echo $value->created_at; ?></td>
											<td>
											    <?php 
											        echo $value->name; 
											        $sql="SELECT * FROM oe_doc_master WHERE email = '$value->email'";
                        						    $query = $this->db->query($sql);
                        						    if ($query->num_rows() > 0) {
                        						        foreach ($query->result() as $rowm) {
                          									echo "<br>".$rowm->phone;
                        						        }
                        						    }
											    ?>
										    </td>
											<td>
											    <?php 
											        echo $value->email; 
											        $sql="SELECT * FROM oe_doc_master WHERE email = '$value->email'";
                        						    $query = $this->db->query($sql);
                        						    if ($query->num_rows() > 0) {
                        						        foreach ($query->result() as $row) {
                          									echo "<br>BMDC No. : ".$row->bmdc_no;
                        						        }
                        						    }
											    ?>
											</td>
											
											<td>
											    <?php 
											        $str = $value->message; 
											        echo base64_decode($str)."<br>";
											        if($value->filee!=""){
											            echo "<a href='".base_url().$value->filee."' target='_blank' style='color:red;'>View Attached File</a>";
											        }
											    ?>
											</td>
																					
											<td class="text-center">
												<?php
												if ( $value->status == '1' ) {
													echo '<span class="label label-danger">NOT Reply</span>';
												} else {
													$sql="SELECT * FROM reply WHERE sts = '1' AND complain_id = '$value->id' ORDER BY id ASC LIMIT 1";
    											    $query = $this->db->query($sql);
    											    foreach ($query->result() as $row) {
    											        if ($query->num_rows() > 0) {
        											        $sql="SELECT * FROM sif_users WHERE id = '$row->byy'";
        											        $query = $this->db->query($sql);
        											        foreach ($query->result() as $row2) {
        											            echo "<span class='btn btn-success btn-xs'>Replied by<br>{$row2->first_name}</span>";    
        											        }
    											        }
    											    }
												}
												?>
											</td>
											<td>
												<!--new
												<a href="<?= site_url( "applicant/update_userr/{$value->id}" ) ?>" class="btn btn-success btn-xs" title="Update" data-toggle="tooltip" data-placement="top">
													<i class="glyphicon glyphicon-edit"></i> Update
												</a>
												-->
												<a href="<?= site_url( "applicant/complain_reply/{$value->id}" ) ?>" class="btn btn-success btn-xs" title="Update" data-toggle="tooltip" data-placement="top">
													<i class="glyphicon glyphicon-edit"></i> Update
												</a>
											</td>
										</tr>
							<?php
									}
								}
							} else {
								echo '<tr><td colspan="7" align="center">No Data Available</td></tr>';
							}
							?>
							</tbody>
						</table>
						
						
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
