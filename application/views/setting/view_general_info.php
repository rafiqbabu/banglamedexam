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
                        General Information
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

                            <form class="cmxform form-horizontal " id="commentForm" role="form" method="post"
                                  action="<?= base_url( "setting/save_general_info" ); ?>" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="name" class="control-label col-md-4">Company Name</label>
                                            <div class="col-md-8">
                                                <input type="text" id="name" name="name" class="form-control"
                                                       value="<?= $record ? $record->name : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="tagline" class="control-label col-md-4">Company Tagline</label>
                                            <div class="col-md-8">
                                                <input type="text" id="tagline" name="tagline" class="form-control"
                                                       value="<?= $record ? $record->tagline : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="address" class="control-label col-md-4">Company Address</label>
                                            <div class="col-md-8">
                                                <textarea id="address" name="address" class="form-control" rows="4"><?= $record ? $record->address : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="email" class="control-label col-md-4">Company Email</label>
                                            <div class="col-md-8">
                                                <input type="email" id="email" name="email" class="form-control"
                                                       value="<?= $record ? $record->email : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="email" class="control-label col-md-4">Facebook</label>
                                            <div class="col-md-8">
                                                <input type="url" id="fb_id" name="fb_id" class="form-control" value="<?= $record ? $record->fb_id : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="email" class="control-label col-md-4">Twitter</label>
                                            <div class="col-md-8">
                                                <input type="url" id="twitter" name="twitter" class="form-control" value="<?= $record ? $record->twitter : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="phone" class="control-label col-md-4">Company Phone</label>
                                            <div class="col-md-8">
                                                <input type="tel" id="phone" name="phone" class="form-control"
                                                       value="<?= $record ? $record->phone : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="website" class="control-label col-md-4">Company Website</label>
                                            <div class="col-md-8">
                                                <input type="url" id="website" name="website" class="form-control"
                                                       value="<?= $record ? $record->website : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="Status" class="control-label col-md-4">Status</label>
                                            <div class="col-md-4">
                                                <?php
                                                $ddp = 'class="form-control m-bot15"';
                                                echo form_dropdown( 'status', $status_array, set_value( 'status', ($record ? $record->status : '') ), $ddp );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group ">
                                            <label for="smtp_email" class="control-label col-md-4">SMTP Email</label>
                                            <div class="col-md-8">
                                                <input type="email" id="smtp_email" name="smtp_email" class="form-control"
                                                       value="<?= $record ? $record->smtp_email : ''; ?>" placeholder="SMTP email address">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="smtp_host" class="control-label col-md-4">SMTP Host</label>
                                            <div class="col-md-8">
                                                <input type="text" id="smtp_host" name="smtp_host" class="form-control"
                                                       value="<?= $record ? $record->smtp_host : ''; ?>" placeholder="SMTP Host">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="smtp_user" class="control-label col-md-4">SMTP User</label>
                                            <div class="col-md-8">
                                                <input type="text" id="smtp_user" name="smtp_user" class="form-control"
                                                       value="<?= $record ? $record->smtp_user : ''; ?>" placeholder="SMTP Username">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="smtp_pass" class="control-label col-md-4">SMTP Password</label>
                                            <div class="col-md-8">
                                                <input type="text" id="smtp_pass" name="smtp_pass" class="form-control"
                                                       value="<?= $record ? $record->smtp_pass : ''; ?>" placeholder="SMTP Password">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="smtp_port" class="control-label col-md-4">SMTP Port</label>
                                            <div class="col-md-8">
                                                <input type="text" id="smtp_port" name="smtp_port" class="form-control"
                                                       value="<?= $record ? $record->smtp_port : ''; ?>" placeholder="SMTP Port">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-md-4">Logo<br>
                                                (Image Size:100Kb Max, Only (.jpg/.png/.gif,) is allowed to upload)
                                            </label>
                                            <div class="col-md-8">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                        <?php if ( !empty( $record ) ) echo "<img src='" . base_url( $record->logo ) . "'"; ?>
                                                        <img
                                                                src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Photo+image"
                                                                alt=""/>
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail"
                                                         style="max-width: 300px; max-height: 100px; line-height: 20px;"></div>
                                                    <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                        <input type="file" name="logo" class="default"/>
                                                    </span>
                                                        <a href="#" class="btn btn-danger fileupload-exists"
                                                           data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-3">
                                        <input type="hidden" name="hidden_auto_id" id="hidden_auto_id"
                                               value="<?php echo isset( $record->id ) ? $record->id : ''; ?>">
                                        <button class="btn btn-success btn-lg btn-block" type="submit">Save General Info</button>
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