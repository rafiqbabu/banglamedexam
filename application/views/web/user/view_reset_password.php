<?php $this->load->view('web/header/view_header'); ?>
<!-- Header Begins -->
<?php $this->load->view('web/header/header_top'); ?>

<!-- Page Main -->
<div role="main" class="main">
    <div class="page-default bg-grey typo-dark pad-bottom-50">
        <!-- Container -->
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="title-wrap text-center">
                    <h3 class="title"><i class="uni-lock-2"></i> <?= $page_title; ?></h3>
                </div>
                <hr>
                <?php echo $msg; ?>
                <!-- Form Begins -->
                <?= form_open(current_url()); ?>
                    <div class="form-group user-reset">
                        <h5 class="text-center">
                            <img src="<?= base_url($user->photo) ?>" alt="" class="img-responsive img-circle img-thumbnail">
                            <?= $user->name; ?>
                        </h5>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="New Password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"/>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <p><a href="<?= site_url('user-login') ?>">Login</a> here..</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <!-- Button -->
                                <button class="btn bg-orange btn-lg" type="submit" onclick="submit_form(this, event)">
                                    Reset Now
                                </button>
                            </div>
                        </div>
                    </div>
<!--                </form>-->
                <?= form_close(); ?>
            </div><!-- Column -->

        </div><!-- Container -->
    </div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view('web/footer/footer'); ?>
<!-- Footer -->
