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
                        <header class="panel-heading">
                            Notice List
                            <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:"></a>
                            <a class="fa fa-cog" href="javascript:"></a>
                            <a class="fa fa-times" href="javascript:"></a>
                        </span>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Type</th>
                                    <th>Sent To</th>
                                    <th>Attachment</th>
                                    <th>Creation Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ( !empty( $notices ) ) {

                                    foreach ( $notices as $key => $value ) {
                                        $key++;
                                        ?>
                                        <tr>
                                            <td><?= $key; ?></td>
                                            <td><?php echo $value->title; ?></td>
                                            <td><?php echo word_limiter( strip_tags( base64_decode( $value->details, TRUE ) ), 20 ); ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ( $value->type == 'I' ) {
                                                    echo '<span class="badge bg-success">Individual</span>';
                                                } else {
                                                    echo '<span class="badge bg-blue">General</span>';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <span class="btn btn-xs btn-white">
                                                    <?php if ( $value->doc_id ): ?>
                                                        <?= get_name_by_auto_id( 'oe_doc_master', $value->doc_id ); ?>
                                                    <?php else: ?>
                                                        ALL
                                                    <?php endif; ?>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <?php if ( $value->attachment ): ?>
                                                    <a href="<?php echo base_url( $value->attachment ); ?>" class="btn btn-xs btn-info" target="_blank">View Attachment</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo user_formated_datetime( $value->created_at ); ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ( $value->status == '1' ) {
                                                    echo '<span class="label label-success">Active</span>';
                                                } else {
                                                    echo '<span class="label label-warning">Inactive</span>';
                                                }
                                                ?>
                                            </td>
											<td>
												<a href="<?= site_url( "notice/details/{$value->id}" ) ?>" class="btn btn-info btn-xs" title="View Details" data-toggle="tooltip" data-placement="top">
													<i class="glyphicon glyphicon-zoom-in"></i> Details
                                                </a>
                                                <a href="<?= site_url( "notice/edit/{$value->id}" ) ?>" class="btn btn-warning btn-xs" title="Edit" data-toggle="tooltip" data-placement="top">
													<i class="glyphicon glyphicon-edit"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="9" align="center">No Data Available</td></tr>';
                                }
                                ?>
                                </tbody>
                            </table>

                            <?= $links; ?>
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
