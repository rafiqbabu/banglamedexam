<?php $this->load->view('web/header/view_header'); ?>
<!-- Header Begins -->
<?php $this->load->view('web/header/header_top'); ?>

<!-- Page Main -->
<div role="main" class="main">
    <div class="page-default bg-grey typo-dark pad-bottom-50">
        <!-- Container -->
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="title-wrap text-center">
                    <h3 class="title"><i class="uni-business-man"></i> Registration</h3>
                </div>
                <hr>
                <?php echo $msg; ?>
                <!-- Form Begins -->
                <?= form_open(current_url()) ?>
                <!-- Field 1 -->
                <div class="input-text form-group">
                    <input type="text" name="name" class="input-name form-control" placeholder="Full Name"/>
                </div>
                <!-- Field 2 -->
                <div class="input-email form-group">
                    <input type="email" name="email" class="input-email form-control" placeholder="Email"/>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="password" name="password" class="input-name form-control" placeholder="Password"/>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" name="confirm_password" class="input-name form-control" placeholder="Confirm Password"/>
                        </div>
                    </div>
                </div>
                <!-- Field 3 -->
                <div class="input-text form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="bmdc_no" class="input-name form-control" placeholder="BMDC No" maxlength="20"/>
                        </div>
                        <div class="col-sm-6">
                            <input type="tel" name="phone" class="number-only form-control" placeholder="Phone (Ex: 01700000000)" maxlength="11"/>
                        </div>
                    </div>
                </div>

                <div class="input-text form-group">
                    <input type="checkbox" name="agreement" id="agreement">
                    <label for="agreement">
                        I accept all the terms &amp; conditions.
                    </label>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            Already have account, <a href="<?= site_url('user-login') ?>">Login Now</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <!-- Button -->
                            <button class="btn bg-green btn-lg" type="submit" onclick="submit_form(this, event)" disabled>
                                Register Now
                            </button>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div><!-- Column -->

        </div><!-- Container -->
    </div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view('web/footer/footer'); ?>
<!-- Footer -->
