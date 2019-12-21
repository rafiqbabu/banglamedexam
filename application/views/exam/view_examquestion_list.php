<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'm/d/Y' );
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        <?= $type; ?> Question Bank List - <?= $topic->name; ?> :: (<?= $total_rows; ?>)
                        <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th width="40%">Question</th>
                                <th width="50%">Options</th>
                                <th>Answer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ( !empty( $rec ) ) {
                                foreach ( $rec as $key => $value ) {
                                    $key++;
                                    ?>
                                    <tr>
                                        <td><?= $key; ?></td>
                                        <td><?php echo $value->question_name; ?></td>
                                        <td><?php echo get_ans_options( $value->id ); ?></td>
                                        <td class="text-center">
                                            <?php if($value->type == 2) {
                                                echo get_mcq_ans( $value->id );
                                            } else {
                                                echo $value->correct_ans;
                                            } ?>
                                        </td>
<!--                                        <td>--><?php //echo get_chapter_list( $value->id ); ?><!--</td>-->
<!--                                        <td>--><?php //echo get_topics_list( $value->id ); ?><!--</td>-->
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="11" align="center">No Data Available</td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php echo $links; ?>
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
