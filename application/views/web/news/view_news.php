<?php $this->load->view('web/header/view_header'); ?>
<!-- Header Begins -->	
<?php 
	$this->load->view('web/header/header_top');
?>

<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey typo-dark" style="padding-top: 5px;">
		<!-- Container -->
		<div class="container">
			<!-- Course Wrapper -->
			<div class="row">
				
				<div class="blog-single-wrap">
						<div class="news-img-wrap">
							<!-- <img src="images/news/single-01.jpg" class="img-responsive" alt="News" height="600" width="1200"> -->
						</div>
						
						<!-- Blog Detail Wrapper -->
						<div class="news-single-details">
							
							<h5 class="title-simple"><?php echo $new_details[0]->news_title;?></h5>
							<!-- Blog Description -->
							<?php 
								if($new_details[0]->file_extension == 'pdf'){
							?>
							<p>
								<a href="<?php echo base_url().$new_details[0]->file_loc.'/featureimg.pdf';?>">Click Here And Download necessary File.</a>
							</p>
							<?php
							}
							?>
							<p>
							   <?php echo $new_details[0]->news_details;?>
							</p>
						</div><!-- Blog Detail Wrapper -->
					</div><!-- Blog Wrapper -->
				
			</div>		

		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view('web/footer/footer');?>
