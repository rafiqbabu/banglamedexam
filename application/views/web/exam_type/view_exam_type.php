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

                    <!-- Packages -->
                    <?php if ( $packages ): ?>
                        <h5 class="widget-title">Packages <span></span></h5>
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Date Range</th>
                                <th colspan="2">Cost (TK & USD)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ( $packages as $package ) {
                                $type = 0;
                                foreach ( $package as $k => $item ) {
                                    ?>
                                    <tr>
                                        <?php if ( $item->type != $type ): ?>
                                            <td rowspan="<?= count( $package ) ?>"><?php echo get_name_by_auto_id( 'oe_package_type', $item->type ); ?></td>
                                            <?php $type = $item->type; endif; ?>
                                        <td><?php echo $item->name; ?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal_<?= $k; ?>">
                                                Show Description
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal_<?= $k; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel"><?= $item->name; ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php echo base64_decode( $item->desc, TRUE ); ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm bg-red" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center"><?php echo user_formated_date( $item->start_date ) . " - " . user_formated_date( $item->end_date ); ?></td>
                                        <td class="text-right">৳ <?php echo $item->amount_bdt; ?></td>
                                        <td class="text-right">$ <?php echo $item->amount_usd; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php endif; ?>

                    <!-- Exams --
                    <h5 class="widget-title">Faculty: <?= get_faculty( $subject->faculty_id ); ?>, Subject: <?= $subject->subject; ?><span></span></h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Exam Type</th>
                            <th>Available Exams</th>
                            <th colspan="2">Cost/Exam(TK & USD)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ( $exam_type ) {
                            foreach ( $exam_type as $key => $value ) {
                                //echo $value->exam_id;
                                ?>
                                <tr>
                                    <td>
                                        
                                        <?php echo $value->type; ?>
                                        
                                    </td>
                                    <td class="text-center"><?php echo $value->exam_count; ?></td>
                                    <td class="text-right">৳ <?php echo $value->bdt; ?></td>
                                    <td class="text-right">$ <?php echo $value->usd; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    -->
                    <!-- Instruction -->
                    <?php if ( $instruction ): ?>
                        <h5 class="widget-title">Instructions <span></span></h5>
                        <?= $instruction; ?>
                        <div class="clearfix"></div>
                    <?php endif; ?>
    
                    <?php if ( user_logged_in() ) : ?>
                        <div class="text-right">
                            <a href="<?= site_url( "user/{$user->id}/exam-selection?s={$subject->id}" ) ?>" class="btn bg-green btn-lg">Next <span class="fa fa-angle-double-right"></span></a>
                        </div>
                    <?php else: ?>
                        <h4 style="line-height: 2;">If already registered. Please <a class="btn" href="<?= site_url( 'user-login' ) ?>">Login</a> to Purchase exam. If not registered Please
                            <a class="btn bg-green" href="<?= site_url( 'registration' ) ?>">Register</a> and <a class="btn" href="<?= site_url( 'user-login' ) ?>">Login</a></h4>
                    <?php endif; ?>
                </div>
                <div class="col-md-3">
                    <div class="widget">
                        <h5 class="widget-title">Subject Details<span></span></h5>
                        <p class="text-justify"><?= $subject->details; ?></p>
                        </ul><!-- Thumbnail Widget -->
                    </div>
    
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
