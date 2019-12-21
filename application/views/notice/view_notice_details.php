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
                            Notice Details
                            <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-cog" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                        </span>
                        </header>
                        <div class="panel-body">
                            <h3><?= $notice->title; ?></h3>
                            <div class="clearfix"><?= base64_decode( $notice->details, TRUE ); ?></div>
                            <?php if ( $notice->attachment ): ?>
                                <iframe src="<?= base_url( $notice->attachment ) ?>" frameborder="0" width="100%" height="500px" allowfullscreen></iframe>
                            <?php endif; ?>
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