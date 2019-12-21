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
						<?php if ( $notice ) : ?>
							<ul class="row">
								<li class="col-xs-12 event-list-wrap">
									<div class="event-details">
										<h5>
											<a href="<?= site_url( "user/$id/notice-details/{$notice->id}" ) ?>" class="unread">
												<?= $notice->title; ?>
											</a>
										</h5>
										<ul class="events-meta">
											<li><i class="fa fa-calendar-o"></i> <?= user_formated_datetime( $notice->created_at ); ?></li>
										</ul><!-- Event Meta -->
										<p><?= base64_decode( $notice->details, TRUE ); ?></p>
										
										<?php if ( $notice->attachment && file_exists( $notice->attachment ) ): $type = get_file_extension( $notice->attachment ); ?>
											<?php if ( $type == 'img' ): ?>
												<img src="<?= base_url( $notice->attachment ) ?>" alt="" class="img-responsive">
											<?php else: ?>
												<iframe src="<?= base_url( $notice->attachment ) ?>" frameborder="0" width="100%" height="800"></iframe>
											<?php endif; ?>
										<?php endif; ?>
									</div><!-- Event Meta -->
									<!-- Divider -->
								</li>
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
