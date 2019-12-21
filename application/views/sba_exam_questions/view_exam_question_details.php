<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'Y-m-d' );
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        
            <section class="panel panel-info">
                <header class="panel-heading">
                    SBA Question Details
                    <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                            </span>
                </header>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th width="15%">Question</th>
                            <td><?= $res->question_name; ?></td>
                        </tr>
                        <tr>
                            <th>Heading</th>
                            <td><?= $res->heading; ?></td>
                        </tr>
                        
                        <?php if($results): foreach ($results as $result): ?>
                            <tr>
                                <th><?= $result->index_seqn; ?></th>
                                <td><?= $result->ans; ?></td>
                            </tr>
                        <?php endforeach; endif; ?>
                        
                        <tr>
                            <th>Correct Answer</th>
                            <td><?= $res->correct_ans; ?></td>
                        </tr>
                        
                        <tr>
                            <th>Question in Years</th>
                            <td><?= $res->question_in_year; ?></td>
                        </tr>
                        
                        <tr>
                            <th>Chapters</th>
                            <td><?php echo get_chapter_list($res->id); ?></td>
                        </tr>
                        
                        <tr>
                            <th>Topics</th>
                            <td><?php echo get_topics_list($res->id); ?></td>
                        </tr>
                        
                        <tr>
                            <th>Discussion</th>
                            <td><?= $res->discussion; ?></td>
                        </tr>
                        
                        <tr>
                            <th>Reference</th>
                            <td><?= $res->reference; ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <?php
                                if ($res->status == '1') {
                                    echo '<span class="label label-success">Active</span>';
                                } else {
                                    echo '<span class="label label-warning">Inactive</span>';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
            </section>
            <!--start image section-->
        <!-- page end-->
    </section>
</section>
<!--main content end-->

<?php
$this->load->view( 'footer/view_footer' );
?>