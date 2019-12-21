<?php $this->load->view('web/header/view_header'); ?>
<!-- Header Begins -->
<?php $this->load->view('web/header/header_top'); ?>
<!-- Page Main -->
<div role="main" class="main">
    <div class="page-default bg-grey team-single">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <?php $this->load->view('web/elements/view_sidebar'); ?>

                <!-- Page Content -->
                <div class="col-md-9">
                    <div class="widget profile-widget">
                        <?php echo $msg; ?>
                        <?= form_open(site_url("user/{$id}/update-password"), 'class="edit-profile"'); ?>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-12  margin-top">
                                <h4 class="widget-title">Change Password <span></span></h4>
                                <table class="table default table-bordered">
                                    <tbody>
                                    <tr>
                                        <td width="30%"><strong>Old Password <span class="jnn-important">*</span></strong></td>
                                        <td width="70%">
                                            <input type="password" name="old_password" class="input-name form-control" placeholder="Old Password"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><strong>New Password <span class="jnn-important">*</span></strong></td>
                                        <td width="70%">
                                            <input type="password" name="password" class="input-name form-control" placeholder="New Password"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Confirm Password <span class="jnn-important">*</span></strong></td>
                                        <td>
                                            <input type="password" name="confirm_password" class="input-name form-control" placeholder="Confirm Password"/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!-- Column -->

                            <div class="col-md-4 pull-right">
                                <!-- Button -->
                                <button class="btn bg-green btn-lg btn-block" type="submit" onclick="submit_form(this, event)">
                                    Change Password
                                </button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div><!-- Column -->
            </div><!-- Row -->
        </div><!-- Container -->
    </div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view('web/footer/footer'); ?>
<!-- Footer -->
