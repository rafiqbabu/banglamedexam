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
                        <?= $form_action; ?> News/Events
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
                            if ( $form_action == "add" ) {
                                $action_url = site_url("setting/save_news_events");
                                $btnval = 'SAVE';
                            } elseif ( $form_action == "edit" ) {
                                $action_url = site_url("setting/update_news_events/$record->id");
                                $btnval = 'UPDATE';
                            }

                            ?>

                            <form class="cmxform form-horizontal" enctype="multipart/form-data" id="commentForm" role="form" method="post" action="<?php echo $action_url; ?>">

                                <div class="form-group ">
                                    <label for="news_title" class="control-label col-md-2">News Title <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-8">
                                        <?= form_input('news_title', isset($record) ? $record->news_title : set_value('news_title'), ['class' => 'form-control m-bot15', 'required' => 'required']) ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="news_details" class="control-label col-md-2">News Details</label>
                                    <div class="col-md-8">
                                        <?= form_textarea('news_details', isset($record) ? $record->news_details : set_value('news_details'), ['class' => 'form-control m-bot15', 'required' => 'required', 'id' => 'news_details']) ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="Status" class="control-label col-md-2">File Upload</label>
                                    <div class="col-md-8">
                                        <input type="file" name="content_feature_file" class="form-control m-bot15">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="Status" class="control-label col-md-2">Status</label>
                                    <div class="col-md-8">
                                        <?php
                                        $ddp = 'class="form-control m-bot15"';
                                        echo form_dropdown( 'status', $status_array, set_value( 'status', (isset( $record->status )) ? $record->status : '' ), $ddp );
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
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
    CKEDITOR.replace('news_details');
</script>