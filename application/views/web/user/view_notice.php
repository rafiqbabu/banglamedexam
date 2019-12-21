<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php $this->load->view( 'web/header/header_top' ); ?>
<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey team-single">
		<!-- Container -->
		<div class="container">
			<div class="row">
				<!-- Sidebar -->
				<?php $this->load->view( 'web/elements/view_sidebar' ); ?>
				
				<!-- Page Content -->
				<div class="col-md-9">
					<div class="widget profile-widget">
						<h4 class="widget-title"><?= $page_title; ?> <span></span></h4>
						<?php if ( $notices ) : ?>
							<ul class="row"   style="height: 600px; overflow: auto;">
								<?php foreach ( $notices as $notice ) : ?>
									<li class="col-xs-12 event-list-wrap">
										<div class="event-details">
											<h6>
											    <a href="<?= site_url( "user/$id/notice-details/{$notice->id}" ) ?>" class="unread"><?= word_limiter( $notice->title, 10 ); ?></a>
											    <a href="<?= site_url( "user/$id/notice-details/{$notice->id}" ) ?> " 
													style="color:#fff; background-color:green; padding:4px; border-radius: 10px;">
													Read More
												</a>
											</h6>
											<ul class="events-meta">
												<li><i class="fa fa-calendar-o"></i> <?= user_formated_datetime( $notice->created_at ); ?></li>
											</ul><!-- Event Meta -->
											<p><?= word_limiter( strip_tags( base64_decode( $notice->details, TRUE ) ), 30 ) ?></p>
											<!--<a href="<?= site_url( "user/$id/notice-details/{$notice->id}" ) ?> " class="btn">Read More</a> -->
										</div><!-- Event Meta -->
										<!-- Divider -->
										<hr class="md">
									</li>
								<?php endforeach; ?>
							</ul>
						<?php else: ?>
							<h4 class="text-warning">There are no notice...</h4>
						<?php endif; ?>
					</div>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
