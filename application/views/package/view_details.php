<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'Y-m-d' );
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">

            <div class="col-md-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        <h3 class="panel-title">Package Details
                            <span class="jnn-tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:"></a>
                                    </span>
                        </h3>
                    </header>
                    <div class="panel-body">
						<table class="table table-bordered table-striped va-top">
                            <tr>
                                <th>Package Name</th>
                                <td><?= $package->name; ?></td>
                                <th>Package Type</th>
                                <td><?= $package_types[$package->type]; ?></td>
                            </tr>
                            <tr>
                                <th>Start Datetime</th>
                                <td><?= user_formated_datetime( $package->start_date ) ?></td>
                                <th>End Datetime</th>
                                <td><?= user_formated_datetime( $package->end_date ) ?></td>
                            </tr>
                            <tr>
                                <th> Status</th>
                                <td>
                                    <?php if ( $package->status == 1 ) {
                                        echo "<label class='label label-success'>Active</label>";
                                    } else {
                                        echo "<label class='label label-warning'>Inctive</label>";
                                    } ?>
                                </td>
                                <th>Created</th>
                                <td><?= user_formated_datetime( $package->created_at ) ?></td>
                            </tr>
                            <tr>
                                <th>Cost (BDT)</th>
                                <td><?= number_format( $package->amount_bdt, 2 ); ?></td>
                                <th>Cost (USD)</th>
                                <td><?= number_format( $package->amount_usd, 2 ); ?></td>
							</tr>
							<tr>
								<th>Details</th>
								<td colspan="3"><?= base64_decode( $package->desc, TRUE ); ?></td>
							</tr>
							<tr>
								<th>Exams</th>
								<td colspan="3">
									<?php if ( $exams ) {
										echo "<ol>";
										foreach ( $exams as $exam ) {
											echo "<li>{$exam->exam_name} ({$exam->ec_name})</li>";
										}
										echo "</ol>";
									} ?>
								</td>
							</tr>
                        </table>
                    </div>

                </section>
            </div>

        </div>
    </section>
</section>
<!--main content end-->

<?php
$this->load->view( 'footer/view_footer' );
?>
<script src="<?php echo base_url( 'ckeditor/ckeditor.js' ); ?>"></script>
<script>
    CKEDITOR.replace('desc');
</script>
