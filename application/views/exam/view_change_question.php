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
                    <form class="cmxform form-horizontal" enctype="multipart/form-data" id="commentForm" role="form" method="post"
                          action="<?php echo current_url(); ?>">

                        <!--  <input type="hidden" name="update_id" value="<?php //echo isset($res->id) ? $res->id : '' ?>"> -->

                        <section class="panel panel-info">
                            <header class="panel-heading">
                                <h3 class="panel-title">Change Question
                                    <span class="jnn-tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                    </span>
                                </h3>

                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <div class="form-group ">

                                        <label for="question" class="control-label col-md-2">Question <i class="fa fa-asterisk ipd-star"></i></label>
                                        <div class="col-md-10">
                                            <?php
                                            $ddp = "class='form-control m-bot15 select2' id='question' required";
                                            echo form_dropdown( 'question', $question_list, set_value( 'question', (isset( $id )) ? $id : '' ), $ddp );
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <button class="btn btn-success" type="submit" value="Submit">Change</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>

                    </form>
                </div>
            </div>
        </section>
    </section>
    <!--main content end-->

<?php
$this->load->view( 'footer/view_footer' );
?>