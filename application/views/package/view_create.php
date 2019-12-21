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
                $url   = site_url( 'package/save_package' );
                $title = "Create";
            } elseif ( $action == 'edit' ) {
                $url   = site_url( "package/update_package/$id" );
                $title = "Update";
            } ?>

            <form class="cmxform form-horizontal" enctype="multipart/form-data" id="commentForm" role="form" method="post"
                  action="<?php echo $url; ?>">
                <div class="col-md-12">
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
                            <h3 class="panel-title"><?= $title; ?> Package
                                <span class="jnn-tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:"></a>
                                    </span>
                            </h3>

                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <div class="form-group ">
                                    <label for="name" class="control-label col-md-2">Package Name <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <?php $extra = ['class' => 'form-control', 'required' => 'required', 'id' => 'name']; ?>
                                        <?= form_input( 'name', isset( $package ) ? $package->name : set_value( 'name' ), $extra ); ?>
                                    </div>
                                    
                                    <label for="type" class="control-label col-md-2">Package Type <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='type' required";
                                        echo form_dropdown( 'type', $package_types, isset( $package ) ? $package->type : set_value( 'type' ), $ddp );
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="start_date" class="control-label col-md-2">Start Datetime <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <?php $extra = ['class' => 'form-control datepicker', 'required' => 'required', 'id' => 'start_date', 'readonly' => 'readonly', 'placeholder' => 'YYYY-MM-DD']; ?>
                                        <?= form_input( 'start_date', isset( $package ) ? $package->start_date : set_value( 'start_date' ), $extra ); ?>
                                    </div>

                                    <label for="end_date" class="control-label col-md-2">End Datetime <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <?php $extra = ['class' => 'form-control datepicker', 'required' => 'required', 'id' => 'end_date', 'readonly' => 'readonly', 'placeholder' => 'YYYY-MM-DD']; ?>
                                        <?= form_input( 'end_date', isset( $package ) ? $package->end_date : set_value( 'end_date' ), $extra ); ?>
                                    </div>

                                </div>

                                <div class="form-group ">
                                    <label for="amount_bdt" class="control-label col-md-2">Cost (BDT) <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">৳</span>
                                            <?php
                                            $ddp = "class='form-control' id='amount_bdt' required placeholder='0.00'";
                                            echo form_input( 'amount_bdt', isset( $package ) ? $package->amount_bdt : set_value( 'amount_bdt' ), $ddp );
                                            ?>
                                        </div>
                                    </div>
                                    <label for="amount_usd" class="control-label col-md-2">Cost (USD) <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <?php
                                            $ddp = "class='form-control' id='amount_usd' required placeholder='0.00'";
                                            echo form_input( 'amount_usd', isset( $package ) ? $package->amount_usd : set_value( 'amount_usd' ), $ddp );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-2 control-label">Status</label>
                                    <div class="col-md-3">
                                        <?= form_dropdown( 'status', $status_list, isset( $package ) ? $package->status : set_value( 'status' ), ['class' => 'form-control'] ) ?>
                                    </div>
                                </div>
                                

                                <!-- new -->
                                <div class="form-group ">
                                    <label class="col-md-2 control-label">Year <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <?= form_dropdown( 'year', $year_list, isset( $package ) ? $package->year : set_value( 'year' ), ['class' => 'form-control', 'required' => 'required'] ) ?>
                                        <!--
                                        <select name="year" class="form-control" required>
                                            <option value="" selected disabled>Select One</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                        </select>
                                        -->
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-2 control-label">Session <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                         <?= form_dropdown( 'session', $session_list, isset( $package ) ? $package->session : set_value( 'session' ), ['class' => 'form-control', 'required' => 'required'] ) ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-2 control-label">Type <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-3">
                                        <?= form_dropdown( 'sm_ad', $ptype_list, isset( $package ) ? $package->sm_ad : set_value( 'sm_ad' ), ['class' => 'form-control', 'required' => 'required'] ) ?>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="desc" class="control-label col-md-2">Details</label>
                                    <div class="col-md-10">
                                        <div class="border-1">
                                            <?php
                                            $ddp = "class='form-control' id='desc' required multiple";
                                            echo form_textarea( 'desc', isset( $package ) ? base64_decode( $package->desc, TRUE ) : set_value( 'desc' ), $ddp );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="name" class="control-label col-md-2">Routine URL <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-9">
                                        <?php $extra = ['class' => 'form-control', 'required' => 'required', 'id' => 'routine_url']; ?>
                                        <?= form_input( 'routine_url', isset( $package ) ? $package->routine_url : set_value( 'routine_url' ), $extra ); ?>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="exams" class="control-label col-md-2">Select Exams </label>
                                    <div class="col-md-10">
                                        <!--<pre>--><?php //print_r( $exams ); ?><!--</pre>-->
                                        <select name="exams[]" id="exams" class="form-control my_multi_select3" multiple>
                                            <?php if ( $exam_list ) : foreach ( $exam_list as $et => $sexams ): ?>
                                                <optgroup label="<?= $et; ?>">
                                                    <?php if ( $sexams ) {
                                                        foreach ( $sexams as $id => $sexam ) {
                                                            $selected = isset( $exams ) && in_array( $id, $exams ) ? 'selected' : NULL;
                                                            echo "<option value='{$id}' {$selected}>{$sexam}</option>";
                                                        }
                                                    } ?>
                                                </optgroup>
                                            <?php endforeach; endif; ?>
                                        </select>
                                        <?php
                                        //                                        $ddp = "class='form-control my_multi_select3' id='exams' required";
                                        //                                        echo form_multiselect( 'exams[]', $exam_list, isset( $exams ) ? $exams : '', $ddp );
                                        ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-3 col-md-offset-2">
                                        <button class="btn btn-success btn-block" type="submit" value="Submit"><?= $title; ?> Package</button>
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
<script src="<?php echo base_url( 'ckeditor/ckeditor.js' ); ?>"></script>
<script>
    CKEDITOR.replace('desc');
</script>
