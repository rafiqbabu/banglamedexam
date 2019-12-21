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
                            Question Count
                            <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-cog" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                        </span>
                        </header>
                        <div class="panel-body">
                            <!--                            <p>Total Questions: <span class="badge bg-info">--><? //= $total_rows; ?><!--</span></p>-->
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="15%">Chapter</th>
                                    <th width="35%">Topic</th>
                                    <th width="25%">SBA Questions</th>
                                    <th width="25%">MCQ Questions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ( !empty( $records ) ) :
                                    $changed = NULL;
                                    $total_mcq = $total_sba = 0;
                                    foreach ( $records as $chapter => $topics ) :
                                        foreach ( $topics as $topic => $qtyps ) :
                                            $sba = isset( $qtyps['SBA'] ) ? $qtyps['SBA'] : 0;
                                            $mcq = isset( $qtyps['MCQ'] ) ? $qtyps['MCQ'] : 0;

                                            $total_sba += $sba;
                                            $total_mcq += $mcq;
                                            ?>
                                            <tr>
                                                <?php if ( $chapter != $changed ):
                                                    $changed = $chapter; ?>
                                                    <th rowspan="<?= count( $topics ) ?>"><?php echo $chapter; ?></th>
                                                <?php endif; ?>
                                                <td><?php echo $topic; ?></td>
                                                <td class="text-center"><?php echo $sba; ?></td>
                                                <td class="text-center"><?php echo $mcq; ?></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                    endforeach; ?>
                                    <tr>
                                        <th colspan="2" class="text-right">Total =</th>
                                        <th class="text-center"><?= $total_sba; ?></th>
                                        <th class="text-center"><?= $total_mcq; ?></th>
                                    </tr>
                                <?php else :
                                    echo '<tr><td colspan="11" align="center">No Data Available</td></tr>';
                                endif;
                                ?>
                                </tbody>
                            </table>

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