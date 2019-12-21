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
                    <header class="panel-heading">
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
                                    <label for="Name" class="control-label col-lg-2">Date Range</label>
                                    <div class="col-lg-4">
                                        <div class="input-group input-large" data-date="<?php echo $current_date; ?>"
                                             data-date-format="mm/dd/yyyy">
                                            <input type="text" class="form-control datepicker" name="from_date_time">
                                            <span class="input-group-addon">To</span>
                                            <input type="text" class="form-control datepicker" name="to_date_time">
                                        </div>
                                    </div>

                                    <label class="control-label col-lg-1">Status</label>
                                    <div class="col-lg-2">
                                        <?= form_dropdown('status', ['' => 'Choose'] + $status_list, '', ['class' => 'form-control topic_id']) ?>
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
                        Coupon List
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
                        <div class="text-right m-bot15">
                            <a href="<?= site_url('coupon/create') ?>" class="btn btn-success">Create Coupon</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Coupon Code</th>
                                <th>Username</th>
                                <th>Discount (%)</th>
                                <th>Validity</th>
                                <th>Allowed</th>
                                <th>Used</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ( !empty( $coupons ) ) {
                                //$value_all = array();
                                $sl=1; //new
                                foreach ( $coupons as $key => $value ) {
                                    $key++;
                                    if ($value->status == 1) { //new 
                            ?>
                                        <tr>
                                            <!--<td><?= $key; ?></td> OLD -->
                                            <td><?= $sl; ?></td> <!--new-->
                                            <td><?php echo $value->code; ?></td>
                                            <td><?php echo $value->username; ?></td>
                                            <td class="text-center"><?php echo $value->discount; ?>%</td>
                                            <td class="text-center">
                                                <?php
                                                    $today = date("Y-m-d");
                                                    if ($value->validity < $today){
                                                        echo "<font color=red>".user_formated_datetime($value->validity)."</font>";
                                                    }else{
                                                        echo "<font color=green>".user_formated_datetime($value->validity)."</font>";      
                                                    }
                                                ?>
                                                <!--<?php echo user_formated_datetime($value->validity); ?>-->
                                            </td>
                                            <td class="text-center"><span class="badge bg-info"><?php echo $value->times_allowed; ?></span></td>
                                            <td class="text-center"><span class="badge bg-warning"><?php echo $value->times_used; ?></span></td>
                                            <td>
                                                <?php echo user_formated_datetime( $value->created_at ); ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ( $value->status == 1 ) {
                                                    echo "<label class='label label-success'>Active</label>";
                                                } else {
                                                    echo "<label class='label label-warning'>Inactive</label>";
                                                } ?>
                                            </td>
                                            <td class="text-center">

                                                <!--<a href="<?php /*echo site_url( "coupon/view/$value->id" ); */?>"
                                                   class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-zoom-in"></i> Details
                                                </a>-->

                                                <a href="<?php echo site_url( "coupon/edit/$value->id" ); ?>"
    											   class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $sl=$sl+1; //new
                                    } //new
                                }
                            } else {
                                echo '<tr><td colspan="9" align="center">No Data Available</td></tr>';
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
