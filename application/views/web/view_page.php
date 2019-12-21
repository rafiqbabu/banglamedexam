<?php $this->load->view('web/header/view_header'); ?>
<!-- Header Begins -->
<?php $this->load->view('web/header/header_top'); ?>
<!-- Page Main -->
<div role="main" class="main">

    <div class="page-default bg-grey typo-dark" style="padding-bottom: 50px">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <!-- Blog Column -->
                <?= base64_decode($page->details); ?>
            </div><!-- Row -->
        </div><!-- Container -->
    </div><!-- Page Default -->


</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view('web/footer/footer'); ?>
