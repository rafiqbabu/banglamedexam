<?php $this->load->view('web/header/view_header'); ?>
<!-- Header Begins -->
<?php $this->load->view('web/header/header_top'); ?>
<!-- Page Main -->
<div role="main" class="main">
    <!-- Section -->
    <section class="bg-grey typo-dark">
        <div class="container">
            <div class="row">
                <!-- Column -->
                <div class="col-sm-6">
                    <div class="contact-info">
                        <div class="info-icon bg-dark">
                            <i class="uni-map2"></i>
                        </div>
                        <h5 class="title">Address</h5>
                        <p><?= $company->address; ?></p>
                    </div><!-- Contact Info -->
                </div><!-- Column -->

                <!-- Column -->
                <div class="col-sm-6">
                    <div class="contact-info">
                        <div class="info-icon bg-dark">
                            <i class="uni-phone-2"></i>
                        </div>
                        <h5 class="title">Contact Mail</h5>
                        <p>Email: <a href="mailto:<?= $company->email; ?>"><?= $company->email; ?></a></p>
                        <p>Phone: <a href="tel:<?= $company->phone; ?>"><?= $company->phone; ?></a></p>
                    </div><!-- Contact Info -->
                </div><!-- Column -->

            </div><!-- Row -->
        </div><!-- Container -->
    </section><!-- Section -->

    <!-- Section -->
    <section class="pad-none typo-dark">
		<div class="container">
            <div class="row">

                <!-- Column -->
                <div class="col-sm-12 map-canvas jnn-gen-map"
                     style=""
                     data-zoom="16"
                     data-lat="<?= $company->lat; ?>"
                     data-lng="<?= $company->lng; ?>"
                     data-title="<?= $company->name; ?>"
                     data-type="roadmap"
                     data-hue="#2196F3"
                     data-content="<?= $company->tagline; ?>&lt;br&gt; Contact: <?= $company->phone; ?>&lt;br&gt; <?= $company->email; ?>">
                </div><!-- Column -->
            </div><!-- Row -->
        </div><!-- Container -->
    </section><!-- Section -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view('web/footer/footer'); ?>
<!-- Footer -->
<script type="text/javascript">
    window.onload = MapLoadScript;
</script>
