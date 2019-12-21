<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'm/d/Y' );
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <!--Search-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                        Search Wizard
                        <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal " id="commentForm" role="form" method="post"
                                  action="<?php echo current_url(); ?>">

                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Package Type</label>
                                    <div class="col-lg-2">
                                        <?= form_dropdown( 'package_type', $package_types, '', ['class' => 'form-control'] ) ?>
                                    </div>

                                    <label class="control-label col-lg-2">Status</label>
                                    <div class="col-lg-2">
                                        <?= form_dropdown( 'status', ['' => 'Choose'] + $status_list, '', ['class' => 'form-control'] ) ?>
                                    </div>

                                </div>

                                <div class="form-group ">
                                    <label for="Name" class="control-label col-lg-2">Date Range</label>
                                    <div class="col-lg-4">
                                        <div class="input-group input-large" data-date="<?php echo $current_date; ?>"
                                             data-date-format="mm/dd/yyyy">
                                            <input type="text" class="form-control datepicker" name="from_date_time">
                                            <span class="input-group-addon">To</span>
                                            <input type="text" class="form-control datepicker" name="to_date_time">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-2">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!--End Search-->

        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        Package List
                        <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <?php
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
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Package Name</th>
                                <th>Package ID</th>
                                <th>Created Date</th>
                                <th>Package Type</th>
								<!--<th>Details</th>-->
                                <th>Cost (BDT)</th>
                                <th>Cost (USD)</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ( !empty( $exam_lists ) ) {
                                //$value_all = array();
                                foreach ( $exam_lists as $key => $value ) {
                                    $key++;
                                    ?>
                                    <tr>
                                        <td><?= $key; ?></td>
                                        <td><?php echo "<a href='http://banglamedexam.com/package_details.php?pid={$value->id}' target='_blank'>".$value->name."</a>"; ?></td>
                                        <td><?php echo $value->id; ?></td>
                                        <td><?php echo $value->created_at; ?></td>
                                        <td><?php echo get_name_by_auto_id( 'oe_package_type', $value->type ); ?></td>
										<!--<td><?php /*echo character_limiter( strip_tags(base64_decode( $value->desc, TRUE )), 30 ); */ ?></td>-->
                                        <td><?= number_format( $value->amount_bdt, 2 ); ?></td>
                                        <td><?= number_format( $value->amount_usd, 2 ); ?></td>
                                        <td><?php echo user_formated_date( $value->start_date ); ?></td>
                                        <td><?php echo user_formated_date( $value->end_date ); ?></td>
                                        <td><?php echo user_formated_date( $value->created_at ); ?></td>
                                        <td class="text-center">
                                            <?php if ( $value->status == 1 ) {
                                                echo "<label class='label label-success'>Active</label>";
                                            } else {
                                                echo "<label class='label label-warning'>Inactive</label>";
                                            } ?>
                                        </td>
										<td>
                                            <!--
                                            <a href="<?php echo site_url( "package/vdo/$value->id" ); ?>"
											   class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-zoom-in"></i> Add Video
                                            </a>
                                            -->
                                            <a href="<?php echo site_url( "package/view/$value->id" ); ?>"
											   class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-zoom-in"></i> Details
                                            </a>

                                            <a href="<?php echo site_url( "package/edit/$value->id" ); ?>"
											   class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="11" align="center">No Data Available</td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php echo $links; ?>
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
