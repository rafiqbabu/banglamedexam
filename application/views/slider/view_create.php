<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'Y-m-d' );
?>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			
			<?php if ( $action == 'add' ) {
				$url   = site_url( 'slider/save_slider' );
				$title = "Create";
			} elseif ( $action == 'edit' ) {
				$url   = site_url( "slider/update_slider/$id" );
				$title = "Update";
			} ?>
			
			<form class="cmxform form-horizontal" enctype="multipart/form-data" id="commentForm" role="form" method="post"
				  action="<?php echo $url; ?>">
				<div class="col-md-9">
					
					<section class="panel panel-info">
						<header class="panel-heading">
							<h3 class="panel-title"><?= $title; ?> Slider
								<span class="jnn-tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:"></a>
                                    </span>
							</h3>
						
						</header>
						<div class="panel-body">
							
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
							?>
							
							<div class="form">
								<div class="form-group ">
									<label for="title" class="control-label col-md-3">Slider Title <i class="fa fa-asterisk ipd-star"></i></label>
									<div class="col-md-6">
										<?php
										$extra = ['class' => 'form-control', 'required' => 'required', 'id' => 'title'];
										?>
										<?= form_input( 'title', isset( $slider ) ? $slider->title : set_value( 'title' ), $extra ); ?>
									</div>
								</div>
								<div class="form-group ">
									<label for="sl" class="control-label col-md-3">Slider SL <i class="fa fa-asterisk ipd-star"></i></label>
									<div class="col-md-6">
										<?php
										$extra = ['class' => 'form-control', 'required' => 'required', 'id' => 'sl'];
										?>
										<?= form_input( ['type' => 'number', 'name' => 'sl'], isset( $slider ) ? $slider->sl : set_value( 'sl' ), $extra ); ?>
									</div>
								</div>
								<div class="form-group ">
									<label for="desc" class="control-label col-md-3">Description</label>
									<div class="col-md-6">
										<?php
										$extra = ['class' => 'form-control', 'id' => 'desc'];
										?>
										<?= form_input( 'desc', isset( $slider ) ? $slider->desc : set_value( 'desc' ), $extra ); ?>
									</div>
								</div>
								
								<div class="form-group ">
									<label for="link" class="control-label col-md-3">Slider Link</label>
									<div class="col-md-6">
										<?php
										$extra = ['class' => 'form-control', 'required' => 'required', 'id' => 'link'];
										?>
										<?= form_input( 'link', isset( $slider ) ? $slider->link : set_value( 'link' ), $extra ); ?>
									</div>
								</div>
								
								
								<div class="form-group ">
									<label for="image" class="control-label col-md-3">Image <i class="fa fa-asterisk ipd-star"></i><br>
										(Image Size:500Kb Max, Only (.jpg/.png/.gif,) is allowed to upload)
									</label>
									<div class="col-md-6">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
												<?php if ( !empty( $slider ) && $slider->image ) {
													echo "<img src='" . base_url( $slider->image ) . "'/>";
												} else {
													echo '<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Slider+image" alt=""/>';
												}
												?>
											
											</div>
											<div class="fileupload-preview fileupload-exists thumbnail"
												 style="max-width: 300px; max-height: 100px; line-height: 20px;"></div>
											<div>
                                                    <span class="btn btn-white btn-file btn-sm">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                        <input type="file" name="image" id="image" class="default"/>
                                                    </span>
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group ">
									<label for="status" class="control-label col-md-3">Status </label>
									<div class="col-md-3">
										<?= form_dropdown( 'status', $status_list, isset( $slider ) ? $slider->status : set_value( 'status' ), ['class' => 'form-control'] ) ?>
									</div>
								</div>
								
								<div class="form-group ">
									<div class="col-md-3 col-md-offset-3">
										<button class="btn btn-success btn-block" type="submit" value="Submit"><?= $title; ?> Slider</button>
									</div>
								</div>
							</div>
						</div>
					
					</section>
				</div>
			</form>
		</div>
	</section>
</section>
<!--main content end-->

<?php
$this->load->view( 'footer/view_footer' );
?>
