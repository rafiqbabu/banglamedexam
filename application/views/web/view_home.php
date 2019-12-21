<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php $this->load->view( 'web/header/header_top' ); ?>
<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey typo-dark" style="padding-top: 5px;">
		<!-- Course Wrapper -->
		<div class="container">
			<div class="row">
				<div class="col-md-6 typo-light">
					<!-- Title -->
					
					<div class="owl-carousel"
						 data-animatein=""
						 data-animateout=""
						 data-items="1"
						 data-loop="true"
						 data-merge="true"
						 data-nav="false"
						 data-dots="true"
						 data-stagepadding=""
						 data-margin="30"
						 data-mobile="1"
						 data-tablet="1"
						 data-desktopsmall="1"
						 data-desktop="1"
						 data-autoplay="true"
						 data-delay="3000"
						 data-navigation="true">
						<?php if ( $sliders ) : foreach ( $sliders as $slider ): ?>
							<div class="item">
								<!-- News Wrapper -->
								<div class="news-wrap">
									<a href="#"><img style="height:332px;width: 555px;" src="<?php echo base_url( $slider->image ); ?>" class="img-responsive" alt="<?= $slider->title; ?>"></a>
									<!-- News Content -->
									<div class="news-content">
										<h5><a href="<?= $slider->link ? prep_url( $slider->link ) : 'javascript:;'; ?>" target="_blank"><?= $slider->title; ?></a></h5>
									</div><!-- News Content -->
								</div><!-- News Wrapper -->
							</div>
							<!-- Item Ends -->
						<?php endforeach; endif; ?>
					</div><!-- carousel -->
				</div><!-- Column  -->
				<div class="col-md-6">
					
					<!--
					<?php if ( !user_logged_in() ) : ?>
					<div class="row">
						<div class="item all design web">
							<div class="col-sm-6">
								<div class="count-block dark bg-pink">
									<h5><font size="4">Prove Yourself</font></h5>
									<h5><a href="<?= site_url( 'registration' ) ?>" style="color:#fff;"><font size="5"><b>Registration Now</b></font></a></h5>
									<i class="uni-talk-man"></i>
								</div>
							</div>
						</div>
						<div class="item all design web">
							<div class="col-sm-6">
								<div class="count-block dark bg-yellow">
									<h5 style="font-size:20px;"><font size="4">Already Registered</font></h5>
									<h5><a href="<?= site_url( 'user-login' ) ?>" style="color:#fff;"><font size="5"><b>Login Now</b></font></a></h5>
									<i class="uni-unlock-2"></i>
								</div>
							</div>
						</div>
					</div>
					-->
					
					<?php endif; ?>
					
					<div class="row">
						
						<div class="item">
							<div class="col-sm-12">
								<!-- Count Block -->
								<div class="count-block dark bg-orange" style="height:335px;">
									<h5><font size='5' color='#0000A0'><b>Popular Packages</b></font></h5>
									<!--<h3 data-count="<?= $topics_count; ?>" class="count-number"><span class="counter"><?= $topics_count; ?></span></h3>-->
								    <marquee direction='up' scrollamount="2" onmouseover=this.stop(); onmouseout=this.start();>
								    <?php
								        $sql="SELECT * FROM oe_package WHERE status = '1' AND id='75' OR id='72' OR id='73' OR id='42' OR id='41' ORDER BY id DESC LIMIT 5";
    								    $query = $this->db->query($sql);{
    								        foreach ($query->result() as $row) {
								                if ( !user_logged_in() ) {
								                    echo "<a href='".site_url( "user-login" )."' style='color:#ffffff;'>".$row->name."</a><br><br>";  
								                }
								                else {
								                    echo "<a href='".site_url( "user/{$user->id}/exam-src-institute" )."#i' style='color:#ffffff; font-size:22px;'>".$row->name."</a><br><br>"; 
								                }
    								        }
								        }
								    ?>
								    </marquee>
									
									<i class="uni-notepad" aria-hidden="true"></i>
								</div>
							</div>
						</div>
						
						<!--
						<div class="item all design web">
							<div class="col-sm-6">
								<div class="count-block dark bg-green">
									<h5>Subjects</h5>
									<h3 data-count="<?= $subjects_count; ?>" class="count-number"><span class="counter"><?= $subjects_count; ?></span></h3>
									<i class="uni-box-withfolders"></i>
								</div>
							</div>
						</div>
						-->
					</div>
				
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container Fluid -->
		<div class="clearfix"></div>
		
		
		<div class="container pad-tb-50">
			<!-- Team Container -->
			<div class="row text-uppercase">
				<!-- <div class="col-md-3 col-sm-6"> -->
				<?php if ( $institutes ) : foreach ( $institutes as $institute ):
					
					?>
					
					<div class="col-md-3 col-sm-6 dropdown">
						<a href="<?= site_url( "institute/{$institute->id}" ) ?>" class="btn btn-block dropbtn <?= get_institute_color_class( $institute->sl ) ?>"  style="font-size:21px;"><?= $institute->name; ?></a>
						
						<div class="dropdown-content">
							<div id="menuh-container">
								<div class="menuh">
									<ul style="display: block;" class="pricing-body">
										<?php
										if ( $institute->courses ) {
											foreach ( $institute->courses as $key => $course ) {
												?>
												<li>
													<a href="javascript:"><?php echo $course->name; ?></a>
													<?php if ( $course->faculties ) : ?>
														<ul class="faculty_styl <?= $institute->sl == 4 ? 'right' : NULL; ?>">
															<?php foreach ( $course->faculties as $faculty ) : ?>
																<li class="second_item" style="border-bottom: 1px solid #ddd;">
																	<a href="javascript:"><?= $faculty->name ?></a>
																	<?php if ( $faculty->subjects ) : ?>
																		<ul>
																			<?php foreach ( $faculty->subjects as $subject ) : ?>
																				<li style="border-bottom: 1px solid #ddd;">
																					<a href="<?= site_url( "subject-exam/{$subject->id}" ) ?>">
																						<?= $subject->name ?>
																					</a>
																				</li>
																			<?php endforeach; ?>
																		
																		</ul>
																	<?php endif; ?>
																</li>
															<?php endforeach; ?>
														</ul>
													<?php endif; ?>
												</li>
												<?php
											}
										}
										?>
									</ul>
								</div>    <!-- end the menuh-container div -->
							</div>    <!-- end the menuh div -->
						</div>
					
					</div><!-- Pricing Footer -->
					<!-- </div> --><!-- Column -->
				<?php endforeach; endif; ?>
			
			</div><!-- Row -->
		</div><!-- Container -->
		<div class="container pad-bottom-50">
			
			<div class="row text-uppercase">
				<div class="col-md-3 col-sm-6 dropdown">
					<a href="<?= site_url( "institute/1" ) ?>" class="btn btn-block dropbtn" style="height:50px;background:#4CAF50; font-size:21px;">Medicine</a>
					<div class="dropdown-content">
						<div id="menuh-container">
							<div class="menuh">
								<ul class="pricing-body">
									<?php
									if ( $ins_course ) {
										foreach ( $ins_course as $key => $value ) {
											//echo $value->institute_id;exit();
											?>
											<li>
												<?php echo get_name_by_auto_id( 'sif_institute', $value->institute_id, 'institute_name' ); ?>
												<?php
												$total = get_course_under_institute( $value->course_id, $value->institute_id, $value->id );
												//echo '<pre>';
												//print_r($total);exit();
												?>
											
											</li>
											<?php
										}
									}
									?>
								</ul>
							</div>    <!-- end the menuh-container div -->
						</div>    <!-- end the menuh div -->
					</div>
				</div><!-- Pricing Footer -->
				
				<div class="col-md-3 col-sm-6 dropdown">
					<a href="<?= site_url( "institute/1" ) ?>" class="btn btn-block dropbtn" style="height:50px;background:#E91E63; font-size:21px;">Surgery</a>
					<div class="dropdown-content">
						<div id="menuh-container">
							<div class="menuh">
								<ul style="display: block;" class="pricing-body">
									<?php
									if ( $surgery ) {
										foreach ( $surgery as $key => $value ) {
											//echo $value->institute_id;exit();
											?>
											<li>
												<?php echo get_name_by_auto_id( 'sif_institute', $value->institute_id, 'institute_name' ); ?>
												<?php
												$total = get_course_under_institute( $value->course_id, $value->institute_id, $value->id );
												?>
											</li>
											<?php
										}
									}
									?>
								</ul>
							</div>    <!-- end the menuh-container div -->
						</div>    <!-- end the menuh div -->
					</div>
				</div><!-- Pricing Footer -->
				
				<div class="col-md-3 col-sm-6 dropdown">
					<a href="<?= site_url( "institute/1" ) ?>" class="btn btn-block dropbtn" style="height:50px;background:#FF6634; font-size:21px;">Basic Science</a>
					<div class="dropdown-content">
						<div id="menuh-container">
							<div class="menuh">
								<ul style="display: block;" class="pricing-body">
									<?php
									if ( $basic_science ) {
										foreach ( $basic_science as $key => $value ) {
											//echo $value->institute_id;exit();
											?>
											<li>
												<?php echo get_name_by_auto_id( 'sif_institute', $value->institute_id, 'institute_name' ); ?>
												<?php
												$total = get_course_under_institute( $value->course_id, $value->institute_id, $value->id );
												
												?>
											
											</li>
											<?php
										}
									}
									?>
								</ul>
							</div>    <!-- end the menuh-container div -->
						</div>    <!-- end the menuh div -->
					</div>
				</div><!-- Pricing Footer -->
				
				<div class="col-md-3 col-sm-6 dropdown">
					<a href="<?= site_url( "institute/1" ) ?>" class="btn btn-block dropbtn" style="height:50px;background:#E29C04; font-size:21px;">Dentistry</a>
					<div class="dropdown-content">
						<div id="menuh-container">
							<div class="menuh">
								<ul style="display: block;" class="pricing-body">
									<?php
									if ( $dentist ) {
										foreach ( $dentist as $key => $value ) {
											//echo $value->institute_id;exit();
											?>
											<li>
												<?php echo get_name_by_auto_id( 'sif_institute', $value->institute_id, 'institute_name' ); ?>
												<?php
												$total = get_course_under_institute( $value->course_id, $value->institute_id, $value->id );
												
												?>
											
											</li>
											<?php
										}
									}
									?>
								</ul>
							</div>    <!-- end the menuh-container div -->
						</div>    <!-- end the menuh div -->
					</div>
				</div><!-- Pricing Footer -->
			</div>
		</div>
		
		<?php if ( $free_exam_lists ) : ?>
			<!-- Section -->
			<section class="relative pad-tb-30 bg-dark">
				<div class="container">
					<div class="row">
						<!-- Column Begins -->
						<div class="col-sm-12">
							
							<div class="title-container typo-light">
								<div class="title-wrap">
									<h4 class="title">Free Exams</h4>
									<span class="separator line-separator" style="top: 57px;"></span>
								</div>
							</div><!-- Title Container -->
							
							
							<!-- Review -->
							<div class="owl-carousel"
								 data-animatein=""
								 data-animateout=""
								 data-items="1"
								 data-loop="true"
								 data-merge="true"
								 data-nav="false"
								 data-dots="true"
								 data-stagepadding=""
								 data-margin="30"
								 data-mobile="1"
								 data-tablet="1"
								 data-desktopsmall="1"
								 data-desktop="2"
								 data-autoplay="true"
								 data-delay="3000"
								 data-navigation="true">
								<?php
								foreach ( $free_exam_lists as $key => $value ) { ?>
									<!-- Item Ends -->
									<div class="item bg-white typo-dark">
										<a href="<?= site_url( "free-exam/{$value->id}" ) ?>">
											<!-- Blockquote Wrapper -->
											<div class="quote-wrap light">
												<blockquote>
													<p><?= word_limiter( strip_tags( $value->exam_detail ), 20 ); ?></p>
												</blockquote>
												<!-- Blockquote Author -->
												<div class="quote-author">
													<img width="80" height="80" src="<?= base_url( 'images/free.jpg' ) ?>" class="img-responsive" alt="thumb">
													<!-- Blockquote Footer -->
													<div class="quote-footer">
														<h5 class="name"><?= character_limiter( $value->exam_name, 20 ); ?></h5>
														<span>/ <?= get_name_by_auto_id( 'sif_exam_category', $value->exam_id, 'exam_category_name' ) ?></span>
													</div><!-- Blockquote Footer -->
												</div><!-- Blockquote Author -->
											</div><!-- Blockquote Wrapper -->
										</a>
									</div><!-- Item Ends -->
								<?php } ?>
							
							</div><!-- carousel -->
						</div><!-- Column -->
					</div><!-- Row -->
				</div><!-- Container -->
			</section><!-- Section -->
		<?php endif; ?>
		<?php if ( $advertisements ): ?>
			<div class="container-fluid pad-tb-30">
				<!-- Row -->
				<div class="row">
					<div class="col-md-12">
						<div class="title-container">
							<div class="title-wrap">
								<h4 class="title">Advertisements</h4>
								<span class="separator line-separator" style="top: 57px;"></span>
							</div>
						</div><!-- Title Container -->
					</div><!-- Title Block -->
					<!-- Item Begins -->
					<div class="col-sm-12">
						<div class="owl-carousel"
							 data-animatein="zoomIn"
							 data-animateout="slideOutDown"
							 data-margin="30"
							 data-stagepadding=""
							 data-loop="true"
							 data-merge="true"
							 data-nav="true"
							 data-dots="false"
							 data-items="1" data-mobile="1" data-tablet="2" data-desktopsmall="2" data-desktop="4"
							 data-autoplay="true"
							 data-delay="3000"
							 data-navigation="true">
							<?php foreach ( $advertisements as $advertisement ): ?>
								<div class="item">
									<!-- Shop Grid Wrapper -->
									<div class="shop-wrap">
										<!-- Shop Image Wrapper -->
										<div class="shop-img-wrap max-300">
											<?php if ( $advertisement->image && file_exists( $advertisement->image ) ): ?>
												<img width="300px" height="300px" src="<?= base_url( $advertisement->image ) ?>" class="img-responsive" alt="<?= $advertisement->title; ?>">
											<?php else: ?>
												<img width="300px" height="300px" src="http://via.placeholder.com/300x300?text=Advertisement" class="img-responsive"
													 alt="<?= $advertisement->title; ?>">
											<?php endif; ?>
										</div><!-- Shop Wraper -->
										<!-- Shop Detail Wrapper -->
									
									</div><!-- Shop Wrapper -->
								</div><!-- Item -->
							<?php endforeach; ?>
						
						</div><!-- Owl -->
					</div><!-- Column -->
				</div><!-- Row -->
			</div><!-- Container -->
		<?php endif; ?>
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
