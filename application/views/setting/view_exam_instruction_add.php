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
                        <?= ucfirst( $form_action ); ?> Exam Instruction
                        <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <div class="form">
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
                            <?php
                            $action_url = current_url();
                            if ( $form_action == "add" ) {
                                $btnval = 'SAVE';
                            } elseif ( $form_action == "edit" ) {
                                $btnval = 'UPDATE';
                            }

                            ?>

                            <form class="cmxform form-horizontal" enctype="multipart/form-data" id="commentForm" role="form" method="post" action="<?php echo $action_url; ?>">

                                <div class="form-group ">
                                    <label for="Status" class="control-label col-sm-2">EXAM INSTRUCTION <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-sm-9">
                                        <textarea name="instruction" id="instruction"
                                                  class="form-control"><?= isset( $record->instruction ) ? base64_decode( $record->instruction, TRUE ) : NULL; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="Status" class="control-label col-sm-2">Status</label>
                                    <div class="col-sm-3">
                                        <?php
                                        $ddp = 'class="form-control m-bot15"';
                                        echo form_dropdown( 'status', $status_array, set_value( 'status', (isset( $record->status )) ? $record->status : '' ), $ddp );
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                        <input type="hidden" name="hidden_auto_id" id="hidden_auto_id" value="<?php echo isset( $record->id ) ? $record->id : ''; ?>">
                                        <button class="btn btn-primary" type="submit"><?php echo $btnval; ?></button>
                                    </div>
                                </div>

                            </form>
                        </div>
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
<script src="<?php echo base_url( 'ckeditor/ckeditor.js' ); ?>"></script>
<script>
    CKEDITOR.replace('instruction');
</script>
