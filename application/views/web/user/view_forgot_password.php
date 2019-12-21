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
<!--                <form method="post" action="--><?//= current_url(); ?><!--">-->

                    <div class="input-email form-group">
                        <input type="email" name="email" class="input-email form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= site_url('user-login'); ?>">Login</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <!-- Button -->
                                <button class="btn bg-orange btn-lg" type="submit" onclick="submit_form(this, event)">
                                    Send Reset Link
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
