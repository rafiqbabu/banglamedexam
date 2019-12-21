<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'Y-m-d' );
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-12">
				<?php
				if ( validation_errors() ) {
					echo validation_errors( '<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>', '</div>' );
				}
				
				if ( $this->session->flashdata( 'flashOK' ) ) {
					echo "<div class=\"alert alert-success fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
					echo $this->session->flashdata( 'flashOK' );
					echo "</div>";
				}
				if ( $this->session->flashdata( 'flashError' ) ) {
					echo "<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
					echo $this->session->flashdata( 'flashError' );
					echo "</div>";
				}
				
				if ( $form_action == "add" ) {
					$action_url = base_url( 'page/save' );
					$btnval     = 'SAVE';
				} elseif ( $form_action == "edit" ) {
					$action_url = base_url( "page/update/{$id}" );
					$btnval     = 'UPDATE';
				}
				?>
				<form class="cmxform form-horizontal " role="form" method="post" action="<?php echo $action_url; ?>"
					  enctype="multipart/form-data">
					<section class="panel panel-info">
						<header class="panel-heading">
							Add Page Form
							<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
						</header>
						<div class="panel-body">
							<div class="form">
								
								<div class="form-group ">
									<label for="name" class="control-label col-lg-2">Page Name<i class="fa fa-asterisk ipd-star"></i></label>
									<div class="col-lg-4">
										<input class=" form-control" id="name" name="name" type="text" value="<?php echo isset( $page ) ? $page->name : set_value( 'name' ) ?>" required/>
									</div>
									
									<label for="slug" class="control-label col-lg-2">Slug <i class="fa fa-asterisk ipd-star"></i></label>
									<div class="col-lg-4">
										<input class=" form-control" id="slug" name="slug" type="text" value="<?php echo isset( $page ) ? $page->slug : set_value( 'slug' ) ?>" required/>
									</div>
								</div>
								
								<div class="form-group ">
									<label for="details" class="control-label col-lg-2">Details <i class="fa fa-asterisk ipd-star"></i></label>
									<div class="col-md-10">
										<textarea name="details" id="" cols="30" rows="10"
												  class="summernote form-control"><?php echo isset( $page ) ? base64_decode( $page->details ) : set_value( 'details' ) ?></textarea>
									</div>
								</div>
								
								<div class="form-group ">
									<label for="status" class="control-label col-lg-2">Status</label>
									<div class="col-md-2">
										<?= form_dropdown( 'status', data_status(), isset( $page ) ? $page->status : 1, ['class' => 'form-control'] ); ?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-12 text-right">
										<button class="btn btn-primary btn-lg" type="submit"><?php echo $btnval; ?></button>
									</div>
								</div>
							</div>
						</div>
					</section>
				
				</form>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->
<?php
$this->load->view( 'footer/view_footer' );
?>
