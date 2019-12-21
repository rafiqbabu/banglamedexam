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
                    <h3 class="title"><i class="uni-unlock-2"></i> <?= $page_title; ?></h3>
                </div>
                <hr>
                <?php echo $msg; ?>
                <!-- Form Begins -->
                <?= form_open(current_url()); ?>
<!--                <form method="post" action="--><?//= current_url(); ?><!--">-->

                    <div class="input-email form-group">
                        <input type="text" name="username" class="input-email form-control" placeholder="Username" autofocus/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="input-name form-control" placeholder="Password"/>
                    </div>

                    <div class="input-text">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Don't have account, <a href="<?= site_url('registration') ?>">Register Now</a></p>
                                <p><a href="<?= site_url('forgot-password') ?>" class="text-danger">Forgot Password</a></p>
                            </div>
                            <div class="col-md-6 text-right">
                                <!-- Button -->
                                <button class="btn bg-green btn-lg" type="submit" onclick="submit_form(this, event)">
                                    Login Now
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
