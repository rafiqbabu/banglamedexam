<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php
$this->load->view( 'web/header/header_top' );
?>
<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey typo-dark">
		<!-- Container -->
		<div class="container">
			<!-- Course Wrapper -->
			<div class="row institute-details">
				<div class="col-md-12 widget">
					
					<?php if ( $institute->courses ):
						foreach ( $institute->courses as $course ): ?>
							<!-- Exams -->
							<h5 class="widget-title"><?= $course->name; ?><span></span></h5>
							<?php if ( $course->faculties ) : foreach ( $course->faculties as $faculty ): ?>
								<h5 class="text-center"><?= $faculty->name; ?></h5>
								<hr>
								<?php if ( $faculty->subjects ):
									$subjects = objectToArray( $faculty->subjects );
									$chunk = array_chunk( $subjects, 6 );
									foreach ( $chunk as $subjects ):
										echo "<div class='row'>";
										foreach ( $subjects as $subject ) : ?>
											<div class="col-md-2 col-sm-4 col-xs-6">
												<div class="shop-wrap">
													<a href="<?= site_url( "subject-exam/{$subject['id']}" ) ?>">
														<!-- Shop Detail Wrapper -->
														<div class="product-details bg-grey">
															<div class="shop-title-wrap">
																<h5 class="product-name"><?= $subject['name']; ?></h5>
															</div><!-- Shop Detail Wrapper -->
														</div><!-- Blog Detail Wrapper -->
													</a>
												</div>
											</div>
										<?php
										endforeach;
										echo "</div>";
									endforeach;
								else: ?>
									<p>Subject Information not available</p>
								<?php endif; ?>
							<?php endforeach; else: ?>
								<p>Faculty information not available</p>
							<?php endif; ?>
						
						<?php endforeach;
					else: ?>
						<h5 class="widget-title">Course information not available.</h5>
					<?php endif; ?>
				</div>
			</div><!-- Container -->
		</div><!-- Page Default -->
	</div><!-- Page Main -->
</div>

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
