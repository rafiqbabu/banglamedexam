<?php
$this->load->view('header/view_header');
$current_date = date('Y-m-d');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <?php //echo print_r($res);exit;?>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                if (validation_errors()) {
                    echo validation_errors('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>', '</div>');
                }

                if ($this->session->flashdata('flashOK')) {
                    echo "<div class=\"alert alert-success fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
                    echo $this->session->flashdata('flashOK');
                    echo "</div>";
                }
                if ($this->session->flashdata('flashError')) {
                    echo "<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
                    echo $this->session->flashdata('flashError');
                    echo "</div>";
                }

                if ($form_action == "add") {
                    $action_url = current_url();
                    $btnval = 'SAVE';
                    $required = 'required';
                } elseif ($form_action == "edit") {
                    $action_url = current_url();
                    $btnval = 'UPDATE';
                    $required = '';
                }
                ?>

                <form class="cmxform form-horizontal " id="commentForm" role="form" method="post"
                      action="<?php echo $action_url; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="auto_id" value="<?php echo isset($user->id) ? $user->id : ''; ?>">
                    <section class="panel panel-info">
                        <header class="panel-heading">
                            <?= $form_action; ?> User Form
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <div class="form-group ">
                                    <label for="exe_stuff" class="control-label col-lg-4">Executive/Stuff <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-6">
                                        <?php
                                        $ddp = 'class="form-control m-bot15 required" id="exe_stuff"';
                                        echo form_dropdown('exe_stuff', $exe_stuff_list, isset($user) ? $user->teacher_id : '', $ddp);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="identity" class="control-label col-lg-4">Username <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-6">
                                        <input type="text" name="identity" class="form-control" required id="identity" value="<?= isset($user) ? $user->username : ''; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label col-lg-4">Password <?= $required ? '<i class="fa fa-asterisk ipd-star"></i>' : ''; ?></label>
                                    <div class="col-lg-6">
                                        <input type="password" name="password" class="form-control" <?= $required; ?> id="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirm" class="control-label col-lg-4">Password Confirm <?= $required ? '<i class="fa fa-asterisk ipd-star"></i>' : ''; ?></label>
                                    <div class="col-lg-6">
                                        <input type="password" name="password_confirm" class="form-control" <?= $required; ?> id="password_confirm">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="Status" class="control-label col-lg-4">Role <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-6">
                                        <?php
                                        $ddp = 'class="form-control m-bot15"';
                                        echo form_dropdown('group', $group_array, isset($user) ? $currentGroups[0]->id : '',$ddp);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="Status" class="control-label col-lg-4">Status <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-6">
                                        <?php
                                        $ddp = 'class="form-control m-bot15"';
                                        echo form_dropdown('status', $status_array, isset($user) ? $user->status : '',$ddp);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-4 col-lg-6 text-right">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </form>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
$this->load->view('footer/view_footer');
?>    