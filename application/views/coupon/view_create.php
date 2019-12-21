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
                $url = site_url( 'coupon/save_coupon' );
                $title = "Create";
            } elseif ( $action == 'edit' ) {
                $url = site_url( "coupon/update_coupon/$id" );
                $title = "Update";
            } ?>

            <form class="cmxform form-horizontal" enctype="multipart/form-data" id="commentForm" role="form" method="post"
                  action="<?php echo $url; ?>">
                <div class="col-md-9">
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

                    <section class="panel panel-info">
                        <header class="panel-heading">
                            <h3 class="panel-title"><?= $title; ?> Coupon
                                <span class="jnn-tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                    </span>
                            </h3>

                        </header>
                        <div class="panel-body">
                            <div class="form">
                                
                                <!--new-->
                                <div class="form-group ">
                                    <label for="username" class="control-label col-md-3">Coupon Username <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <?php
                                            $extra = ['class' => 'form-control', 'required' => 'required', 'id' => 'username'];
                                            if($action != 'add') $extra = $extra + ['disabled' => 'disabled'];
                                        ?>
                                        <?= form_input( 'username', isset( $coupon ) ? $coupon->username : set_value( 'username' ), $extra ); ?>
                                    </div>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="code" class="control-label col-md-3">Coupon Code <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <?php
                                            $extra = ['class' => 'form-control', 'required' => 'required', 'id' => 'code'];
                                            if($action != 'add') $extra = $extra + ['disabled' => 'disabled'];
                                        ?>
                                        <?= form_input( 'code', isset( $coupon ) ? $coupon->code : set_value( 'code' ), $extra ); ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="discount" class="control-label col-md-3">Discount (%) <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <?php $extra = ['class' => 'form-control number-only', 'required' => 'required', 'id' => 'discount', 'max'=> 100]; ?>
                                            <?= form_input( 'discount', isset( $coupon ) ? $coupon->discount : set_value( 'discount' ), $extra ); ?>
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="validity" class="control-label col-md-3">Validity <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-4">
                                        <div data-date="2012-12-21T15:25:00Z" class="input-group">
                                            <?php $extra = ['class' => 'form-control datepicker', 'required' => 'required', 'id' => 'validity', 'readonly' => 'readonly', 'size' => 16]; ?>
                                            <?= form_input( 'validity', isset( $coupon ) ? database_date($coupon->validity) : set_value( 'validity' ), $extra ); ?>
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-warning"><i class="fa fa-calendar"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="times_allowed" class="control-label col-md-3">Times Allowed <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <?php $extra = ['class' => 'form-control number-only', 'required' => 'required', 'id' => 'times_allowed']; ?>
                                        <?= form_input( 'times_allowed', isset( $coupon ) ? $coupon->times_allowed : set_value( 'times_allowed' ), $extra ); ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </section>
                </div>
                <div class="col-md-3">
                    <section class="panel panel-info">
                        <header class="panel-heading">
                            More
                        </header>
                        <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <p class="m-bot15"><strong>Status</strong></p>
                                    <?= form_dropdown( 'status', $status_list, isset( $coupon ) ? $coupon->status : set_value( 'status' ), ['class' => 'form-control'] ) ?>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success btn-block" type="submit" value="Submit"><?= $title; ?> Coupon</button>
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
<script src="<?php echo base_url( 'ckeditor/ckeditor.js' ); ?>"></script>
<script>
    CKEDITOR.replace('desc');
</script>
