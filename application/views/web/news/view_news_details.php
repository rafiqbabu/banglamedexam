<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php
$this->load->view( 'web/header/header_top' );
?>
<!-- Page Main -->
<div role="main" class="main">
    <div class="page-default bg-grey typo-dark">
        <!-- Container -->
        <div class="container">
            <!-- Course Wrapper -->
            <div class="row">
                <div class="col-md-9 widget">

                    <h5 class="widget-title"><?php echo $new_details->news_title; ?><span></span></h5>
                    <div class="news-single-details">
                        <?php
                        if ( $new_details->file_extension == 'pdf' ) {
                            ?>
                            <p>
                                <a href="<?php echo base_url() . $new_details->file_loc . '/featureimg.pdf'; ?>">Click Here And Download necessary File.</a>
                            </p>
                            <?php
                        } else {
                            echo '<div class="text-center"><img src="' . base_url( $new_details->file_loc ) . '" alt="" class="img-responsive"></div>';
                        }
                        ?>

                        <p>
                            <?php echo $new_details->news_details; ?>
                        </p>
                    </div><!-- Blog Detail Wrapper -->
                </div>
                <div class="col-md-3">

                    <?= $news_events; ?>

                </div>

            </div><!-- Container -->
        </div><!-- Page Default -->
    </div><!-- Page Main -->
</div>

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>

<!--slick-->
<link rel="stylesheet" type="text/css" href="<?= base_url( 'assets/slick/slick.css' ) ?>"/>
<link rel="stylesheet" type="text/css" href="<?= base_url( 'assets/slick/slick-theme.css' ) ?>"/>
<script type="text/javascript" src="<?= base_url( 'assets/slick/slick.min.js' ) ?>"></script>
<script>
    $('.news-slider').slick({
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false
    });
</script>
